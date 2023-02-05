<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lifter;
use App\Models\Affiliation;
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

    public function create()
    {
        $lifters = new Lifter;
        $affiliation = array_column( Affiliation::all()->toArray(), 'name' );
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
        $affiliation = array_column( Affiliation::all()->toArray(), 'name', 'id');
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
