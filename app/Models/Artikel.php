<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'deskripsi',
        'konten',
        'kategori',
        'status',
    ];

    /**
     * Relasi ke User (pembuat artikel)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Menggunakan slug sebagai route key
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
