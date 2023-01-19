<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsDocument extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'document_path',
        'news_id'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
