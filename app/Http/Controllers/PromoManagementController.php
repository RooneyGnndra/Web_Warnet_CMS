<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PromoManagementController extends Controller
{
    /**
     * Menampilkan daftar promo di dashboard admin
     */
    public function index()
    {
        $promos = DB::table('PROMO')->orderBy('ID', 'desc')->get();
        return view('CMS.Admin.promomng', compact('promos'));
    }

    /**
     * Menyimpan data promo baru ke database Oracle
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_promo' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'tipe_promo' => 'required|in:VOUCHER,EVENT',
            'tanggal_berakhir' => 'required|date',
            'banner_img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->tipe_promo === 'VOUCHER') {
            $request->validate(['kode_promo' => 'required|string|max:50']);
        } else if ($request->tipe_promo === 'EVENT') {
            $request->validate([
                'jam_mulai' => 'required|string|max:5',
                'jam_selesai' => 'required|string|max:5',
            ]);
        }

        $imagePath = null;
        if ($request->hasFile('banner_img')) {
            $imagePath = $request->file('banner_img')->store('promos', 'public');
        }

        $maxId = DB::table('PROMO')->max('ID');
        $newId = $maxId ? $maxId + 1 : 1;

        DB::table('PROMO')->insert([
            'ID' => $newId,
            'JUDUL_PROMO' => $request->judul_promo,
            'DESKRIPSI' => $request->deskripsi,
            'TIPE_PROMO' => $request->tipe_promo,
            'KODE_PROMO' => $request->tipe_promo === 'VOUCHER' ? strtoupper($request->kode_promo) : null,
            'JAM_MULAI' => $request->tipe_promo === 'EVENT' ? $request->jam_mulai : null,
            'JAM_SELESAI' => $request->tipe_promo === 'EVENT' ? $request->jam_selesai : null,
            'TANGGAL_BERAKHIR' => $request->tanggal_berakhir,
            'BANNER_IMG' => $imagePath,
            'STATUS' => 'AKTIF'
        ]);

        return redirect()->route('admin.promo.index')->with('success', 'Promo baru berhasil ditambahkan!');
    }

    /**
     * Memperbarui data promo yang sudah ada (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_promo' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'tipe_promo' => 'required|in:VOUCHER,EVENT',
            'tanggal_berakhir' => 'required|date',
            'banner_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:AKTIF,TIDAK_AKTIF'
        ]);

        if ($request->tipe_promo === 'VOUCHER') {
            $request->validate(['kode_promo' => 'required|string|max:50']);
        } else if ($request->tipe_promo === 'EVENT') {
            $request->validate([
                'jam_mulai' => 'required|string|max:5',
                'jam_selesai' => 'required|string|max:5',
            ]);
        }

        // 1. Ambil data lama dari Oracle untuk mengecek file banner lama
        $oldPromo = DB::table('PROMO')->where('ID', $id)->first();
        $imagePath = $oldPromo->banner_img ?? null; // Menyesuaikan pembacaan driver huruf kecil

        // 2. Jika ada upload file gambar banner baru
        if ($request->hasFile('banner_img')) {
            // Hapus banner lama dari storage agar tidak menumpuk/duplikat
            if (!empty($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Simpan gambar baru
            $imagePath = $request->file('banner_img')->store('promos', 'public');
        }

        // 3. Eksekusi query update data ke Oracle
        DB::table('PROMO')->where('ID', $id)->update([
            'JUDUL_PROMO' => $request->judul_promo,
            'DESKRIPSI' => $request->deskripsi,
            'TIPE_PROMO' => $request->tipe_promo,
            'KODE_PROMO' => $request->tipe_promo === 'VOUCHER' ? strtoupper($request->kode_promo) : null,
            'JAM_MULAI' => $request->tipe_promo === 'EVENT' ? $request->jam_mulai : null,
            'JAM_SELESAI' => $request->tipe_promo === 'EVENT' ? $request->jam_selesai : null,
            'TANGGAL_BERAKHIR' => $request->tanggal_berakhir,
            'BANNER_IMG' => $imagePath,
            'STATUS' => $request->status
        ]);

        return redirect()->route('admin.promo.index')->with('success', 'Data promo berhasil diperbarui!');
    }

    /**
     * Menghapus data promo secara permanen (DESTROY)
     */
    public function destroy($id)
    {
        // 1. Ambil data promo untuk mencari path gambar bannernya
        $promo = DB::table('PROMO')->where('ID', $id)->first();

        // 2. Jika promo memiliki gambar banner, hapus berkasnya dari server fisik
        if ($promo && !empty($promo->banner_img) && Storage::disk('public')->exists($promo->banner_img)) {
            Storage::disk('public')->delete($promo->banner_img);
        }

        // 3. Hapus baris data dari tabel Oracle
        DB::table('PROMO')->where('ID', $id)->delete();

        return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil dihapus dari sistem!');
    }
}