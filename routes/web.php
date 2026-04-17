<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Murid\DashboardController as MuridDashboardController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\TentangKamiController;
use App\Http\Controllers\Pages\PpdbController;
use App\Http\Controllers\Pages\FormPpdbController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-sekolah', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');
Route::get('/ppdb/daftar', [FormPpdbController::class, 'create'])->name('ppdb.form');
Route::post('/ppdb/daftar', [FormPpdbController::class, 'store'])->name('ppdb.form.store');

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

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
