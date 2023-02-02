<?php

namespace App\Services;

use App\Models\Result;
use Carbon\Carbon;

class ResultService
{
    public $result;

    public function __construct(Result $result)
    {
        $this->result = $result;
    }

    /**
     * アーカイブ表示用年度表作成
     * 
     * @return array
     */
    public function getArchiveFiscalYearList(): array
    {
        $dates = $this->result->getArchiveFiscalYear();
        foreach ($dates as $date) {
            $date = new Carbon($date);
            $array[] = $date->subMonthsNoOverflow(3)->format('Y');
        }
        $years = collect($array)->unique()->sort()->reverse()->values();
        return $years->toArray();
    }

    /**
     * Results画面 表示用ResultList成形
     * 
     * @param  string  $date
     * @return array
     */
    public function getEditedResultList($fiscalYear): array
    {
        $year = new Carbon($fiscalYear);
        $key = $year->format('Y');
        return $this->result->getResultList()->whereBetween('started_at', [$key . '-04-01', $key + 1 . '-03-31'])->get()->toArray();
    }

    /**
     * 年度取得
     * $fiscalYearがemptyの場合現在の年度を取得
     * 
     * @param  string  $fiscalYear
     * @return string
     */
    public function getFiscalYear($fiscalYear): string
    {
        if (!empty($fiscalYear)) {
            return $fiscalYear . '-06';
        }
        $fiscalYear = new Carbon(now());
        return $fiscalYear->subMonthsNoOverflow(3)->format('Y-m');
    }

    /**
     * 和暦変換
     * 
     * @param  string  $date
     * @return string
     */
    public function wareki($date): string
    {
        $date = date('Y', strtotime($date));
        $eras = [
            ['year' => 2019, 'name' => '令和', 'wareki' => '平成31年度'],
            ['year' => 1989, 'name' => '平成', 'wareki' => '平成元年度'],
            ['year' => 1926, 'name' => '昭和', 'wareki' => '大正15年度'],
        ];
        foreach ($eras as $era) {
            if ($date === $era['year']) {
                return $era['wareki'];
            }
            if ($date >= $era['year']) {
                $year = $date - $era['year'] + 1;
                return $era['name'] . $year . '年度';
            }
        }
    }
}
