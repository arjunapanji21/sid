<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataWargaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/registrasi', [PageController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi/submit', [PageController::class, 'registrasi_submit'])->name('registrasi_submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/data-warga/baru/simpan', [DataWargaController::class, 'upload_data_warga'])->name('upload_data_warga');

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');
    Route::get('/pengajuan-surat', [PageController::class, 'pengajuan_surat'])->name('pengajuan_surat');
    Route::get('/pengajuan-surat/{id}/show', [PageController::class, 'show_pengajuan_surat'])->name('show_pengajuan_surat');
    Route::get('/pengajuan-surat/baru', [PageController::class, 'buat_surat'])->name('buat_surat');
    Route::get('/pengajuan-surat/arsip', [PageController::class, 'arsip'])->name('arsip');
    Route::get('/informasi', [PageController::class, 'informasi_desa'])->name('informasi_desa');
    Route::get('/informasi/show/{id}', [PageController::class, 'lihat_informasi_desa'])->name('lihat_informasi_desa');
    Route::get('/informasi/baru', [PageController::class, 'tambah_informasi_desa'])->name('tambah_informasi_desa');
    Route::post('/informasi/baru/submit', [PageController::class, 'submit_informasi_desa'])->name('submit_informasi_desa');
    Route::get('/informasi/{id}/ubah', [PageController::class, 'ubah_informasi_desa'])->name('ubah_informasi_desa');
    Route::post('/informasi/{id}/ubah/submit', [PageController::class, 'update_informasi_desa'])->name('update_informasi_desa');
    Route::get('/informasi/{id}/hapus', [PageController::class, 'hapus_informasi_desa'])->name('hapus_informasi_desa');
    Route::get('/data-warga', [PageController::class, 'data_warga'])->name('data_warga');
    Route::get('/data-warga/lihat/{id}', [DataWargaController::class, 'lihat_data_warga'])->name('lihat_data_warga');
    Route::post('/data-warga/lihat/{id}/update', [DataWargaController::class, 'update_data_warga'])->name('update_data_warga');
    Route::get('/data-warga/lihat/{id}/hapus', [DataWargaController::class, 'hapus_data_warga'])->name('hapus_data_warga');
    Route::get('/data-warga/baru', [PageController::class, 'tambah_data_warga'])->name('tambah_data_warga');
    Route::get('/data-surat', [PageController::class, 'data_surat'])->name('data_surat');
    Route::get('/data-pengguna', [PageController::class, 'data_pengguna'])->name('data_pengguna');

    Route::post('/surat/pengajuan-surat/baru/simpan', [SuratController::class, 'simpan_pengajuan_surat'])->name('simpan_pengajuan_surat');
    Route::get('/surat/pengajuan-surat/{id}/hapus', [SuratController::class, 'hapus_pengajuan_surat'])->name('hapus_pengajuan_surat');
});