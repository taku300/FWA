<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

/**
 * トップ画面
 *
 */
class TopController extends Controller
{
    public $news;

    /**
     * News $news
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * @param collection $newsList
     */
    public function index()
    {
        $newsList = $this->news->getNewsList();

        return view('top.index')->with(['newsList' => $newsList]);
    }
}
