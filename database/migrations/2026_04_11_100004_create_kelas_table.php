<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 16);
            $table->string('jurusan', 10);
            $table->foreignId('wali_kelas_id')->constrained('guru');

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
