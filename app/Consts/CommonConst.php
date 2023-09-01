<?php

namespace App\Consts;

class CommonConst
{
    /**
     * ファイルパス
     */
    const LIFTERS_FILE_PATH_NAME = 'lifter-images/';            // 選手画像
    const NEWS_FILE_PATH_NAME = 'news-documents/';              // お知らせ資料
    const NEWS_IMAGE_PATH_NAME = 'news-images';                 // お知らせ画像
    const REQUIREMENTS_FILE_PATH_NAME = 'result-requirements/'; // 大会要項
    const RESULTS_FILE_PATH_NAME = 'result-results/';           // 大会結果
    const TOP_FILE_PATH = 'top-images/';                        // トップ画像
    const ASSOCIATION_DOCUMENT_PATH = 'association-documens/';  // 協会資料

    /**
     * top画面用ファイル名
     */
    const TOP_FILE_PATH_1 = 'top_image_path_1';
    const TOP_FILE_PATH_NAME_1 = 'top_image_path_1.png'; // top画像1
    const TOP_FILE_PATH_2 = 'top_image_path_2';
    const TOP_FILE_PATH_NAME_2 = 'top_image_path_2.png'; // top画像2
    const TOP_FILE_PATH_3 = 'top_image_path_3';
    const TOP_FILE_PATH_NAME_3 = 'top_image_path_3.png'; // top画像3
    const TOP_FILE_PATH_4 = 'top_image_path_4';
    const TOP_FILE_PATH_NAME_4 = 'top_image_path_4.png'; // top画像4

    /**
     * top画像リスト
     *
     * @param  array
     */
    const TOP_IMAGE_LIST = [
        self::TOP_FILE_PATH_1 =>  self::TOP_FILE_PATH_NAME_1,
        self::TOP_FILE_PATH_2 =>  self::TOP_FILE_PATH_NAME_2,
        self::TOP_FILE_PATH_3 =>  self::TOP_FILE_PATH_NAME_3,
        self::TOP_FILE_PATH_4 =>  self::TOP_FILE_PATH_NAME_4,
    ];

    /**
     * ドキュメント
     */
    const DOCUMENT_PATH_1 = 'document_path_1';
    const DOCUMENT_PATH_NAME_1 = 'document_path_1.pdf'; // 協会定款
    const DOCUMENT_PATH_2 = 'document_path_2';
    const DOCUMENT_PATH_NAME_2 = 'document_path_2.pdf'; // ガバナンスコード
    const DOCUMENT_PATH_3 = 'document_path_3';
    const DOCUMENT_PATH_NAME_3 = 'document_path_3.pdf'; // 年間計画

    /**
     * ドキュメントリスト
     *
     * @param  array
     */
    const DOCUMENT_LIST = [
        self::DOCUMENT_PATH_1 =>  self::DOCUMENT_PATH_NAME_1,
        self::DOCUMENT_PATH_2 =>  self::DOCUMENT_PATH_NAME_2,
        self::DOCUMENT_PATH_3 =>  self::DOCUMENT_PATH_NAME_3,
    ];

    /**
     * 性別
     */
    const MEN = 1;
    const MEN_NAME = '男性';
    const WOMEN = 2;
    const WOMEN_NAME = '女性';

    /**
     * 性別リスト
     *
     * @param  array
     */
    const GENDER_LIST = [
        self::MEN => self::MEN_NAME,
        self::WOMEN => self::WOMEN_NAME,
    ];

    /**
     * 権限
     */
    const SYSTEM_ADMIN = 0;
    const SYSTEM_ADMIN_NAME = 'システム管理者';
    const SITE_ADMIN = 1;
    const SITE_ADMIN_NAME = 'サイト管理者';
    const GENERAL_USER = 3;
    const GENERAL_USER_NAME = '一般ユーザー';

    /**
     * 権限リスト
     *
     * @param  array
     */
    const USER_REGISTER_MAIL_LIST = [
        self::SYSTEM_ADMIN => self::SYSTEM_ADMIN_NAME,
        self::SITE_ADMIN => self::SITE_ADMIN_NAME,
    ];
}
