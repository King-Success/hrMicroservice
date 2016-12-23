<?php

namespace App\Repositories\Bank;

interface BankContract
{
    public function create($request);
    public function edit($bankId, $request);
    public function findAll();
    public function findById($bankId);
    public function remove($bankId);
}
