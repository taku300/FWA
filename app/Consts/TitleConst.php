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
     * @param array
     */
    const TITLE_LIST = [
        // トップにはタイトルタグのプレフィクスは必要ないのでから文字にする。s
        'Top' => [
            0 => 'TOP',
            1 => '',
            2 => 'images/heros/hero1.png'
        ],
        'About' => [
            0 => 'ABOUT',
            1 => '協会について',
            2 => 'images/heros/hero1.png'
        ],
        'History' => [
            0 => 'HISTORY',
            1 => '協会の歩み',
            2 => 'images/heros/hero1.png'
        ],
        'Plans' => [
            0 => 'PLANS',
            1 => '年間計画',
            2 => 'images/heros/hero1.png'
        ],
        'Results' => [
            0 => 'RESULTS',
            1 => '要項・結果',
            2 => 'images/heros/hero2.png'
        ],
        'Records' => [
            0 => 'RECORDS',
            1 => '大会記録',
            2 => 'images/heros/hero2.png'
        ],
        'Lifters' => [
            0 => 'LIFTERS',
            1 => '選手紹介',
            2 => 'images/heros/hero3.png'
        ],
        'News' => [
            0 => 'NEWS',
            1 => 'お知らせ',
            2 => 'images/heros/hero4.png'
        ],
        'Contact' => [
            0 => 'CONTACT',
            1 => 'お問い合わせ',
            2 => 'images/heros/hero5.png'
        ],
        'Documents' => [
            0 => 'DOCUMENTS',
            1 => 'ドキュメント',
            2 => 'images/heros/hero5.png'
        ],
    ];
}
