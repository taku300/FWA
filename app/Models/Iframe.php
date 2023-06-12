<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iframe extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'iframes';

    protected $fillable = [
        'iframe_path',
    ];

    /**
     * iframe登録処理
     * 
     * @return bool
     */
    public function saveIframe($request): bool
    {
        // iframe登録処理
        try {
            // id = 1固定
            $insertData = [
                'id' => 1,
                'iframe_path' => $request->iframe_path,
            ];

            $iframe = Iframe::upsert($insertData, ['id'], ['iframe_path']);
        } catch(\Exception $e) {
            logger()->info(['iframe登録処理失敗', $e->getMessage()]);
            return false;
        }

        return true;
    }

    /**
     * iframe url取得
     * 
     * @return string|bool
     */
    public function getIframePath(): string | bool
    {
        if($this->find(1)) {
            return $this->find(1)->iframe_path;
        }
        return false;
    }
}