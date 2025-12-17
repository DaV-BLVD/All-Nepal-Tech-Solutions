<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class TeamMember extends Model
{
    protected $fillable = ['name', 'role', 'specialization', 'company', 'image', 'is_active'];
}