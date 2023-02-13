<?php

namespace App\Services;

use App\Libs\Convert;
use App\Models\Lifter;

class LifterService
{
    public $lifter;

    /**
     * @param  \App\Models\Lifter  $lifter
     */
    public function __construct(Lifter $lifter)
    {
        $this->lifter = $lifter;
    }

    /**
     * top画面用lifters list
     *
     * @return array
     */
    public function getTopLifterList(): array
    {
        $lifters = $this->lifter->getTopLifter();
        $topLifters = [];
        foreach ($lifters as $value) {
            $value['image_path'] = \Storage::url(\CommonConst::LIFTERS_FILE_PATH_NAME . $value['image_path']);
            $topLifters[] = $this->addColumn($value);
        }
        return $topLifters;
    }

    /**
     * ヘボン式ローマ字を成形して追加したカラムへ格納
     *
     * @param  array  $value
     *
     * @return array
     */
    public function addColumn($value): array
    {
        $firstName = $this->codeConvert($value['first_name_kana']);
        $lastName = $this->codeConvert($value['last_name_kana']);
        $addColumn = [
            'first_name_hebon' => ucfirst(implode('', $firstName)),
            'last_name_hebon' => ucfirst(implode('', $lastName))
        ];
        return $value + $addColumn;
    }

    /**
     * ヘボン式ローマ字へ変換
     *
     * @param  string  $name
     *
     * @return array
     */
    public function codeConvert($name): array
    {
        $convertName = new Convert(mb_convert_kana($name, "Hc"));
        return $convertName->getHebon();
    }
}
