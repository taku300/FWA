<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 要項・結果
 *
 */
class TopController extends Controller
{
    public function index() {
        return view('top.index');
    }
}
