<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'file',
        'status',
        'url',
        'time',
        'date',
        'category_id',
        'author',
        'designation',
        'location',
        'content',
    ];

    protected $casts = [
        'file' => 'array',
        'content' => 'json',
    ];

    public function year()
    {
        return $this->belongsTo(Year::class);
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
