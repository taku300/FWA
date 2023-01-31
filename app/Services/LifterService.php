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
        foreach ($lifters as $key => $value) {
            // １人目 カラム追加データ取得
            if ($key === array_key_first($lifters)) {
                $firstLifter = $value;
                $fname = $value['first_name_kana'];
                $lname = $value['last_name_kana'];
            }
            // ２人目 カラム追加データ取得
            if ($key === 1) {
                $secondLifter = $value;
                $secondfname = $value['first_name_kana'];
                $secondlname = $value['last_name_kana'];
            }
        }
        // １人目
        $firstLifter = $this->addColumn($fname, $lname, $firstLifter);
        // ２人目
        $secondLifter = $this->addColumn($secondfname, $secondlname, $secondLifter);
        // まとめてreturn
        return [$firstLifter, $secondLifter];
    }

    /**
     * ヘボン式ローマ字を成形して追加したカラムへ格納
     * 
     * @param  string  $firstName
     * @param  string  $lastName
     * @param  array  $lifter
     * 
     * @return array
     */
    public function addColumn($firstName, $lastName, $lifter): array
    {
        $result = $this->codeConvert($firstName);
        $subResult = $this->codeConvert($lastName);
        $addColumn = [
            'first_name_hebon' => ucfirst(implode('', $result)),
            'last_name_hebon' => ucfirst(implode('', $subResult))
        ];
        return $lifter + $addColumn;
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
