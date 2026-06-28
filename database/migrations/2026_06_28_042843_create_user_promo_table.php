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
        // Menyesuaikan nama tabel penghubung menjadi USER_PROMO
        Schema::create('user_promo', function (Blueprint $table) {
            $table->id(); // Ini akan menjadi tipe NUMBER(19) di Oracle
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('promo_id');
            $table->string('status', 20)->default('READY'); // READY, USED, EXPIRED
            $table->timestamp('claimed_at')->useCurrent();
            
            // Definisi Foreign Key ke tabel USERS dan PROMO
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promo_id')->references('id')->on('promo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_promo');
    }
};