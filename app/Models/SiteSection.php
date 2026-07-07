<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_page_id',
        'key',
        'name',
        'layout',
        'eyebrow',
        'title',
        'subtitle',
        'content',
        'image',
        'image_alt',
        'secondary_image',
        'secondary_image_alt',
        'items',
        'settings',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'items' => 'array',
        'settings' => 'array',
        'status' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(SitePage::class, 'site_page_id');
    }
}