<?php

namespace App\Providers;

use App\Consts\TitleConst;
use Illuminate\Support\Facades\Route;
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
        app()->bind('en', function () {
            $controller = explode("@", Route::currentRouteAction());
            $controllerActionName = explode('\\', $controller[0]);
            $controllerName = $controllerActionName[3];

            return TitleConst::TITLE_LIST[$controllerName]['en'];
        });

        app()->bind('ja', function () {
            $controller = explode("@", Route::currentRouteAction());
            $controllerActionName = explode('\\', $controller[0]);
            $controllerName = $controllerActionName[3];

            return TitleConst::TITLE_LIST[$controllerName]['ja'];
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
