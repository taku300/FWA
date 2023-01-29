<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\Affiliation;

class Lifter extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'first_name_kana',
        'last_name_kana',
        'gender',
        'category',
        'affiliation_id',
        'weight_class',
        'image_path',
        'performance',
        'birthday',
        'comment',
        'top_post_flag'
    ];

    public function affiliation()
    {
        return $this->belongsTo(Affiliation::class);
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
     * 選手情報 取得
     * 
     * @return collection
     */
    public function getLifterList()
    {
        /**
         * トップページ用 選手情報
         * top_post_flag = 0 非掲載
         * top_post_flag = 1 掲載
         */
        if ($this->getRoute() == 'Top') {
            return Lifter::with('affiliation')->where('top_post_flag', 1)->orderBy('updated_at', 'DESC')->take(2);
        }

        /**
         * お知らせページ用 選手情報 名前順
         */
        if ($this->getRoute() == 'Lifters') {
            return Lifter::with('lifters')->orderBy('last_name', 'DESC');
        }
    }
}
