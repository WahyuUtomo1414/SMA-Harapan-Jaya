<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StrukturOrganisasi::truncate();

        $gurus = Guru::all();

        $guruCount = 0;
        $tendikCount = 0;

        foreach ($gurus as $guru) {
            $jabatan = Str::upper($guru->jabatan);
            $urutan = 999; 

            if ($jabatan === 'KEPALA SEKOLAH') {
                $urutan = 1;
            } elseif ($jabatan === 'WAKIL KURIKULUM') {
                $urutan = 2;
            } elseif ($jabatan === 'WAKIL KESISWAAN') {
                $urutan = 3;
            } elseif (Str::contains($jabatan, 'GURU')) {
                $urutan = 10 + $guruCount;
                $guruCount++;
            } elseif (Str::contains($jabatan, 'TENDIK')) {
                $urutan = 50 + $tendikCount;
                $tendikCount++;
            } elseif (Str::contains($jabatan, 'KEAMANAN')) {
                $urutan = 900;
            } elseif (Str::contains($jabatan, 'KEBERSIHAN')) {
                $urutan = 901;
            }

            StrukturOrganisasi::create([
                'nama' => $guru->nama,
                'jabatan' => $guru->jabatan,
                'foto' => '',
                'urutan' => $urutan,
                'status' => true,
            ]);
        }
    }
}
