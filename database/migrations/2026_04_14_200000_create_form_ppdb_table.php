<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_ppdb', function (Blueprint $table) {
            $table->id();

            // ── A. Identitas Calon Peserta Didik ──────────────────────
            $table->string('nik', 16);
            $table->string('nisn', 10)->nullable();
            $table->string('nama_lengkap', 255);
            $table->string('tempat_lahir', 128);
            $table->date('tanggal_lahir');
            $table->string('no_hp', 20);
            $table->string('asal_sekolah', 255);
            $table->string('jenis_kelamin', 20);   // 'Laki - Laki' | 'Perempuan'
            $table->text('alamat');
            $table->string('email', 128)->nullable();
            $table->string('jurusan', 128);         // pilihan jurusan ipa / ips
            $table->string('agama', 64);
            $table->unsignedTinyInteger('anak_ke'); // anak ke-berapa
            $table->unsignedTinyInteger('dari');    // dari sekian bersaudara
            $table->unsignedSmallInteger('tinggi_badan')->nullable(); // cm
            $table->unsignedSmallInteger('berat_badan')->nullable();  // kg

            // ── B. Data Orang Tua / Wali ──────────────────────────────
            $table->string('nama_ayah', 255)->nullable();
            $table->string('nama_ibu', 255)->nullable();
            $table->string('pekerjaan_ayah', 128)->nullable();
            $table->string('pekerjaan_ibu', 128)->nullable();
            $table->string('no_hp_ortu', 20)->nullable();
            $table->text('alamat_ortu')->nullable();

            // ── C. Upload Dokumen ─────────────────────────────────────
            $table->string('kartu_keluarga', 255);          // required
            $table->string('akte_kelahiran', 255);          // required
            $table->string('ijazah', 255);                  // required
            $table->string('pas_foto', 255);                // required

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_ppdb');
    }
};
