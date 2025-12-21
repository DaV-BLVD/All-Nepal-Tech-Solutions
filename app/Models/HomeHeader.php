<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class HomeHeader extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'title_highlight',
        'description',
        'button_text',
        'button_link',
        'image_mobile',
        'image_tablet',
        'image_laptop'
    ];
}