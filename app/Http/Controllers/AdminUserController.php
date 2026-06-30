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

        $games = DB::table('GAMES')->orderBy('JUDUL_GAME', 'asc')->get();

        return view('CMS.Admin.usermng', compact('users', 'totalMembers', 'activeToday', 'newThisMonth', 'games'));
    }

    // FUNGSI SIMPAN LOG BERMAIN
    // FUNGSI SIMPAN LOG BERMAIN (SUDAH DIPERBAIKI)
    // FUNGSI SIMPAN LOG BERMAIN (HANYA SESI BERMAIN & POTONG/TAMBAH SISA WAKTU)
    public function storeSession(Request $request, $id)
    {
        // 1. Validasi input dari Modal Form Admin
        $request->validate([
            'id_komputer' => 'required|string|max:20',
            'durasi' => 'required|numeric',
            'total_biaya' => 'required|numeric'
        ]);

        try {
            // 2. Manipulasi Waktu Menggunakan Carbon
            $waktuMulai = Carbon::now();
            $durasiJam = (float) $request->durasi;
            $waktuSelesai = Carbon::now()->addHours($durasiJam);
            
            // Hitung biaya per jam
            $biayaPerJam = $request->total_biaya / $durasiJam;

            // 3. Ambil data user untuk update SISA_WAKTU secara otomatis
            $user = DB::table('USERS')->where('ID', $id)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'Member tidak ditemukan!');
            }

            // Hitung sisa waktu baru dalam hitungan MENIT
            $menitTambahan = $durasiJam * 60;
            $sisaWaktuBaru = (isset($user->SISA_WAKTU) ? (int) $user->SISA_WAKTU : 0) + $menitTambahan;

            // 4. Mulai Database Transaction agar kedua proses di bawah ini aman dan sinkron
            DB::transaction(function () use ($waktuMulai, $waktuSelesai, $durasiJam, $biayaPerJam, $request, $id, $sisaWaktuBaru) {
                
                // A. Ambil ID tertinggi untuk SESI_BERMAIN
                $nextId = DB::table('SESI_BERMAIN')->max('ID_SESI') + 1;
                if (!$nextId) $nextId = 1;

                // B. Insert ke SESI_BERMAIN (KOLOM ID_TRANSAKSI SUDAH DIHAPUS TOTAL)
                DB::table('SESI_BERMAIN')->insert([
                    'ID_SESI'       => $nextId,
                    'WAKTU_MULAI'   => $waktuMulai->format('Y-m-d H:i:s'),
                    'WAKTU_SELESAI' => $waktuSelesai->format('Y-m-d H:i:s'),
                    'DURASI'        => $durasiJam,
                    'BIAYA_PER_JAM' => $biayaPerJam,
                    'TOTAL_BIAYA'   => $request->total_biaya,
                    'ID_KOMPUTER'   => $request->id_komputer,
                    'ID_USER'       => $id
                ]);

                // C. Update SISA_WAKTU di tabel USERS agar langsung ngefek ke tampilan dashboard
                DB::table('USERS')->where('ID', $id)->update([
                    'SISA_WAKTU' => $sisaWaktuBaru
                ]);
            });

            return redirect()->back()->with('success', 'Billing sesi bermain baru berhasil diaktifkan dan sisa waktu member telah diperbarui!');

        } catch (\Exception $e) {
            // Jika ada kendala, paksa tampilkan detail errornya di layar browser
            dd([
                'Pesan_Error' => $e->getMessage(),
                'Solusi' => 'Pastikan nama-nama kolom di atas (KAPITAL) sudah sama persis dengan struktur tabel SESI_BERMAIN di Oracle XE kamu.'
            ]);
        }
    }

    public function storeGameHistory(Request $request, $id)
    {
        // 1. Validasi input
        $request->validate([
            'game_id'          => 'required|string|max:20',
            'total_jam'        => 'required|numeric|min:0.5',
            'keterangan_waktu' => 'required|string'
        ]);

        try {
            // 2. Ambil ID tertinggi menggunakan nama tabel & kolom KAPITAL
            $nextHistoryId = DB::table('USER_GAME_HISTORY')->max('ID') + 1;
            
            if (!$nextHistoryId) {
                $nextHistoryId = 1;
            }

            // 3. Eksekusi Insert
            DB::table('USER_GAME_HISTORY')->insert([
                'ID'               => $nextHistoryId,
                'USER_ID'          => $id,
                'GAME_ID'          => $request->game_id,
                'TOTAL_JAM'        => (float) $request->total_jam,
                'KETERANGAN_WAKTU' => $request->keterangan_waktu,
                'CREATED_AT'       => Carbon::now()->format('Y-m-d H:i:s'),
                'UPDATED_AT'       => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            return redirect()->back()->with('success', 'Riwayat aktivitas game member berhasil diperbarui!');

        } catch (\Exception $e) {
            // JIKA TERJADI ERROR, PAKSA TAMPILKAN DI LAYAR AGAR KITA TAHU PENYEBABNYA
            dd([
                'Pesan_Error' => $e->getMessage(),
                'Data_Input' => [
                    'ID' => $nextHistoryId ?? 'belum terisi',
                    'USER_ID' => $id,
                    'GAME_ID' => $request->game_id,
                    'TOTAL_JAM' => $request->total_jam,
                    'KETERANGAN_WAKTU' => $request->keterangan_waktu
                ]
            ]);
        }
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