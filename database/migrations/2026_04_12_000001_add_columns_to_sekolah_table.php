<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sekolah', function (Blueprint $table) {
            // Because SQLite cannot directly change string to JSON via change() safely in old versions,
            // we will let schema builder change it if it supports it, 
            // but in Laravel 11/MySQL it works cleanly.
            // Being cautious:
            $table->json('misi')->nullable()->change();
            $table->text('maps')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('sosial_media')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sekolah', function (Blueprint $table) {
            $table->dropColumn('maps');
            $table->dropColumn('thumbnail');
            $table->dropColumn('sosial_media');
        });
    }
};
