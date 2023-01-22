<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * トップ画面
 *
 */
class TopController extends Controller
{
    public function index()
    {
        return view('top.index');
    }
}
