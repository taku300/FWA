<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\Affiliation;
use App\Libs\Convert;

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
            $query = Lifter::with('affiliation')->where('top_post_flag', 1)->orderBy('updated_at', 'DESC')->take(2)->get()->toArray();
            foreach ($query as $key => $value) {
                if ($key === array_key_first($query)) {
                    $firstQuery = $value;
                    $fname = $value['first_name_kana'];
                    $lname = $value['last_name_kana'];
                }
            }
            $first = new Convert(mb_convert_kana($fname, "Hc"));
            $result = $first->getHebon();
            $last = new Convert(mb_convert_kana($lname, "Hc"));
            $subResult = $last->getHebon();
            $subQuery = [
                'first_name_hebon' => ucfirst(implode('', $result)),
                'last_name_hebon' => ucfirst(implode('', $subResult))
            ];
            $firstQuery = $firstQuery + $subQuery;
            return $firstQuery;
        }

        /**
         * お知らせページ用 選手情報 名前順
         */
        if ($this->getRoute() == 'Lifters') {
            return Lifter::with('lifters')->orderBy('last_name', 'DESC');
        }
    }
}
