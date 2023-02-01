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
}
