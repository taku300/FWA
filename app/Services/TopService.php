<?php

namespace App\Services;

use App\Models\Lifter;
use App\Services\LifterService;

class TopService
{
    public $lifterService;

    public function __construct(LifterService $lifterService)
    {
        $this->lifterService = $lifterService;
    }

    public function getTopImages()
    {
        $topImages = [
            1 => \Storage::get($this->topImage1()),
            2 => \Storage::get($this->topImage2()),
            3 => \Storage::get($this->topImage3()),
        ];
        return $topImages;
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
                ->storeAs($this->topImage1());
        }
        if ($request->top_image_path_2) {
            $request->file(\CommonConst::TOP_FILE_PATH_2)
                ->storeAs($this->topImage2());
        }
        if ($request->top_image_path_3) {
            $request->file(\CommonConst::TOP_FILE_PATH_3)
                ->storeAs($this->topImage3());
        }
    }

    public function topImage1()
    {
        $image = \CommonConst::TOP_FILE_PATH_NAME . \CommonConst::TOP_FILE_PATH_1 . '.png';
        return $image;
    }

    public function topImage2()
    {
        $image = \CommonConst::TOP_FILE_PATH_NAME . \CommonConst::TOP_FILE_PATH_2 . '.png';
        return $image;
    }

    public function topImage3()
    {
        $image = \CommonConst::TOP_FILE_PATH_NAME . \CommonConst::TOP_FILE_PATH_3 . '.png';
        return $image;
    }
}
