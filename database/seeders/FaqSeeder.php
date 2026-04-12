<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'pertanyaan' => 'Bagaimana prosedur pendaftaran siswa baru?',
                'jawaban' => 'Prosedur pendaftaran dapat dilakukan secara online melalui portal PPDB kami atau datang langsung ke sekretariat pendaftaran di kampus utama pada jam kerja (08:00 - 15:00).',
                'status' => true,
            ],
            [
                'pertanyaan' => 'Apakah tersedia beasiswa untuk siswa berprestasi?',
                'jawaban' => 'Ya, kami menyediakan berbagai jalur beasiswa mulai dari beasiswa akademik, non-akademik (seni & olahraga), hingga bantuan finansial bagi keluarga yang membutuhkan.',
                'status' => true,
            ],
            [
                'pertanyaan' => 'Fasilitas apa saja yang mendukung pembelajaran digital?',
                'jawaban' => 'Seluruh ruang kelas dilengkapi dengan smart board, akses Wi-Fi berkecepatan tinggi, laboratorium komputer multimedia, serta sistem manajemen pembelajaran (LMS) berbasis cloud.',
                'status' => true,
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
