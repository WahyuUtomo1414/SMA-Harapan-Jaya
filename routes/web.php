<?php

use App\Http\Controllers\BlogController;
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

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
