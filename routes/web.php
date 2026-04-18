<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Murid\DashboardController as MuridDashboardController;

use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\TentangKamiController;
use App\Http\Controllers\Pages\PpdbController;
use App\Http\Controllers\Pages\FormPpdbController;

use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensi;
use App\Http\Controllers\Guru\NilaiController as GuruNilai;
use App\Http\Controllers\Guru\MuridController as GuruMurid;
use App\Http\Controllers\Guru\JadwalController as GuruJadwal;

use App\Http\Controllers\Murid\DashboardController as MuridDashboard;
use App\Http\Controllers\Murid\NilaiController as MuridNilai;
use App\Http\Controllers\Murid\AbsensiController as MuridAbsensi;
use App\Http\Controllers\Murid\PembayaranController as MuridPembayaran;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// =====================
// PUBLIC
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-sekolah', [TentangKamiController::class, 'index'])->name('tentang-kami');

Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');
Route::get('/ppdb/daftar', [FormPpdbController::class, 'create'])->name('ppdb.form');
Route::post('/ppdb/daftar', [FormPpdbController::class, 'store'])->name('ppdb.form.store');

// LOGIN
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// LOGOUT
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// BLOG
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});


// =====================
// GURU
// =====================
Route::prefix('guru')->name('guru.')->middleware(['auth', 'role:guru'])->group(function () {

    Route::get('/dashboard', [GuruDashboard::class, 'index'])->name('dashboard');
    Route::get('/data-siswa', [GuruMurid::class, 'index'])->name('data-siswa');
    Route::get('/jadwal', [GuruJadwal::class, 'index'])->name('jadwal');

    Route::get('/nilai', [GuruNilai::class, 'index'])->name('nilai.index');
    Route::get('/nilai/create', [GuruNilai::class, 'create'])->name('nilai.create');
    Route::post('/nilai', [GuruNilai::class, 'store'])->name('nilai.store');
    Route::get('/nilai/{id}/edit', [GuruNilai::class, 'edit'])->name('nilai.edit');
    Route::put('/nilai/{id}', [GuruNilai::class, 'update'])->name('nilai.update');

    Route::get('/absensi', [GuruAbsensi::class, 'index'])->name('absensi.index');
    Route::get('/absensi/create', [GuruAbsensi::class, 'create'])->name('absensi.create');
    Route::post('/absensi/store', [GuruAbsensi::class, 'store'])->name('absensi.store');
    Route::get('/absensi/{id}/edit', [GuruAbsensi::class, 'edit'])->name('absensi.edit');
    Route::put('/absensi/{id}', [GuruAbsensi::class, 'update'])->name('absensi.update');
});


// =====================
// MURID
// =====================
Route::prefix('murid')->name('murid.')->middleware(['auth', 'role:murid'])->group(function () {

    Route::get('/dashboard', [MuridDashboard::class, 'index'])->name('dashboard');
    Route::get('/nilai', [MuridNilai::class, 'index'])->name('nilai');
    Route::get('/absensi', [MuridAbsensi::class, 'index'])->name('absensi');
    Route::get('/pembayaran', [MuridPembayaran::class, 'index'])->name('pembayaran');
});
