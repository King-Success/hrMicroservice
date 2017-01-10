<?php

namespace App\Repositories\PaycheckSummary;

interface PaycheckSummaryContract
{
    public function create($request);
    // public function edit($paycheckSummaryId, $request);
    // public function findAll();
    public function findById($paycheckSummaryId);
    // public function remove($paycheckSummaryId);
}
