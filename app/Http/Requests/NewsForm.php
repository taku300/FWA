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
            'news_documents.*.document_path' => ['required_with:news_documents.*.title', 'string'],
            'news_links' => 'array',
            'news_links.*.title' => ['required_with:news_links.*.link_path', 'string'],
            'news_links.*.link_path' => ['required_with:news_links.*.title', 'string'],
            'news_images' => 'array',
            'news_images.*.news_images_path' => 'image',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'noticed_at' => 'お知らせ日',
            'note' => '注意書き',
            'detail' => 'お知らせ詳細',
            'iframe_path' => 'iframeURL',
            'preliminary_report_flag' => '速報',
            'news_documents.*.title' => '資料タイトル',
            'news_documents.*.document_path' => '資料ファイル',
            'news_links.*.title' => 'リンクタイトル',
            'news_links.*.link_path' => 'リンクファイル',
            'news_images.*.news_images_path' => '画像ファイル',
        ];
    }
}
