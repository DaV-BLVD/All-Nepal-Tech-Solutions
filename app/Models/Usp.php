<?php

// app/Models/Usp.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usp extends Model
{
    protected $fillable = ['title', 'description', 'icon', 'sort_order'];
}