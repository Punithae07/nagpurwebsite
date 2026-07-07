<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PhotoGallery extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'images' => 'array',
    // ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        // 'images',
        'status',
        'order_by',
        'publish_date',
        'created_at',
        'updated_at'
    ];

    public function images(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'photo_gallery_media')
            ->withTimestamps();
    }

     protected static function booted()
    {
        static::deleting(function ($photoGallery) {
            // Detach related media records
            $photoGallery->images()->each(function ($image) {
                // Delete the file from the 'public' disk
                if (\Storage::disk('public')->exists($image->path)) {
                    \Storage::disk('public')->delete($image->path);
                } else {
                    \Log::warning('Image file not found: ' . $image->path);
                }

                // Delete the media record itself
                $image->delete();
            });

            // Clean up the pivot table entries
            $photoGallery->images()->detach();
        });
    }
}