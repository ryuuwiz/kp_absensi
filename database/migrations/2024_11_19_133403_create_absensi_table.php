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
            $table->id("id_absensi");
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_mapel');
            $table->date('tanggal');
            $table->enum('status', ['Hadir', 'Tidak Hadir']);
            $table->timestamps();
            $table->foreign("id_siswa")->references("id_siswa")->on("siswa")->onDelete('cascade');
            $table->foreign("id_mapel")->references("id_mapel")->on("mata_pelajaran")->onDelete('cascade');
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
