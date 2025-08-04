<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pemilihan extends Model
{
    use HasFactory;

    protected $table = 'pemilihan';

    protected $fillable = [
        'nama',
        'slug',
        'tgl_mulai',
        'tgl_selesai',
        'status',
        'deskripsi',
    ];
    // Di app/Models/Pemilihan.php
    public function kandidat()
    {
        return $this->hasMany(Kandidat::class);
    }

    // Auto generate slug dari nama
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
