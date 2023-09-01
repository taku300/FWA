<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory;

    // table名指定
    protected $table = 'news_images';

    // timestamp無効
    public $timestamps = false;

    // fillable
    protected $fillable = [
        'news_images_path',
        'news_id',
        'news_image_title',
    ];
}
