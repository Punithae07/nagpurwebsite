<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SitePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'template',
        'meta_title',
        'meta_description',
        'hero_eyebrow',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_style',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(SiteSection::class)->orderBy('sort_order');
    }
}