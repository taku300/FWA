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
    public static function createBasicRegister($model, $columns, $request)
    {
        foreach ($columns as $column) {
            $model->$column = $request->$column;
        }
        $model->save();
    }

    public static function createNewsDocumentRegister($model, $columns, $request, $newsId)
    {
        $key = 0;
        foreach ($columns as $column) {
            if ($column === 'document_path') {
                foreach ($request['news_documents']['document_path'] as $value) {
                    $path = $value->store('public');
                    $model->document_path = basename($path);
                }
            }
            if ($column === 'news_id') {
                $model->$column = $newsId;
            }
            if ($column === 'title') {
                $model->$column = $request['news_documents'][$column][$key];
            }
        }
        $model->save();
    }

    public static function createNewsLinkRegister($model, $columns, $request, $newsId)
    {
        $key = 0;
        foreach ($columns as $column) {
            if ($column === 'news_id') {
                $model->$column = $newsId;
            }
            if ($column === 'title') {
                $model->$column = $request['news_links'][$column][$key];
            }
            if ($column === 'link_path') {
                $model->$column = $request['news_links'][$column][$key];
            }
        }
        $model->save();
    }
}
