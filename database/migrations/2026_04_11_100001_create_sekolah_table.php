<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->string('alamat', 255);
            $table->string('no_telepon', 16);
            $table->string('nss_npsn', 128);
            $table->string('website', 128);
            $table->string('email', 128);
            $table->string('status_sekolah', 128);
            $table->string('waktu_belajar', 255);
            $table->date('tahun_berdiri');
            $table->string('luas_tanah_bangunan', 128);
            $table->string('status_tanah', 128);
            $table->string('no_sertifikat_tanah', 128);
            $table->string('status_akreditasi', 128);
            $table->string('visi', 255);
            $table->string('misi', 255);
            $table->text('deskripsi');
            $table->string('logo', 255);

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
