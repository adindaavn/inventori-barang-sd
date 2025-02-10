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
        Schema::create('tr_siswa', function (Blueprint $table) {
            $table->integer('no_siswa', 5)->primary();
            $table->string('nama_siswa', 100)->nullable();
            $table->string('kls_siswa', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_siswa');
    }
};
