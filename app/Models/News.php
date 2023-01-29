<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\NewsLink;
use App\Models\NewsDocument;
use App\Models\Result;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'noticed_at',
        'title',
        'note',
        'detail',
        'preliminary_report_flag',
        'iframe_path'
    ];

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function news_links()
    {
        return $this->hasMany(NewsLink::class);
    }

    public function news_documents()
    {
        return $this->hasMany(NewsDocument::class);
    }

    /**
     * コントローラー名取得
     */
    public function getRoute()
    {
        $controller = explode("@", Route::currentRouteAction());
        $controllerName = explode('\\', $controller[0]);
        $key = mb_substr($controllerName[3], 0, -10);

        return $key;
    }

    /**
     * お知らせ情報 取得
     * 
     * @return collection
     */
    public function getNewsList()
    {
        /**
         * トップページ用 お知らせ日順 10件
         */
        if ($this->getRoute() == 'Top') {
            return News::orderBy('noticed_at', 'DESC')->take('10')->get();
        }

        /**
         * お知らせページ用 お知らせ日順
         */
        if ($this->getRoute() == 'News') {
            return News::orderBy('noticed_at', 'DESC')->get();
        }
    }
}
