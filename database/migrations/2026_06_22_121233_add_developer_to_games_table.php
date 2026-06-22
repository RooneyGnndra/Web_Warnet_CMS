<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('GAMES', function (Blueprint $blueprint) {
            // Menambahkan kolom developer dengan tipe VARCHAR2(255)
            $blueprint->string('developer', 255)->nullable()->after('nama_game'); 
        });
    }

    public function down(): void
    {
        Schema::table('GAMES', function (Blueprint $blueprint) {
            // Aturan rollback jika migrasi dibatalkan
            $blueprint->dropColumn('developer');
        });
    }
};