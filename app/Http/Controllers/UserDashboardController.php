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

        // Tarik data voucher yang diklaim dari tabel penghubung user_promo
        $claimedVouchers = DB::table('user_promo')
            ->join('promo', 'user_promo.promo_id', '=', 'promo.id') // Menggunakan nama tabel 'promo'
            ->where('user_promo.user_id', $user->id)
            ->where('user_promo.status', 'READY')
            ->select('promo.judul_promo', 'promo.kode_promo', 'user_promo.id as claim_id')
            ->get();

        return view('CMS.User.dashboard', compact('claimedVouchers'));
    }
}