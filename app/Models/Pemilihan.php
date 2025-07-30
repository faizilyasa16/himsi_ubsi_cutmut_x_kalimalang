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

    // Auto generate slug dari nama
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->nama);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->nama);
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
