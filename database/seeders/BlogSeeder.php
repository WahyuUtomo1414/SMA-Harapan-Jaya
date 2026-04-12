<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Kategori::all();

        $blogData = [
            'Berita' => [
                [
                    'title' => 'Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027',
                    'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2073&auto=format&fit=crop',
                ],
                [
                    'title' => 'Sosialisasi Kurikulum Merdeka bagi Orang Tua Siswa',
                    'image' => 'https://images.unsplash.com/photo-1524178232363-1fb28f74b0cd?q=80&w=2070&auto=format&fit=crop',
                ],
                [
                    'title' => 'Renovasi Laboratorium Komputer untuk Fasilitas Terbaik',
                    'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=2070&auto=format&fit=crop',
                ],
            ],
            'Kegiatan' => [
                [
                    'title' => 'Latihan Dasar Kepemimpinan Siswa (LDKS) 2026',
                    'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=2070&auto=format&fit=crop',
                ],
                [
                    'title' => 'Festival Seni dan Budaya SMA Harapan Jaya',
                    'image' => 'https://images.unsplash.com/photo-1514525253361-bee8718a7439?q=80&w=1964&auto=format&fit=crop',
                ],
                [
                    'title' => 'Kunjungan Edukasi ke Museum Nasional',
                    'image' => 'https://images.unsplash.com/photo-1503174971373-b1f69850bded?q=80&w=2113&auto=format&fit=crop',
                ],
            ],
            'Prestasi' => [
                [
                    'title' => 'Juara 1 Olimpiade Sains Nasional Bidang Fisika',
                    'image' => 'https://images.unsplash.com/photo-1507413245164-6160d8298b31?q=80&w=2070&auto=format&fit=crop',
                ],
                [
                    'title' => 'Tim Basket Sekolah Meraih Medali Emas di Kejuaraan Daerah',
                    'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=2090&auto=format&fit=crop',
                ],
                [
                    'title' => 'Siswa Kami Terpilih dalam Pertukaran Pelajar ke Jepang',
                    'image' => 'https://images.unsplash.com/photo-1526392060635-9d6019884377?q=80&w=2070&auto=format&fit=crop',
                ],
            ],
            'Akademik' => [
                [
                    'title' => 'Cara Efektif Belajar untuk Menghadapi Ujian Akhir',
                    'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=2070&auto=format&fit=crop',
                ],
                [
                    'title' => 'Menjaga Kesehatan Mental di Lingkungan Sekolah',
                    'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=2020&auto=format&fit=crop',
                ],
                [
                    'title' => 'Pentingnya Literasi Digital bagi Generasi Muda',
                    'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop',
                ],
            ],
        ];

        foreach ($blogData as $catName => $blogs) {
            $category = $categories->where('nama', $catName)->first();
            if ($category) {
                foreach ($blogs as $blog) {
                    Blog::create([
                        'title' => $blog['title'],
                        'slug' => Str::slug($blog['title']),
                        'kategori_id' => $category->id,
                        'thumbnail' => $blog['image'],
                        'foto' => $blog['image'],
                        'konten' => '<p>' . $blog['title'] . ' adalah salah satu momen penting bagi SMA Harapan Jaya. Artikel ini membahas detail mengenai kegiatan tersebut, dampaknya bagi siswa, serta harapan sekolah ke depannya.</p><p>Setiap program yang kami jalankan dirancang untuk memberikan pengalaman belajar yang bermakna dan relevan dengan tantangan zaman.</p>',
                        'status' => true,
                    ]);
                }
            }
        }
    }
}
