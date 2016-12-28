<?php

namespace App\Repositories\UserEmployeeMap;

use App\UserEmployeeMap;
use App\Repositories\UserEmployeeMap\UserEmployeeMapContract;

class EloquentUserEmployeeMapRepository implements UserEmployeeMapContract
{
    public function create($request) {
        $userEmployeeMap = new UserEmployeeMap;

        // Set the UserEmployeeMap properties
        $this->setUserEmployeeMapProperties($userEmployeeMap, $request);

        $userEmployeeMap->save();
        return $userEmployeeMap;
    }

    public function edit($userEmployeeMapId, $request) {
        $userEmployeeMap = $this->findById($userEmployeeMapId);

        // Edit the UserEmployeeMap properties
        $this->setUserEmployeeMapProperties($userEmployeeMap, $request);

        $userEmployeeMap->save();
        return $userEmployeeMap;
    }

    public function findAll() {
        return UserEmployeeMap::all();
    }

    public function findById($userEmployeeMapId) {
        return UserEmployeeMap::find($userEmployeeMapId);
    }

    public function remove($userEmployeeMapId) {
        $userEmployeeMap = $this->findById($userEmployeeMapId);
        return $userEmployeeMap->delete();
    }

    private function setUserEmployeeMapProperties($userEmployeeMap, $request) {
        // Assign attributes to the userEmployeeMap here
        $userEmployeeMap->employee_id = $request->employee_id;
        $userEmployeeMap->user_id = $request->user_id;
    }
}
