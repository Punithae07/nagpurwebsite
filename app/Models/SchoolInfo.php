<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SchoolInfo extends Model
{
    use HasFactory;

    protected $casts = [
        'address' => 'json',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
        'map_location',
        'created_at',
        'updated_at'
    ];
}