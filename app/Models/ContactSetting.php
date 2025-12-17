<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = ['title', 'description', 'phone', 'button_text', 'button_link'];
}
