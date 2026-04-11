# Migration & Model Spec (Laravel 13)

Dokumen ini merangkum requirement migration + model berdasarkan ERD sekolah pada `requirment_dev/erd.png`.

## Aturan Implementasi

1. Nama tabel pakai **singular** (tanpa huruf `s`) sesuai ERD.
2. Nama kolom disamakan dengan diagram.
3. Semua migration memakai pola `baseModelSoftDelete()`.
4. Semua model wajib `use AuditBy` dan `use SoftDeletes`.
5. Jangan pakai `$fillable`; gunakan properti protected yang cukup (`$table`, `$guarded`, dll).
6. Style model mengikuti Laravel 13 (typed relation methods, `casts()` method).

## Base Columns (mengacu `base_table`)

Tambahkan kolom berikut ke setiap tabel (melalui macro `baseModelSoftDelete()`):

- `status` boolean
- `create_by` int nullable
- `updated_by` int nullable
- `deleted_by` int nullable
- `created_at` timestamp nullable
- `update_at` timestamp nullable
- `delete_at` timestamp nullable

Catatan:
- Penamaan `update_at` dan `delete_at` mengikuti ERD apa adanya.
- Jika tim memutuskan konsisten ke `updated_at`/`deleted_at`, buat keputusan itu sebagai deviasi terpisah.

## Daftar Tabel & Kolom

### 1) `sekolah`

- `id` (PK)
- `nama` varchar(128)
- `alamat` varchar(255)
- `no_telepon` varchar(16)
- `nss_npsn` varchar(128)
- `website` varchar(128)
- `email` varchar(128)
- `status_sekolah` varchar(128)
- `waktu_belajar` varchar(255)
- `tahun_berdiri` date
- `luas_tanah_bangunan` varchar(128)
- `status_tanah` varchar(128)
- `no_sertifikat_tanah` varchar(128)
- `status_akreditasi` varchar(128)
- `visi` varchar(255)
- `misi` varchar(255)
- `deskripsi` text
- `logo` varchar(255)
- base columns

### 2) `struktur_organisasi`

- `id` (PK)
- `nama` varchar(255)
- `jabatan` varchar(128)
- `foto` varchar(255)
- `urutan` int
- base columns

### 3) `guru`

- `id` (PK)
- `nama` varchar(255)
- `jenis_kelamin` varchar(128)
- `tempat_lahir` varchar(128)
- `tanggal_lahir` date
- `alamat` varchar(255)
- `tahun_mulai_mengajar` date
- `ijaza` varchar(10)
- `jabatan` varchar(128)
- base columns

Relasi:
- hasOne `kelas` sebagai wali kelas (`kelas.wali_kelas_id`)
- hasMany `jadwal_pelajaran`
- hasMany `absensi`
- hasMany `nilai`

### 4) `kelas`

- `id` (PK)
- `kode` varchar(16)
- `jurusan` varchar(10)
- `wali_kelas_id` (FK -> `guru.id`)
- base columns

Relasi:
- belongsTo `guru` (wali kelas)
- hasMany `murid`
- hasMany `jadwal_pelajaran`

### 5) `murid`

- `id` (PK)
- `kelas_id` (FK -> `kelas.id`)
- `nama` varchar(255)
- `nisn` varchar(128) nullable
- `nis` varchar(128) nullable
- `jenis_kelamin` varchar(128)
- `tempat_lahir` varchar(128)
- `tanggal_lahir` date
- `alamat` varchar(255) nullable
- `email` varchar(128) nullable
- base columns

Relasi:
- belongsTo `kelas`
- hasMany `absensi_detail`
- hasMany `nilai`

### 6) `mata_pelajaran`

- `id` (PK)
- `nama` varchar(128)
- `deskripsi` text nullable
- base columns

Relasi:
- hasMany `jadwal_pelajaran`
- hasMany `nilai`

### 7) `jadwal_pelajaran`

