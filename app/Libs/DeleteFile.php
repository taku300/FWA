<?php

namespace App\Libs;

use Illuminate\Support\Facades\Storage;

class DeleteFilePath
{
    /**
     * @param  string  $path
     * @param  string  $fileName
     */
    public function deleteFilePath($path, $fileName)
    {
        Storage::delete($path + $fileName);
    }
}
