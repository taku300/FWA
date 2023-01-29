<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * お知らせ
 *
 */
class NewsController extends Controller
{
    public function index()
    {
        return view('news.index');
    }

    public function create()
    {
        return view('news.create');
    }
}
