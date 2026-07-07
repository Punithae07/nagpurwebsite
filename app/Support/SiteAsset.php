<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class SiteAsset
{
    public static function url(?string $path, ?string $fallback = null): string
    {
        if (blank($path)) {
            return $fallback ? asset($fallback) : '';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (Storage::disk('public')->exists($path)) {
            return asset('storage/' . ltrim($path, '/'));
        }

        if (str_starts_with($path, 'site/assets/')) {
            return asset($path);
        }

        return $fallback ? asset($fallback) : asset($path);
    }
}
