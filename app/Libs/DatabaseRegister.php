<?php

namespace App\Libs;

use Illuminate\Http\Request;

/**
 * 新規登録処理
 * 
 * @param  App\Models\**  $model
 * @param  array  $columns
 * @param  Illuminate\Http\Request  $request
 */
class DatabaseRegister
{
    public static function databaseRegister($model, $columns, $request)
    {
        foreach ($columns as $column) {
            if ($model->$column === 'document_path') {
                $path = $request->file($column)->store('public');
                $model->document_path = basename($path);
            }
            if ($model->$column !== 'document_path') {
                $model->$column = $request->$column;
            }
        }
    }
}
