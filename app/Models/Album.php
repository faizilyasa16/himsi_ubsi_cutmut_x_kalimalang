<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    // Jika nama tabel berbeda dari default (albums), tentukan di sini
    protected $table = 'album';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'tahun',
        'slug',
        'deskripsi',
    ];
    public function konten()
    {
        return $this->hasMany(KontenAlbum::class, 'album_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
