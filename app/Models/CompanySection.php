<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySection extends Model
{
    protected $fillable = [
        'small_title',
        'main_title',
        'highlight_title',
        'description',
        'button_text',
        'button_link',
    ];
}
