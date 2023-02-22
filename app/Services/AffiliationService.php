<?php

namespace App\Services;

use App\Models\Affiliation;
use Illuminate\Support\Facades\DB;

class AffiliationService
{
    /**
     * affiliation登録処理
     *
     * @param  mixed  $datas
     * @return $affiliation->id
     */
    public function createAffiliation($datas)
    {
        DB::beginTransaction();
        try {
            $affiliation = new Affiliation($datas);
            $affiliation->save();
            $datas += ['affiliationId' =>  $affiliation->id];
            \Log::debug($datas);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
        DB::commit();
        return $datas;
    }
}
