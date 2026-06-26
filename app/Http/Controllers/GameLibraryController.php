<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GameLibraryController extends Controller
{
    // 1. READ / INDEX (Menampilkan data & filter)
    public function index(Request $request)
    {
        $search = $request->get('search');
        $genre = $request->get('genre');

        $query = DB::table('GAMES');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('JUDUL_GAME', 'LIKE', '%' . $search . '%')
                  ->orWhere('DEVELOPER', 'LIKE', '%' . $search . '%');
            });
        }

        if (!empty($genre)) {
            $query->where('GENRE', $genre);
        }

        // Ambil data game terupdate
        $games = $query->orderBy('ID', 'desc')->paginate(10)->appends($request->all());

        // Statistik Dinamis
        $totalGames = DB::table('GAMES')->count();
        $mostPlayedGenre = DB::table('GAMES')
                            ->select('GENRE', DB::raw('count(*) as total'))
                            ->groupBy('GENRE')
                            ->orderBy('total', 'desc')
                            ->first()?->genre ?? 'N/A'; // KOREKSI: 'genre' diubah jadi 'GENRE'

        return view('CMS.Admin.librarygm', compact('games', 'totalGames', 'mostPlayedGenre'));
    }

    // 2. CREATE / STORE (Tambah Game Baru)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id'         => 'required|string|max:20|unique:GAMES,ID',
            'nama_game'  => 'required|string|max:255',
            'developer'  => 'required|string|max:255',
            'genre'      => 'required|string|max:50',
            'min_ram'    => 'required|string|max:20',
            'tier'       => 'required|array', // Menerima input checkbox array tier
            'cover_img'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Max 2MB
        ]);

        // Handle upload gambar cover game
        $imagePath = null;
        if ($request->hasFile('cover_img')) {
            $imagePath = $request->file('cover_img')->store('covers', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('GAMES')->insert([
                'ID'         => strtoupper($validated['id']),
                'JUDUL_GAME'  => $validated['nama_game'],
                'DEVELOPER'  => $validated['developer'],
                'GENRE'      => $validated['genre'],
                'MIN_RAM'    => $validated['min_ram'],
                'TIER'       => implode(',', $validated['tier']), // Menyimpan tier dipisah koma (VIP,Standard)
                'IMAGE'  => $imagePath,
            ]);

            DB::commit(); // WAJIB untuk Oracle
            return redirect()->back()->with('success', 'Game baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan ke Oracle: ' . $e->getMessage());
        }
    }

    // 3. UPDATE (Edit Data Game)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_game'  => 'required|string|max:255',
            'developer'  => 'required|string|max:255',
            'genre'      => 'required|string|max:50',
            'min_ram'    => 'required|string|max:20',
            'tier'       => 'required|array',
            'cover_img'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // 1. Ambil data game lama dari Oracle
        $gameOld = DB::table('GAMES')->where('ID', $id)->first();
        
        // 2. Ambil path file gambar lama dengan huruf kecil 'image' sesuai config driver PDO-mu
        $imagePath = $gameOld->image ?? null; 

        // 3. Jika admin mengunggah file cover baru
        if ($request->hasFile('cover_img')) {
            
            // HAPUS FILE LAMA DARI STORAGE (Mencegah Duplikasi)
            if (!empty($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            
            // Simpan file baru
            $imagePath = $request->file('cover_img')->store('covers', 'public');
        }

        DB::beginTransaction();
        try {
            DB::table('GAMES')
                ->where('ID', $id)
                ->update([
                    'JUDUL_GAME' => $validated['nama_game'],
                    'DEVELOPER'  => $validated['developer'],
                    'GENRE'      => $validated['genre'],
                    'MIN_RAM'    => $validated['min_ram'],
                    'TIER'       => implode(',', $validated['tier']),
                    'IMAGE'      => $imagePath, // Path baru (atau tetap yang lama jika tidak diubah)
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data game berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal update game: ' . $e->getMessage());
        }
    }

    // 4. DELETE / DESTROY (Hapus Game)
    public function destroy($id)
    {
        $game = DB::table('GAMES')->where('ID', $id)->first();
        
        DB::beginTransaction();
        try {
            // Hapus file gambar dari server storage
            if ($game && !empty($game->IMAGE)) {
                Storage::disk('public')->delete($game->IMAGE);
            }

            DB::table('GAMES')->where('ID', $id)->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Game berhasil dihapus dari pustaka!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}