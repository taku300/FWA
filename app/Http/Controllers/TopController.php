<?php

namespace App\Http\Controllers;

use App\Libs\TopUpdate;
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
    public $topUpdate;

    /**
     * @param  \App\Models\News  $news
     * @param  \App\Models\Lifter  $lifter
     * @param  \App\Models\LifterService  $lifterService
     */
    public function __construct(
        News $news,
        Lifter $lifter,
        LifterService $lifterService,
        TopUpdate $topUpdate
    ) {
        $this->news = $news;
        $this->lifter = $lifter;
        $this->lifterService = $lifterService;
        $this->topUpdate = $topUpdate;
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
        $topLifterList = $this->lifterService->getTopLifterNameList();
        $allLifterList = $this->lifterService->getAllLifterNameList();

        return view('top.edit')->with(['topLifterList' => $topLifterList, 'allLifterList' => $allLifterList]);
    }

    public function update(Request $request)
    {
        $this->topUpdate->topUpdate($request);

        return redirect('/');
    }
}
