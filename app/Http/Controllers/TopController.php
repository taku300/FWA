<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Lifter;
use Illuminate\Http\Request;

/**
 * トップ画面
 *
 */
class TopController extends Controller
{
    public $news;
    public $lifter;

    /**
     * News $news
     */
    public function __construct(News $news, Lifter $lifter)
    {
        $this->news = $news;
        $this->lifter = $lifter;
    }

    /**
     * @param collection $newsList
     */
    public function index()
    {
        $newsList = $this->news->getNewsList();
        $lifterList = $this->lifter->getLifterList();

        return view('top.index')->with(['newsList' => $newsList, 'lifterList' => $lifterList]);
    }
}
