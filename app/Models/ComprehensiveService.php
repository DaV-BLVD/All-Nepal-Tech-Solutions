<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComprehensiveService extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'icon_class', 'link', 'order'];
}
