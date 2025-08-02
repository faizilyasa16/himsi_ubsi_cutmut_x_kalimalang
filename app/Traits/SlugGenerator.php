<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\Artikel;

trait SlugGenerator
{
    public function generateUniqueSlug(string $judul): string
    {
        $slug = Str::slug($judul);
        $originalSlug = $slug;
        $counter = 1;

        while (Artikel::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
