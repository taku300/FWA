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

    public $timestamps = false;

    /**
     * iframe登録処理
     * 
     * @return bool
     */
    public function saveIframe($request): bool
    {
        // iframe登録処理
        try {
            if($this->where('id', 1)->exists()) {
                $this->update($request->only(['iframe_path']));
            } else if(!$this->where('id', 1)->exists()) {
                $this->create($request->only(['iframe_path']));
            }
        } catch(\Exception $e) {
            logger()->info(['iframe登録処理失敗', $e->getMessage()]);
            return false;
        }

        return true;
    }
}
