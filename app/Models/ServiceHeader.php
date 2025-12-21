<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHeader extends Model
{
    protected $fillable = [
        'title',
        'highlighted_text',
        'description',
        'bg_icon',
        'btn_primary_text',
        'btn_primary_link',
        'btn_secondary_text',
        'btn_secondary_link'
    ];
}