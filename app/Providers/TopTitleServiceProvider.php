<?php

namespace App\Providers;

use App\Common\TitleCommon;
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //compose all the views....
        View::composer('*', function ($view)
        {
            //...with this variable
            $view->with('en', TitleCommon::getTitle('en'));
            $view->with('ja', TitleCommon::getTitle('ja'));
        });
    }
}
