<?php

namespace App\Repositories\Rank;

interface RankContract
{
    public function create($request);
    public function edit($rankId, $request);
    public function findAll();
    public function findById($rankId);
    public function remove($rankId);
}
