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
     * Results画面 表示用ResultList成形
     * 
     * @param  string  $date
     * @return array
     */
    public function getEditedResultList($date): array
    {
        $date = new Carbon($date);
        $year = $date->addMonthsNoOverflow(3)->format('Y');
        return $this->result->getResultList()->where('started_at', 'LIKE', "%{$year}%")->get()->toArray();
    }
}
