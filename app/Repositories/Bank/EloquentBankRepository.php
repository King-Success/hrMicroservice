<?php

namespace App\Repositories\Bank;

use App\Bank;
use App\Repositories\Bank\BankContract;

class EloquentBankRepository implements BankContract
{
    public function create($request) {
        $bank = new Bank;

        // Set the Bank properties
        $this->setBankProperties($bank, $request);

        $bank->save();
        return $bank;
    }

    public function edit($bankId, $request) {
        $bank = $this->findById($bankId);

        // Edit the Bank properties
        $this->setBankProperties($bank, $request);

        $bank->save();
        return $bank;
    }

    public function findAll() {
        return Bank::all();
    }

    public function findById($bankId) {
        return Bank::find($bankId);
    }

    public function remove($bankId) {
        $bank = $this->findById($bankId);
        return $bank->delete();
    }

    private function setBankProperties($bank, $request) {
        // Assign attributes to the bank here
        $bank->title = $request->title;
    }
}
