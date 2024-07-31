<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');
    Route::get('/pengajuan-surat', [PageController::class, 'pengajuan_surat'])->name('pengajuan_surat');
    Route::get('/pengajuan-surat/baru', [PageController::class, 'buat_surat'])->name('buat_surat');
    Route::get('/pengajuan-surat/arsip', [PageController::class, 'arsip'])->name('arsip');
    Route::get('/informasi', [PageController::class, 'informasi_desa'])->name('informasi_desa');
    Route::get('/data-warga', [PageController::class, 'data_warga'])->name('data_warga');
    Route::get('/data-warga/lihat/{id}', [DataWargaController::class, 'lihat_data_warga'])->name('lihat_data_warga');
    Route::post('/data-warga/lihat/{id}/update', [DataWargaController::class, 'update_data_warga'])->name('update_data_warga');
    Route::get('/data-warga/baru', [PageController::class, 'tambah_data_warga'])->name('tambah_data_warga');
    Route::post('/data-warga/baru/simpan', [DataWargaController::class, 'upload_data_warga'])->name('upload_data_warga');
    Route::get('/data-surat', [PageController::class, 'data_surat'])->name('data_surat');
    Route::get('/data-pengguna', [PageController::class, 'data_pengguna'])->name('data_pengguna');
});