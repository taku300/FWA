<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ドキュメント更新
 *
 */
class DocumentsController extends Controller
{
  public function edit()
  {
    return view('news.edit');
  }
}
