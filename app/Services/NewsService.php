<?php

namespace App\Services;

use App\Libs\DatabaseRegister;
use App\Models\News;

class NewsService
{
    public $databaseRegister;

    public function __construct(DatabaseRegister $databaseRegister)
    {
        $this->databaseRegister = $databaseRegister;
    }

    public function create($request)
    {
        $news = new News;
        $columns = [
            'category',
            'noticed_at',
            'title',
            'note',
            'detail',
            'preliminary_report_flag',
            'iframe_path'
        ];
        $this->databaseRegister->databaseRegister($news, $columns, $request);
    }
}
