<?php

namespace App\Libs;

use App\Models\Result;
use Carbon\Carbon;

class GetDate
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
    public function ArchiveYear(): array
    {
        $dates = $this->result->getArchiveYear();
        foreach ($dates as $date) {
            $date = new Carbon($date);
            $array[] = $date->subMonthsNoOverflow(3)->format('Y');
        }
        $years = collect($array)->unique()->sort()->reverse()->values();
        return $years->toArray();
    }

    /**
     * 
     */
    public function getYear()
    {
        $year = new Carbon(now());
        return $year->subMonthsNoOverflow(3)->format('Y-m');
    }

    /**
     * 和暦変換
     * 
     * @param  string  $date
     */
    public function wareki($date)
    {
        $date = date('Y', strtotime($date));
        $eras = [
            ['year' => 2019, 'name' => '令和', 'new_Japanese_calendar' => '平成31年度'],
            ['year' => 1989, 'name' => '平成', 'new_Japanese_calendar' => '平成元年度'],
            ['year' => 1926, 'name' => '昭和', 'new_Japanese_calendar' => '大正15年度'],
        ];
        foreach ($eras as $era) {
            if ($date === $era['year']) {
                return $era['new_Japanese_calendar'];
            }
            if ($date >= $era['year']) {
                $year = $date - $era['year'] + 1;
                return $era['name'] . $year . '年度';
            }
        }
    }
}
