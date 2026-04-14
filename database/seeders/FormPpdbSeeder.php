<?php

namespace Database\Seeders;

use App\Models\FormPpdb;
use Illuminate\Database\Seeder;

class FormPpdbSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                // Identitas
                'nik'               => '3174012501100001',
                'nisn'              => '0123456789',
                'nama_lengkap'      => 'Ahmad Rizky Pratama',
                'tempat_lahir'      => 'Jakarta',
                'tanggal_lahir'     => '2010-01-25',
                'no_hp'             => '081234567890',
                'asal_sekolah'      => 'SMP Negeri 12 Jakarta Barat',
                'jenis_kelamin'     => 'Laki - Laki',
                'alamat'            => 'Jl. Kapuk Raya No. 12 RT 004/003 Kel. Kapuk Kec. Cengkareng Jakarta Barat',
                'email'             => 'ahmad.rizky@gmail.com',
                'jurusan'           => 'IPA',
                'agama'             => 'Islam',
                'anak_ke'           => 1,
                'dari'              => 3,
                'tinggi_badan'      => 165,
                'berat_badan'       => 55,
                // Ortu
                'nama_ayah'         => 'Budi Santoso',
                'nama_ibu'          => 'Sri Wahyuni',
                'pekerjaan_ayah'    => 'Wiraswasta',
                'pekerjaan_ibu'     => 'Ibu Rumah Tangga',
                'no_hp_ortu'        => '081298765432',
                'alamat_ortu'       => 'Jl. Kapuk Raya No. 12 RT 004/003 Kel. Kapuk Kec. Cengkareng Jakarta Barat',
                // Dokumen (placeholder path)
                'kartu_keluarga'    => 'form-ppdb/dummy/kk_ahmad.jpg',
                'akte_kelahiran'    => 'form-ppdb/dummy/akte_ahmad.jpg',
                'ijazah'            => 'form-ppdb/dummy/ijazah_ahmad.jpg',
                'pas_foto'          => 'form-ppdb/dummy/foto_ahmad.jpg',
                // Status
                'status_penerimaan' => FormPpdb::STATUS_DITERIMA,
                'status'            => true,
            ],
            [
                // Identitas
                'nik'               => '3174015503090002',
                'nisn'              => '0987654321',
                'nama_lengkap'      => 'Siti Nurhaliza Ramadhani',
                'tempat_lahir'      => 'Tangerang',
                'tanggal_lahir'     => '2009-03-15',
                'no_hp'             => '085678901234',
                'asal_sekolah'      => 'SMP Islam Al-Hikmah Cengkareng',
                'jenis_kelamin'     => 'Perempuan',
                'alamat'            => 'Jl. Semanan Raya No. 45 RT 002/007 Kel. Semanan Kec. Kalideres Jakarta Barat',
                'email'             => 'siti.nurhaliza@gmail.com',
                'jurusan'           => 'IPS',
                'agama'             => 'Islam',
                'anak_ke'           => 2,
                'dari'              => 2,
                'tinggi_badan'      => 158,
                'berat_badan'       => 48,
                // Ortu
                'nama_ayah'         => 'Rahmat Hidayat',
                'nama_ibu'          => 'Dewi Kurniasih',
                'pekerjaan_ayah'    => 'Pegawai Swasta',
                'pekerjaan_ibu'     => 'Guru',
                'no_hp_ortu'        => '089012345678',
                'alamat_ortu'       => 'Jl. Semanan Raya No. 45 RT 002/007 Kel. Semanan Kec. Kalideres Jakarta Barat',
                // Dokumen (placeholder path)
                'kartu_keluarga'    => 'form-ppdb/dummy/kk_siti.jpg',
                'akte_kelahiran'    => 'form-ppdb/dummy/akte_siti.jpg',
                'ijazah'            => 'form-ppdb/dummy/ijazah_siti.jpg',
                'pas_foto'          => 'form-ppdb/dummy/foto_siti.jpg',
                // Status
                'status_penerimaan' => FormPpdb::STATUS_PENDING,
                'status'            => true,
            ],
            [
                // Identitas
                'nik'               => '3174021207100003',
                'nisn'              => '0567891234',
                'nama_lengkap'      => 'Bagas Eko Nugroho',
                'tempat_lahir'      => 'Bekasi',
                'tanggal_lahir'     => '2010-07-12',
                'no_hp'             => '082345678901',
                'asal_sekolah'      => 'SMP Negeri 88 Jakarta Barat',
                'jenis_kelamin'     => 'Laki - Laki',
                'alamat'            => 'Jl. Daan Mogot KM 14 RT 003/005 Kel. Cengkareng Timur Kec. Cengkareng Jakarta Barat',
                'email'             => null,
                'jurusan'           => 'IPA',
                'agama'             => 'Kristen',
                'anak_ke'           => 1,
                'dari'              => 1,
                'tinggi_badan'      => 170,
                'berat_badan'       => 62,
                // Ortu
                'nama_ayah'         => 'Eko Prasetyo',
                'nama_ibu'          => 'Maria Yuliani',
                'pekerjaan_ayah'    => 'TNI',
                'pekerjaan_ibu'     => 'Perawat',
                'no_hp_ortu'        => '081122334455',
                'alamat_ortu'       => 'Jl. Daan Mogot KM 14 RT 003/005 Kel. Cengkareng Timur Kec. Cengkareng Jakarta Barat',
                // Dokumen (placeholder path)
                'kartu_keluarga'    => 'form-ppdb/dummy/kk_bagas.jpg',
                'akte_kelahiran'    => 'form-ppdb/dummy/akte_bagas.jpg',
                'ijazah'            => 'form-ppdb/dummy/ijazah_bagas.jpg',
                'pas_foto'          => 'form-ppdb/dummy/foto_bagas.jpg',
                // Status
                'status_penerimaan' => FormPpdb::STATUS_DITOLAK,
                'status'            => true,
            ],
        ];

        foreach ($data as $row) {
            FormPpdb::query()->updateOrCreate(
                ['nik' => $row['nik']],
                $row
            );
        }
    }
}
