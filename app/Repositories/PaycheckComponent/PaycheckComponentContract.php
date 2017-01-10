<?php

namespace App\Repositories\PaycheckComponent;

interface PaycheckComponentContract
{
    public function create($request);
    // public function edit($paycheckComponentId, $request);
    // public function findAll();
    public function findById($paycheckComponentId);
    // public function remove($paycheckComponentId);
}
