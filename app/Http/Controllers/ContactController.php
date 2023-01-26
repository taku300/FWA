<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * お問い合わせ
 *
 */
class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
}
