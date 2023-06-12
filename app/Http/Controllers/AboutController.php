<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;
use Illuminate\Http\Request;

/**
 * 協会概要
 *
 */
class AboutController extends Controller
{
    /**
     * 資料関連支援クラス
     */
    private DocumentService $documentService;

    /**
     * コンストラクタ
     */
    public function __construct(
        DocumentService $documentService,
    ) {
        $this->documentService = $documentService;
    }

    /**
     * 協会概要画面
     */
    public function index()
    {
        // 協会概要資料取得
        $documents = $this->documentService->getDocuments();

        return view('about.index')->with(compact('documents'));
    }
}
