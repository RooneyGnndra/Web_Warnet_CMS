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
    Schema::table('komputer', function (Blueprint $table) {
        $table->string('tier')->nullable(); // Bronze, Silver, Gold, VIP
        $table->string('cpu')->nullable();
        $table->string('gpu')->nullable();
        $table->string('ram')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('komputer', function (Blueprint $table) {
            //
        });
    }
};
