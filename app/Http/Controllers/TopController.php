<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Lifter;
use App\Services\LifterService;
use Illuminate\Http\Request;

/**
 * トップ画面
 *
 */
class TopController extends Controller
{
    public $news;
    public $lifter;
    public $lifterService;

    /**
     * @param  \App\Models\News  $news
     * @param  \App\Models\Lifter  $lifter
     * @param  \App\Models\LifterService  $lifterService
     */
    public function __construct(
        News $news,
        Lifter $lifter,
        LifterService $lifterService
    ) {
        $this->news = $news;
        $this->lifter = $lifter;
        $this->lifterService = $lifterService;
    }

    /**
     * @param  collection  $newsList
     * @param  array  $lifterList
     */
    public function index()
    {
        $breakingNews = $this->news->getBrakingNews();
        $newsList = $this->news->getTopNewsList();
        $lifterList = $this->lifterService->getTopLifterList();


        return view('top.index')->with(compact('breakingNews', 'newsList', 'lifterList'));
    }

    public function edit()
    {
        $newsList = $this->news->getNewsList();

        return view('top.edit')->with(['newsList' => $newsList]);
    }
}
