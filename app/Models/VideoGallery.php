<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class VideoGallery extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
    ];

    protected $casts = [
        'link' => 'array',
    ];
}