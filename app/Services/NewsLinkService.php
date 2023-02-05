<?php

namespace App\Services;

use App\Libs\DatabaseRegister;
use App\Models\NewsLink;

class NewsLinkService
{
    public function create($request)
    {
        $newsLink = new NewsLink;
        $columns = [
            'title',
            'link_path',
            'news_id'
        ];
        new DatabaseRegister($newsLink, $columns, $request);
    }
}
