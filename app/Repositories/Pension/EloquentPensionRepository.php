<?php

namespace App\Repositories\Pension;

use App\Pension;
use App\Repositories\Pension\PensionContract;

class EloquentPensionRepository implements PensionContract
{
    public function create($request) {
        $pension = new Pension;

        // Set the Pension properties
        $this->setPensionProperties($pension, $request);

        $pension->save();
        return $pension;
    }

    public function edit($pensionId, $request) {
        $pension = $this->findById($pensionId);

        // Edit the Pension properties
        $this->setPensionProperties($pension, $request);

        $pension->save();
        return $pension;
    }

    public function findAll() {
        return Pension::all();
    }

    public function findById($pensionId) {
        return Pension::find($pensionId);
    }

    public function remove($pensionId) {
        $pension = $this->findById($pensionId);
        return $pension->delete();
    }

    private function setPensionProperties($pension, $request) {
        // Assign attributes to the pension here
        $pension->title = $request->title;
        $pension->salary_component_id = $request->salary_component;
    }
}
