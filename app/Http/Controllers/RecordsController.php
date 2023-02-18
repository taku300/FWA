<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

/**
 * 大会記録
 *
 */
class RecordsController extends Controller
{
    public $result;

    public function __construct(Result $result)
    {
        $this->result = $result;
    }

    public function index()
    {
        $resultList = $this->result->getResultRecordList();

        return view('records.index')->with(['resultList' => $resultList]);
    }
}
