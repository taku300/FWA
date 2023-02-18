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
    public function index()
    {
        $resultList = Result::getResultRecordList();

        return view('records.index')->with(['resultList' => $resultList]);
    }
}
