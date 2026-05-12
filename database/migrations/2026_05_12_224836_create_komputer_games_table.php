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

        $table->unsignedBigInteger('id_komputer');
        $table->unsignedBigInteger('game_id');

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
