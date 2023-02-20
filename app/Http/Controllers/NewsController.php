<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsForm;
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
     * @param  \App\Services\NewsService  $newsService
     * @param  \App\Services\NewsLinkService  $newsLinkService
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
     * お知らせ画面
     *
     * @param  collection  $newsList
     */
    public function index()
    {
        $breakingNews = $this->news->getBrakingNews();
        $newsList = $this->news->getTopNewsList();

        return view('news.index')->with(['newsList' => $newsList, 'breakingNews' => $breakingNews]);
    }

    /**
     * お知らせ新規登録、編集画面
     *
     * @param  \App\Models\News  $news
     */
    public function create(News $news)
    {
        return view('news.create', [
            'news' => $news,
        ]);
    }

    /**
     * お知らせ新規登録処理
     *
     * @param  Illuminate\Http\Request  $request
     */
    public function store(NewsForm $request)
    {
        $this->newsService->newsCreate($request);
        return redirect('/news');
    }

    public function show($id)
    {
        return view('news.show');
    }

    public function edit($id)
    {
        $news = News::with('news_documents', 'news_links')->find($id)->toArray();
        return view('news.create', [
            'id' => $id,
            'news' => $news,
        ]);
    }


    public function update($id, NewsForm $request)
    {
        $this->newsService->newsUpdate($id, $request);
    }
}
