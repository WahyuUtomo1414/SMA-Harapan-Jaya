<?php

namespace Database\Seeders;

use App\Models\Ppdb;
use Illuminate\Database\Seeder;

class PpdbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ppdb::truncate();

        Ppdb::create([
            'deskripsi' => 'Wujudkan Mimpi di Sekolah Sang Juara! SMA Harapan Jaya resmi membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Pelajaran 2026-2027. Kami berpegang pada SATRIA: Solidaritas, Aktif, Tekun, Raih Impian, Amanah.',
            'alur_ppdb' => [
                'offline' => [
                    'Membeli Formulir Pendaftaran',
                    'Mengisi Formulir',
                    'Menyerahkan Formulir dan Berkas',
                    'Seleksi Berkas',
                    'Pembayaran Administrasi'
                ],
                'online' => [
                    'Mengakses Website SPMB di https://spmb.jakarta.go.id/',
                    'Klik Menu SPMB Bersama',
                    'Pengajuan Akun dan Verifikasi',
                    'Mengunggah Berkas Persyaratan',
                    'Seleksi Berkas',
                    'Lapor Diri'
                ]
            ],
            'persyaratan' => [
                'Fotokopi Akta Kelahiran',
                'Fotokopi Kartu Keluarga',
                'Pas Foto Terbaru (3x4)',
                'Fotokopi Ijazah SMP/MTs',
                'Fotokopi Th. KJP (jika ada)'
            ],
            'timeline' => [
                [
                    'label' => 'Jalur SPMB Bersama 2026 (Online)',
                    'waktu' => 'Juni - Juli 2026',
                    'link' => 'https://spmb.jakarta.go.id/'
                ],
                [
                    'label' => 'Jalur Mandiri (Offline)',
                    'waktu' => 'Sekarang - Selesai',
                    'keterangan' => 'Langsung ke sekolah'
                ]
            ],
            'brosur' => 'ppdb/brosur-2026.pdf',
            'kontak' => [
                'instagram' => '@smaharja86',
                'whatsapp' => '021-5401920',
                'email' => 'smaharapanjaya@gmail.com'
            ],
            'status' => true,
        ]);
    }
}
