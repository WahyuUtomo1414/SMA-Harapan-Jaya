<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('jenis_kelamin', 128);
            $table->string('tempat_lahir', 128);
            $table->date('tanggal_lahir');
            $table->string('alamat', 255);
            $table->date('tahun_mulai_mengajar');
            $table->string('ijaza', 10);
            $table->string('jabatan', 128);

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
