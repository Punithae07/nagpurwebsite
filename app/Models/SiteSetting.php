<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'brand_prefix',
        'logo',
        'footer_logo',
        'top_address',
        'top_email',
        'top_phone',
        'top_website',
        'address',
        'phone_primary',
        'phone_secondary',
        'email_primary',
        'email_secondary',
        'website',
        'footer_about',
        'footer_copyright',
        'google_map_iframe',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}