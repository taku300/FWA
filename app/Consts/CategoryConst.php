<?php

namespace App\Consts;

class CategoryConst
{
    /**
     * お知らせカテゴリ
     *
     * @param array
     */

    const NEWS_CATEGORY_LIST = [
        1 => ['category' => 'お知らせ', 'color' => 'orange'],
        2 => ['category' => '大会情報', 'color' => 'red'],
    ];

    const GENERATION_CATEGORY_LIST = [
        1 => '高校生',
        2 => '大学生',
        3 => '社会人',
        4 => 'マスターズ',
        5 => '中学生',
    ];
}
