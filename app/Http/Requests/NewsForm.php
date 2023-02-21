<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsForm extends FormRequest
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
            'category' => 'required',
            'noticed_at' => ['bail', 'required', 'date'],
            'title' => ['bail', 'required', 'max:255'],
            'note' => 'max:255',
            'detail' => 'max:255',
            'iframe_path' => 'max:255',
            'preliminary_report_flag' => 'required',
            'news_documents' => 'array',
            'news_documents.*.title' => ['bail', 'required_with:news_documents.*.document_file', 'string'],
            'news_documents.*.document_file' => ['bail', 'required_with:news_documents.*.document_title', 'file'],
        ];
    }
}
