<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SppSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::query()
            ->with('murid')
            ->where('kode', 'X-1')
            ->firstOrFail();

        $statuses = ['belum_lunas', 'lunas'];
        $months = [1, 2, 3, 4];

        foreach ($kelas->murid as $murid) {
            foreach ($months as $month) {
                $statusBayar = Arr::random($statuses);

                Spp::query()->updateOrCreate(
                    [
                        'murid_id' => $murid->id,
                        'bulan' => $month,
                        'tahun' => 2026,
                    ],
                    [
                        'kelas_id' => $kelas->id,
                        'status_bayar' => $statusBayar,
                        'keterangan' => $statusBayar === 'lunas'
                            ? 'Pembayaran SPP sudah lunas.'
                            : 'Pembayaran SPP belum lunas.',
                        'status' => true,
                    ]
                );
            }
        }
    }
}
