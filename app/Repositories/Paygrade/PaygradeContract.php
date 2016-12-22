<?php

namespace App\Repositories\Paygrade;

interface PaygradeContract
{
    public function create($request);
    public function edit($paygradeId, $request);
    public function findAll();
    public function findById($paygradeId);
    public function remove($paygradeId);
}
