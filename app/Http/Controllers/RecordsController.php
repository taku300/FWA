<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 大会記録
 *
 */
class RecordsController extends Controller
{
    public function index()
    {
        return view('records.index');
    }
}
