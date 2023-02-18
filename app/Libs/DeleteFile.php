<?php

namespace App\Libs;

use Illuminate\Support\Facades\Storage;

class DeleteFile
{
    /**
     * @param  string  $path
     * @param  mixed  $fileNames
     */
    public static function deleteFilePath($path, $fileNames)
    {
        if ($path == '/lifter-images/') {
            Storage::disk('public')->delete($path . $fileNames['image_path']);
        }
        if ($path == '/news-documents/') {
            foreach ($fileNames as $fileName) {
                Storage::disk('public')->delete($path . $fileName['document_path']);
            }
        }
    }
}
