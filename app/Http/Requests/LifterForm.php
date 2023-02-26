<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LifterForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'last_name' => ['bail', 'required', 'string', 'max:255'],
            'first_name' => ['bail', 'required', 'string', 'max:255'],
            'last_name_kana' => ['bail', 'required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u', 'max:255'],
            'first_name_kana' => ['bail', 'required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u', 'max:255'],
            'birthday' => ['bail', 'required', 'date', 'before:today'],
            'gender' => 'required',
            'category' => 'required',
            'affiliation_id' => 'required',
            'weight_class' => 'required',
            'image_path' => ['bail', 'required', 'image'],
            'performance' => ['bail', 'nullable', 'string', 'max:255'],
            'comment' => ['bail', 'nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'last_name' => '氏名：姓',
            'first_name' => '氏名：名',
            'last_name_kana' => '氏名：セイ',
            'first_name_kana' => '氏名：メイ',
            'birthday' => '生年月日',
            'gender' => '性別',
            'affiliation_id' => '所属',
            'weight_class' => '階級',
            'image_path' => '画像',
            'performance' => '実績',
            'comment' => 'コメント',
        ];
    }
}
