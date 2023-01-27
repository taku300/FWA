<?php

namespace App\Providers;

use App\Libs\GetTitleName;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class TopTitleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * タイトルネーム
     * 
     * 0:タイトル
     * 1:サブタイトル
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            /**
             * タイトル（英）
             * 
             * @return string title
             */
            $view->with('title', GetTitleName::getTitle(0));
            /**
             * サブタイトル（日）
             * 
             * @return string subTitle
             */
            $view->with('subTitle', GetTitleName::getTitle(1));
        });
    }
}
