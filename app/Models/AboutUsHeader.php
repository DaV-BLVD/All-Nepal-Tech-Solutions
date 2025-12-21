<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsHeader extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'features'];

    protected $casts = [
        'features' => 'array',
    ];
}