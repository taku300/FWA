<?php

namespace App\Services;

use App\Libs\DatabaseRegister;
use App\Models\News;
use App\Models\NewsDocument;
use App\Models\NewsLink;

class NewsService
{
    public $databaseRegister;

    public function __construct(DatabaseRegister $databaseRegister)
    {
        $this->databaseRegister = $databaseRegister;
    }

    public function create()
    {
        // 
    }

    public function createtest($request)
    {
        $news = new News;
        $newsColumns = [
            'category',
            'noticed_at',
            'title',
            'note',
            'detail',
            'preliminary_report_flag',
            'iframe_path'
        ];
        $this->databaseRegister->createBasicRegister($news, $newsColumns, $request);

        $newsDocument = new NewsDocument;
        $newsDocumentColumns = ['title', 'document_path', 'news_id'];
        $this->databaseRegister->createNewsDocumentRegister($newsDocument, $newsDocumentColumns, $request, $news->id);

        $newsLink = new NewsLink;
        $newsLinkColumns = ['title', 'link_path', 'news_id'];
        $this->databaseRegister->createNewsLinkRegister($newsLink, $newsLinkColumns, $request, $news->id);
    }
}
