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
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    return view('home.beranda.home');
})->name('beranda');

Route::get('/pengurus', function () {
    return view('home.profile.pengurus');
})->name('pengurus');

Route::get('/tentang-kami', function () {
    return view('home.profile.about');
})->name('about');

Route::get('/program-kerja', function () {
    return view('home.profile.program');
})->name('program');

Route::get('/struktur-organisasi', function () {
    return view('home.profile.struktur');
})->name('struktur');

Route::get('/gallery', function () {
    return view('home.gallery.gallery');
})->name('gallery');

Route::get('/voting', function () {
    return view('home.layanan.voting');
})->name('voting');

Route::get('/artikel', function () {
    return view('home.layanan.artikel');
})->name('artikel');

Route::get('/acara', function () {
    return view('home.layanan.acara');
})->name('acara');

Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login');

Route::middleware('isLoggedIn')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard.index');
    })->name('dashboard');

    // profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'update_password'])->name('profile.update_password');

    // pengurus routes
    Route::resource('pengurus-user', UserController::class); // kalau pakai resource

    // kategori acara routes
    Route::resource('kategori-acara', KategoriController::class);

    // kegiatan acara routes
    Route::resource('kegiatan-acara', KegiatanController::class);


    // gallery kategori routes
    Route::resource('album-gallery', AlbumController::class);

    // gallery konten routes
    Route::resource('konten-gallery', KontenController::class);

    // pemilu routes
    Route::resource('/pemilihan', PemilihanController::class);

    // pemilu kandidat routes
    Route::resource('/kandidat', KandidatController::class);

    // artikel routes
    Route::resource('artikel', ArtikelController::class);

    // absensi routes
    Route::resource('absensi', AbsensiController::class);
    Route::resource('kegiatan-absensi', AbsensiKegiatanController::class);
    
    // logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});