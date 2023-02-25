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
            'top_image_path_1' => ['file'],
            'top_image_path_2' => ['file'],
            'top_image_path_3' => ['file'],
        ];
    }
}
