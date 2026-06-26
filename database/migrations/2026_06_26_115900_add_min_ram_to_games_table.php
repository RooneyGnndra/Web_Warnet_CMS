<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('GAMES', function (Blueprint $table) {
            // Menambahkan kolom MIN_RAM dengan tipe data string (VARCHAR2 di Oracle)
            $table->string('MIN_RAM', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('GAMES', function (Blueprint $table) {
            $table->dropColumn('MIN_RAM');
        });
    }
};