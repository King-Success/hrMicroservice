<?php

namespace App\Repositories\UserEmployeeMap;

interface UserEmployeeMapContract
{
    public function create($request);
    public function edit($userEmployeeMapId, $request);
    public function findAll();
    public function findById($userEmployeeMapId);
    public function remove($userEmployeeMapId);
}
