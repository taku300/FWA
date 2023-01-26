<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'image_path',
        'img_type'
    ];
}
