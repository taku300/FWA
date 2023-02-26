<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultForm extends FormRequest
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
            'started_at' => ['bail', 'required', 'date', 'after_or_equal:ended_at'],
            'ended_at' => ['bail', 'required', 'date', 'before_or_equal:started_at'],
            'name' => ['bail', 'required', 'string', 'max:255'],
            'venue' => ['bail', 'required', 'string', 'max:255'],
            'requirement_path' => 'file',
            'result_path' => 'file',
        ];
    }

    public function attributes()
    {
        return [
            'started_at' => '開催日：開始日',
            'ended_at' => '開催日：終了日',
            'name' => '大会名',
            'venue' => '開催日',
            'requirement_path' => '大会要項URL',
            'result_path' => '大会結果URL',
        ];
    }
}
