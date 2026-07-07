<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toppers extends Model
{
    use HasFactory;

    protected $table = 'toppers';

    protected $fillable = [
        'name',
        'image',
        'class',
        'percentage',
        'status',
        'order_by',
    ];

    protected $casts = [
        'image' => 'array',
    ];
}
