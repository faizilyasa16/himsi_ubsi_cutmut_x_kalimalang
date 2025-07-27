<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAcara extends Model
{
    use HasFactory;

    protected $table = 'kategori_acara';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

