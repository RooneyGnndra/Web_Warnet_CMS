<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        // 1. Ambil 3 PC Populer berdasarkan jumlah sesi bermain terbanyak
        $pcPopuler = DB::table('SESI_BERMAIN')
            ->join('KOMPUTER', 'SESI_BERMAIN.ID_KOMPUTER', '=', 'KOMPUTER.ID_KOMPUTER')
            ->select(
                'KOMPUTER.ID_KOMPUTER', 
                'KOMPUTER.NAMA_KOMPUTER', 
                'KOMPUTER.TIER', 
                'KOMPUTER.CPU', 
                'KOMPUTER.GPU', 
                'KOMPUTER.RAM',
                DB::raw('COUNT(SESI_BERMAIN.ID_SESI) as TOTAL_MAIN') // Menggunakan ID_SESI
            )
            ->groupBy(
                'KOMPUTER.ID_KOMPUTER', 
                'KOMPUTER.NAMA_KOMPUTER', 
                'KOMPUTER.TIER', 
                'KOMPUTER.CPU', 
                'KOMPUTER.GPU', 
                'KOMPUTER.RAM'
            )
            ->orderBy('TOTAL_MAIN', 'DESC')
            ->limit(3)
            ->get();

        // 2. Ambil 4 Game Populer berdasarkan riwayat di USER_GAME_HISTORY
        $gamePopuler = DB::table('USER_GAME_HISTORY')
            ->join('GAMES', 'USER_GAME_HISTORY.GAME_ID', '=', 'GAMES.ID') // SESUAIKAN: Menggunakan GAME_ID, bkn ID_GAME
            ->select(
                'GAMES.ID', 
                'GAMES.JUDUL_GAME', 
                'GAMES.GENRE', 
                'GAMES.IMAGE',
                'GAMES.DEVELOPER',
                DB::raw('COUNT(USER_GAME_HISTORY.ID) as TOTAL_DIMAINKAN') // SESUAIKAN: Menghitung kolom ID milik history
            )
            ->groupBy('GAMES.ID', 'GAMES.JUDUL_GAME', 'GAMES.GENRE', 'GAMES.IMAGE', 'GAMES.DEVELOPER')
            ->orderBy('TOTAL_DIMAINKAN', 'DESC')
            ->limit(4)
            ->get();

        // 3. Ambil data semua promo aktif untuk ditampilkan di Home
        $promos = DB::table('PROMO')->get();

        return view('CMS.Main.home', compact('pcPopuler', 'gamePopuler', 'promos'));
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

    public function katalog(Request $request) // Tambahkan parameter Request $request
    {
        // 1. Ambil input search dan genre dari user
        $search = $request->get('search');
        $genre = $request->get('genre');

        // 2. Mulai query ke tabel GAMES
        $query = DB::table('GAMES');

        // 3. Logika filter pencarian judul atau developer game
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('JUDUL_GAME', 'LIKE', '%' . $search . '%')
                  ->orWhere('DEVELOPER', 'LIKE', '%' . $search . '%');
            });
        }

        // 4. Logika filter berdasarkan tombol genre yang diklik
        if (!empty($genre)) {
            $query->where('GENRE', $genre);
        }

        // 5. Ambil semua data game terbaru dari Oracle
        $games = $query->orderBy('ID', 'desc')->get();

        // 6. Lempar data $games ke view CMS.Main.katalog
        return view('CMS.Main.katalog', compact('games'));
    }

    // --- EDIT / PERBARUI FUNGSI PROMO DI CONTROLLER KAMU MENJADI SEPERTI INI ---
    public function promo()
    {
        // 1. Tarik data dari tabel PROMO yang berstatus AKTIF saja
        // 2. Urutkan dari yang paling baru dibuat (desc)
        $promos = DB::table('PROMO')
                    ->where('STATUS', 'AKTIF')
                    ->orderBy('ID', 'desc')
                    ->get();

        // 3. Lempar variabel $promos ke file blade publik
        return view('CMS.Main.promo', compact('promos'));
    }

    public function claimPromo(Request $request, $id)
    {
        // 1. Cek apakah sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        $user = Auth::user();
        $userId = $user->id;

        // 2. KONDISI BUKAN ADMIN: Cek data duplikat di database
        if ($user->role !== 'admin') {
            $alreadyClaimed = DB::table('user_promo')
                                ->where('user_id', $userId)
                                ->where('promo_id', $id)
                                ->exists();

            if ($alreadyClaimed) {
                return redirect()->back()->with('error', 'Anda sudah pernah mengklaim voucher ini!');
            }
        }

        // 3. Masukkan ke database (Admin akan langsung masuk ke sini tanpa terblokir)
        DB::table('user_promo')->insert([
            'user_id' => $userId,
            'promo_id' => $id,
            'status' => 'READY',
            'claimed_at' => now()
        ]);

        // Berikan pesan sukses yang berbeda untuk admin saat testing
        $message = $user->role === 'admin' 
            ? '[TESTING ADMIN] Voucher berhasil masuk ke database (Bisa klaim lagi)!' 
            : 'Voucher berhasil diklaim! Silakan cek Dashboard Member Anda.';

        return redirect()->back()->with('success', $message);
    }
}