<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DailyThoughts extends Model
{
    use HasFactory;

    protected $table = 'daily_thoughts';
    
    protected $fillable = [
        'title',
        'bible_verse',
        'slug',
        'date',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    protected static function booted()
    {
        static::creating(function ($dailyThought) {
            if (empty($dailyThought->slug)) {
                // Use first 100 characters of title for slug generation
                $titleForSlug = Str::limit($dailyThought->title, 100, '');
                $dailyThought->slug = Str::slug($titleForSlug);
            }
        });
    }
}
