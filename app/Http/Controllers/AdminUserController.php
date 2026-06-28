<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tier = $request->get('tier'); 

        // Query dasar mengambil data dari tabel USERS
        $query = DB::table('USERS')->whereRaw('UPPER(ROLE) = ?', ['USER']);

        // Logika Live Search berdasarkan USERNAME atau EMAIL
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('USERNAME', 'LIKE', '%' . $search . '%')
                  ->orWhere('EMAIL', 'LIKE', '%' . $search . '%');
            });
        }

        // Logika Filter Berdasarkan TIER_LANGGANA
        if (!empty($tier) && $tier !== 'ALL') {
            $query->where('TIER_LANGGANAN', strtoupper($tier));
        }

        // Ambil data dengan pagination
        $users = $query->orderBy('ID', 'desc')->paginate(10);
        
        $totalMembers = DB::table('USERS')->whereRaw('UPPER(ROLE) = ?', ['USER'])->count();

        // Menggunakan kolom SISA_WAKTU sesuai dengan DB Oracle kamu
        $activeToday = DB::table('USERS')
                        ->whereRaw('UPPER(ROLE) = ?', ['USER'])
                        ->where('SISA_WAKTU', '>', 0)
                        ->count();

        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        $newThisMonth = DB::table('USERS')
                        ->whereRaw('UPPER(ROLE) = ?', ['USER'])
                        ->whereBetween('CREATED_AT', [$startOfMonth, $endOfMonth])
                        ->count();

        return view('CMS.Admin.usermng', compact('users', 'totalMembers', 'activeToday', 'newThisMonth'));
    }

    // FUNGSI SIMPAN LOG BERMAIN
    public function storeSession(Request $request, $id)
    {
        // 1. Validasi input dari Modal Form Admin
        $request->validate([
            'id_komputer' => 'required|string|max:20',
            'durasi' => 'required|numeric',
            'total_biaya' => 'required|numeric'
        ]);

        // 2. Manipulasi Waktu Menggunakan Carbon
        $waktuMulai = Carbon::now();
        $durasiJam = (float) $request->durasi;
        $waktuSelesai = Carbon::now()->addHours($durasiJam);
        
        // Hitung biaya per jam secara dinamis untuk dicatat ke database Oracle
        $biayaPerJam = $request->total_biaya / $durasiJam;

        // 3. Insert Data ke Tabel SESI_BERMAIN Oracle

        // Ambil ID tertinggi saat ini, jika tabel kosong mulai dari 0, lalu tambah 1
        $nextId = DB::table('SESI_BERMAIN')->max('ID_SESI') + 1;

        DB::table('SESI_BERMAIN')->insert([
            'ID_SESI'       => $nextId,
            'WAKTU_MULAI'   => $waktuMulai->format('Y-m-d H:i:s'),
            'WAKTU_SELESAI' => $waktuSelesai->format('Y-m-d H:i:s'),
            'DURASI'        => $durasiJam,
            'BIAYA_PER_JAM' => $biayaPerJam,
            'TOTAL_BIAYA'   => $request->total_biaya,
            'ID_KOMPUTER'   => $request->id_komputer,
            'ID_USER'       => $id, // Mengikat langsung ke ID User yang dipilih
            'ID_TRANSAKSI'  => null
        ]);

        return redirect()->back()->with('success', 'Billing sesi bermain baru berhasil diaktifkan untuk member!');
    }

    // FUNGSI UPDATE DATA USER KE ORACLE
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'sisa_waktu' => 'required|integer|min:0',
            'tier_langganan' => 'required|string'
        ]);

        DB::table('USERS')->where('ID', $id)->update([
            'USERNAME' => $request->username,
            'EMAIL' => $request->email,
            'SISA_WAKTU' => $request->sisa_waktu,
            'TIER_LANGGANAN' => strtoupper($request->tier_langganan)
        ]);

        return redirect()->back()->with('success', 'Data member NetCity berhasil diperbarui!');
    }

    // FUNGSI HAPUS USER DARI ORACLE
    public function destroy($id)
    {
        DB::table('USERS')->where('ID', $id)->delete();
        return redirect()->back()->with('success', 'Akun member berhasil dihapus secara permanen!');
    }
}