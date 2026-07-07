<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'group',
        'bio',
        'image',
        'stats',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'stats' => 'array',
        'status' => 'boolean',
    ];
}