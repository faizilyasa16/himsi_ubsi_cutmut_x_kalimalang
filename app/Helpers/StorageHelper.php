<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class StorageHelper
{
    public static function url($path)
    {
        // Jika menggunakan S3 atau cloud storage
        if (config('filesystems.default') === 's3') {
            return Storage::url($path);
        }
        
        // Untuk development dengan public disk
        return asset('storage/' . $path);
    }
    
    public static function store($file, $path = 'uploads')
    {
        return Storage::put($path, $file);
    }
    
    public static function delete($path)
    {
        return Storage::delete($path);
    }
}
