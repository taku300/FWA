<?php

namespace App\Consts;

class CommonConst
{
    // ファイルパス
    const LIFTERS_FILE_PATH_NAME = 'lifters/';
    // 性別
    const MEN = 0;
    const MEN_NAME = '男性';
    const WOMEN = 1;
    const WOMEN_NAME = '女性';
    // 権限
    const SYSTEM_ADMIN = 0;
    const SYSTEM_ADMIN_NAME = 'システム管理者';
    const SITE_ADMIN = 1;
    const SITE_ADMIN_NAME = 'サイト管理者';
    const GENERAL_USER = 2;
    const GENERAL_USER_NAME = '一般ユーザー';
    /**
     * お知らせカテゴリ
     *
     * @param array
     */
    const GENDER_LIST = [
        self::MEN => self::MEN_NAME,
        self::WOMEN => self::WOMEN_NAME,
    ];

    const USER_REGISTER_MAIL_LIST = [
        self::SYSTEM_ADMIN => self::SYSTEM_ADMIN_NAME,
        self::SITE_ADMIN => self::SITE_ADMIN_NAME,
        self::GENERAL_USER => self::GENERAL_USER_NAME,
    ];
}
