<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomputerManagementController extends Controller
{
    // 1. READ: Menampilkan Halaman List PC Admin
    public function index(Request $request)
    {
        // 1. Tangkap parameter filter dari URL (GET Request)
        $search = $request->get('search');
        $tier = $request->get('tier');
        $status = $request->get('status');

        // 2. Mulai query dasar dari tabel KOMPUTER
        $query = DB::table('KOMPUTER');

        // 3. Logika Pencarian (Jika input search diisi)
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                // Menggunakan UPPER agar pencarian ID atau Nama bersifat Case-Insensitive (tidak sensitif huruf besar/kecil)
                $q->where('ID_KOMPUTER', 'LIKE', '%' . strtoupper($search) . '%')
                ->orWhere('NAMA_KOMPUTER', 'LIKE', '%' . $search . '%')
                ->orWhere('CPU', 'LIKE', '%' . $search . '%')
                ->orWhere('GPU', 'LIKE', '%' . $search . '%');
            });
        }

        // 4. Logika Filter Tier (Jika select tier dipilih)
        if (!empty($tier)) {
            $query->where('TIER', $tier);
        }

        // 5. Logika Filter Status (Jika select status dipilih)
        if (!empty($status)) {
            $query->where('STATUS', $status);
        }

        // 6. Ambil data dengan Pagination & Urutkan berdasarkan ID_KOMPUTER
        // appends() memastikan filter pencarian tidak hilang saat pindah halaman pagination
        $computers = $query->orderBy('ID_KOMPUTER', 'asc')->paginate(10)->appends($request->all());

        // 7. Hitung data untuk Stat Cards di bagian atas dashboard
        $totalOnline = DB::table('KOMPUTER')->where('STATUS', 'Online')->count();
        $totalPC = DB::table('KOMPUTER')->count();
        $totalMaintenance = DB::table('KOMPUTER')->where('STATUS', 'Maintenance')->count();

        // 8. Kirim semua variabel ke view Blade
        return view('CMS.Admin.managepc', compact('computers', 'totalOnline', 'totalPC', 'totalMaintenance'));
    }

    // 2. CREATE: Menampilkan Form Tambah PC (Bisa berupa halaman atau nanti pakai modal)
    public function create() 
    {
        //
    }

    // 3. STORE: Menyimpan data PC Baru ke Database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_komputer'   => 'required|string|max:20|unique:KOMPUTER,ID_KOMPUTER',
            'nama_komputer' => 'required|string|max:255',
            'tier'          => 'required|in:VIP,GOLD,SILVER,BRONZE',
            'status'        => 'required|in:Online,Reserved,Maintenance,Offline',
            'cpu'           => 'nullable|string|max:255', 
            'gpu'           => 'nullable|string|max:255', 
            'ram'           => 'nullable|string|max:255', 
        ]);

        // 1. Mulai Transaksi Data Oracle
        DB::beginTransaction();

        try {
            // 2. Jalankan Insert
            DB::table('KOMPUTER')->insert([
                'ID_KOMPUTER'   => $validated['id_komputer'],
                'NAMA_KOMPUTER' => $validated['nama_komputer'],
                'TIER'          => $validated['tier'],
                'STATUS'        => $validated['status'],
                'CPU'           => $validated['cpu'], 
                'GPU'           => $validated['gpu'], 
                'RAM'           => $validated['ram'],
            ]);

            // 3. PAKSA SAVE/COMMIT (Sama seperti tombol centang hijau di SQL Developer)
            DB::commit();

            return redirect()->back()->with('success', 'Unit PC Baru Berhasil Ditambahkan!');

        } catch (\Exception $e) {
            // Jika gagal, batalkan semua agar tidak corrupt
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data ke Oracle: ' . $e->getMessage());
        }
    }

    // 4. EDIT: Menampilkan Form Edit PC
    public function edit($id)
    {
        //
    }

    // 5. UPDATE: Menyimpan Perubahan Data PC
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_komputer' => 'required|string|max:255',
            'tier'          => 'required|in:VIP,GOLD,SILVER,BRONZE',
            'status'        => 'required|in:Online,Reserved,Maintenance,Offline',
            'cpu'           => 'nullable|string|max:255', 
            'gpu'           => 'nullable|string|max:255', 
            'ram'           => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            DB::table('KOMPUTER')
                ->where('ID_KOMPUTER', $id) 
                ->update([
                    'NAMA_KOMPUTER' => $request->nama_komputer,
                    'TIER'          => $request->tier,
                    'STATUS'        => $request->status,
                    'CPU'           => $request->cpu, 
                    'GPU'           => $request->gpu, 
                    'RAM'           => $request->ram,
                ]);

            DB::commit(); // WAJIB COMMIT
            return redirect()->back()->with('success', 'Data PC berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal update data: ' . $e->getMessage());
        }
    }

    // 6. DESTROY: Menghapus Data PC
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::table('KOMPUTER')
                ->where('ID_KOMPUTER', $id)
                ->delete();

            DB::commit(); // WAJIB COMMIT
            return redirect()->back()->with('success', 'PC berhasil dihapus dari sistem!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal hapus data: ' . $e->getMessage());
        }
    }
}