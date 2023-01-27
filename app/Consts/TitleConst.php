<?php

namespace App\Consts;

class TitleConst
{
    /**
     * タイトルネーム
     * 
     * 0:タイトル
     * 1:サブタイトル
     * 
     * @return array
     */
    const TITLE_LIST = [
        'About' => [
            0 => 'ABOUT',
            1 => '協会について'
        ],
        'History' => [
            0 => 'HISTORY',
            1 => '協会の歩み'
        ],
        'Plan' => [
            0 => 'PLAN',
            1 => '年間計画'
        ],
        'Result' => [
            0 => 'RESULT',
            1 => '要項・結果'
        ],
        'Record' => [
            0 => 'RECORD',
            1 => '大会記録'
        ],
        'Lifters' => [
            0 => 'LIFTERS',
            1 => '選手紹介'
        ],
        'News' => [
            0 => 'NEWS',
            1 => 'お知らせ'
        ],
        'Contact' => [
            0 => 'CONTACT',
            1 => 'お問い合わせ'
        ],
    ];
}
