<?php

namespace App\Repositories\AppConfig;

interface AppConfigContract
{
    public function create($request);
    public function edit($appConfigId, $request);
    public function findAll();
    public function findById($appConfigId);
    public function remove($appConfigId);
}
