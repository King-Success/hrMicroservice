<?php

namespace App\Repositories\User;

interface UserContract
{
    public function create($request);
    public function edit($userId, $request);
    public function findAll();
    public function findById($userId);
    public function remove($userId);
    public function updatePassword($userId, $request);
}
