<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Birthday extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'class',
        'category',
        'school_category',
        'photo',
        'ispublished'
    ];
}