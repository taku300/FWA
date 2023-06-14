<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopForm extends FormRequest
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
            'top_lifter_1' => ['nullable', 'integer', 'different:top_lifter_2'],
            'top_lifter_2' => ['nullable', 'integer', 'different:top_lifter_1'],
            'top_image_path_1' => ['nullable', 'file'],
            'top_image_path_2' => ['nullable', 'file'],
            'top_image_path_3' => ['nullable', 'file'],
            'top_image_path_4' => ['nullable', 'file'],
            'iframe_path' => ['nullable', 'url'],
        ];
    }

    public function attributes()
    {
        return [
            'top_lifter_1' => 'トップ選手写真１',
            'top_lifter_2' => 'トップ選手写真２',
            'top_image_path_1' => 'トップ写真１',
            'top_image_path_2' => 'トップ写真２',
            'top_image_path_3' => 'トップ写真３',
            'top_image_path_4' => 'トップ写真４',
            'iframe_path' => 'iframe path',
        ];
    }
}
