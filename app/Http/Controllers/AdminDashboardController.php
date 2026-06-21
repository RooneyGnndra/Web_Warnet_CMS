<?php

namespace App\Http\Controllers;

// Sesuaikan dengan file model asli di foldermu
use App\Models\Komputer; 
use App\Models\Game;    
use App\Models\User; // Karena di folder adanya User.php (bukan Member)

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data untuk Ringkasan Statistik (Bento Grid)
        $totalPC = Komputer::count(); // Diubah jadi Komputer
        $offlinePC = Komputer::where('STATUS', 'Offline')->count(); // Diubah jadi Komputer
        $totalGames = Game::count();
        $totalMembers = User::count(); // Diubah ke User jika tidak memakai tabel member terpisah
        $newMembersToday = User::whereDate('created_at', today())->count();
        
        $activePromosCount = 4; 

        // 2. Ambil data Manajemen PC untuk Tabel
        $computers = Komputer::orderBy('ID_KOMPUTER', 'asc')->paginate(5); // Diubah jadi Komputer

        // 3. Lempar semua data ke view dashboard admin
        return view('CMS.Admin.admdashboard', compact(
            'totalPC', 
            'offlinePC', 
            'totalGames', 
            'totalMembers', 
            'newMembersToday',
            'activePromosCount',
            'computers'
        ));
    }
}