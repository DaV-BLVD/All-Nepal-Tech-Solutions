<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsp extends Model
{
    use HasFactory;

    protected $table = 'about_usps'; // Explicitly defining table name

    protected $fillable = [
        'title',
        'description',
        'icon',
        'order'
    ];
}