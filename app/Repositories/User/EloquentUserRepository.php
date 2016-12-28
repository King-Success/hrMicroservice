<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\User\UserContract;

class EloquentUserRepository implements UserContract
{
    public function create($request) {
        $user = new User;

        // Set the User properties
        $this->setEmployeeProperties($user, $request);

        $user->save();
        return $user;
    }

    public function edit($userId, $request) {
        $user = $this->findById($userId);

        // Edit the User properties
        $this->setEmployeeProperties($user, $request);

        $user->save();
        return $user;
    }

    public function findAll() {
        return User::all();
    }

    public function findById($userId) {
        return User::find($userId);
    }

    public function remove($userId) {
        $user = $this->findById($userId);
        return $user->delete();
    }

    private function setEmployeeProperties($user, $request) {
        // Assign attributes to the user here
        $user->name = $request->name;
        $user->email = $request->email;
        if(strlen(trim($request->password)) > 0){
            $user->password = bcrypt($request->password);
        }
    }
}
