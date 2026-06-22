<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komputer_games', function (Blueprint $table) {
            $table->id();

            // UBAH INI: Dari unsignedBigInteger menjadi string(20)
            $table->string('id_komputer', 20); 
            $table->unsignedBigInteger('game_id');

            // Struktur foreign key di bawah tetap biarkan sama
            $table->foreign('id_komputer')
                ->references('id_komputer')
                ->on('komputer')
                ->onDelete('cascade');

            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('komputer_games');
}
};
