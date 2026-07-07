<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $casts = [
        'image' => 'array',
    ];

    protected $fillable = [
        'name',
        'designation',
        'image',
        'qualification',
        'status',
        'order_by',
        'staff_type',
    ];
}
