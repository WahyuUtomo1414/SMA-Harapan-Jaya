# Integrasi Data Dashboard Guru & Murid

Dokumen ini menjadi kontrak integrasi data antara backend Laravel/Filament dan dashboard guru/murid yang dikerjakan terpisah. Fokus dokumen ini adalah data apa yang boleh muncul berdasarkan user yang sedang login.

## 1) Konsep Utama

- Filament tetap menjadi panel admin untuk role `super_admin`.
- Dashboard guru dan dashboard murid berada di frontend terpisah dari Filament.
- Autentikasi tetap memakai guard `web` yang sama dengan Filament.
- Hak akses data dashboard ditentukan dari role dan relasi profil di tabel `users`.
- Dashboard tidak boleh menerima `guru_id` atau `murid_id` dari request sebagai sumber kebenaran.
- Backend harus mengambil `guru_id` atau `murid_id` dari `auth()->user()`.

## 2) Mapping User ke Profil

Tabel `users` sudah punya kolom:

```text
guru_id nullable
murid_id nullable
```

Relasi model:

```php
User belongsTo Guru
User belongsTo Murid
Guru hasOne User
Murid hasOne User
```

Aturan mapping:

- User role `guru` wajib punya `guru_id`.
- User role `murid` wajib punya `murid_id`.
- User role `super_admin` tidak wajib punya `guru_id` atau `murid_id`.
- User role `guru` tidak boleh membaca data guru lain.
- User role `murid` tidak boleh membaca data murid lain.

Jika user login tetapi relasi profilnya kosong, dashboard harus menampilkan state error yang jelas, misalnya:

```text
Akun belum terhubung dengan data guru/murid. Hubungi admin sekolah.
```

## 3) Data Dashboard Murid

Dashboard murid hanya boleh membaca data berdasarkan:

```php
$murid = auth()->user()->murid;
```

Data yang boleh tampil:

- Profil murid login.
- Kelas murid login.
- SPP milik murid login.
- Nilai milik murid login.
- Absensi detail milik murid login.

### Query SPP Murid

```php
Spp::query()
    ->with(['kelas'])
    ->where('murid_id', auth()->user()->murid_id)
    ->orderByDesc('tahun')
    ->orderByDesc('bulan')
    ->get();
```

Status bayar SPP hanya:

```text
lunas
belum_lunas
```

Label UI:

```text
Lunas
Belum Lunas
```

### Query Nilai Murid

```php
Nilai::query()
    ->with(['mataPelajaran', 'guru'])
    ->where('murid_id', auth()->user()->murid_id)
    ->get();
```

Data nilai yang boleh tampil:

- Mata pelajaran.
- Guru pengajar.
- Tugas.
- UTS.
- UAS.
- Total nilai.

### Query Absensi Murid

Absensi murid diambil dari `absensi_detail`, bukan langsung dari `absensi`.

```php
AbsensiDetail::query()
    ->with([
        'absensi.jadwalPelajaran.mataPelajaran',
        'absensi.jadwalPelajaran.kelas',
        'absensi.guru',
    ])
    ->where('murid_id', auth()->user()->murid_id)
    ->get();
```

Data absensi yang boleh tampil:

- Tanggal absensi.
- Mata pelajaran.
- Kelas.
- Guru.
- Status/detail kehadiran jika field tersedia.

Catatan: saat ini struktur `absensi_detail` belum terlihat punya field status kehadiran spesifik seperti `hadir`, `izin`, `sakit`, atau `alpa`. Kalau dashboard butuh status kehadiran detail, perlu ditambahkan kolom khusus di tabel `absensi_detail`.

## 4) Data Dashboard Guru

Dashboard guru hanya boleh membaca data berdasarkan:

```php
$guru = auth()->user()->guru;
```

Data yang boleh tampil:

- Profil guru login.
- Jadwal pelajaran yang dia ajar.
- Kelas yang dia ajar berdasarkan tabel `jadwal_pelajaran`.
- Mata pelajaran yang dia ajar berdasarkan tabel `jadwal_pelajaran`.
- Absensi yang dibuat/diampu guru tersebut.
- Nilai yang dibuat/diampu guru tersebut.

### Query Jadwal Guru

```php
JadwalPelajaran::query()
    ->with(['kelas', 'mataPelajaran'])
    ->where('guru_id', auth()->user()->guru_id)
    ->orderBy('hari')
    ->orderBy('mulai')
    ->get();
```

Data jadwal yang boleh tampil:

- Hari.
- Jam mulai.
- Jam selesai.
- Kelas.
- Mata pelajaran.
- Deskripsi.

### Query Kelas yang Diajar Guru

Kelas guru tidak diambil dari wali kelas saja. Kelas guru harus diambil dari jadwal pelajaran.

