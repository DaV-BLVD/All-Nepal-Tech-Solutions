<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutService extends Model
{
    protected $fillable = ['title', 'icon', 'color_theme', 'description', 'features', 'order'];

    protected $casts = [
        'features' => 'array',
    ];
}
