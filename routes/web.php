<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\KomputerManagementController;
use App\Http\Controllers\GameLibraryController;
use App\Http\Controllers\PromoManagementController;

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

Route::middleware(['auth'])->group(function () {
    // Route Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Rute Manajemen PC CRUD
    Route::get('/managepc', [KomputerManagementController::class, 'index'])->name('admin.manage-pc');
    Route::post('/managepc/store', [KomputerManagementController::class, 'store'])->name('admin.manage-pc.store');
    Route::put('/managepc/update/{id}', [KomputerManagementController::class, 'update'])->name('admin.manage-pc.update');
    Route::delete('/managepc/delete/{id}', [KomputerManagementController::class, 'destroy'])->name('admin.manage-pc.delete');

    // Rute Game Library
    Route::get('/admin/game-library', [GameLibraryController::class, 'index'])->name('admin.game-library.index');
    Route::post('/admin/game-library/store', [GameLibraryController::class, 'store'])->name('admin.game-library.store');
    Route::put('/admin/game-library/update/{id}', [GameLibraryController::class, 'update'])->name('admin.game-library.update');
    Route::delete('/admin/game-library/delete/{id}', [GameLibraryController::class, 'destroy'])->name('admin.game-library.delete');

    // Rute Manajemen Promo
    Route::get('/admin/promo', [PromoManagementController::class, 'index'])->name('admin.promo.index');
    Route::post('/admin/promo/store', [PromoManagementController::class, 'store'])->name('admin.promo.store');
    Route::put('/admin/promo/update/{id}', [PromoManagementController::class, 'update'])->name('admin.promo.update');
    Route::delete('/admin/promo/delete/{id}', [PromoManagementController::class, 'destroy'])->name('admin.promo.delete');
});