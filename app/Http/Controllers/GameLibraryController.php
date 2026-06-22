<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Wajib untuk koneksi ke Oracle

class GameLibraryController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil parameter pencarian & filter dari view game library
        $search = $request->get('search');
        $genre = $request->get('genre');
        $tier = $request->get('tier');

        // 2. Query dasar ke tabel GAMES (Sesuaikan dengan nama tabel kapital kamu di Oracle)
        $query = DB::table('GAMES');

        // 3. Logika Filter & Search
        if (!empty($search)) {
            $query->where('NAMA_GAME', 'LIKE', '%' . $search . '%')
                  ->orWhere('DEVELOPER', 'LIKE', '%' . $search . '%');
        }

        if (!empty($genre)) {
            $query->where('GENRE', $genre);
        }

        // 4. Ambil data dengan pagination (misal 10 data per halaman)
        $games = $query->orderBy('ID', 'desc')->paginate(10)->appends($request->all());

        // 5. Hitung counter stat card di bagian atas
        $totalGames = DB::table('GAMES')->count();
        
        // Melempar data ke file view yang barusan kita pisahkan layoutnya
        return view('CMS.Admin.librarygm', compact('games', 'totalGames'));
    }
}