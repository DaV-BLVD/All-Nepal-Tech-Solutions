<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactHeader extends Model
{
    protected $fillable = ['title', 'description', 'support_text', 'support_icon'];
}