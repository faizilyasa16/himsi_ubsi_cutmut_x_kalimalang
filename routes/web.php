<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.beranda.home');
})->name('beranda');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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