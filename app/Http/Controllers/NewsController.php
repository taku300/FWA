<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Services\NewsService;
use App\Services\NewsLinkService;

/**
 * お知らせ
 *
 */
class NewsController extends Controller
{
    public $news;
    public $newsService;
    public $newsLinkService;

    /**
     * @param  \App\Models\News  $news
     */
    public function __construct(
        News $news,
        NewsService $newsService,
        NewsLinkService $newsLinkService
    ) {
        $this->news = $news;
        $this->newsService = $newsService;
        $this->newsLinkService = $newsLinkService;
    }

    /**
     * @param  collection  $newsList
     */
    public function index()
    {
        $newsList = $this->news->getTopNewsList();

        return view('news.index')->with(['newsList' => $newsList]);
    }

    public function create(News $news)
    {
        return view('news.create', [
            'news' => $news,
        ]);
    }

    public function store(Request $request)
    {
        $this->newsService->create($request);
        return redirect('/news');
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
