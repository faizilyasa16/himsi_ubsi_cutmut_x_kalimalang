<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Acara\KategoriController;
use App\Http\Controllers\Acara\KegiatanController;
use App\Http\Controllers\Gallery\AlbumController;
use App\Http\Controllers\Gallery\KontenController;
use App\Http\Controllers\PemilihanUmum\KandidatController;
use App\Http\Controllers\PemilihanUmum\PemilihanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Absensi\AbsensiController;
use App\Http\Controllers\Absensi\KegiatanController as AbsensiKegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KesanPesanController;
use App\Http\Controllers\Absensi\AbsenUserController;
use App\Http\Controllers\Acara\AcaraController;
use App\Http\Controllers\PemilihanUmum\VotingController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\ProfileHimsiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\StrukturController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/pengurus',[ProfileHimsiController::class, 'pengurus'])->name('pengurus');
Route::get('/tentang-kami', function () {
    return view('home.profile.about');
})->name('about');

Route::get('/program-kerja', [ProfileHimsiController::class, 'index'])->name('program');

Route::get('/struktur-organisasi', [ProfileHimsiController::class, 'struktur'])->name('struktur');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/galeri/{album}', [GalleryController::class, 'show'])->name('gallery.show');

// Pakai resource hanya untuk index dan store
Route::resource('voting', VotingController::class)->only(['index', 'store']);

// Show custom pakai slug pemilihan
Route::get('voting/{slug}', [VotingController::class, 'show'])->name('voting.show');

Route::get('/artikel', ArtikelController::class . '@home')->name('artikel');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::resource('acara', AcaraController::class)->only(['index', 'show',]);
Route::get('/acara/{slug}', [AcaraController::class, 'store'])->name('acara.store');
Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login.store');

Route::prefix('dashboard')->middleware('isLoggedIn')->group(function () {
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('pengurus-user', UserController::class); // kalau pakai resource
        // pemilu routes
        Route::resource('pemilihan', PemilihanController::class);
        // pemilu kandidat routes
        Route::resource('kandidat', KandidatController::class);
        Route::resource('struktur', StrukturController::class);
    });
    Route::middleware(['auth', 'isAnggota'])->group(function () {
        // artikel routes
        Route::resource('artikel', ArtikelController::class)->except(['show']);
    });
    Route::middleware(['auth', 'isAnggotaBPH'])->group(function () {
        Route::resource('absensi', AbsenUserController::class);
    });
    Route::middleware(['auth', 'isRSDM'])->group(function () {
        // absensi routes
        Route::resource('kelola-absensi', AbsensiController::class);
        Route::resource('kegiatan-absensi', AbsensiKegiatanController::class);

    });
    Route::middleware(['auth', 'isBPH'])->group(function () {
        // admin routes
        Route::resource('album-gallery', AlbumController::class);
        Route::resource('konten-gallery', KontenController::class);
            // kategori acara routes
        Route::resource('kategori-acara', KategoriController::class);
        // kegiatan acara routes
        Route::resource('kegiatan-acara', KegiatanController::class);
    });
    // profile routes   
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'update_password'])->name('profile.update_password');
    // kesan pesan routes
    Route::resource('kesan-pesan', KesanPesanController::class);
    // logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});