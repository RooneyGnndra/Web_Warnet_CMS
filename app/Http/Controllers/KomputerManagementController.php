<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// WAJIB: Tambahkan library Storage di paling atas untuk mengurus upload file gambar
use Illuminate\Support\Facades\Storage; 

class KomputerManagementController extends Controller
{
    // 1. READ: Menampilkan Halaman List PC Admin
    public function index(Request $request)
    {
        $search = $request->get('search');
        $tier = $request->get('tier');
        $status = $request->get('status');

        $query = DB::table('KOMPUTER');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('ID_KOMPUTER', 'LIKE', '%' . strtoupper($search) . '%')
                ->orWhere('NAMA_KOMPUTER', 'LIKE', '%' . $search . '%')
                ->orWhere('CPU', 'LIKE', '%' . $search . '%')
                ->orWhere('GPU', 'LIKE', '%' . $search . '%');
            });
        }

        if (!empty($tier)) {
            $query->where('TIER', $tier);
        }

        if (!empty($status)) {
            $query->where('STATUS', $status);
        }

        $computers = $query->orderBy('ID_KOMPUTER', 'desc')->paginate(10)->appends($request->all());

        $totalOnline = DB::table('KOMPUTER')->where('STATUS', 'Online')->count();
        $totalPC = DB::table('KOMPUTER')->count();
        $totalMaintenance = DB::table('KOMPUTER')->where('STATUS', 'Maintenance')->count();

        return view('CMS.Admin.managepc', compact('computers', 'totalOnline', 'totalPC', 'totalMaintenance'));
    }

    public function create() 
    {
        //
    }

    // 3. STORE: Menyimpan data PC Baru + Gambar ke Oracle
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
            'detail_cpu'    => 'nullable|string|max:255',
            'detail_gpu'    => 'nullable|string|max:255',
            'detail_ram'    => 'nullable|string|max:255',
            'deskripsi'     => 'nullable|string',
            // VALIDASI GAMBAR BARU: Max 2MB mimes png, jpg, jpeg
            'gambar_pc'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048' 
        ]);

        // Proses simpan gambar fisik ke folder storage/app/public/computers
        $imagePath = null;
        if ($request->hasFile('gambar_pc')) {
            $imagePath = $request->file('gambar_pc')->store('computers', 'public');
        }

        DB::beginTransaction();

        try {
            DB::table('KOMPUTER')->insert([
                'ID_KOMPUTER'   => $validated['id_komputer'],
                'NAMA_KOMPUTER' => $validated['nama_komputer'],
                'TIER'          => $validated['tier'],
                'STATUS'        => $validated['status'],
                'CPU'           => $validated['cpu'], 
                'GPU'           => $validated['gpu'], 
                'RAM'           => $validated['ram'],
                'DETAIL_CPU'    => $validated['detail_cpu'],
                'DETAIL_GPU'    => $validated['detail_gpu'],
                'DETAIL_RAM'    => $validated['detail_ram'],
                'DESKRIPSI'     => $validated['deskripsi'],
                'GAMBAR_PC'     => $imagePath, // Simpan string path gambarnya
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Unit PC Baru Berhasil Ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            // Jika database gagal, hapus gambar yang telanjur terupload agar tidak sampah
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            return redirect()->back()->with('error', 'Gagal menyimpan data ke Oracle: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        //
    }

    // 5. UPDATE: Memperbarui Data PC & Mengganti Gambar Lama
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_komputer' => 'required|string|max:255',
            'tier'          => 'required|in:VIP,GOLD,SILVER,BRONZE',
            'status'        => 'required|in:Online,Reserved,Maintenance,Offline',
            'cpu'           => 'nullable|string|max:255', 
            'gpu'           => 'nullable|string|max:255', 
            'ram'           => 'nullable|string|max:255',
            'detail_cpu'    => 'nullable|string|max:255',
            'detail_gpu'    => 'nullable|string|max:255',
            'detail_ram'    => 'nullable|string|max:255',
            'deskripsi'     => 'nullable|string',
            'gambar_pc'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // 1. Ambil data PC lama dari Oracle untuk mengecek apakah sudah ada gambar sebelumnya
        $pcOld = DB::table('KOMPUTER')->where('ID_KOMPUTER', $id)->first();
        // Driver Oracle merubah properti field object menjadi lowercase saat di-fetch
        $imagePath = $pcOld->gambar_pc ?? null; 

        // 2. Jika admin mengunggah file foto PC baru
        if ($request->hasFile('gambar_pc')) {
            
            // HAPUS FILE FOTO LAMA DARI STORAGE (Biar storage aman gak penuh berkas sampah)
            if (!empty($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            
            // Simpan foto setup PC yang baru
            $imagePath = $request->file('gambar_pc')->store('computers', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('KOMPUTER')
                ->where('ID_KOMPUTER', $id) 
                ->update([
                    'NAMA_KOMPUTER' => $validated['nama_komputer'],
                    'TIER'          => $validated['tier'],
                    'STATUS'        => $validated['status'],
                    'CPU'           => $validated['cpu'], 
                    'GPU'           => $validated['gpu'], 
                    'RAM'           => $validated['ram'],
                    'DETAIL_CPU'    => $validated['detail_cpu'],
                    'DETAIL_GPU'    => $validated['detail_gpu'],
                    'DETAIL_RAM'    => $validated['detail_ram'],
                    'DESKRIPSI'     => $validated['deskripsi'],
                    'GAMBAR_PC'     => $imagePath, // Path baru (atau tetap yang lama jika tidak ganti foto)
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data PC berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal update data: ' . $e->getMessage());
        }
    }

    // 6. DESTROY: Menghapus PC Beserta Gambarnya
    public function destroy($id)
    {
        $pc = DB::table('KOMPUTER')->where('ID_KOMPUTER', $id)->first();

        DB::beginTransaction();
        try {
            // Hapus file gambar komputer dari server storage saat PC dihapus
            if ($pc && !empty($pc->gambar_pc)) {
                Storage::disk('public')->delete($pc->gambar_pc);
            }

            DB::table('KOMPUTER')->where('ID_KOMPUTER', $id)->delete();

            DB::commit();
            return redirect()->back()->with('success', 'PC berhasil dihapus dari sistem!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal hapus data: ' . $e->getMessage());
        }
    }
}