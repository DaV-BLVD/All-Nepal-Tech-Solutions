<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyFeature extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'is_active',
    ];
}
