<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // Wali kelas X-1 = Lili Yuslianti, S.Pd (WAKIL KESISWAAN / wali kelas X-1)
        // Sesuaikan nama wali kelas sesuai data guru yang sudah ada
        $waliKelas = Guru::query()->where('nama', 'Lili Yuslianti, S.Pd')->first();

        Kelas::query()->updateOrCreate(
            ['kode' => 'X-1'],
            [
                'jurusan'      => 'IPA',
                'wali_kelas_id' => $waliKelas?->id,
                'status'       => true,
            ]
        );
    }
}
