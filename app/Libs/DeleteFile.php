<?php

namespace App\Libs;

class DeleteFile
{
    /**
     * @param  string  $path
     * @param  mixed  $fileNames
     */
    public static function deleteFilePath($path, $fileNames)
    {
        if ($path == '/lifter-images/') {
            \Storage::delete(\CommonConst::LIFTERS_FILE_PATH_NAME . $fileNames['image_path']);
        }
        if ($path == '/news-documents/') {
            foreach ($fileNames as $fileName) {
                \Storage::delete(\CommonConst::LIFTERS_FILE_PATH_NAME . $fileName['document_path']);
            }
        }
    }
}
