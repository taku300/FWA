<?php

namespace App\Libs;

use Illuminate\Http\Request;

/**
 * 新規登録・編集処理
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
            if ($column === 'image_path' && !empty($request->$column)) {
                $path = $request->$column->store('public');
                $model->$column = basename($path);
            }
            if (strpos($column, 'path') !== false) {
                $fileName = $request->title;
                $model->$column = $request->file($column)->storeAs('public', $fileName);
            }
            if (!empty($request->$column)) {
                $model->$column = $request->$column;
            }
        }
        $model->save();
    }
}
