<?php

namespace App\Libs;

use Carbon\Carbon;

class DatabaseRegister
{
    /**
     * ファイル登録用メソッド
     * 
     * @param  array  $files
     * @param  array  $documents
     * @param  string  $columnName
     * @param  string  $pathName
     */
    public static function createInFilesPath($files, $documents, $columnName, $pathName)
    {
        foreach ($files as $key => $file) {
            $path = $file[$columnName]->store('public/' . $pathName);
            $documentName = basename($path);
            $documents[$key][$columnName] = $documentName;
        }
        return $documents;
    }
}
