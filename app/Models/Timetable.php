<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'class_name',
        'section',
        'academic_year',
        'image_path',
        'start_at',
        'end_at',
        'is_published',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function entries()
    {
        return $this->hasMany(TimetableEntry::class);
    }
}

