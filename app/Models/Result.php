<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'started_at',
        'ended_at',
        'name',
        'venue',
        'requirement_path',
        'result_path',
        'news_id'
    ];


    public function news()
    {
        return $this->hasOne(News::class);
    }
}
