<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lifter;
use App\Models\Affiliation;
use App\Services\LifterService;

/**
 * 選手紹介
 *
 */
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
        $lifters = new Lifter;
        $affiliation = array_column(Affiliation::all()->toArray(), 'name');
        return view('lifters.create')->with([
            'lifters' => $lifters,
            'affiliation' => $affiliation,
        ]);;
    }

    public function store()
    {
    }

    public function edit($id)
    {
        $lifters = Lifter::with('affiliation')->find($id)->toArray();
        $affiliation = array_column(Affiliation::all()->toArray(), 'name', 'id');
        return view('lifters.create')->with([
            'id' => $id,
            'lifters' => $lifters,
            'affiliation' => $affiliation,

        ]);;
    }

    public function update($id, Request $request)
    {
    }
}
