<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\NewsDocument;
use App\Models\NewsLink;

class NewsService
{
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
                    $path = $value['document_file']->store(\CommonConst::NEWS_FILE_PATH_NAME);
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
            $deletePath = $this->diffDelete($request, $id, 'news_documents', NewsDocument::query());
            \DeleteFile::deleteFilePath('document_path', $deletePath);
            $newsDocuments = $request->get('news_documents') ? $request->get('news_documents') : [];
            if ($files = $request->file('news_documents')) {
                foreach ($files as $key => $value) {
                    $path = $value['document_file']->store(\CommonConst::NEWS_FILE_PATH_NAME);
                    $newsDocuments[$key]['document_path'] = basename($path);
                }
            }
            $news->news_documents()->upsert($newsDocuments, ['id'], ['title', 'document_path', 'news_id']);
            // リンクの保存
            $this->diffDelete($request, $id, 'news_links', NewsLink::query());
            $news->news_links()->upsert($request->get('news_links') ? $request->get('news_links') : [], ['id'], ['title', 'link_path', 'news_id']);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * @param  int  $id
     */
    public function newsDelete($id)
    {
        DB::beginTransaction();
        try {
            $news = News::find($id);
            \DeleteFile::deleteFilePath('document_path', $news->news_documents);
            $news->delete();
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * @param  int  $id
     * @param  object  $request
     * @param  mixed  $tableName
     * @param  mixed  App\Models\**  $model
     */
    public function diffDelete($request, $id, $tableName, $model)
    {
        $newDatas = array_column($request->get($tableName) ? $request->get($tableName) : [], 'id');
        $oldDatas = array_column($model->where('news_id', $id)->get()->toArray(), 'id');
        $delete_links = array_diff($oldDatas, $newDatas);
        $path = $model->where('news_id', $id)->get();
        $model->whereIn('id', $delete_links)->delete();
        return $path;
    }
}
