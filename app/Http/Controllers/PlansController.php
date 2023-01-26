<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 年間計画
 *
 */
class PlansController extends Controller
{
    public function index()
    {
        return view('plans.index');
    }
}
