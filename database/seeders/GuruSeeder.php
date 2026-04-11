<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['nama' => 'JUNAIDI, S.Pd MM', 'jenis_kelamin' => 'L', 'ttl' => 'SUMENEP, 10 MARET 1965', 'alamat' => 'JL. PERMATA KANAN Rt/Rw: 4/11 Kel.TEGAL ALUR Kec.Kali Deres Kota Jakarta Barat', 'tmt' => '2018', 'ijaza' => 'S2', 'jabatan' => 'KEPALA SEKOLAH'],
            ['nama' => 'AGUS MULYANTO, S.Kom', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 01 Maret 1997', 'alamat' => 'Jl. Kp Utan Bahagia Rt/Rw: 4/4 Kel.Cengkareng Timur Kec.Cengkareng Jakarta Barat', 'tmt' => '2021', 'ijaza' => 'S1', 'jabatan' => 'WAKIL KURIKULUM'],
            ['nama' => 'Lili Yuslianti, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 03 OKTOBER 1982', 'alamat' => 'JL. SELONG GG F NO.58 Rt/Rw: 6/3 Kel.DURI KOSAMBI Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2008', 'ijaza' => 'S1', 'jabatan' => 'WAKIL KESISWAAN'],
            ['nama' => 'Epi Yulpiani, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'PAGAR ALAM, 06 JULI 1971', 'alamat' => 'JL. BASMOL NO.22 Rt/Rw: 14/6 Kel.KEMBANGAN UTARA Kec.Kembangan Kota Jakarta Barat', 'tmt' => '2000', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'Dian Nurlatifah, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'YOGYAKARTA, 16 Desember 1981', 'alamat' => 'JL. TAMBORIN BLOK A1/1 Rt/Rw: 1/6 Kel.Cipondoh  Kec.Cipondoh Kota Tangerang', 'tmt' => '2005', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'Nurhayati, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 09 JANUARI 1990', 'alamat' => 'JL. RAWA BUAYA Rt/Rw: 3/1 Kel.RAWA BUAYA Kec. Cengkareng Kota Jakarta Barat', 'tmt' => '2007', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'Luqman Hakim, S.Pd.i', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 10 MEI 1989', 'alamat' => 'JL. NURUL AMAL XXI NO.14 Rt/Rw: 9/15 Kel.CENGKARENG TIMUR Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2016', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'LUTFIAH ADNANIA, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 12 JANUARI 2000', 'alamat' => 'JL. Pedongkelan Rt/Rw: 2/15 Kel.Kapuk Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2022', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'SITI SOLEHA, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 22 SEPTEMBER 1999', 'alamat' => 'JL. Salembaran Rt.001/004 Kel. Salembaran Jaya Kec. Kosambi Kab. Tangerang', 'tmt' => '2022', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'AHMAD SOPIYAN SAURI, S.Pd', 'jenis_kelamin' => 'L', 'ttl' => 'BEKASI, 08 JULI 1976', 'alamat' => 'JL. UKIR NO. 63 Rt/Rw: 6/6 Kel.KAPUK Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2007', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'DRS.SINGGIH SUDIBYO, S.Pd', 'jenis_kelamin' => 'L', 'ttl' => 'BLORA, 22 SEPTEMBER 1962', 'alamat' => 'JL. Gg. Sadar 1, RT.05 RW.02 Kel.Cipondoh  Kec.Cipondoh Kota Tangerang', 'tmt' => '2022', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'DONY ADITYA PUTRA, S.Pd', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 17 DESEMBER 1996', 'alamat' => 'JL. Nurul amal XXII No:40 RT 015/RW 005 Kel. Cengkareng Timur Kec. Cengkareng Kota Jakarta Barat', 'tmt' => '2022', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'MAHFUD SIDIK, S.Sos', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 21 DESEMBER 1990', 'alamat' => 'JL. Indraloka 1 Gg.Damai 5 No.33 RT.10 RW.10 Kel.Wijaya Kusuma Kec.Grogol Petamburan Kota Jakarta Barat', 'tmt' => '2022', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'WULAN NURHIDAYAH', 'jenis_kelamin' => 'P', 'ttl' => 'TANGERANG, 18 DESEMBER 1997', 'alamat' => 'JL. UTAN BAHAGIA RT.06 RW.06 Kel.Cengkareng Timur Kec.Cengkareng Jakarta Barat', 'tmt' => '2024', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'BRULLI ALFANDI, S.Pd', 'jenis_kelamin' => 'L', 'ttl' => 'TANGERANG, 19 NOVEMBER 1999', 'alamat' => 'JL. AL-IKHLAS IV RT.03 RW.06 No.44 Cipadu, Larangan, Kota Tangerang', 'tmt' => '2024', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'ALMA SEPTIYANI, S.Pd', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 1 SEPTEMBER 2002', 'alamat' => 'JL. BASMOL NO.22 Rt/Rw: 14/6 Kel.KEMBANGAN UTARA Kec.Kembangan Kota Jakarta Barat', 'tmt' => '2024', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'RINI KARLINA, S.Pd.i', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 25 JULI 2001', 'alamat' => 'JL. Kayu Besar Rt 002/008 Kel.Tegal Alur Kec.Kalideres Kota Jakarta Barat', 'tmt' => '2024', 'ijaza' => 'S1', 'jabatan' => 'GURU MAPEL'],
            ['nama' => 'SITI JUHROH', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 05 JULI 1975', 'alamat' => 'JL. PEDONGKELAN Rt/Rw: 2/15 Kel.KAPUK Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2000', 'ijaza' => 'SMK', 'jabatan' => 'TENDIK'],
            ['nama' => 'MUHAMAD RIZAL', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 01 NOVEMBER 1992', 'alamat' => 'GG.H. ROJAK NO. 45 Rt.004/004 Kel. CIPADU JAYA Kec. LARANGAN Kota Tangerang', 'tmt' => '2021', 'ijaza' => 'SMK', 'jabatan' => 'TENDIK'],
            ['nama' => 'SONIA', 'jenis_kelamin' => 'P', 'ttl' => 'JAKARTA, 12 SEPTEMBER 2004', 'alamat' => 'JL. Kayu Besar Rt 006/011 Kel. Cengkareng Timur Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2023', 'ijaza' => 'SMA', 'jabatan' => 'TENDIK'],
            ['nama' => 'SUBCHAN APRIANTO', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 05 APRIL 1978', 'alamat' => 'Jl. Nurul Amal XII Rt 15/05 Kel.Cengkareng Timur Kec.Cengkareng Kota Jakarta Barat', 'tmt' => '2019', 'ijaza' => 'SMP', 'jabatan' => 'PETUGAS KEBERSIHAN'],
            ['nama' => 'ASMARI', 'jenis_kelamin' => 'L', 'ttl' => 'JAKARTA, 19 OKTOBER 1973', 'alamat' => 'JL. PESING KONENG RT.07 RW.01 KEL. Kedoya Utara Kec. Kebon Jeruk Kota Jakarta Barat', 'tmt' => '2024', 'ijaza' => 'SMA', 'jabatan' => 'PETUGAS KEAMANAN'],
        ];

        foreach ($rows as $row) {
            [$tempatLahir, $tanggalLahir] = $this->splitTtl($row['ttl']);

            Guru::query()->updateOrCreate(
                [
                    'nama' => $row['nama'],
                    'tanggal_lahir' => $tanggalLahir,
                ],
                [
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'tempat_lahir' => $tempatLahir,
                    'tanggal_lahir' => $tanggalLahir,
                    'alamat' => preg_replace('/\s+/', ' ', trim($row['alamat'])),
                    'tahun_mulai_mengajar' => $row['tmt'] . '-01-01',
                    'ijaza' => $row['ijaza'],
                    'jabatan' => $row['jabatan'],
                    'status' => true,
                ]
            );
        }
    }

    private function splitTtl(string $ttl): array
    {
        [$tempatLahirRaw, $tanggalRaw] = array_map(
            static fn (string $part): string => trim($part),
            explode(',', $ttl, 2)
        );

        return [
            Str::title(Str::lower($tempatLahirRaw)),
            $this->parseIndonesianDate($tanggalRaw),
        ];
    }

    private function parseIndonesianDate(string $date): string
    {
        $months = [
            'JANUARI' => 1,
            'FEBRUARI' => 2,
            'MARET' => 3,
            'APRIL' => 4,
            'MEI' => 5,
            'JUNI' => 6,
            'JULI' => 7,
            'AGUSTUS' => 8,
            'SEPTEMBER' => 9,
            'OKTOBER' => 10,
            'NOVEMBER' => 11,
            'DESEMBER' => 12,
        ];

        $normalized = Str::upper(preg_replace('/\s+/', ' ', trim($date)));

        preg_match('/^(\d{1,2})\s+([A-Z]+)\s+(\d{4})$/', $normalized, $matches);

        $day = (int) ($matches[1] ?? 1);
        $month = $months[$matches[2] ?? 'JANUARI'] ?? 1;
        $year = (int) ($matches[3] ?? 1970);

        return sprintf('%04d-%02d-%02d', $year, $month, $day);
    }
}
