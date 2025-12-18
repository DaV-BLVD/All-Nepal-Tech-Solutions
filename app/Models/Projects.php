<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['title', 'category', 'description', 'icon_svg', 'icon_bg_color', 'link'];
}