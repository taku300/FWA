<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
        // dd(Request::all());s
        return [
            'category' => 'required',
            'noticed_at' => ['bail', 'required', 'date'],
            'title' => ['bail', 'required', 'max:255'],
            'note' => 'max:255',
            'detail' => 'max:255',
            'iframe_path' => 'max:255',
            'preliminary_report_flag' => 'required',
            'news_documents' => 'array',
            'news_documents.*.title' => ['required_with:news_documents.*.document_path', 'string'],
            'news_documents.*.document_path' => ['required_with:news_documents.*.title','string'],
            'news_links' => 'array',
            'news_links.*.title' => ['required_with:news_links.*.link_path', 'string'],
            'news_links.*.link_path' => ['required_with:news_links.*.title', 'string'],
        ];
    }
}
