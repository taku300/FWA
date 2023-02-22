<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AffiliationService;
use Illuminate\Support\Facades\Log;

class AffiliationsController extends Controller
{
    public $affiliationService;

    /**
     * @param  App\Services\AffiliationService  $affiliationService
     */
    public function __construct(
        AffiliationService $affiliationService
    ) {
        $this->affiliationService = $affiliationService;
    }

    function store(Request $request) {
        $affiliation = $request->all();
        $affiliationId = $this->affiliationService->createAffiliation($request);
        $affiliation += ['affiliationId' =>  $affiliationId ];
        \Log::debug($affiliation);
        return $affiliation;
    }
}
