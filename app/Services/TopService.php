<?php

namespace App\Services;

use App\Models\Iframe;
use App\Models\Lifter;
use App\Services\LifterService;

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
        Iframe $iframe,
    ) {
        $this->lifterService = $lifterService;
        $this->iframe = $iframe;
    }

    public function getTopImages()
    {
        $topImages = [
            1 => \CommonConst::TOP_FILE_PATH . \CommonConst::TOP_IMAGE_LIST[1],
            2 => \CommonConst::TOP_FILE_PATH . \CommonConst::TOP_IMAGE_LIST[2],
            3 => \CommonConst::TOP_FILE_PATH . \CommonConst::TOP_IMAGE_LIST[3],
        ];
        return $topImages;
    }

    public function topUpdate($request)
    {
        // iframe登録処理、失敗時エラーメッセージ表示
        if(!$this->iframe->createIframe($request)) {
            return redirect()->route('top.edit')->with('message', 'iframe登録処理失敗');
        }

        if ($request->top_lifter_1) {
            $keyList = $this->lifterService->getTopLifterNameList();
            if (array_key_exists(0, $keyList)) {
                $oldLifter = Lifter::find($keyList[0]['id']);
                $oldLifter->top_post_flag = 0;
                $oldLifter->save();
            }
            $lifter = Lifter::find($request->top_lifter_1);
            $lifter->top_post_flag = 1;
            $lifter->save();
        }
        if ($request->top_lifter_2) {
            $keyList = $this->lifterService->getTopLifterNameList();
            if (array_key_exists(1, $keyList)) {
                $oldLifter = Lifter::find($keyList[1]['id']);
                $oldLifter->top_post_flag = 0;
                $oldLifter->save();
            }
            $lifter = Lifter::find($request->top_lifter_2);
            $lifter->top_post_flag = 1;
            $lifter->save();
        }
        if (isset($request->top_image_path_1)) {
            $request->file(\CommonConst::TOP_FILE_PATH_1)
                ->storeAs(\CommonConst::TOP_FILE_PATH, \CommonConst::TOP_IMAGE_LIST[1]);
        }
        if (isset($request->top_image_path_2)) {
            $request->file(\CommonConst::TOP_FILE_PATH_2)
                ->storeAs(\CommonConst::TOP_FILE_PATH, \CommonConst::TOP_IMAGE_LIST[2]);
        }
        if (isset($request->top_image_path_3)) {
            $request->file(\CommonConst::TOP_FILE_PATH_3)
                ->storeAs(\CommonConst::TOP_FILE_PATH, \CommonConst::TOP_IMAGE_LIST[3]);
        }
    }
}
