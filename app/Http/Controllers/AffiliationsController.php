<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AffiliationService;
use Illuminate\Support\Facades\Validator;

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

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['bail', 'required', 'string', 'max:255']
          ]);

        if ($validator->fails()) {
            return false;
        }

        $affiliation = $this->affiliationService->createAffiliation($request->all());
        return $affiliation;
    }
}
