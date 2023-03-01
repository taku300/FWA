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

    public function updateDocument($request)
    {
        if (isset($request->document_path_1)) {
            if (Document::where('document_type', 1)->exists()) {
                $oldDocument = Document::where('document_type', 1)->get();
                $this->deleteFilePath('document_path', $oldDocument);
                foreach ($oldDocument as $val) {
                    $val->delete();
                }
            }
            $document = new Document;
            $document->document_path = $this->getDatas($request, \CommonConst::DOCUMENT_PATH_1, $document);
            $document->document_type = 1;
            $document->save();
        }
        if (isset($request->document_path_2)) {
            if (Document::where('document_type', 2)->exists()) {
                $oldDocument = Document::where('document_type', 2)->get();
                $this->deleteFilePath('document_path', $oldDocument);
                foreach ($oldDocument as $val) {
                    $val->delete();
                }
            }
            $document = new Document;
            $document->document_path = $this->getDatas($request, \CommonConst::DOCUMENT_PATH_2, $document);
            $document->document_type = 2;
            $document->save();
        }
        if (isset($request->document_path_3)) {
            if (Document::where('document_type', 3)->exists()) {
                $oldDocument = Document::where('document_type', 3)->get();
                $this->deleteFilePath('document_path', $oldDocument);
                foreach ($oldDocument as $val) {
                    $val->delete();
                }
            }
            $document = new Document;
            $document->document_path = $this->getDatas($request, \CommonConst::DOCUMENT_PATH_3, $document);
            $document->document_type = 3;
            $document->save();
        }
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
        foreach ($fileNames as $fileName) {
            \Storage::delete(\CommonConst::ASSOCIATION_DOCUMENT_PATH . $fileName[$path]);
        }
    }
}
