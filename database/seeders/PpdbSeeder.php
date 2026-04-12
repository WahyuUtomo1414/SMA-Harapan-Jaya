<?php

namespace Database\Seeders;

use App\Models\Ppdb;
use Illuminate\Database\Seeder;

class PpdbSeeder extends Seeder
{
    public function run(): void
    {
        Ppdb::updateOrCreate(
            ['id' => 1],
            [
                'deskripsi' => 'SMA Harapan Jaya membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Pelajaran 2026-2027. Pendaftaran dapat dilakukan melalui jalur online maupun offline. Nilai karakter SATRIA yang dibangun: Solidaritas, Aktif, Tekun, Raih Impian, dan Amanah.',
                'alur_ppdb' => [
                    [
                        'judul' => 'Jalur SPMB Bersama 2026 (Online)',
                        'deskripsi' => 'Akses portal SPMB Jakarta, pilih SMA Harapan Jaya, upload berkas, ikuti seleksi, lalu lapor diri saat dinyatakan diterima.',
                    ],
                    [
                        'judul' => 'Jalur Mandiri (Offline)',
                        'deskripsi' => 'Datang langsung ke sekolah, isi formulir, serahkan berkas, verifikasi administrasi, lalu ikuti proses seleksi sekolah.',
                    ],
                    [
                        'judul' => 'Informasi Tambahan',
                        'deskripsi' => 'Khusus jalur SPMB Bersama tersedia program gratis biaya sekolah selama 3 tahun sesuai ketentuan sekolah.',
                    ],
                ],
                'persyaratan' => [
                    ['item' => 'Fotokopi Akta Kelahiran'],
                    ['item' => 'Fotokopi Kartu Keluarga'],
                    ['item' => 'Pas Foto Terbaru (3x4)'],
                    ['item' => 'Fotokopi Ijazah SMP/MTs'],
                    ['item' => 'Fotokopi KJP (jika ada)'],
                ],
                'timeline' => [
                    [
                        'periode' => 'Juni - Juli 2026',
                        'keterangan' => 'Pendaftaran Jalur SPMB Bersama (Online) melalui portal resmi SPMB Jakarta.',
                    ],
                    [
                        'periode' => 'Setelah Pengumuman',
                        'keterangan' => 'Lapor diri dan verifikasi berkas untuk peserta yang dinyatakan diterima.',
                    ],
                    [
                        'periode' => 'Gelombang Mandiri',
                        'keterangan' => 'Pendaftaran langsung di sekolah selama kuota masih tersedia.',
                    ],
                ],
                'kontak' => [
                    ['label' => 'Website SPMB', 'value' => 'https://spmb.jakarta.go.id/'],
                    ['label' => 'Jalur Mandiri', 'value' => 'Datang langsung ke SMA Harapan Jaya'],
                    ['label' => 'Jam Layanan', 'value' => '08.00 - 15.00 WIB (hari kerja)'],
                ],
                'brosur' => null,
                'status' => true,
            ],
        );
    }
}

