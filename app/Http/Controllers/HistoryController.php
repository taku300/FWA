<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 協会の歩む
 *
 */
class HistoryController extends Controller
{
    public function index()
    {
        return view('history.index');
    }
}
