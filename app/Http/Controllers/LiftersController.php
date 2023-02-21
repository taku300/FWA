<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lifter;
use App\Models\Affiliation;
use App\Services\AffiliationService;
use App\Services\LifterService;

/**
 * 選手紹介
 *
 */
class LiftersController extends Controller
{
    public $lifterService;
    public $affiliationService;

    /**
     * @param  App\Services\LifterService  $lifterService
     */
    public function __construct(
        LifterService $lifterService,
        AffiliationService $affiliationService
    ) {
        $this->lifterService = $lifterService;
        $this->affiliationService = $affiliationService;
    }

    /**
     * 選手紹介
     * 1 = 男性
     * 2 = 女性
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

    /**
     * @param  Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        if ($request->has('affiliation')) {
            $this->affiliationService->createAffiliation($request);
            return redirect('/admins/lifters/create');
        } else {
            $this->lifterService->createLifter($request);
            return redirect('/lifters');
        }
    }

    /**
     * @param  int  $id
     */
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

    /**
     * @param  int  $id
     * @param  Illuminate\Http\Request  $request
     */
    public function update($id, Request $request)
    {
        $this->lifterService->updateLifter($id, $request);
        return redirect('/lifters');
    }

    /**
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->lifterService->deleteLifter($id);
        return redirect('/lifters');
    }
}
