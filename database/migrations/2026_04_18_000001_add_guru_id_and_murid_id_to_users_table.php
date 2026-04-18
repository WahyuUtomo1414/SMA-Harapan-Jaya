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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('guru_id')
                ->nullable()
                ->after('password')
                ->constrained('guru')
                ->nullOnDelete();

            $table->foreignId('murid_id')
                ->nullable()
                ->after('guru_id')
                ->constrained('murid')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('murid_id');
            $table->dropConstrainedForeignId('guru_id');
        });
    }
};
