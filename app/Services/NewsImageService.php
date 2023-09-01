<?php

namespace App\Services;

use App\Models\NewsImage;

class NewsImageService
{
    /**
     * お知らせ画像削除処理
     */
    public function delete(int $id)
    {
        // 画像パスを取得
        $newsImage = NewsImage::find($id);
        $imagePath = $newsImage->news_images_path;

        // 該当レコード削除
        try {
            $newsImage->delete();
        } catch (\Exception $e) {
            logs()->error($e->getMessage());
            return false;
        }

        // storage内のファイルを削除
        if (!$this->storageFileDelete($imagePath)) {
            return false;
        }

        return true;
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