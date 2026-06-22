<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function home()
    {
        return view('CMS.Main.home');
    }
    public function page(Request $request)
    {
        // 1. Tangkap parameter filter tier dari link (misal: ?tier=vip)
        $tierFilter = $request->get('tier');

        // 2. Mulai query ke tabel induk KOMPUTER
        $query = DB::table('KOMPUTER');

        // 3. Jika admin/user mengklik filter tier tertentu, saring datanya
        if (!empty($tierFilter)) {
            // Menggunakan strtoupper karena kasta di DB disimpan kapital (VIP, GOLD, SILVER, BRONZE)
            $query->where('TIER', strtoupper($tierFilter));
        }

        // 4. Ambil semua data PC dan urutkan berdasarkan ID agar rapi (PC-01, PC-02, dst)
        $computers = $query->orderBy('ID_KOMPUTER', 'asc')->get();

        // 5. Lempar variabel $computers ke dalam view daftarpc kamu
        return view('CMS.Main.daftarpc', compact('computers'));
    }

    public function katalog()
    {
        return view('CMS.Main.katalog');
    }

    public function promo()
    {
        return view('CMS.Main.promo');
    }
}
