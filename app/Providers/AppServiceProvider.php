<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Common\TitleCommon');
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
