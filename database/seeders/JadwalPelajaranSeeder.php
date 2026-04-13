<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;

class JadwalPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::query()->where('kode', 'X-1')->firstOrFail();

        // ─── Helper closure ───────────────────────────────────────────
        $guru = static fn (string $nama): int =>
            Guru::query()->where('nama', $nama)->firstOrFail()->id;

        $mapel = static fn (string $nama): int =>
            MataPelajaran::query()->where('nama', $nama)->firstOrFail()->id;
        // ──────────────────────────────────────────────────────────────

        /*
         * Pemetaan guru → mata pelajaran (kelas X-1) berdasarkan
         * DATA GURU SMA HARAPAN JAYA.xlsx & foto jadwal 2025/2026.
         *
         * Teacher assignments for X-1:
         *  - Pendidikan Agama Islam   → Rini Karlina, S.Pd.i    (kode 17)
         *  - Bahasa Indonesia         → WULAN NURHIDAYAH         (kode 14)
         *  - PPKn                     → WULAN NURHIDAYAH         (kode 14)
         *  - Bahasa Inggris           → Lili Yuslianti, S.Pd     (kode 03 / Full)
         *  - Matematika Umum          → SITI SOLEHA, S.Pd        (kode 09)
         *  - Fisika                   → Epi Yulpiani, S.Pd       (kode 04)
         *  - Kimia                    → LUTFIAH ADNANIA, S.Pd    (kode 08)
         *  - Biologi                  → LUTFIAH ADNANIA, S.Pd    (kode 08 / Full)
         *  - Sejarah Indonesia        → AHMAD SOPIYAN SAURI, S.Pd (kode 10)
         *  - Ekonomi                  → Nurhayati, S.Pd          (kode 06 / Full)
         *  - Informatika              → AGUS MULYANTO, S.Kom     (kode 02 / Full)
         *  - Sosiologi                → MAHFUD SIDIK, S.Sos      (kode 13)
         *  - Geografi                 → DRS.SINGGIH SUDIBYO, S.Pd (kode 11)
         *  - Pend. Jasmani (PJOK)     → DRS.SINGGIH SUDIBYO, S.Pd (kode 11)
         *  - Seni Budaya              → ALMA SEPTIYANI, S.Pd     (kode 16 / Full)
         *  - Prakarya                 → Dian Nurlatifah, S.Pd    (kode 05)
         *
         * Struktur waktu (45 menit/JP):
         *  Senin    : Upacara 06:30-07:15, lalu jam 1-8
         *  Sel-Kam  : Literasi/Imtaq 06:30-07:00, lalu jam 1-8
         *  Jumat    : 06:30-07:00, jam 1-6 (lebih singkat)
         *  Sabtu    : 06:30-07:00, jam 1-6
         *
         *  JP  Mulai   Selesai
         *  1   07:00   07:45
         *  2   07:45   08:30
         *  3   08:30   09:15
         *  ISTIRAHAT 09:15-09:30
         *  4   09:30   10:15
         *  5   10:15   11:00
         *  6   11:00   11:45
         *  ISTIRAHAT/DZUHUR 11:45-12:30
         *  7   12:30   13:15
         *  8   13:15   14:00
         */

        $jadwals = [
            // ══════════════════ SENIN ══════════════════
            // Setelah upacara bendera (06:30-07:15)
            [
                'hari'              => 'Senin',
                'mulai'             => '07:15',
                'selesai'           => '08:45',
                'mata_pelajaran'    => 'PPKn',
                'guru'              => 'WULAN NURHIDAYAH',
                'deskripsi'         => 'Pendidikan Pancasila dan Kewarganegaraan - 2 JP',
            ],
            [
                'hari'              => 'Senin',
                'mulai'             => '08:45',
                'selesai'           => '10:15',
                'mata_pelajaran'    => 'Matematika Umum',
                'guru'              => 'SITI SOLEHA, S.Pd',
                'deskripsi'         => 'Matematika Wajib - 2 JP',
            ],
            // Istirahat 10:15 - 10:30
            [
                'hari'              => 'Senin',
                'mulai'             => '10:30',
                'selesai'           => '12:00',
                'mata_pelajaran'    => 'Bahasa Indonesia',
                'guru'              => 'WULAN NURHIDAYAH',
                'deskripsi'         => 'Bahasa Indonesia - 2 JP',
            ],
            // Istirahat/Sholat Dzuhur 12:00 - 12:30
            [
                'hari'              => 'Senin',
                'mulai'             => '12:30',
                'selesai'           => '14:00',
                'mata_pelajaran'    => 'Sosiologi',
                'guru'              => 'MAHFUD SIDIK, S.Sos',
                'deskripsi'         => 'Sosiologi - 2 JP',
            ],

            // ══════════════════ SELASA ══════════════════
            [
                'hari'              => 'Selasa',
                'mulai'             => '07:00',
                'selesai'           => '08:30',
                'mata_pelajaran'    => 'Pendidikan Agama Islam',
                'guru'              => 'RINI KARLINA, S.Pd.i',
                'deskripsi'         => 'Pendidikan Agama Islam - 2 JP',
            ],
            [
                'hari'              => 'Selasa',
                'mulai'             => '08:30',
                'selesai'           => '10:00',
                'mata_pelajaran'    => 'Fisika',
                'guru'              => 'Epi Yulpiani, S.Pd',
                'deskripsi'         => 'Fisika - 2 JP',
            ],
            // Istirahat 10:00 - 10:15
            [
                'hari'              => 'Selasa',
                'mulai'             => '10:15',
                'selesai'           => '11:45',
                'mata_pelajaran'    => 'Kimia',
                'guru'              => 'LUTFIAH ADNANIA, S.Pd',
                'deskripsi'         => 'Kimia - 2 JP',
            ],
            // Istirahat/Sholat 11:45 - 12:30
            [
                'hari'              => 'Selasa',
                'mulai'             => '12:30',
                'selesai'           => '14:00',
                'mata_pelajaran'    => 'Sejarah Indonesia',
                'guru'              => 'AHMAD SOPIYAN SAURI, S.Pd',
                'deskripsi'         => 'Sejarah Indonesia - 2 JP',
            ],

            // ══════════════════ RABU ══════════════════
            [
                'hari'              => 'Rabu',
                'mulai'             => '07:00',
                'selesai'           => '08:30',
                'mata_pelajaran'    => 'Bahasa Inggris',
                'guru'              => 'Lili Yuslianti, S.Pd',
                'deskripsi'         => 'Bahasa Inggris - 2 JP',
            ],
            [
                'hari'              => 'Rabu',
                'mulai'             => '08:30',
                'selesai'           => '10:00',
                'mata_pelajaran'    => 'Matematika Umum',
                'guru'              => 'SITI SOLEHA, S.Pd',
                'deskripsi'         => 'Matematika Wajib - 2 JP',
            ],
            // Istirahat 10:00 - 10:15
            [
                'hari'              => 'Rabu',
                'mulai'             => '10:15',
                'selesai'           => '11:45',
                'mata_pelajaran'    => 'Biologi',
                'guru'              => 'LUTFIAH ADNANIA, S.Pd',
                'deskripsi'         => 'Biologi - 2 JP',
            ],
            // Istirahat/Sholat 11:45 - 12:30
            [
                'hari'              => 'Rabu',
                'mulai'             => '12:30',
                'selesai'           => '14:00',
                'mata_pelajaran'    => 'Informatika',
                'guru'              => 'AGUS MULYANTO, S.Kom',
                'deskripsi'         => 'Informatika (TIK) - 2 JP',
            ],

            // ══════════════════ KAMIS ══════════════════
            [
                'hari'              => 'Kamis',
                'mulai'             => '07:00',
                'selesai'           => '08:30',
                'mata_pelajaran'    => 'Bahasa Indonesia',
                'guru'              => 'WULAN NURHIDAYAH',
                'deskripsi'         => 'Bahasa Indonesia - 2 JP',
            ],
            [
                'hari'              => 'Kamis',
                'mulai'             => '08:30',
                'selesai'           => '10:00',
                'mata_pelajaran'    => 'Bahasa Inggris',
                'guru'              => 'Lili Yuslianti, S.Pd',
                'deskripsi'         => 'Bahasa Inggris - 2 JP',
            ],
            // Istirahat 10:00 - 10:15
            [
                'hari'              => 'Kamis',
                'mulai'             => '10:15',
                'selesai'           => '11:45',
                'mata_pelajaran'    => 'Geografi',
                'guru'              => 'DRS.SINGGIH SUDIBYO, S.Pd',
                'deskripsi'         => 'Geografi - 2 JP',
            ],
            // Istirahat/Sholat 11:45 - 12:30
            [
                'hari'              => 'Kamis',
                'mulai'             => '12:30',
                'selesai'           => '14:00',
                'mata_pelajaran'    => 'Ekonomi',
                'guru'              => 'Nurhayati, S.Pd',
                'deskripsi'         => 'Ekonomi - 2 JP',
            ],

            // ══════════════════ JUMAT ══════════════════
            [
                'hari'              => 'Jumat',
                'mulai'             => '07:00',
                'selesai'           => '08:30',
                'mata_pelajaran'    => 'Pendidikan Jasmani Olahraga dan Kesehatan',
                'guru'              => 'DRS.SINGGIH SUDIBYO, S.Pd',
                'deskripsi'         => 'PJOK - 2 JP',
            ],
            [
                'hari'              => 'Jumat',
                'mulai'             => '08:30',
                'selesai'           => '10:00',
                'mata_pelajaran'    => 'Seni Budaya',
                'guru'              => 'ALMA SEPTIYANI, S.Pd',
                'deskripsi'         => 'Seni Budaya - 2 JP',
            ],
            // Istirahat 10:00 - 10:15
            [
                'hari'              => 'Jumat',
                'mulai'             => '10:15',
                'selesai'           => '11:30',
                'mata_pelajaran'    => 'Prakarya',
                'guru'              => 'Dian Nurlatifah, S.Pd',
                'deskripsi'         => 'Prakarya dan Kewirausahaan - 2 JP',
            ],

            // ══════════════════ SABTU ══════════════════
            [
                'hari'              => 'Sabtu',
                'mulai'             => '07:00',
                'selesai'           => '08:30',
                'mata_pelajaran'    => 'Fisika',
                'guru'              => 'Epi Yulpiani, S.Pd',
                'deskripsi'         => 'Fisika - 2 JP',
            ],
            [
                'hari'              => 'Sabtu',
                'mulai'             => '08:30',
                'selesai'           => '10:00',
                'mata_pelajaran'    => 'Kimia',
                'guru'              => 'LUTFIAH ADNANIA, S.Pd',
                'deskripsi'         => 'Kimia - 2 JP',
            ],
            // Istirahat 10:00 - 10:15
            [
                'hari'              => 'Sabtu',
                'mulai'             => '10:15',
                'selesai'           => '11:45',
                'mata_pelajaran'    => 'Pendidikan Agama Islam',
                'guru'              => 'RINI KARLINA, S.Pd.i',
                'deskripsi'         => 'Pendidikan Agama Islam - 2 JP',
            ],
            [
                'hari'              => 'Sabtu',
                'mulai'             => '11:45',
                'selesai'           => '13:15',
                'mata_pelajaran'    => 'Sejarah Indonesia',
                'guru'              => 'AHMAD SOPIYAN SAURI, S.Pd',
                'deskripsi'         => 'Sejarah Indonesia - 2 JP',
            ],
        ];

        foreach ($jadwals as $row) {
            JadwalPelajaran::query()->updateOrCreate(
                [
                    'kelas_id'          => $kelas->id,
                    'mata_pelajaran_id' => $mapel($row['mata_pelajaran']),
                    'guru_id'           => $guru($row['guru']),
                    'hari'              => $row['hari'],
                    'mulai'             => $row['mulai'],
                ],
                [
                    'selesai'           => $row['selesai'],
                    'deskripsi'         => $row['deskripsi'] ?? null,
                    'status'            => true,
                ]
            );
        }
    }
}
