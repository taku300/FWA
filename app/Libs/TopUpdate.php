<?php

namespace App\Libs;

use App\Models\Lifter;
use App\Services\LifterService;
use Illuminate\Support\Facades\Storage;

class TopUpdate
{
    public $lifterService;

    public function __construct(LifterService $lifterService)
    {
        $this->lifterService = $lifterService;
    }

    public function topUpdate($request)
    {
        if ($request->top_lifter_1) {
            $keyList = $this->lifterService->getTopLifterNameList();
            $oldLifter = Lifter::find($keyList[0]['id']);
            $oldLifter->top_post_flag = 0;
            $oldLifter->save();
            $lifter = Lifter::find($request->top_lifter_1);
            $lifter->top_post_flag = 1;
            $lifter->save();
        }
        if ($request->top_lifter_2) {
            $keyList = $this->lifterService->getTopLifterNameList();
            $oldLifter = Lifter::find($keyList[1]['id']);
            $oldLifter->top_post_flag = 0;
            $oldLifter->save();
            $lifter = Lifter::find($request->top_lifter_2);
            $lifter->top_post_flag = 1;
            $lifter->save();
        }
        if ($request->top_image_path_1) {
            $request->file(\CommonConst::TOP_FILE_PATH_1)
                ->storeAs(\CommonConst::TOP_FILE_PATH_NAME, \CommonConst::TOP_FILE_PATH_1 . '.png');
        }
        if ($request->top_image_path_2) {
            $request->file(\CommonConst::TOP_FILE_PATH_2)
                ->storeAs(\CommonConst::TOP_FILE_PATH_NAME, \CommonConst::TOP_FILE_PATH_2 . '.png');
        }
        if ($request->top_image_path_3) {
            $request->file(\CommonConst::TOP_FILE_PATH_3)
                ->storeAs(\CommonConst::TOP_FILE_PATH_NAME, \CommonConst::TOP_FILE_PATH_3 . '.png');
        }
    }
}
