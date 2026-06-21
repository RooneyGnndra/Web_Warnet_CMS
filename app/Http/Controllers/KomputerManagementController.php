<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use Illuminate\Http\Request;

class KomputerManagementController extends Controller
{
    // 1. READ: Menampilkan Halaman List PC Admin
    public function index()
    {
        // Sesuaikan string pencarian kolom ke huruf kecil
        $totalOnline = Komputer::where('status', 'Online')->count();
        $totalPC = Komputer::count();
        $totalMaintenance = Komputer::where('status', 'Maintenance')->count();
        
        $computers = Komputer::orderBy('id_komputer', 'asc')->paginate(10);

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
            'id_komputer'   => 'required|numeric|unique:KOMPUTER,ID_KOMPUTER',
            'nama_komputer' => 'required|string|max:255',
            'tier'          => 'required|in:VIP,GOLD,SILVER,BRONZE',
            'status'        => 'required|in:Online,Reserved,Maintenance,Offline',
        ]);

        // MAP MANUAL: Mengubah input huruf kecil menjadi key huruf kapital sesuai kebutuhan Oracle
        \App\Models\Komputer::create([
            'ID_KOMPUTER'   => $validated['id_komputer'],
            'NAMA_KOMPUTER' => $validated['nama_komputer'],
            'TIER'          => $validated['tier'],
            'STATUS'        => $validated['status'],
            // Isi kolom spec dengan nilai default/null dulu jika tidak ada di form tambah
            'CPU'           => null,
            'GPU'           => null,
            'RAM'           => null,
        ]);

        return redirect()->back()->with('success', 'Unit PC Baru Berhasil Ditambahkan!');
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
        ]);

        $pc = Komputer::findOrFail($id);
        $pc->update([
            'NAMA_KOMPUTER' => $request->nama_komputer,
            'TIER'          => $request->tier,
            'STATUS'        => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data PC berhasil diperbarui!');
    }

    // 6. DESTROY: Menghapus Data PC
    public function destroy($id)
    {
        //
    }
}