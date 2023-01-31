<?php

namespace App\Providers;

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
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            /**
             * タイトル（英）
             *
             * @return string title
             */
            $view->with('heroTitle', \GetTitleName::getTitle(0));
            /**
             * サブタイトル（日）
             *
             * @return string subTitle
             */
            $view->with('heroSubTitle', \GetTitleName::getTitle(1));
            /**
             * 画像URL
             *
             * @return string subTitle
             */
            $view->with('heroUrl', \GetTitleName::getTitle(2));
        });
    }
}
