<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class KontenAlbum extends Model
{
    use HasFactory;
    protected $table = 'konten_album';

    protected $fillable = [
        'album_id',
        'nama',
        'foto',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
