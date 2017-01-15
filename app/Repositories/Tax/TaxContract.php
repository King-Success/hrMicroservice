<?php

namespace App\Repositories\Tax;

interface TaxContract
{
    public function create($request);
    public function edit($taxId, $request);
    public function findAll();
    public function findById($taxId);
    public function remove($taxId);
}
