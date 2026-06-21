<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Ubah argumen di bawah ini menjadi Blueprint $table
        Schema::table('komputer', function (Blueprint $table) {
            // Menambahkan kolom nama setelah id_komputer
            $table->string('nama_komputer')->after('id_komputer')->nullable();
        });
    }

    public function down()
    {
        // Ubah argumen di bawah ini menjadi Blueprint $table
        Schema::table('komputer', function (Blueprint $table) {
            $table->dropColumn('nama_komputer');
        });
    }
};