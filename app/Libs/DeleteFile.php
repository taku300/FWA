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
        if ($path == 'image_path') {
            \Storage::delete(\CommonConst::LIFTERS_FILE_PATH_NAME . $fileNames[$path]);
        }
        if ($path == 'requirement_path') {
            \Storage::delete(\CommonConst::REQUIREMENTS_FILE_PATH_NAME . $fileNames[$path]);
        }
        if ($path == 'result_path') {
            \Storage::delete(\CommonConst::RESULTS_FILE_PATH_NAME . $fileNames[$path]);
        }
        if ($path == 'document_path') {
            foreach ($fileNames as $fileName) {
                \Storage::delete(\CommonConst::NEWS_FILE_PATH_NAME . $fileName[$path]);
            }
        }
    }
}
