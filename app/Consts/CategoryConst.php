<?php

namespace App\Consts;

class CategoryConst
{
    /**
     * お知らせカテゴリ
     *
     * @param array
     */

    const NEWS = 1;
    const NEWS_NAME = 'お知らせ';
    const TOURNAMENT_INFO = 2;
    const TOURNAMENT_INFO_NAME = '大会情報';

    const NEWS_CATEGORY_LIST = [
        1 => ['category' => 'お知らせ', 'color' => 'orange'],
        2 => ['category' => '大会情報', 'color' => 'blue'],
    ];

    const CATEGORY_LIST = [
        'category' => [
            1 => 'お知らせ',
            2 => '大会情報'
        ],
        'color' => [
            1 => 'orange',
            2 => 'blue'
        ]
    ];

    const GENERATION_CATEGORY_LIST = [
        1 => '高校生',
        2 => '大学生',
        3 => '社会人',
        4 => 'マスターズ',
        5 => '中学生',
    ];
}
