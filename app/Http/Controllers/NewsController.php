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
    public $news;

    /**
     * @param  \App\Models\News  $news
     */
    public function __construct(
        News $news,
    ) {
        $this->news = $news;
    }

    /**
     * @param  collection  $newsList
     */
    public function index()
    {
        $newsList = $this->news->getTopNewsList();

        return view('news.index')->with(['newsList' => $newsList]);
    }

    public function show($id)
    {
        return view('news.show');
    }

    public function create()
    {
        $news = new News;
        return view('news.create', [
            'news' => $news,
        ]);
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        $news = News::with('news_documents', 'news_links')->find($id)->toArray();
        return view('news.create', [
            'id' => $id,
            'news' => $news,
        ]);
    }

    public function update($id, Request $request)
    {
    }
}
