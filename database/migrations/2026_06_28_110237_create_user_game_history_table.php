<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_game_history', function (Blueprint $table) {
            $table->id();
            
            // 1. JIKA USERS memakai ID Angka/Integer (Bawaan Laravel atau Number Oracle)
            $table->unsignedBigInteger('user_id'); 
            
            // 2. JIKA GAMES memakai VARCHAR(20), gunakan string('kolom', 20)
            $table->string('game_id', 20); 
            
            $table->float('total_jam')->default(0);
            $table->string('keterangan_waktu')->nullable();
            $table->timestamps();

            // Hubungkan Foreign Key secara manual
            $table->foreign('user_id', 'ugh_user_id_fk')->references('ID')->on('USERS')->onDelete('cascade');
            $table->foreign('game_id', 'ugh_game_id_fk')->references('ID')->on('GAMES')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_game_history');
    }
};