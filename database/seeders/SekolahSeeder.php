<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    public function run(): void
    {
        $visi = 'Terwujudnya sekolah unggul yang menginspirasi, melahirkan generasi emas yang berkarakter Pancasila, berdaya saing global, dan mampu berkontribusi nyata dalam pembangunan bangsa.';

        $misi = [
            'Menyelenggarakan pembelajaran berkualitas tinggi yang berpusat pada peserta didik, mengacu pada Kurikulum Merdeka, dan mengintegrasikan teknologi informasi.',
            'Membentuk karakter peserta didik yang beriman, bertakwa, berakhlak mulia, kreatif, inovatif, dan memiliki jiwa kepemimpinan.',
            'Mengembangkan potensi peserta didik secara optimal melalui berbagai program intrakurikuler dan ekstrakurikuler yang berorientasi pada minat dan bakat.',
            'Memfasilitasi peserta didik untuk meraih prestasi akademik yang gemilang dan lulus ke perguruan tinggi negeri favorit.',
            'Menjalin kerjasama yang erat dengan berbagai pihak (perguruan tinggi, industri, komunitas) untuk mendukung pengembangan sekolah dan peserta didik.',
        ];

        $deskripsi = implode("\n", [
            'Identitas Sekolah',
            'Nama: SMA HARAPAN JAYA JAKARTA',
            'Alamat: JALAN DAAN MOGOT KM 13, Cengkareng, Jakarta Barat, DKI Jakarta',
            'No Telepon/Fax: 021-5401920 / 021-5401920',
            'NSS/NPSN: 30084/20101350',
            'Website: https://smaharjajakarta.my.id/sekolah',
            'Email: smaharapanjaya@gmail.com',
            '',
            'Misi:',
            '1. Menyelenggarakan pembelajaran berkualitas tinggi yang berpusat pada peserta didik, mengacu pada Kurikulum Merdeka, dan mengintegrasikan teknologi informasi.',
            '2. Membentuk karakter peserta didik yang beriman, bertakwa, berakhlak mulia, kreatif, inovatif, dan memiliki jiwa kepemimpinan.',
            '3. Mengembangkan potensi peserta didik secara optimal melalui berbagai program intrakurikuler dan ekstrakurikuler yang berorientasi pada minat dan bakat.',
            '4. Memfasilitasi peserta didik untuk meraih prestasi akademik yang gemilang dan lulus ke perguruan tinggi negeri favorit.',
            '5. Menjalin kerja sama yang erat dengan berbagai pihak (perguruan tinggi, industri, komunitas) untuk mendukung pengembangan sekolah dan peserta didik.',
        ]);

        Sekolah::query()->updateOrCreate(
            ['nama' => 'SMA HARAPAN JAYA JAKARTA'],
            [
                'alamat' => 'JALAN DAAN MOGOT KM 13, Cengkareng, Jakarta Barat, DKI Jakarta',
                'no_telepon' => '021-5401920',
                'nss_npsn' => '30084/20101350',
                'website' => 'https://smaharjajakarta.my.id/sekolah',
                'email' => 'smaharapanjaya@gmail.com',
                'status_sekolah' => 'Swasta',
                'waktu_belajar' => 'Pagi (pk.06.30 s.d pk 12.40 WIB)',
                'tahun_berdiri' => '1986-01-01',
                'luas_tanah_bangunan' => '1.096 M2 / 920 M2',
                'status_tanah' => 'HAK MILIK',
                'no_sertifikat_tanah' => 'M.59/1995',
                'status_akreditasi' => 'Terakreditasi B/2023',
                'visi' => $visi,
                'misi' => $misi,
                'deskripsi' => $deskripsi,
                'logo' => 'sekolah/logo-sma-harapan-jaya.png',
                'status' => true,
            ]
        );
    }
}
