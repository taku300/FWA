<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Lifter;
use App\Models\Top;
use App\Services\LifterService;
use App\Services\TopService;
use App\Http\Requests\TopForm;

/**
 * トップ画面
 *
 */
class TopController extends Controller
{
    public $news;
    public $lifter;
    public $lifterService;
    public $topService;

    /**
     * @param  \App\Models\News  $news
     * @param  \App\Models\Lifter  $lifter
     * @param  \App\Models\LifterService  $lifterService
     */
    public function __construct(
        News $news,
        Lifter $lifter,
        LifterService $lifterService,
        TopService $topService
    ) {
        $this->news = $news;
        $this->lifter = $lifter;
        $this->lifterService = $lifterService;
        $this->topService = $topService;
    }

    /**
     * @param  collection  $newsList
     * @param  array  $lifterList
     */
    public function index()
    {
        $topImagePath = $this->topService->getTopImages();
        $breakingNews = $this->news->getBrakingNews();
        $newsList = $this->news->getTopNewsList();
        $lifterList = $this->lifterService->getTopLifterList();

        return view('top.index')->with(compact('breakingNews', 'newsList', 'lifterList', 'topImagePath'));
    }

    public function edit()
    {
        $topLifterList = $this->lifterService->getTopLifterNameList();
        $allLifterList = $this->lifterService->getAllLifterNameList();

        return view('top.edit')->with(['topLifterList' => $topLifterList, 'allLifterList' => $allLifterList]);
    }

    public function update(TopForm $request)
    {
        $this->topService->topUpdate($request);

        return redirect('/')->with('message', '更新が完了しました。');
    }
}
