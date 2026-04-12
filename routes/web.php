<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\TentangKamiController;
use App\Http\Controllers\Pages\PpdbController;
>>>>>>> main
use Illuminate\Support\Facades\Route;

// Import Public Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

// Import Guru Controllers
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensi;
use App\Http\Controllers\Guru\NilaiController as GuruNilai;
use App\Http\Controllers\Guru\MuridController as GuruMurid;
use App\Http\Controllers\Guru\JadwalController as GuruJadwal;

// Import Murid Controllers
use App\Http\Controllers\Murid\DashboardController as MuridDashboard;
use App\Http\Controllers\Murid\NilaiController as MuridNilai;
use App\Http\Controllers\Murid\AbsensiController as MuridAbsensi;
use App\Http\Controllers\Murid\PembayaranController as MuridPembayaran; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes - SMA Harapan Jaya
|--------------------------------------------------------------------------
*/

// --- 1. PUBLIC ROUTES ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-sekolah', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});


// --- 2. DASHBOARD GURU ---
Route::prefix('guru')->name('guru.')->group(function () {
    // Beranda & Ringkasan
    Route::get('/dashboard', [GuruDashboard::class, 'index'])->name('dashboard');

    // Manajemen Data Siswa (View Only)
    Route::get('/data-siswa', [GuruMurid::class, 'index'])->name('data-siswa');

    // Fitur Akademik & Jadwal
    Route::get('/jadwal', [GuruJadwal::class, 'index'])->name('jadwal');
    
    // Fitur Nilai (Sisi Guru: Input & Rekap)
    Route::get('/nilai', [GuruNilai::class, 'index'])->name('nilai');
    Route::post('/nilai', [GuruNilai::class, 'store'])->name('nilai.store');

    // Fitur Absensi (Sisi Guru: Input & Rekap)
    Route::get('/absensi', [GuruAbsensi::class, 'index'])->name('absensi');
    Route::post('/absensi', [GuruAbsensi::class, 'store'])->name('absensi.store');
});


// --- 3. DASHBOARD MURID ---
Route::prefix('murid')->name('murid.')->group(function () {
    // Beranda Murid
    Route::get('/dashboard', [MuridDashboard::class, 'index'])->name('dashboard');

    // Laporan Capaian Belajar (Nilai)
    Route::get('/nilai', [MuridNilai::class, 'index'])->name('nilai');

    // Rekap Kehadiran (Absensi)
    Route::get('/absensi', [MuridAbsensi::class, 'index'])->name('absensi');

    // Status Pembayaran SPP (Read-Only) - TERBARU
    Route::get('/pembayaran', [MuridPembayaran::class, 'index'])->name('pembayaran');
});


// --- 4. AUTHENTICATION TEMPORARY ---
Route::post('/logout', function () {
    return redirect('/')->with('success', 'Berhasil keluar sistem.');
})->name('logout');