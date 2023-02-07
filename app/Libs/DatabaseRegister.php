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
     * @param  string  $path
     */
    public static function createInFilesPath($files, $documents, $columnName, $path)
    {
        foreach ($files as $key => $file) {
            $documentName = $file[$columnName]->getClientOriginalName();
            $file[$columnName]->storeAS($path, Carbon::now()->format('Y-m-d') . '_' . $documentName, 'public');
            $documents[$key][$columnName] = $documentName;
        }
        return $documents;
    }
}
