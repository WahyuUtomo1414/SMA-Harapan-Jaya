<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Blog::truncate();
        Kategori::truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [
            ['nama' => 'Berita', 'deskripsi' => 'Informasi dan pengumuman resmi sekolah.'],
            ['nama' => 'Kegiatan', 'deskripsi' => 'Aktivitas harian dan ekstrakurikuler siswa.'],
            ['nama' => 'Prestasi', 'deskripsi' => 'Pencapaian gemilang siswa SMA Harapan Jaya.'],
            ['nama' => 'Akademik', 'deskripsi' => 'Informasi seputar kurikulum dan pembelajaran.'],
        ];

        foreach ($categories as $category) {
            Kategori::create(array_merge($category, ['status' => true]));
        }
    }
}
