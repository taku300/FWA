<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 選手紹介
 *
 */
class LiftersController extends Controller
{
    public function index()
    {
        return view('lifters.index');
    }
}
