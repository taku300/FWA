<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

/**
 * お知らせ
 *
 */
class NewsController extends Controller
{
    public function index()
    {
        return view('news.index');
    }

    public function create(News $news)
    {
        return view('news.create', [
            'news' => $news,
        ]);
    }

    public function store()
    {
    }

    public function edit($id)
    {
        $news = News::with('news_documents', 'news_links')->find($id);
        return view('news.create', [
            'id' => $id,
            'news' => $news,
        ]);
    }

    public function update($id)
    {
    }
}
