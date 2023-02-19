<?php

namespace App\Services;

class DocumentService
{
    public function getTopImages()
    {
        $documents = [
            1 => \CommonConst::ASSOCIATION_DOCUMENT_PATH . \CommonConst::DOCUMENT_LIST[1],
            2 => \CommonConst::ASSOCIATION_DOCUMENT_PATH . \CommonConst::DOCUMENT_LIST[2],
            3 => \CommonConst::ASSOCIATION_DOCUMENT_PATH . \CommonConst::DOCUMENT_LIST[3],
        ];
        return $documents;
    }

    public function updateDocument($request)
    {
        if (isset($request->top_image_path_1)) {
            $request->file(\CommonConst::DOCUMENT_PATH_1)
                ->storeAs(\CommonConst::ASSOCIATION_DOCUMENT_PATH, \CommonConst::DOCUMENT_LIST[1]);
        }
        if (isset($request->top_image_path_2)) {
            $request->file(\CommonConst::DOCUMENT_PATH_2)
                ->storeAs(\CommonConst::ASSOCIATION_DOCUMENT_PATH, \CommonConst::DOCUMENT_LIST[2]);
        }
        if (isset($request->top_image_path_3)) {
            $request->file(\CommonConst::DOCUMENT_PATH_3)
                ->storeAs(\CommonConst::ASSOCIATION_DOCUMENT_PATH, \CommonConst::DOCUMENT_LIST[3]);
        }
    }
}
