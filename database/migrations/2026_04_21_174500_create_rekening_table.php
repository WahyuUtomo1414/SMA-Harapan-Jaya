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
        Schema::create('rekening', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank', 128);
            $table->string('nama_pemilik', 255);
            $table->string('nomor_rekening', 128);
            $table->text('deskripsi')->nullable();
            $table->string('logo', 255)->nullable();
            
            $table->baseModelSoftDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening');
    }
};
