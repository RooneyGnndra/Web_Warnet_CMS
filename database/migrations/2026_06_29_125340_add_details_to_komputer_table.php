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
        Schema::table('KOMPUTER', function (Blueprint $table) {
            // Menambahkan kolom detail sesuai kebutuhan layout2.png
            $table->string('detail_cpu')->nullable();
            $table->string('detail_gpu')->nullable();
            $table->string('detail_ram')->nullable();
            $table->text('deskripsi')->nullable(); 
            $table->string('gambar_pc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('KOMPUTER', function (Blueprint $table) {
            // Drop kolom jika migration di-rollback (php artisan migrate:rollback)
            $table->dropColumn(['detail_cpu', 'detail_gpu', 'detail_ram', 'deskripsi', 'gambar_pc']);
        });
    }
};