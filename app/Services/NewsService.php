<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Libs\DatabaseRegister;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\NewsDocument;
use App\Models\NewsLink;

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
            // dd($request->file('news_documents'));
            $news = new News($request->all());
            $news->save();
            $news->news_links()->createMany($request->get('news_links') ? $request->get('news_links') : []);
            $newsDocuments = $request->get('news_documents') ? $request->get('news_documents') : [];
            if ($files = $request->file('news_documents')) {
                foreach ($files as $key => $value) {
                    $path = $value['document_file']->store('public/news-documents');
                    $newsDocuments[$key]['document_path'] = basename($path);
                }
            }
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
            // ドキュメント保存
            $request_documents = array_column($request->get('news_documents') ? $request->get('news_documents') : [], 'id');
            $old_documents = array_column(NewsDocument::where('news_id', '=', $id)->get()->toArray(), 'id');
            $delete_documents = array_diff($old_documents, $request_documents);
            NewsDocument::whereIn('id', $delete_documents)->delete();
            $newsDocuments = $request->get('news_documents') ? $request->get('news_documents') : [];
            if ($files = $request->file('news_documents')) {
                foreach ($files as $key => $value) {
                    $path = $value['document_file']->store('public/news-documents');
                    $newsDocuments[$key]['document_path'] = basename($path);
                }
            }
            $news->news_documents()->upsert($newsDocuments, ['id'], ['title', 'document_path', 'news_id']);
            // リンクの保存
            $request_links = array_column($request->get('news_links') ? $request->get('news_links') : [], 'id');
            $old_links = array_column(NewsLink::where('news_id', '=', $id)->get()->toArray(), 'id');
            $delete_links = array_diff($old_links, $request_links);
            NewsLink::whereIn('id', $delete_links)->delete();
            $news->news_links()->upsert($request->get('news_links') ? $request->get('news_links') : [], ['id'], ['title', 'link_path', 'news_id']);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }
}
