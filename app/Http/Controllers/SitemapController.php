<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\News;

class SitemapController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $sitemap = Sitemap::create();

        // Topページ
        $sitemap->add(Url::create(route('index'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
                ->setPriority(1.0));

        // 協会概要
        $sitemap->add(Url::create(route('about.index'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.8));

        // 選手紹介
        $sitemap->add(Url::create(route('lifters.index'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.4));

        // お知らせ一覧
        $sitemap->add(Url::create(route('news.index'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
            ->setPriority(0.8));

        News::all()->each(function (News $news) use ($sitemap) {
          $sitemap->add(Url::create(route('news.show', compact('news')))
            ->setLastModificationDate($news->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
            ->setPriority(0.8));
        });

        // 大会結果
        $sitemap->add(Url::create(route('results.index'))
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
        ->setPriority(0.8));

        // 大会記録
        $sitemap->add(Url::create(route('records.index'))
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.6));

        // お問い合わせ
        $sitemap->add(Url::create(route('contact.index'))
        ->setLastModificationDate(now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        ->setPriority(0.3));

        // サイトマップをxmlへ書き込み
        $sitemap->writeToFile(public_path('sitemap.xml'));

        // xmlを表示
        return redirect('/sitemap.xml');
    }
}
