<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyStatement extends Model
{
    protected $fillable = ['mission_text', 'mission_points', 'vision_text', 'vision_points'];

    protected $casts = [
        'mission_points' => 'array',
        'vision_points' => 'array',
    ];
}
