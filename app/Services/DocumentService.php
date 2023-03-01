<?php

namespace App\Services;

use App\Models\Document;

class DocumentService
{
    public function getDocuments()
    {
        $documentsFile = [];
        $documents = Document::get();
        foreach ($documents as $document) {
            if ($document->document_type === 1) {
                $documentsFile[1] = \CommonConst::ASSOCIATION_DOCUMENT_PATH . $document->document_path;
            } else {
                $documentsFile[1] = '';
            }
            if ($document->document_type === 2) {
                $documentsFile[2] = \CommonConst::ASSOCIATION_DOCUMENT_PATH . $document->document_path;
            } else {
                $documentsFile[2] = '';
            }
            if ($document->document_type === 3) {
                $documentsFile[3] = \CommonConst::ASSOCIATION_DOCUMENT_PATH . $document->document_path;
            } else {
                $documentsFile[3] = '';
            }
        }
        return $documentsFile;
    }

    public function documentUpdate($request)
    {
        DB::beginTransaction();
        try {
            $this->updateDocument($request);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    public function updateDocument($request)
    {
        if (isset($request->document_path_1)) {
            $this->saveDocument($request, 1, \CommonConst::DOCUMENT_PATH_1);
        }
        if (isset($request->document_path_2)) {
            $this->saveDocument($request, 2, \CommonConst::DOCUMENT_PATH_2);
        }
        if (isset($request->document_path_3)) {
            $this->saveDocument($request, 3, \CommonConst::DOCUMENT_PATH_3);
        }
    }

    public function saveDocument($request, $num, $path)
    {
        if (Document::where('document_type', $num)->exists()) {
            $oldDocument = Document::where('document_type', $num)->first();
            $this->deleteFilePath('document_path', $oldDocument);
            $oldDocument->delete();
        }
        $this->createDocument($request, $num, $path);
    }

    public function createDocument($request, $num, $path)
    {
        $document = new Document;
        $document->document_path = $this->getDatas($request, $path, $document);
        $document->document_type = $num;
        $document->save();
    }

    /**
     * @param  mixed  $file
     *
     * @return  mixed
     */
    public function getDatas($request, $defaultPath): mixed
    {
        if ($request->file($defaultPath)) {
            $path = $request->file($defaultPath)->store(\CommonConst::ASSOCIATION_DOCUMENT_PATH);
        }
        return basename($path);
    }

    /**
     * @param  string  $path
     * @param  mixed  $fileNames
     */
    public static function deleteFilePath($path, $fileNames)
    {
        \Storage::delete(\CommonConst::ASSOCIATION_DOCUMENT_PATH . $fileNames[$path]);
    }
}
