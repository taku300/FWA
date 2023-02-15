<?php

namespace App\Services;

use App\Libs\DatabaseRegister;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsService
{
    public $databaseRegister;

    /**
     * @param  \App\Libs\DatabaseRegister  $databaseRegister
     */
    public function __construct(DatabaseRegister $databaseRegister)
    {
        $this->databaseRegister = $databaseRegister;
    }

    /**
     * お知らせ新規登録
     * 
     * @param  Illuminate\Http\Request  $request
     */
    public function newsCreate($request)
    {
        DB::beginTransaction();
        try {
            $news = new News($request->all());
            $news->save();
            $dataList = [];
            foreach ($request->get('news_links') as $datas) {
                foreach ($datas as $data) {
                    $dataList[] = ['title' => $data[0], 'link_path' => $data[1]];
                }
            }
            $news->news_links()->createMany($dataList);
            $newsDocuments = $request->get('news_documents');
            $files = $request->file('news_documents');
            $newsDocuments = $this->databaseRegister->createInFilesPath($files, $newsDocuments, ['title', 'document_path'], 'news-documents');
            $news->news_documents()->createMany($newsDocuments);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * @param  int  $id
     * @param  object  $request
     */
    public function newsUpdate($id, $request)
    {
        DB::beginTransaction();
        try {
            $news = News::find($id);
            $news->update($request->all());
            $news->news_links()->upsert($request->get('news_links'), ['id'], ['title', 'link_path', 'news_id']);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }
}
