<?php

namespace App\Libs;

use Illuminate\Support\Facades\Route;

class GetTitleName
{
    /**
     * コントローラー名取得
     * 
     * @param  string  $key
     * @return string
     */
    public static function getTitle($key)
    {
        $controller = explode("@", Route::currentRouteAction());
        $controllerName = explode('\\', $controller[0]);
        $titleKey = mb_substr($controllerName[3], 0, -10);

        return \TitleConst::TITLE_LIST[$titleKey][$key];
    }
}
