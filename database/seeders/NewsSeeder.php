<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsLink;
use App\Models\NewsDocument;
use App\Models\Result;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::factory()->count(20)->create();

        //リンク、資料と関連付けあり
        News::factory()->count(3)
            ->has(NewsLink::factory()->count(3), 'news_links')
            ->has(NewsDocument::factory()->count(3), 'news_documents')
            ->create();

        //大会結果と関連付けあり
        News::factory()->count(3)
            ->has(Result::factory(), 'result')
            ->create();

    }
}
