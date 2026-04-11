# Setup Filament Resource (Laravel 13) - SMA Harapan Jaya

Dokumen ini jadi standar pembuatan Resource Filament untuk model project ini.

## 1) Generate Resource

Gunakan command berikut untuk men-generate resource dasar. Gunakan flag `--generate` untuk auto-form/table dan `--soft-deletes` karena semua model menggunakan trait soft delete.

```bash
# Data Sekolah
php artisan make:filament-resource Sekolah --generate --soft-deletes
php artisan make:filament-resource StrukturOrganisasi --generate --soft-deletes
php artisan make:filament-resource Fasilitas --generate --soft-deletes
php artisan make:filament-resource AlurPpdb --generate --soft-deletes

# Akademik
php artisan make:filament-resource Guru --generate --soft-deletes
php artisan make:filament-resource Murid --generate --soft-deletes
php artisan make:filament-resource Kelas --generate --soft-deletes
php artisan make:filament-resource MataPelajaran --generate --soft-deletes
php artisan make:filament-resource JadwalPelajaran --generate --soft-deletes

# Transaksi / Record
php artisan make:filament-resource Absensi --generate --soft-deletes
php artisan make:filament-resource Nilai --generate --soft-deletes

# Konten Web
php artisan make:filament-resource Kategori --generate --soft-deletes
php artisan make:filament-resource Blog --generate --soft-deletes
```

## 2) Standar Rapih Form

Setelah generate, rapikan form dengan aturan ini:

- **Hapus field audit** dari form: `created_by`, `updated_by`, `deleted_by`.
- **Field relasi**: Gunakan label manusiawi, bukan `id`. Gunakan `preload()` dan `searchable()`.
- **Field Gambar (Logo, Thumbnail, Foto, dll)**: 
    - Gunakan `FileUpload::make('nama_field')`.
    - Wajib tambahkan `->image()`.
    - Wajib tambahkan `->disk('public')`.
    - Wajib tambahkan `->directory('nama_table')` sesuai konteks model.
- **Field Status**: Gunakan `Select` dengan opsi Active (true) / Non Active (false).

Contoh implementasi Form:
```php
// Contoh untuk Logo/Thumbnail/Foto
FileUpload::make('logo') // atau 'thumbnail', 'foto'
    ->image()
    ->disk('public')
    ->directory('sekolah') // sesuaikan dengan nama table
    ->required(),

// Select Status
Select::make('status')
    ->options([
        true => 'Active',
        false => 'Non Active',
    ])
    ->native(false)
    ->required(),
```

## 3) Standar Kolom Table

Tampilkan data dengan rapi menggunakan badge dan image preview:

```php
// Preview Gambar (Logo/Thumbnail/Foto)
Tables\Columns\ImageColumn::make('logo') // atau 'thumbnail', 'foto'
    ->disk('public')
    ->circular(),

// Status Badge
Tables\Columns\TextColumn::make('status')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        '1' => 'success',
        '0' => 'danger',
        default => 'gray',
    })
    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Active' : 'Non Active'),

// Kolom Audit (Letakkan di akhir table)
Tables\Columns\TextColumn::make('createdBy.name')
    ->label('Dibuat Oleh')
    ->badge()
    ->description(fn ($record) => $record->created_at?->format('d M Y H:i'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),
```

## 4) Standar Label & Grouping

Setiap Resource wajib mengatur properti berikut agar navigasi rapi dan konsisten (bahasa Indonesia):

```php
protected static ?string $navigationGroup = 'Master Data';

protected static ?string $navigationLabel = 'Nama Model';

protected static ?string $modelLabel = 'Nama Model';

protected static ?string $pluralModelLabel = 'Nama Model';

protected static ?string $recordTitleAttribute = 'nama';
```

**Pembagian Grup Navigasi:**
- `Data Sekolah`: Sekolah, Struktur Organisasi, Fasilitas, Alur PPDB.
- `Akademik`: Guru, Murid, Kelas, Mata Pelajaran, Jadwal Pelajaran.
- `Penilaian`: Absensi, Nilai.
- `Manajemen Web`: Kategori, Blog.

## 5) Checklist Selesai

- [ ] Resource berhasil tergenerate dengan `--soft-deletes`.
- [ ] Form tidak menampilkan field audit (`created_by`, dst).
- [ ] Semua field gambar (logo, thumbnail, foto) menggunakan `FileUpload` disk `public`.
- [ ] Field `status` menggunakan `Select` (Active/Non Active).
- [ ] Table sudah punya 3 kolom audit relasi user (hidden by default).
- [ ] Label di menu dan model sudah diatur (Singular/Manual).
- [ ] Grup navigasi sudah disesuaikan.
- [ ] Soft delete filter dan action tetap aktif.
