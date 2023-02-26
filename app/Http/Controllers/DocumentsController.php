<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentForm;
use App\Services\DocumentService;

/**
 * ドキュメント更新
 *
 */
class DocumentsController extends Controller
{
    public $documentsService;

    public function __construct(DocumentService $documentsService)
    {
        $this->documentsService = $documentsService;
    }

    public function edit()
    {
        return view('documents.edit');
    }

    public function update(DocumentForm $request)
    {
        $this->documentsService->updateDocument($request);

        return redirect('/')->with('message', '更新が完了しました。');
    }
}
