<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes with authentication
Route::middleware(['auth'])->group(function () {

    // Dashboard (Admin & Super Admin only)
    Route::middleware(['role:admin,super admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Barang Management
        Route::resource('barang', BarangController::class);

        // Konfirmasi Peminjaman
        Route::get('/peminjaman/konfirmasi', [PeminjamanController::class, 'konfirmasi'])->name('peminjaman.konfirmasi');
        Route::post('/peminjaman/approve/{id}', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
        Route::post('/peminjaman/reject/{id}', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');

        // Konfirmasi Pengembalian
        Route::get('/pengembalian/konfirmasi', [PengembalianController::class, 'konfirmasi'])->name('pengembalian.konfirmasi');
        Route::post('/pengembalian/approve/{id}', [PengembalianController::class, 'approve'])->name('pengembalian.approve');
        Route::post('/pengembalian/reject/{id}', [PengembalianController::class, 'reject'])->name('pengembalian.reject');

        // User Management
        Route::resource('users', UserController::class);
    });

    // Admin Management (Super Admin only)
    Route::middleware(['role:super admin'])->group(function () {
        Route::resource('admins', AdminController::class);
    });

    // Beranda (User only)
    Route::middleware(['role:user'])->group(function () {
        Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    });

    // Peminjaman (All authenticated users)
    Route::resource('peminjaman', PeminjamanController::class);

    // Pengembalian
    Route::resource('pengembalian', PengembalianController::class);
    Route::post('/pengembalian/kembalikan/{id}', [PengembalianController::class, 'kembalikan'])->name('pengembalian.kembalikan');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
