<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->json('alur_ppdb');
            $table->json('persyaratan');
            $table->json('timeline');
            $table->string('brosur', 255)->nullable();
            $table->json('kontak');

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb');
    }
};
