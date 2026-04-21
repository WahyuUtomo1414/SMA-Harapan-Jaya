<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rekenings = [
            [
                'nama_bank' => 'Bank BCA',
                'nama_pemilik' => 'SMA Harapan Jaya',
                'nomor_rekening' => '0987654321',
                'deskripsi' => 'Rekening Pembayaran SPP Utama',
                'status' => true,
            ],
            [
                'nama_bank' => 'Bank Mandiri',
                'nama_pemilik' => 'SMA Harapan Jaya',
                'nomor_rekening' => '1234567890',
                'deskripsi' => 'Rekening Operasional Sekolah',
                'status' => true,
            ],
            [
                'nama_bank' => 'Bank BRI',
                'nama_pemilik' => 'SMA Harapan Jaya',
                'nomor_rekening' => '1122334455',
                'deskripsi' => 'Rekening Dana BOS',
                'status' => true,
            ],
            [
                'nama_bank' => 'Bank BSI',
                'nama_pemilik' => 'SMA Harapan Jaya',
                'nomor_rekening' => '5544332211',
                'deskripsi' => 'Rekening ZIS & Donasi',
                'status' => true,
            ],
        ];

        foreach ($rekenings as $rekening) {
            Rekening::create($rekening);
        }
    }
}
