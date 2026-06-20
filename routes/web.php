<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [FrontController::class, 'home'])->name('home');
Route::get('/page', [FrontController::class, 'page'])->name('page');
Route::get('/katalog', [FrontController::class, 'katalog'])->name('katalog');
Route::get('/promo', [FrontController::class, 'promo'])->name('promo');

require __DIR__.'/auth.php';

// Rute Sementara untuk Dashboard User Biasa
Route::get('/dashboard', function () {
    return 'Halaman Dashboard Pelanggan (Sedang Dalam Pengembangan)';
})->name('dashboard');

// Rute Sementara untuk Dashboard Admin
Route::get('/admin/dashboard', function () {
    return 'Halaman Dashboard Admin NetCity (Sedang Dalam Pengembangan)';
})->name('admin.dashboard');