<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Services\NewsService;
use App\Services\NewsLinkService;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {
            $news_documents = $request->get('news_documents');
            $files = $request->file('news_documents');
            foreach ($files as $key => $file) {
                $document_name = $file['document_path']->getClientOriginalName();
                $file['document_path']->storeAS('documents', $document_name);
                $news_documents[$key]['document_path'] = $document_name;
            }
            $news = new News($request->all());
            $news->save();
            $news->news_links()->createMany($request->get('news_links'));
            $news->news_documents()->createMany($news_documents);
        } catch (Exception $e) {
            DB::rollback();
            echo ($e);
            return back()->withInput();
        }
        DB::commit();
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
