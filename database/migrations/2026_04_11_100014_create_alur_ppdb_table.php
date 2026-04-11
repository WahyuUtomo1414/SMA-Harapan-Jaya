<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alur_ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->text('deskripsi')->nullable();
            $table->integer('urutan');

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alur_ppdb');
    }
};
