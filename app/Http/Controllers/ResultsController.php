<?php

namespace App\Http\Controllers;

use App\Services\ResultService;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Http\Requests\ResultForm;

/**
 * 要項・結果
 *
 */
class ResultsController extends Controller
{
    public $resultService;

    /**
     * @param  App\Services\ResultService  $resultService
     */
    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    /**
     * Results画面
     *
     * @param  Illuminate\Http\Request  $request
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
        $results = new Result;
        return view('results.create', [
            'results' => $results,
        ]);
    }

    public function edit($id)
    {
        $results = Result::find($id)->toArray();
        return view('results.create', [
            'id' => $id,
            'results' => $results,
        ]);
    }

    public function store(ResultForm $request)
    {
        $this->resultService->createResult($request);
        return redirect('/results');
    }

    public function update($id, ResultForm $request)
    {
        $this->resultService->updateResult($id, $request);
        return redirect('/results');
    }

    public function destroy($id)
    {
        $this->resultService->resultDelete($id);
        return redirect('/results');
    }
}
