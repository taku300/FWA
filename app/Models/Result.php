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

    /**
     * アーカイブ表示用日付データ取得
     */
    public function getArchiveYear()
    {
        return Result::pluck('ended_at');
    }

    public function getResultList()
    {
        return Result::orderBy('started_at', 'DESC');
    }
}
