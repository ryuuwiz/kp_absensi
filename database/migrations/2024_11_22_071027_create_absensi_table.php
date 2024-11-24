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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_jadwal');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal');
            $table->date('tanggal');
            $table->enum('status', ['hadir', 'alpha', 'izin']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};