<?php

namespace App\Http\Controllers;

use App\Models\Iframe;
use App\Models\News;
use App\Models\Lifter;
use App\Services\LifterService;
use App\Services\TopService;
use App\Http\Requests\TopForm;

/**
 * トップ画面
 *
 */
class TopController extends Controller
{
    public $iframe;
    public $news;
    public $lifter;
    public $lifterService;
    public $topService;

    /**
     * @param  \App\Models\Iframe  $iframe
     * @param  \App\Models\News  $news
     * @param  \App\Models\Lifter  $lifter
     * @param  \App\Models\LifterService  $lifterService
     */
    public function __construct(
        Iframe $iframe,
        News $news,
        Lifter $lifter,
        LifterService $lifterService,
        TopService $topService
    ) {
        $this->iframe = $iframe;
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
        $iframePath = $this->iframe->getIframePath();
        $topImagePath = $this->topService->getTopImages();
        $breakingNews = $this->news->getBrakingNews();
        $newsList = $this->news->getNewsList();
        $lifterList = $this->lifterService->getTopLifterList();

        return view('top.index')->with(compact('iframePath', 'breakingNews', 'newsList', 'lifterList', 'topImagePath'));
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
