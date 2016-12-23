<?php

namespace App\Repositories\Pension;

interface PensionContract
{
    public function create($request);
    public function edit($pensionId, $request);
    public function findAll();
    public function findById($pensionId);
    public function remove($pensionId);
}
