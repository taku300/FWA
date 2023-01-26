<?php

namespace App\Providers;

use App\Common\TitleCommon;
use App\Facades\TitleCommon as FacadesTitleCommon;
use Illuminate\Support\ServiceProvider;

class TopTitleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * TitleCommon alias
         */
        $this->app->bind(
            'TitleCommon',
            'App\Common\TitleCommon'
        );

        // タイトル
        app()->bind('en', function () {
            return TitleCommon::getTitle('en');
        });

        // サブタイトル
        app()->bind('ja', function () {
            return TitleCommon::getTitle('ja');
        });
    }
}
