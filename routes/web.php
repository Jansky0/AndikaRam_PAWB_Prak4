<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\JalanSafeController;

Route::get('/', function () {
    return redirect()->route('laporan.index');
});

// Materi Praktikum Modul 4 (Mahasiswa)
Route::get('/form', [MahasiswaController::class, 'form'])->name('mahasiswa.form');
Route::post('/simpan', [MahasiswaController::class, 'simpan'])->name('mahasiswa.simpan');
Route::get('/daftar-mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

// Tugas Praktikum Modul 4 Poin 1 (LaporBanjir - Database MySQL)
Route::get('/laporan', [DataController::class, 'index'])->name('laporan.index');
Route::get('/formbanjir', [DataController::class, 'formbanjir'])->name('laporan.form');
Route::post('/prosesbanjir', [DataController::class, 'prosesbanjir'])->name('laporan.store');
Route::get('/konfirmasi', [DataController::class, 'konfirmasi'])->name('laporan.confirmation');

// Tugas Praktikum Modul 4 Poin 2 & 3 (Tugas Akhir: JalanSafe)
Route::get('/jalansafe', [JalanSafeController::class, 'index'])->name('jalansafe.index');
