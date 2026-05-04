<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('ppdb')) {
            return;
        }

        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->json('alur_ppdb')->nullable();
            $table->json('persyaratan')->nullable();
            $table->json('timeline')->nullable();
            $table->string('brosur', 255)->nullable();
            $table->json('kontak')->nullable();

            $table->baseModelSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb');
    }
};
