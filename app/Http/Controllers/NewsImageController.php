<?php

namespace App\Http\Controllers;

use App\Services\NewsImageService;
use Illuminate\Http\Request;

class NewsImageController extends Controller
{
    /**
     * お知らせ画像ビジネスロジック
     */
    private NewsImageService $service;

    /**
     * コンストラクタ
     */
    public function __construct(NewsImageService $service)
    {
        $this->service = $service;
    }

    /**
     * 知らせ画像削除処理
     */
    public function delete($id)
    {
        return response()->json($this->service->delete($id));
    }
}
