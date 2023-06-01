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

    }
}
