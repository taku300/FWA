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
        'iframe_display_flg',
    ];

    /**
     * 表示フラグ off
     * 
     * @param int
     */
    const HIDE = 0;

    /**
     * 表示フラグ on
     * 
     * @param int
     */
    const SHOW = 1;

    /**
     * iframe新規登録
     * 
     * @return bool
     */
    public function createIframe($request): bool
    {
        // 登録するデータをセット
        $formDatas = [
            'iframe_path' => $request->only(['iframe_path']),
            'iframe_display_flg' => self::SHOW,
        ];

        // iframe登録処理
        try {
            $this->chageDisplayFlg();
            $iframe = new Iframe($formDatas);
            $iframe->save();
        } catch(\Exception $e) {
            logger()->info('iframe登録処理失敗', $e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * 表示フラグが1のものを0に変更
     */
    public function chageDisplayFlg()
    {
        // レコードがない場合はfalseを返す
        if(!$this->isOldIframe()) {
            return false;
        }

        // 表示フラグが1のものを取得し、ステータスを0に変更
        $this->getOldIframe()->update(['iframe_display_flg' => self::HIDE]);
    }

    /**
     * 表示フラグが1のものを取得
     * 
     * @return Iframe
     */
    public function getOldIframe(): Iframe
    {
        // 表示フラグが1のものだけ返す
        return $this->where('iframe_display_flg', self::SHOW)->get();
    }

    /**
     * 表示フラグが1のレコード確認
     * 
     * @return bool
     */
    public function isOldIframe(): bool
    {
        return $this->where('iframe_display_flg', self::SHOW)->exists();
    }
}
