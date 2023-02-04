<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LifterService;

class LiftersController extends Controller
{
    public $lifterService;

    /**
     * @param  App\Services\LifterService  $lifterService
     */
    public function __construct(LifterService $lifterService)
    {
        $this->lifterService = $lifterService;
    }

    /**
     * 選手紹介
     * 
     * @param  array  $manLifters
     * @param  array  $womanLifters
     */
    public function index()
    {
        $manLifters = $this->lifterService->getLiftersList(1);
        $womanLifters = $this->lifterService->getLiftersList(2);
        return view('lifters.index')->with(['manLifters' => $manLifters, 'womanLifters' => $womanLifters]);
    }

    public function create()
    {
        return view('lifters.create');
    }
}
