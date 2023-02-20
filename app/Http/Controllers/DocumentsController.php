<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;
use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
        $this->documentsService->updateDocument($request);

        return redirect('/');
    }
}