```php
Kelas::query()
    ->whereHas('jadwalPelajaran', function ($query) {
        $query->where('guru_id', auth()->user()->guru_id);
    })
    ->get();
```

### Query Mata Pelajaran yang Diajar Guru

```php
MataPelajaran::query()
    ->whereHas('jadwalPelajaran', function ($query) {
        $query->where('guru_id', auth()->user()->guru_id);
    })
    ->get();
```

Catatan: model `MataPelajaran` perlu punya relasi `jadwalPelajaran()` jika query ini akan dipakai langsung.

### Query Murid yang Diajar Guru

Murid yang boleh tampil untuk guru adalah murid dari kelas yang ada di jadwal guru.

```php
Murid::query()
    ->with('kelas')
    ->whereHas('kelas.jadwalPelajaran', function ($query) {
        $query->where('guru_id', auth()->user()->guru_id);
    })
    ->get();
```

Query ini bergantung pada relasi:

```php
Murid belongsTo Kelas
Kelas hasMany JadwalPelajaran
```

### Query Absensi Guru

```php
Absensi::query()
    ->with(['jadwalPelajaran.kelas', 'jadwalPelajaran.mataPelajaran', 'absensiDetail.murid'])
    ->where('guru_id', auth()->user()->guru_id)
    ->orderByDesc('tanggal')
    ->get();
```

Guru hanya boleh melihat/mengelola absensi dengan `guru_id` miliknya.

### Query Nilai Guru

```php
Nilai::query()
    ->with(['murid.kelas', 'mataPelajaran'])
    ->where('guru_id', auth()->user()->guru_id)
    ->get();
```

Guru hanya boleh melihat/mengelola nilai dengan `guru_id` miliknya.

## 5) Route & Controller yang Disarankan

Route dashboard saat ini:

```text
/guru/dashboard
/murid/dashboard
```

Route data bisa dibuat sebagai halaman Blade biasa atau endpoint JSON. Untuk integrasi frontend dashboard yang dikerjakan terpisah, endpoint JSON lebih fleksibel.

Contoh route:

```php
Route::middleware(['auth', 'role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/data', [GuruDashboardDataController::class, 'index'])->name('dashboard.data');
    });

Route::middleware(['auth', 'role:murid'])
    ->prefix('murid')
    ->name('murid.')
    ->group(function () {
        Route::get('/dashboard', [MuridDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/data', [MuridDashboardDataController::class, 'index'])->name('dashboard.data');
    });
```

## 6) Format Response yang Disarankan

### Response Murid

```json
{
  "profile": {},
  "kelas": {},
  "spp": [],
  "nilai": [],
  "absensi": []
}
```

### Response Guru

```json
{
  "profile": {},
  "jadwal": [],
  "kelas": [],
  "mata_pelajaran": [],
  "murid": [],
  "absensi": [],
  "nilai": []
}
```

## 7) Scope Query Wajib

Setiap query dashboard wajib dimulai dari user login.

Valid:

```php
auth()->user()->murid_id
auth()->user()->guru_id
```

Tidak valid:

```php
$request->murid_id
$request->guru_id
Murid::all()
Guru::all()
Spp::all()
Nilai::all()
Absensi::all()
```

Query all-data hanya boleh dipakai di Filament untuk `super_admin`, bukan dashboard guru/murid.

## 8) Validasi Akses Detail Record

Jika dashboard nanti punya halaman detail, backend tetap harus validasi ownership.

Contoh detail SPP murid:

```php
Spp::query()
    ->where('murid_id', auth()->user()->murid_id)
    ->findOrFail($sppId);
```

Contoh detail nilai guru:

```php
Nilai::query()
    ->where('guru_id', auth()->user()->guru_id)
    ->findOrFail($nilaiId);
```

## 9) Checklist Implementasi

- [ ] Pastikan semua user role `guru` punya `guru_id`.
- [ ] Pastikan semua user role `murid` punya `murid_id`.
- [ ] Buat data controller untuk dashboard guru.
- [ ] Buat data controller untuk dashboard murid.
- [ ] Dashboard murid hanya membaca data berdasarkan `auth()->user()->murid_id`.
- [ ] Dashboard guru hanya membaca data berdasarkan `auth()->user()->guru_id`.
- [ ] SPP murid hanya menampilkan record milik murid login.
- [ ] Nilai murid hanya menampilkan record milik murid login.
- [ ] Absensi murid hanya menampilkan `absensi_detail` milik murid login.
- [ ] Jadwal guru hanya menampilkan `jadwal_pelajaran` milik guru login.
- [ ] Kelas dan mata pelajaran guru diambil dari `jadwal_pelajaran`.
- [ ] Tidak ada endpoint dashboard yang menerima `guru_id` atau `murid_id` bebas dari request.
- [ ] Jika relasi profil user kosong, tampilkan state error yang jelas.
