<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontenAlbum;
use App\Models\Album;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = KontenAlbum::with('album')
            ->whereHas('album')
            ->latest()
            ->paginate(12);
        return view('home.gallery.gallery', compact('gallery'));
    }
    public function show(Album $album)
    {
        return view('home.gallery.konten', compact('album'));
    }
}
