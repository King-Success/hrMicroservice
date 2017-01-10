<?php

namespace App\Repositories\Paycheck;

interface PaycheckContract
{
    public function create($request);
    // public function edit($paycheckId, $request);
    // public function findAll();
    public function findById($paycheckId);
    // public function remove($paycheckId);
}
