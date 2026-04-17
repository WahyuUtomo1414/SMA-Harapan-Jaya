<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $fasilitas = [
            [
                'nama' => 'Laboratorium Komputer',
                'foto' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80&w=800',
                'deskripsi' => 'Fasilitas komputer modern untuk mendukung pembelajaran IT.',
                'status' => true,
            ],
            [
                'nama' => 'Perpustakaan Digital',
                'foto' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&q=80&w=800',
                'deskripsi' => 'Koleksi buku fisik dan digital lengkap untuk referensi belajar.',
                'status' => true,
            ],
            [
                'nama' => 'Lapangan Olahraga',
                'foto' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&q=80&w=800',
                'deskripsi' => 'Lapangan basket dan voli untuk kegiatan olahraga siswa.',
                'status' => true,
            ],
            [
                'nama' => 'Laboratorium Sains',
                'foto' => 'https://images.unsplash.com/photo-1532187863486-abf9d397601f?auto=format&fit=crop&q=80&w=800',
                'deskripsi' => 'Laboratorium biologi, fisika, dan kimia lengkap.',
                'status' => true,
            ],
            [
                'nama' => 'Aula Serbaguna',
                'foto' => 'https://images.unsplash.com/photo-1517457373958-b7bdd458ad20?auto=format&fit=crop&q=80&w=800',
                'deskripsi' => 'Gedung pertemuan untuk kegiatan seni dan acara sekolah.',
                'status' => true,
            ],
            [
                'nama' => 'Kantin Sehat',
                'foto' => 'https://images.unsplash.com/photo-1567529684892-09290a1b2d05?auto=format&fit=crop&q=80&w=800',
                'deskripsi' => 'Pilihan makanan bergizi untuk mendukung kesehatan siswa.',
                'status' => true,
            ],
        ];

        foreach ($fasilitas as $item) {
            Fasilitas::create($item);
        }
    }
}
