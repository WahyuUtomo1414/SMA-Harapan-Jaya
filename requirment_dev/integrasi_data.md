# Integrasi Data FAQ ke Halaman Home

Dokumen ini menjelaskan alur integrasi data FAQ ke section:

- `resources/views/sections/home/faq.blade.php`

dengan menyesuaikan struktur project yang **sudah ada sekarang**.

## 0) Sumber Data (Sesuai Resource Saat Ini)

Saat ini project **belum memiliki**:
- `app/Models/Faq.php`
- `FaqResource`
- tabel `faq`

Maka data FAQ diambil dari resource yang sudah tersedia:
- `BlogResource` (`app/Filament/Resources/Blogs/BlogResource.php`)
- `KategoriResource` (`app/Filament/Resources/Kategoris/KategoriResource.php`)

Strategi:
- Buat kategori bernama `FAQ`.
- Isi pertanyaan/jawaban dari data `blog`:
  - `title` sebagai pertanyaan.
  - `konten` sebagai jawaban.
- Tampilkan hanya data dengan:
  - `blog.status = true`
  - `kategori.status = true`
  - `kategori.nama = 'FAQ'`

## 1) Controller

Update `HomeController@index` untuk kirim data `faqs` ke `pages.home`.
Semua query dan transformasi data dikerjakan di controller (bukan di Blade).

## 2) Rule Blade (Wajib)

Di file Blade, **jangan pakai kode PHP mentah**:
- Dilarang: `<?php ... ?>`
- Dilarang: query database langsung di Blade
- Dilarang: logic bisnis di Blade

Blade hanya untuk presentasi:
- Boleh directive Blade (`@if`, `@foreach`, `@forelse`, dll)
- Boleh output data (`{{ ... }}`)
- Boleh pemformatan ringan untuk tampilan

## 3) View Section FAQ

Section FAQ harus dinamis memakai data `faqs` yang dikirim dari controller:
- loop data FAQ
- tampilkan fallback “FAQ belum tersedia” jika kosong

## 4) Data Admin (Filament)

Input FAQ dilakukan dari admin Filament yang sudah ada:
1. Buka `Kategori` dan buat kategori `FAQ` (status Active).
2. Buka `Blog` dan isi:
   - `title` = pertanyaan
   - `konten` = jawaban
   - `kategori` = FAQ
   - `status` = Active

## 5) Checklist

- Tidak ada model/resource/tabel `faq` baru, tetap pakai struktur existing.
- Data FAQ bersumber dari `blog` + `kategori`.
- Filter active diterapkan di controller.
- `HomeController` mengirim variabel `faqs` ke `pages.home`.
- `sections/home/faq.blade.php` render dinamis.
- Tidak ada kode PHP mentah di Blade.
