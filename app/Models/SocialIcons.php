<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialIcons extends Model
{
    use HasFactory;

    protected $table = 'social_icons';

    protected $fillable = ['title', 'icon', 'url','target', 'status', 'order_by', 'publish_date']; 

    
}