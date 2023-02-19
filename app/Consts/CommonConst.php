<?php

namespace App\Consts;

class CommonConst
{
    /**
     * ファイルパス
     */
    const LIFTERS_FILE_PATH_NAME = 'public/lifter-images/';            // 選手画像
    const NEWS_FILE_PATH_NAME = 'public/news-documents/';              // お知らせ資料
    const REQUIREMENTS_FILE_PATH_NAME = 'public/result-requirements/'; // 大会要項
    const RESULTS_FILE_PATH_NAME = 'public/result-results/';           // 大会結果
    const TOP_FILE_PATH_NAME = 'public/top-images/';                  // トップ画像

    /**
     * top画面用ファイル名
     */
    const TOP_FILE_PATH_1 = 'top_image_path_1'; // top画像1
    const TOP_FILE_PATH_2 = 'top_image_path_2'; // top画像2
    const TOP_FILE_PATH_3 = 'top_image_path_3'; // top画像3

    /**
     * 性別
     */
    const MEN = 1;
    const MEN_NAME = '男性';
    const WOMEN = 2;
    const WOMEN_NAME = '女性';

    /**
     * 権限
     */
    const SYSTEM_ADMIN = 0;
    const SYSTEM_ADMIN_NAME = 'システム管理者';
    const SITE_ADMIN = 1;
    const SITE_ADMIN_NAME = 'サイト管理者';
    const GENERAL_USER = 2;
    const GENERAL_USER_NAME = '一般ユーザー';

    /**
     * 性別リスト
     *
     * @param array
     */
    const GENDER_LIST = [
        self::MEN => self::MEN_NAME,
        self::WOMEN => self::WOMEN_NAME,
    ];

    /**
     * 権限リスト
     *
     * @param array
     */
    const USER_REGISTER_MAIL_LIST = [
        self::SYSTEM_ADMIN => self::SYSTEM_ADMIN_NAME,
        self::SITE_ADMIN => self::SITE_ADMIN_NAME,
        self::GENERAL_USER => self::GENERAL_USER_NAME,
    ];
}
