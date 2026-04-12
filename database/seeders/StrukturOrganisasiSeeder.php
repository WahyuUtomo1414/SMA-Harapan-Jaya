<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = Guru::all();

        foreach ($gurus as $index => $guru) {
            $jabatan = $guru->jabatan;
            $urutan = 99; // Default for others

            if (stripos($jabatan, 'KEPALA SEKOLAH') !== false) {
                $urutan = 1;
            } elseif (stripos($jabatan, 'KURIKULUM') !== false) {
                $urutan = 2;
            } elseif (stripos($jabatan, 'KESISWAAN') !== false) {
                $urutan = 3;
            } elseif (stripos($jabatan, 'TATA USAHA') !== false) {
                $urutan = 4;
            } elseif (stripos($jabatan, 'GURU') !== false) {
                $urutan = 5;
            }

            StrukturOrganisasi::updateOrCreate(
                ['nama' => $guru->nama, 'jabatan' => $guru->jabatan],
                [
                    'foto' => '', // Empty as requested
                    'urutan' => $urutan,
                    'status' => true,
                ]
            );
        }
    }
}
