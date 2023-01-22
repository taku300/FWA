<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 要項・結果
 *
 */
class ResultsController extends Controller
{
    public function index()
    {
        return view('results.index');
    }
}
