<?php

namespace App\Services;

use App\Models\Lifter;
use App\Models\Top;
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
        $topImages = [];
        $tops = Top::get();
        foreach ($tops as $top) {
            if ($top->img_type === 1) {
                $topImages[1] = \CommonConst::TOP_FILE_PATH . $top->image_path;
            } else {
                $topImages[1] = '';
            }
            if ($top->img_type === 2) {
                $topImages[2] = \CommonConst::TOP_FILE_PATH . $top->image_path;
            } else {
                $topImages[2] = '';
            }
            if ($top->img_type === 3) {
                $topImages[3] = \CommonConst::TOP_FILE_PATH . $top->image_path;
            } else {
                $topImages[3] = '';
            }
        }
        return $topImages;
    }

    public function topUpdate($request)
    {
        $datas = $request->all();
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
            if (Top::where('img_type', 1)->exists()) {
                $oldTop = Top::where('img_type', 1)->get();
                $this->deleteFilePath('image_path', $oldTop);
                \DeleteFile::deleteFilePath(\CommonConst::TOP_FILE_PATH, $oldTop[0]['image_path']);
                foreach ($oldTop as $val) {
                    $val->delete();
                }
            }
            $top = new Top;
            $top->image_path = $this->getDatas($request, \CommonConst::TOP_FILE_PATH_1, $top);
            $top->img_type = 1;
            $top->save();
        }
        if (isset($request->top_image_path_2)) {
            if (Top::where('img_type', 2)->exists()) {
                $oldTop = Top::where('img_type', 2)->get();
                $this->deleteFilePath('image_path', $oldTop);
                \DeleteFile::deleteFilePath(\CommonConst::TOP_FILE_PATH, $oldTop[0]['image_path']);
                foreach ($oldTop as $val) {
                    $val->delete();
                }
            }
            $top = new Top;
            $top->image_path = $this->getDatas($request, \CommonConst::TOP_FILE_PATH_2, $top);
            $top->img_type = 2;
            $top->save();
        }
        if (isset($request->top_image_path_3)) {
            if (Top::where('img_type', 3)->exists()) {
                $oldTop = Top::where('img_type', 3)->get();
                $this->deleteFilePath('image_path', $oldTop);
                \DeleteFile::deleteFilePath(\CommonConst::TOP_FILE_PATH, $oldTop[0]['image_path']);
                foreach ($oldTop as $val) {
                    $val->delete();
                }
            }
            $top = new Top;
            $top->image_path = $this->getDatas($request, \CommonConst::TOP_FILE_PATH_3, $top);
            $top->img_type = 3;
            $top->save();
        }
    }

    /**
     * @param  mixed  $file
     *
     * @return  mixed
     */
    public function getDatas($request, $defaultPath, $model): mixed
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
    public static function deleteFilePath($path, $fileNames)
    {
        foreach ($fileNames as $fileName) {
            \Storage::delete(\CommonConst::TOP_FILE_PATH . $fileName[$path]);
        }
    }
}
