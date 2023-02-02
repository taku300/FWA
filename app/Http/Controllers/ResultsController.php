<?php

namespace App\Http\Controllers;

use App\Libs\GetDate;
use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

/**
 * 要項・結果
 *
 */
class ResultsController extends Controller
{
    public $result;
    public $resultService;
    public $getDate;

    /**
     * @param  App\Libs\GetDate  $getDate
     * @param  App\Models\Result  $result
     */
    public function __construct(
        Result $result,
        GetDate $getDate,
        ResultService $resultService
    ) {
        $this->result = $result;
        $this->resultService = $resultService;
        $this->getDate = $getDate;
    }

    /**
     * @param  array  $archiveYears
     * @param  array  $resultList
     */
    public function index()
    {
        $archiveYears = $this->getDate->ArchiveYear();
        $year = $this->getDate->getYear();
        $wareki = $this->getDate->wareki($year);
        $resultList = $this->resultService->getEditedResultList($year);

        return view('results.index')->with([
            'archiveYears' => $archiveYears,
            'year' => $year,
            'wareki' => $wareki,
            'resultList' => $resultList
        ]);
    }

    public function create()
    {
        return view('results.create');
    }
}
