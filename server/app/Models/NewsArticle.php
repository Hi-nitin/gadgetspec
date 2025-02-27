<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'main_image',
        'additional_images',
    ];

    protected $casts = [
        'additional_images' => 'array', // This ensures additional_images is stored as an array
    ];
}
