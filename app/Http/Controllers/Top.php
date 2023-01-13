<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Top extends Controller
{
    public function index() {
        return view('top');
    }
}
