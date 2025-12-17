<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', // e.g., "Happy Clients"
        'value', // e.g., "300+"
        'order'
    ];
}