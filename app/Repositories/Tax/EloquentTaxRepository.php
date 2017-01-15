<?php

namespace App\Repositories\Tax;

use App\Tax;
use App\Repositories\Tax\TaxContract;

class EloquentTaxRepository implements TaxContract
{
    public function create($request) {
        $tax = new Tax;

        // Set the Tax properties
        $this->setTaxProperties($tax, $request);

        $tax->save();
        return $tax;
    }

    public function edit($taxId, $request) {
        $tax = $this->findById($taxId);

        // Edit the Tax properties
        $this->setTaxProperties($tax, $request);

        $tax->save();
        return $tax;
    }

    public function findAll() {
        return Tax::all();
    }

    public function findById($taxId) {
        return Tax::find($taxId);
    }

    public function remove($taxId) {
        $tax = $this->findById($taxId);
        return $tax->delete();
    }

    private function setTaxProperties($tax, $request) {
        // Assign attributes to the tax here
    }
}
