<?php

namespace App\Services;

use App\Http\Requests\NewsForm;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\NewsDocument;
use App\Models\NewsLink;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class NewsService
{
    /**
     * お知らせ新規登録
     *
     * @param NewsForm $request
     */
    public function newsCreate(NewsForm $request)
    {
        DB::beginTransaction();
        try {
            // お知らせ登録
            $news = new News($request->all());
            $news->save();

            // お知らせリンク登録
            $news->news_links()->createMany($request->get('news_links') ? $request->get('news_links') : []);

            // お知らせ資料登録
            $newsDocuments = $request->get('news_documents') ? $request->get('news_documents') : [];
            if ($files = $request->file('news_documents')) {
                foreach ($files as $key => $value) {
                    $path = $value['document_file']->store(\CommonConst::NEWS_FILE_PATH_NAME);
                    $newsDocuments[$key]['document_path'] = basename($path);
                }
            }
            $news->news_documents()->createMany($newsDocuments);

            // お知らせ画像登録
            $newsImages = $request->get('news_images') ? $request->get('news_images') : [];
            dd($newsImages);
            if ($files = $request->file('news_images')) {
                foreach ($files as $key => $value) {
                    $path = $value['news_image_file']->store(\CommonConst::NEWS_FILE_PATH_NAME);
                    $newsDocuments[$key]['news_image_path'] = basename($path);
                }
            }
            $news->news_documents()->createMany($newsImages);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * @param  int       $id
     * @param  NewsForm  $request
     */
    public function newsUpdate(int $id, NewsForm $request)
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
    public function newsDelete(int $id)
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
     * @param  NewsForm  $request
     * @param  int       $id
     * @param  string    $tableName
     * @param  Builder   $model
     */
    public function diffDelete(NewsForm $request, int $id, string $tableName, Builder $model)
    {
        $newDatas = array_column($request->get($tableName) ? $request->get($tableName) : [], 'id');
        $oldDatas = array_column($model->where('news_id', $id)->get()->toArray(), 'id');
        $delete_links = array_diff($oldDatas, $newDatas);
        $path = $model->where('news_id', $id)->get();
        $model->whereIn('id', $delete_links)->delete();
        return $path;
    }
}
