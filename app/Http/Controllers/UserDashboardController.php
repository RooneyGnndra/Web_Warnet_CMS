<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login saat ini
        $user = Auth::user();

        // 1. Tarik data voucher yang diklaim dari tabel penghubung user_promo
        $claimedVouchers = DB::table('user_promo')
            ->join('promo', 'user_promo.promo_id', '=', 'promo.id')
            ->where('user_promo.user_id', $user->id)
            ->where('user_promo.status', 'READY')
            ->select('promo.judul_promo', 'promo.kode_promo', 'user_promo.id as claim_id')
            ->get();

        // 2. Tarik data riwayat sesi bermain dari database Oracle (Maksimal 5 data terbaru)
        $playSessions = DB::table('sesi_bermain')
            ->join('komputer', 'sesi_bermain.id_komputer', '=', 'komputer.id_komputer') // Sesuaikan nama tabel 'komputer' & 'id' jika di Oracle berbeda
            ->where('sesi_bermain.id_user', $user->id)
            ->orderBy('sesi_bermain.waktu_mulai', 'desc')
            ->select('sesi_bermain.*', 'komputer.nama_komputer') // 'nama_komputer' untuk menampilkan nama/nomor PC
            ->take(5)
            ->get();

        // Tarik Log Game Terakhir Dimainkan dari Oracle (Maksimal 5 data terbaru)
        $recentGames = DB::table('USER_GAME_HISTORY')
            ->join('GAMES', 'USER_GAME_HISTORY.GAME_ID', '=', 'GAMES.ID') 
            ->where('USER_GAME_HISTORY.USER_ID', $user->id)
            ->orderBy('USER_GAME_HISTORY.ID', 'desc')
            ->select(
                'GAMES.JUDUL_GAME', 
                'GAMES.GENRE', 
                'USER_GAME_HISTORY.TOTAL_JAM',          // WAJIB KAPITAL UTUH
                'USER_GAME_HISTORY.KETERANGAN_WAKTU'     // WAJIB KAPITAL UTUH
            )
            ->take(5)
            ->get();

        // 3. Lempar kedua variabel ($claimedVouchers dan $playSessions) ke file Blade
        return view('CMS.User.dashboard', compact('claimedVouchers', 'playSessions', 'recentGames'));
    }
}