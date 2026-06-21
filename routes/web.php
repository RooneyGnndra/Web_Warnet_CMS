<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('CMS.Main.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/home', [FrontController::class, 'home'])->name('home');
Route::get('/page', [FrontController::class, 'page'])->name('page');
Route::get('/katalog', [FrontController::class, 'katalog'])->name('katalog');
Route::get('/promo', [FrontController::class, 'promo'])->name('promo');

// Rute Sementara untuk Dashboard User Biasa
Route::get('/dashboard', function () {
    return 'Halaman Dashboard Pelanggan (Sedang Dalam Pengembangan)';
})->name('dashboard');

// Ganti route lama kamu dengan ini di dalam group middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Sekarang mengarah ke Controller, bukan fungsi anonim (closure) lagi
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});