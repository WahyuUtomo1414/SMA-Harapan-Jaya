<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('form_ppdb', function (Blueprint $table) {
            // Sesuai perubahan user: akte_kelahiran jadi required
            $table->string('akte_kelahiran', 255)->nullable(false)->change();

            // Tambah kolom status penerimaan: pending | diterima | ditolak
            $table->string('status_penerimaan', 20)->default('pending')->after('pas_foto');
        });
    }

    public function down(): void
    {
        Schema::table('form_ppdb', function (Blueprint $table) {
            $table->string('akte_kelahiran', 255)->nullable()->change();
            $table->dropColumn('status_penerimaan');
        });
    }
};
