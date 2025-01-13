<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('masyarakat', MasyarakatController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('petugas', PetugasController::class)->parameters([
    'petugas' => 'petugas'
]);
Route::resource('tanggapan', TanggapanController::class);

Route::resource('barang', BarangController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