- `id` (PK)
- `mata_pelajaran_id` (FK -> `mata_pelajaran.id`)
- `kelas_id` (FK -> `kelas.id`)
- `guru_id` (FK -> `guru.id`)
- `hari` varchar(10)
- `mulai` time
- `selesai` time
- `deskripsi` text nullable
- base columns

Relasi:
- belongsTo `mata_pelajaran`
- belongsTo `kelas`
- belongsTo `guru`
- hasMany `absensi`

### 8) `absensi`

- `id` (PK)
- `jadwal_pelajaran_id` (FK -> `jadwal_pelajaran.id`)
- `guru_id` (FK -> `guru.id`)
- `tanggal` date
- `deskripsi` text nullable
- base columns

Relasi:
- belongsTo `jadwal_pelajaran`
- belongsTo `guru`
- hasMany `absensi_detail`

### 9) `absensi_detail`

- `id` (PK)
- `absensi_id` (FK -> `absensi.id`)
- `murid_id` (FK -> `murid.id`)
- `status_absen` varchar(128)
- `keterangan` text nullable
- base columns

Relasi:
- belongsTo `absensi`
- belongsTo `murid`

### 10) `nilai`

- `id` (PK)
- `mata_pelajaran_id` (FK -> `mata_pelajaran.id`)
- `guru_id` (FK -> `guru.id`)
- `murid_id` (FK -> `murid.id`)
- `tugas` int
- `uts` int
- `uas` int
- `total_nilai` int
- base columns

Relasi:
- belongsTo `mata_pelajaran`
- belongsTo `guru`
- belongsTo `murid`

### 11) `kategori`

- `id` (PK)
- `nama` varchar(128)
- `deskripsi` text nullable
- base columns

Relasi:
- hasMany `blog`

### 12) `blog`

- `id` (PK)
- `title` varchar(255)
- `slug` varchar(255)
- `kategori_id` (FK -> `kategori.id`)
- `thumbnail` varchar(255)
- `foto` varchar(255)
- `konten` longText
- base columns

Relasi:
- belongsTo `kategori`

### 13) `fasilitas`

- `id` (PK)
- `nama` varchar(128)
- `foto` varchar(255)
- `deskripsi` text nullable
- base columns

### 14) `alur_ppdb`

- `id` (PK)
- `nama` varchar(128)
- `deskripsi` text nullable
- `urutan` int
- base columns

## Urutan Migration yang Disarankan

1. `create_sekolah_table`
2. `create_struktur_organisasi_table`
3. `create_guru_table`
4. `create_kelas_table`
5. `create_murid_table`
6. `create_mata_pelajaran_table`
7. `create_jadwal_pelajaran_table`
8. `create_absensi_table`
9. `create_absensi_detail_table`
10. `create_nilai_table`
11. `create_kategori_table`
12. `create_blog_table`
13. `create_fasilitas_table`
14. `create_alur_ppdb_table`

## Standar Model (Laravel 13)

Setiap model:

- `use HasFactory, AuditBy, SoftDeletes;`
- `protected $table = 'nama_singular';`
- `protected $guarded = [];`
- method `protected function casts(): array`
- relasi dengan return type (`BelongsTo`, `HasMany`, `HasOne`)

Contoh pattern:

```php
<?php

namespace App\Models;

use App\Models\Traits\AuditBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, AuditBy, SoftDeletes;

    protected $table = 'kategori';

    protected $guarded = [];

    protected function casts(): array
    {
        return [];
    }
}
```

## Standar Migration (`baseModelSoftDelete`)

Contoh pola migration:

```php
Schema::create('kategori', function (Blueprint $table) {
    $table->id();
    $table->string('nama', 128);
    $table->text('deskripsi')->nullable();

    $table->baseModelSoftDelete();
});
```

Jika macro `baseModelSoftDelete()` belum ada, definisikan dulu sesuai requirement pada bagian `base_table`.

## Next Step

Setelah dokumen disetujui, lanjut generate:

1. seluruh migration,
2. seluruh model + relasi,
3. optional seeder data master (`sekolah`, `kategori`, `mata_pelajaran`, `alur_ppdb`).
