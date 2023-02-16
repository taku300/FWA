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
     * @param  array  $columns
     * @param  string  $pathName
     *
     * @return array
     */
    public static function createInFilesPath($files, $documents, $columns, $pathName): array
    {
        $dataList = [];
        foreach ($files[0] as $file) {
                $path = $val->store('public/' . $pathName);
                $documentName = basename($path);
                $documents[1][$columns[1]] = $documentName;
                $dataList[] = [$columns[0] => $documents[0][$columns[0]][$key], $columns[1] => $documents[1][$columns[1]]];

        }
        return $dataList;
    }
}
