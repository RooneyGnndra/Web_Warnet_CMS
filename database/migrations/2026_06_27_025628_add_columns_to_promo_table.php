<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('PROMO', function (Blueprint $table) {
            // Menambahkan kolom baru sesuai kebutuhan bisnis NetCity
            $table->string('KODE_PROMO', 50)->nullable();
            $table->string('TIPE_PROMO', 20)->default('VOUCHER'); // 'VOUCHER' atau 'EVENT'
            $table->string('JAM_MULAI', 5)->nullable();          // Contoh: 10:00
            $table->string('JAM_SELESAI', 5)->nullable();        // Contoh: 14:00
            $table->string('BANNER_IMG', 255)->nullable();
            $table->string('STATUS', 20)->default('AKTIF');       // 'AKTIF' atau 'TIDAK_AKTIF'
        });
    }

    public function down(): void
    {
        Schema::table('PROMO', function (Blueprint $table) {
            // Logika rollback untuk menghapus kolom jika migrasi di-refresh
            $table->dropColumn(['KODE_PROMO', 'TIPE_PROMO', 'JAM_MULAI', 'JAM_SELESAI', 'BANNER_IMG', 'STATUS']);
        });
    }
};