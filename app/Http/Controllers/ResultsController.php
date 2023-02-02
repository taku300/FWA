<?php

namespace App\Http\Controllers;

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

    /**
     * @param  App\Libs\GetDate  $getDate
     * @param  App\Models\Result  $result
     */
    public function __construct(
        Result $result,
        ResultService $resultService
    ) {
        $this->result = $result;
        $this->resultService = $resultService;
    }

    /**
     * @param  array  $archiveFiscalYearsList
     * @param  string  $fiscalYear
     * @param  string  $wareki
     * @param  array  $resultList
     */
    public function index(Request $request)
    {
        $archiveFiscalYearsList = $this->resultService->getArchiveFiscalYearList();
        $fiscalYear = $this->resultService->getFiscalYear($request->fiscalYear);
        $wareki = $this->resultService->wareki($fiscalYear);
        $resultList = $this->resultService->getEditedResultList($fiscalYear);

        return view('results.index')->with([
            'archiveYears' => $archiveFiscalYearsList,
            'fiscalYear' => $fiscalYear,
            'wareki' => $wareki,
            'resultList' => $resultList
        ]);
    }

    public function create()
    {
        return view('results.create');
    }
}
