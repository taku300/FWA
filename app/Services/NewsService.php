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
            $news->news_links()->createMany($request->get('news_links'));
            $newsDocuments = $request->get('news_documents');
            $files = $request->file('news_documents');
            $newsDocuments = $this->databaseRegister->createInFilesPath($files, $newsDocuments, 'document_path', 'news-documents');
            $news->news_documents()->createMany($newsDocuments);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }
}
