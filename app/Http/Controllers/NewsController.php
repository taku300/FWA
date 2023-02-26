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
    public function store(Request $request)
    {
        $this->newsService->newsCreate($request);

        return redirect('/news')->with('message', '登録が完了しました。');
    }

    public function show($id)
    {
        $newsDetail = $this->news->getNewsDetail($id)->toArray();

        return view('news.show')->with(['newsDetail' => $newsDetail]);
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
        $this->newsService->newsUpdate($id, $request);

        return redirect('/news')->with('message', '登録が完了しました。');
    }

    public function destroy($id)
    {
        $this->newsService->newsDelete($id);
        return redirect('/news')->with('message', '削除が完了しました。');
    }
}
