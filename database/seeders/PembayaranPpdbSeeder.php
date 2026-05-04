<?php

namespace Database\Seeders;

use App\Models\PembayaranPpdb;
use Illuminate\Database\Seeder;

class PembayaranPpdbSeeder extends Seeder
{
    public function run(): void
    {
        // Deskripsi sengaja dibuat nullable karena saat ini halaman pembayaran
        // belum wajib menampilkan keterangan tambahan untuk setiap item biaya.
        $items = [
            [
                'jenis' => 'Uang Pangkal',
                'deskripsi' => 'Biaya daftar ulang awal masuk tahun ajaran baru.',
                'nominal' => 3500000,
                'status' => true,
            ],
            [
                'jenis' => 'SPP Bulan Juli',
                'deskripsi' => 'Pembayaran SPP untuk bulan pertama saat mulai aktif belajar.',
                'nominal' => 250000,
                'status' => true,
            ],
            [
                'jenis' => 'Seragam Sekolah',
                'deskripsi' => 'Paket seragam utama peserta didik baru.',
                'nominal' => 700000,
                'status' => true,
            ],
            [
                'jenis' => 'Kartu Pelajar dan Administrasi',
                'deskripsi' => null,
                'nominal' => 100000,
                'status' => true,
            ],
        ];

        foreach ($items as $item) {
            PembayaranPpdb::updateOrCreate(
                ['jenis' => $item['jenis']],
                $item,
            );
        }
    }
}
