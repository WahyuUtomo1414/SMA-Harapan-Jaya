<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardGuru\DashboardController as GuruDashboard;
use App\Http\Controllers\DashboardMurid\DashboardController as MuridDashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-sekolah', [HomeController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/ppdb', [HomeController::class, 'ppdb'])->name('ppdb');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});


Route::get('/dashboard-guru', [GuruDashboard::class, 'index']);
Route::get('/dashboard-murid', [MuridDashboard::class, 'index']);
