<?php

namespace App\Http\Controllers;

use App\Services\AffiliationService;
use Illuminate\Http\Request;

class AffiliationController extends Controller
{
    public $affiliationService;

    public function __construct(AffiliationService $affiliationService)
    {
        $this->affiliationService = $affiliationService;
    }

    public function store(Request $request)
    {
        $this->affiliationService->createAffiliation($request);
        return redirect('/admis/lifters/create');
    }
}
