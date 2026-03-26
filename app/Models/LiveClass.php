<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'meeting_link',
        'is_active',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'is_active'  => 'boolean',
    ];
}