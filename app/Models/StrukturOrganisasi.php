<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'konten',
    ];

    /**
     * Get the content of the structure.
     *
     * @return string|null
     */
    public function getContentAttribute()
    {
        return $this->attributes['konten'];
    }
}
