<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sliders extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'slug',
        'image',
        'status',
        'order_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function getImageUrlAttribute()
    {
        $image = $this->image;

        if (is_string($image)) {
            $decoded = json_decode($image, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $image = $decoded[0] ?? null;
            } else {
                $image = trim($image, '[]"');
            }
        }

        if (is_array($image)) {
            $image = $image[0] ?? null;
        }

        if (!$image) {
            return null;
        }

        // If image path is already a full URL, return it as is
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // Use Storage::url() for files in storage/app/public
        // This will generate the correct URL through the storage symlink
        return Storage::disk('public')->url($image);
    }

    public function getImageUrlsAttribute()
    {
        $images = $this->image;

        if (is_string($images)) {
            $decoded = json_decode($images, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $images = $decoded;
            } else {
                $images = [trim($images, '[]"')];
            }
        }

        if (!is_array($images)) {
            $images = array_filter([$images]);
        }

        return collect($images)
            ->filter()
            ->map(function ($image) {
                if (filter_var($image, FILTER_VALIDATE_URL)) {
                    return $image;
                }

                return Storage::disk('public')->url($image);
            })
            ->values()
            ->all();
    }

    protected static function booted()
    {
        static::deleting(function ($slider) {
            if (!empty($slider->image)) {
                foreach ($slider->image as $image) {
                    if (\Storage::disk('public')->exists($image)) {
                        \Storage::disk('public')->delete($image);
                    } else {
                        \Log::warning('Image file not found: ' . $image);
                    }
                }
            }
        });
    }
}