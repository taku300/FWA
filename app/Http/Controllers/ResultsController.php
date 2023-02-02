<?php

namespace App\Http\Controllers;

use App\Libs\GetDate;
use App\Models\Result;
use Illuminate\Http\Request;

/**
 * 要項・結果
 *
 */
class ResultsController extends Controller
{
    public $result;
    public $getDate;

    /**
     * @param  App\Libs\GetDate  $getDate
     * @param  App\Models\Result  $result
     */
    public function __construct(Result $result, GetDate $getDate)
    {
        $this->result = $result;
        $this->getDate = $getDate;
    }

    /**
     * @param  array  $archiveYears
     * @param  array  $resultList
     */
    public function index()
    {
        $archiveYears = $this->getDate->ArchiveYear();
        $resultList = $this->result->getResultList();

        return view('results.index')->with(['archiveYears' => $archiveYears, 'resultList' => $resultList]);
    }

    public function create()
    {
        return view('results.create');
    }
}
