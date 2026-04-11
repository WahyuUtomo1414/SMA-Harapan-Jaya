<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('murid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->string('nama', 255);
            $table->string('nisn', 128)->nullable();
            $table->string('nis', 128)->nullable();
            $table->string('jenis_kelamin', 128);
            $table->string('tempat_lahir', 128);
            $table->date('tanggal_lahir');
            $table->string('alamat', 255)->nullable();
            $table->string('email', 128)->nullable();

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('murid');
    }
};
