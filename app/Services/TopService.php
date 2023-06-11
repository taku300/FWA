<?php

namespace App\Services;

use App\Models\Iframe;
use App\Models\Lifter;
use App\Models\Top;
use App\Http\Requests\TopForm;
use App\Services\LifterService;
use Illuminate\Support\Facades\DB;

class TopService
{
    /**
     * 選手関連支援クラス
     */
    private LifterService $lifterService;

    /**
     * iframeモデル
     */
    private Iframe $iframe;

    /**
     * コンストラクタ
     */
    public function __construct(
        LifterService $lifterService,
        Iframe $iframe
    ) {
        $this->lifterService = $lifterService;
        $this->iframe = $iframe;
    }

    public function getTopImages()
    {
        $topImages = [];
        if (Top::where('order_num', 1)->exists()) {
            $topImages[1] = $this->getImages(1);
        }
        if (Top::where('order_num', 2)->exists()) {
            $topImages[2] = $this->getImages(2);
        }
        if (Top::where('order_num', 3)->exists()) {
            $topImages[3] = $this->getImages(3);
        }
        if (Top::where('order_num', 4)->exists()) {
            $topImages[4] = $this->getImages(4);
        }
        return $topImages;
    }

    public function getImages($num)
    {
        $top = Top::where('order_num', $num)->first();
        return \CommonConst::TOP_FILE_PATH . $top->image_path;
    }

    public function topUpdate(TopForm $request)
    {
        // iframe登録処理、失敗時エラーメッセージ表示
        if (!$this->iframe->saveIframe($request)) {
            return redirect()->route('admins.top.edit')->with('message', 'iframe登録処理失敗');
        }

        DB::beginTransaction();
        try {
            $this->updateTopLifters($request);
            $this->updateTopImages($request);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
    }

    public function updateTopImages($request)
    {
        if (isset($request->top_image_path_1)) {
            $this->saveTopImages($request, 1, \CommonConst::TOP_FILE_PATH_1);
        }
        if (isset($request->top_image_path_2)) {
            $this->saveTopImages($request, 2, \CommonConst::TOP_FILE_PATH_2);
        }
        if (isset($request->top_image_path_3)) {
            $this->saveTopImages($request, 3, \CommonConst::TOP_FILE_PATH_3);
        }
        if (isset($request->top_image_path_4)) {
            $this->saveTopImages($request, 4, \CommonConst::TOP_FILE_PATH_4);
        }
    }

    public function saveTopImages($request, $num, $path)
    {
        if (Top::where('order_num', $num)->exists()) {
            $oldTop = Top::where('order_num', $num)->first();
            $this->deleteFilePath('image_path', $oldTop);
            $oldTop->delete();
        }
        $this->createTops($request, $num, $path);
    }

    public function updateTopLifters($request)
    {
        if ($request->top_lifter_1) {
            $this->saveTopLifters($request, 0, 'top_lifter_1');
        }
        if ($request->top_lifter_2) {
            $this->saveTopLifters($request, 1, 'top_lifter_2');
        }
    }

    public function saveTopLifters($request, $num, $column)
    {
        $keyList = $this->lifterService->getTopLifterNameList();
        if (array_key_exists($num, $keyList)) {
            $oldLifter = Lifter::find($keyList[$num]['id']);
            $oldLifter->top_post_flag = 0;
            $oldLifter->save();
        }
        $lifter = Lifter::find($request->$column);
        $lifter->top_post_flag = 1;
        $lifter->save();
    }

    public function createTops($request, $num, $path)
    {
        $top = new Top;
        $top->image_path = $this->getDatas($request, $path, $top);
        $top->order_num = $num;
        $top->save();
    }

    /**
     * @param  mixed  $file
     *
     * @return  mixed
     */
    public function getDatas($request, $defaultPath)
    {
        if ($request->file($defaultPath)) {
            $path = $request->file($defaultPath)->store(\CommonConst::TOP_FILE_PATH);
        }
        return basename($path);
    }

    /**
     * @param  string  $path
     * @param  mixed  $fileNames
     */
    public static function deleteFilePath($path, $fileName)
    {
        \Storage::delete(\CommonConst::TOP_FILE_PATH . $fileName[$path]);
    }
}
