<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar mata pelajaran kelas X-1 berdasarkan jadwal mengajar 2025-2026
        $mataPelajarans = [
            [
                'nama'      => 'Pendidikan Agama Islam',
                'deskripsi' => 'Mata pelajaran Pendidikan Agama Islam dan Budi Pekerti untuk kelas X.',
            ],
            [
                'nama'      => 'Bahasa Indonesia',
                'deskripsi' => 'Mata pelajaran Bahasa Indonesia untuk kelas X.',
            ],
            [
                'nama'      => 'Bahasa Inggris',
                'deskripsi' => 'Mata pelajaran Bahasa Inggris untuk kelas X.',
            ],
            [
                'nama'      => 'Matematika Umum',
                'deskripsi' => 'Mata pelajaran Matematika Umum untuk kelas X.',
            ],
            [
                'nama'      => 'Fisika',
                'deskripsi' => 'Mata pelajaran Fisika untuk kelas X IPA.',
            ],
            [
                'nama'      => 'Kimia',
                'deskripsi' => 'Mata pelajaran Kimia untuk kelas X IPA.',
            ],
            [
                'nama'      => 'Biologi',
                'deskripsi' => 'Mata pelajaran Biologi untuk kelas X IPA.',
            ],
            [
                'nama'      => 'Sejarah Indonesia',
                'deskripsi' => 'Mata pelajaran Sejarah Indonesia untuk kelas X.',
            ],
            [
                'nama'      => 'PPKn',
                'deskripsi' => 'Mata pelajaran Pendidikan Pancasila dan Kewarganegaraan untuk kelas X.',
            ],
            [
                'nama'      => 'Ekonomi',
                'deskripsi' => 'Mata pelajaran Ekonomi untuk kelas X.',
            ],
            [
                'nama'      => 'Informatika',
                'deskripsi' => 'Mata pelajaran Informatika (TIK) untuk kelas X.',
            ],
            [
                'nama'      => 'Seni Budaya',
                'deskripsi' => 'Mata pelajaran Seni Budaya untuk kelas X.',
            ],
            [
                'nama'      => 'Pendidikan Jasmani Olahraga dan Kesehatan',
                'deskripsi' => 'Mata pelajaran PJOK untuk kelas X.',
            ],
            [
                'nama'      => 'Geografi',
                'deskripsi' => 'Mata pelajaran Geografi untuk kelas X.',
            ],
            [
                'nama'      => 'Sosiologi',
                'deskripsi' => 'Mata pelajaran Sosiologi untuk kelas X.',
            ],
            [
                'nama'      => 'Prakarya',
                'deskripsi' => 'Mata pelajaran Prakarya dan Kewirausahaan untuk kelas X.',
            ],
        ];

        foreach ($mataPelajarans as $mapel) {
            MataPelajaran::query()->updateOrCreate(
                ['nama' => $mapel['nama']],
                [
                    'deskripsi' => $mapel['deskripsi'],
                    'status'    => true,
                ]
            );
        }
    }
}
