<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsLink;
use App\Models\NewsDocument;
use App\Models\Result;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Pagination\LengthAwarePaginator;

class News extends Model
{
    use HasFactory;

    /**
     * fillable
     */
    protected $fillable = [
        'category',
        'noticed_at',
        'title',
        'note',
        'detail',
        'preliminary_report_flag',
        'iframe_path'
    ];

    /**
     * リレーション 大会
     * 
     * @return HasOne
     */
    public function result(): HasOne
    {
        return $this->hasOne(Result::class);
    }

    /**
     * リレーション お知らせリンク
     * 
     * @return HasMany
     */
    public function news_links(): HasMany
    {
        return $this->hasMany(NewsLink::class);
    }

    /**
     * リレーション お知らせ資料
     * 
     * @return HasMany
     */
    public function news_documents(): HasMany
    {
        return $this->hasMany(NewsDocument::class);
    }

    /**
     * リレーション お知らせ画像
     * 
     * @return HasMany
     */
    public function news_images(): HasMany
    {
        return $this->hasMany(NewsImage::class);
    }

    /**
     * news table deleting action
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($news) {
            $news->news_links()->delete();
            $news->news_documents()->delete();
            $news->news_images()->delete();
        });
    }

    /**
     *  お知らせ一覧 10件
     * 
     * @return LengthAwarePaginator
     */
    public function getNewsList(): LengthAwarePaginator
    {
        return News::orderBy('noticed_at', 'DESC')->paginate('15');
    }

    /**
     * お知らせ一覧 速報取得
     * 
     * @return array
     */
    public function getBrakingNews(): array
    {
        return News::where('preliminary_report_flag', 1)->orderBy('noticed_at', 'DESC')->get()->toArray();
    }

    /**
     * お知らせ 詳細取得
     * 
     * @param  $id   お知らせID
     * @return Collection
     */
    public function getNewsDetail($id): Collection
    {
        return News::with(['result', 'news_links', 'news_documents', 'news_images'])->find($id);
    }
}
