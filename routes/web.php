<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login'); //halaman login
Route::post('login/aksi', [AuthController::class, 'login'])->name('login-aksi'); //login aksi
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); //logout

Route::middleware('auth')->group(function() {
    
    Route::middleware('role:admin|anggota')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/transaksi/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
        Route::post('/transaksi/peminjaman/simpan', [PeminjamanController::class, 'store'])->name('simpan-peminjaman');
        
        Route::get('/transaksi/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
        Route::post('/transaksi/pengembalian/simpan', [PengembalianController::class, 'store'])->name('simpan-pengembalian');
    });

    Route::middleware('role:admin')->group(function() {
        Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
        Route::get('/anggota/buat', [AnggotaController::class, 'create'])->name('buat-anggota');
        Route::post('/anggota/simpan', [AnggotaController::class, 'store'])->name('simpan-anggota');
        Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('edit-anggota');
        Route::post('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('update-anggota');
    
        Route::get('/buku', [BukuController::class, 'index'])->name('buku');
        Route::get('/buku/buat', [BukuController::class, 'create'])->name('buat-buku');
        Route::post('/buku/simpan', [BukuController::class, 'store'])->name('simpan-buku');
        Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('edit-buku');
        Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('update-buku');
        Route::post('/buku/hapus/{id}', [BukuController::class, 'destroy'])->name('hapus-buku');
    });
});