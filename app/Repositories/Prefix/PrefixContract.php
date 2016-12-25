<?php

namespace App\Repositories\Prefix;

interface PrefixContract
{
    public function create($request);
    public function edit($prefixId, $request);
    public function findAll();
    public function findById($prefixId);
    public function remove($prefixId);
}
