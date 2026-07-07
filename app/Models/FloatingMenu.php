<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloatingMenu extends Model
{
    use HasFactory;

    protected $table = 'floating_menus';

    protected $fillable = [
        'title',
        'link',
        'target',
        'status',
        'order_by',
        'publish_date',
    ];
}