<?php

namespace App\Repositories\Paygrade;

use App\Paygrade;
use App\Repositories\Paygrade\PaygradeContract;

class EloquentPaygradeRepository implements PaygradeContract
{
    public function create($request) {
        $paygrade = new Paygrade;

        // Set the Paygrade properties
        $this->setPaygradeProperties($paygrade, $request);

        $paygrade->save();
        return $paygrade;
    }

    public function edit($paygradeId, $request) {
        $paygrade = $this->findById($paygradeId);

        // Edit the Paygrade properties
        $this->setPaygradeProperties($paygrade, $request);

        $paygrade->save();
        return $paygrade;
    }

    public function findAll() {
        return Paygrade::all();
    }

    public function findById($paygradeId) {
        return Paygrade::find($paygradeId);
    }

    public function remove($paygradeId) {
        $paygrade = $this->findById($paygradeId);
        return $paygrade->delete();
    }

    private function setPaygradeProperties($paygrade, $request) {
        // Assign attributes to the paygrade here
        $paygrade->title = $request->title;
        $paygrade->amount = $request->amount;
    }
}
