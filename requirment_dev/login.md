# Login & Role Dashboard - SMA Harapan Jaya

Dokumen ini menjadi rancangan awal mekanisme login custom untuk website SMA Harapan Jaya. Halaman login dibuat sendiri di frontend Laravel, tetapi proses autentikasi tetap memakai sistem auth yang sama dengan Filament.

## 1) Konsep Utama

- Halaman login Filament yang sekarang tetap ada dan tetap bisa diakses oleh admin.
- Website punya halaman login custom sendiri untuk semua role: admin, guru, dan murid.
- Backend autentikasi tetap memakai guard Laravel yang dipakai Filament, yaitu `web`.
- Role dipakai sebagai penentu arah setelah login:
    - `super_admin` masuk ke panel Filament yang sekarang.
    - `guru` masuk ke dashboard guru.
    - `murid` masuk ke dashboard murid.
- User yang tidak punya role valid tidak boleh masuk dashboard mana pun.

## 2) Catatan Role Project Saat Ini

Project saat ini sudah memakai Spatie Permission dan Filament Shield.

Role yang dipakai project:

```php
super_admin
guru
murid
```

Role `super_admin` adalah role admin untuk panel Filament. Secara tampilan UI boleh tetap disebut "Admin", tetapi pengecekan akses di kode harus menggunakan role `super_admin`.

## 3) Alur Login Custom

Alur dari halaman login website:

1. User membuka `/login`.
2. User mengisi email dan password.
3. Controller menjalankan validasi input.
4. Sistem melakukan attempt login menggunakan `Auth::attempt()`.
5. Jika gagal, user kembali ke halaman login dengan pesan error.
6. Jika berhasil, session diregenerasi.
7. Sistem membaca role user.
8. User diarahkan sesuai role:
    - `super_admin` ke `/admin`.
    - `guru` ke `/guru/dashboard`.
    - `murid` ke `/murid/dashboard`.

Contoh konsep redirect:

```php
return match (true) {
    $user->hasRole('super_admin') => redirect()->intended('/admin'),
    $user->hasRole('guru') => redirect()->intended('/guru/dashboard'),
    $user->hasRole('murid') => redirect()->intended('/murid/dashboard'),
    default => abort(403),
};
```

## 4) Posisi Login Filament

Login Filament tetap aktif melalui konfigurasi panel:

```php
->id('admin')
->path('admin')
->login()
```

Artinya route Filament tetap tersedia:

```text
/admin/login
```

Halaman ini hanya dipakai untuk admin/pengelola panel. Guru dan murid tidak diarahkan ke halaman login Filament.

## 5) Akses Panel Filament

Admin tetap menggunakan panel Filament yang sudah ada di:

```text
/admin
```

Akses ke panel harus dibatasi berdasarkan role. User dengan role `guru` dan `murid` tidak boleh masuk ke panel Filament walaupun berhasil login.

Konsep pembatasan dilakukan di model `User` melalui akses panel Filament, atau tetap mengikuti mekanisme Filament Shield jika sudah cukup.

Contoh konsep eksplisit:

```php
public function canAccessPanel(Panel $panel): bool
{
    return $this->hasRole('super_admin');
}
```

## 6) Dashboard Guru

Dashboard guru dibuat terpisah dari Filament.

Route awal:

```text
/guru/dashboard
```

Middleware:

```php
auth
role:guru
```

Fitur awal dashboard guru bisa diarahkan ke kebutuhan akademik:

- Melihat jadwal mengajar.
- Mengelola atau melihat absensi sesuai guru login.
- Mengelola atau melihat nilai sesuai guru login.
- Melihat data kelas dan mata pelajaran yang terkait.

## 7) Dashboard Murid

Dashboard murid dibuat terpisah dari Filament.

Route awal:

```text
/murid/dashboard
```

Middleware:

```php
auth
role:murid
```

Fitur awal dashboard murid bisa diarahkan ke kebutuhan siswa:

- Melihat jadwal pelajaran.
- Melihat riwayat absensi pribadi.
- Melihat nilai pribadi.
- Melihat informasi kelas.

## 8) Struktur Route yang Disarankan

```php
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    });

Route::middleware(['auth', 'role:murid'])
    ->prefix('murid')
    ->name('murid.')
    ->group(function () {
        Route::get('/dashboard', [MuridDashboardController::class, 'index'])->name('dashboard');
    });
```

## 9) Struktur View yang Disarankan

```text
resources/views/
├── auth/
│   └── login.blade.php
├── pages/
│   ├── guru/
│   │   └── dashboard.blade.php
│   └── murid/
│       └── dashboard.blade.php
```

Halaman login custom sebaiknya tetap mengikuti standar frontend di `requirment_dev/frontend.md`, yaitu memakai layout utama dan Tailwind theme project.

## 10) Validasi & Keamanan

- Gunakan validasi email dan password wajib.
- Gunakan `Auth::attempt()` untuk login.
- Jalankan `$request->session()->regenerate()` setelah login berhasil.
- Jalankan `Auth::logout()` saat logout.
- Jalankan `$request->session()->invalidate()` dan `$request->session()->regenerateToken()` saat logout.
- Gunakan middleware `guest` untuk halaman login.
- Gunakan middleware `auth` untuk dashboard.
- Gunakan middleware role untuk memisahkan akses guru dan murid.
- User yang sudah login dan membuka `/login` diarahkan ke dashboard sesuai role.

## 11) Checklist Implementasi

- [ ] Buat halaman login custom di `/login`.
- [ ] Buat controller login untuk `create`, `store`, dan `destroy`.
- [ ] Login custom memakai guard `web` yang sama dengan Filament.
- [ ] Redirect setelah login berdasarkan role.
- [ ] Super admin diarahkan ke `/admin`.
- [ ] Guru diarahkan ke `/guru/dashboard`.
- [ ] Murid diarahkan ke `/murid/dashboard`.
- [ ] Guru dan murid tidak bisa akses panel Filament.
- [ ] Dashboard guru dibuat dengan middleware `auth` dan `role:guru`.
- [ ] Dashboard murid dibuat dengan middleware `auth` dan `role:murid`.
- [ ] Logout tersedia untuk semua role.
- [ ] Pengecekan akses admin memakai role `super_admin`.
