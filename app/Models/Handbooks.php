<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handbooks extends Model
{
    use HasFactory;

    protected $table = 'handbooks';

    protected $fillable = [
        'title',
        'file',
        'description',
        'status',
        'order_by',
    ];

    protected $casts = [
        'file' => 'array',
    ];
}