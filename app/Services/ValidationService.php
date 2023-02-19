<?php

namespace App\Services;

class ValidationService
{
    public function validation($request)
    {
        $route = $this->getControllerAction();
        if ($route === 'LiftersController@store') {
            $this->lifterValidation($request);
            dd($request);
        }
    }

    /**
     * コントローラ名取得
     * バリデーション判定用
     */
    public function getControllerAction()
    {
        $tmp1 = explode("@", \Route::currentRouteAction());
        $tmp2 = explode('\\', $tmp1[0]);
        return end($tmp2) . '@' . $tmp1[1];
    }

    /**
     * lifters用バリデーション
     */
    public function lifterValidation($request)
    {
        $validated = $request->validate([
            'last_name' => 'bail|required|string',
            'first_name' => 'bail|required|string',
            'last_name_kana' => 'bail|required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_kana' => 'bail|required|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'birthday' => 'bail|required|before:today',
            'gender' => 'required',
            'category' => 'required',
            'affiliation_id' => 'required',
            'weight_class' => 'required',
            'image_path' => 'bail|required|image',
        ]);
    }
}
