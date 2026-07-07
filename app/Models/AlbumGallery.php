<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AlbumGallery extends Model
{
    use HasFactory;

    protected $table = 'album_galleries';

    protected $casts = [
        'sub_images' => 'array',
    ];

    protected $fillable = [
        'title',
        'slug',
        'main_image',
        'sub_images',
        'date',
        'status',
        'category_id',
    ];

    protected $appends = ['academic_year'];

    public function getAcademicYearAttribute()
    {
        $date = $this->date ?: $this->created_at;
        if (!$date) {
            return 'N/A';
        }

        $carbonDate = \Carbon\Carbon::parse($date);
        $year = $carbonDate->year;
        $month = $carbonDate->month;

        // If month is Jan(1) to May(5), it belongs to the previous academic year (starting in June)
        // Example: May 2026 -> AY 2025-26. June 2026 -> AY 2026-27.
        // But the user's example says "Academic Year 2026". 
        // Let's stick to the simpler: year of the date.
        return $year;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

}
