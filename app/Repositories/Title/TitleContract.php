<?php

namespace App\Repositories\Title;

interface TitleContract
{
    public function create($request);
    public function edit($titleId, $request);
    public function findAll();
    public function findById($titleId);
    public function remove($titleId);
}
