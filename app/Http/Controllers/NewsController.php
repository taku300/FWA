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
    public $newsService;
    public $newsLinkService;

    public function __construct(NewsService $newsService, NewsLinkService $newsLinkService)
    {
        $this->newsService = $newsService;
        $this->newsLinkService = $newsLinkService;
    }

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

    public function store(Request $request)
    {
        $this->newsService->create($request);
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
