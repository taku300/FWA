<?php

namespace App\Services;

use App\Http\Requests\NewsForm;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\NewsDocument;
use App\Models\NewsImage;
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

            $newsImages = $request->get('news_images') ? $request->get('news_images') : [];
            // お知らせ画像登録
            if ($files = $request->file('news_images')) {
                foreach ($files as $key => $value) {
                    $path = $value['news_images_file']->store(\CommonConst::NEWS_IMAGE_PATH_NAME);
                    $newsImages[$key]['news_images_path'] = basename($path);
                }
            }
            $news->news_images()->createMany($newsImages);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    /**
     * お知らせ更新
     * 
     * @param  int       $id
     * @param  NewsForm  $request
     */
    public function newsUpdate(int $id, NewsForm $request)
    {
        DB::beginTransaction();
        try {
            // お知らせ更新
            $news = News::find($id);
            $news->update($request->all());

            // お知らせ資料の古いパスを削除
            $deletePath = $this->diffDelete($request, $id, 'news_documents', NewsDocument::query());
            \DeleteFile::deleteFilePath('document_path', $deletePath);
            // お知らせ資料のパラメータ取得
            $newsDocuments = $request->get('news_documents') ? $request->get('news_documents') : [];
            // パス抜き出し
            if ($files = $request->file('news_documents')) {
                foreach ($files as $key => $value) {
                    $path = $value['document_file']->store(\CommonConst::NEWS_FILE_PATH_NAME);
                    $newsDocuments[$key]['document_path'] = basename($path);
                }
            }
            // お知らせ資料の更新
            $news->news_documents()->upsert($newsDocuments, ['id'], ['title', 'document_path', 'news_id']);

            // お知らせリンクの更新
            $news->news_links()->upsert($request->get('news_links') ? $request->get('news_links') : [], ['id'], ['title', 'link_path', 'news_id']);

            // お知らせ画像のパラメータ取得
            $newsImages = $request->get('news_images') ? $request->get('news_images') : [];
            // お知らせ画像の古いパスを削除
            $oldNewsImages = NewsImage::where('news_id', $id)->get();
            if ($oldNewsImages) {
                foreach ($oldNewsImages as $key => $oldNewsImage) {
                    if ($request->file('news_images') && array_key_exists($key, $request->file('news_images'))) {
                        $oldPath = $oldNewsImage->news_images_path;
                        if (\Storage::exists(\CommonConst::NEWS_IMAGE_PATH_NAME . "/{$oldPath}")) {
                            \Storage::delete(\CommonConst::NEWS_IMAGE_PATH_NAME . "/{$oldPath}");
                        }
                    }
                }
            }
            // news_images_pathに値がセットされている場合は更新処理実行
            if ($request->file('news_images')) {
                // パス抜き出し
                if ($files = $request->file('news_images')) {
                    foreach ($files as $key => $value) {
                        $path = $value['news_images_file']->store(\CommonConst::NEWS_IMAGE_PATH_NAME);
                        $newsImages[$key]['news_images_path'] = basename($path);
                    }
                }
                // お知らせ画像の更新
                $news->news_images()->upsert($newsImages, ['id'], ['news_images_path', 'news_id', 'news_image_title']);
            }
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
            foreach ($news->news_images()->get() as $newsImage) {
                $this->storageFileDelete($newsImage->news_images_path);
            }
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

    /**
     * storage内のファイル削除処理
     */
    private function storageFileDelete(string $filePath)
    {
        // pathを定義
        $path = \CommonConst::NEWS_IMAGE_PATH_NAME . "/{$filePath}";

        // ファイルの存在確認
        if (!\Storage::exists($path)) {
            return false;
        }

        // ファイル削除
        try {
            \Storage::delete($path);
        } catch (\Exception $e) {
            logs()->error($e->getMessage());
            return false;
        }

        // 処理結果返却
        return \Storage::exists($path) ? false : true;
    }
}
