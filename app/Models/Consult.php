<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'service', 'message', 'is_resolved'];
}
