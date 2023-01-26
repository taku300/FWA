<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 協会概要
 *
 */
class AboutController extends Controller
{
    public function index()
    {
        return view('about.index');
    }
}
