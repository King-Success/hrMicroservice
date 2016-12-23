<?php

namespace App\Repositories\Rank;

use App\Rank;
use App\Repositories\Rank\RankContract;

class EloquentRankRepository implements RankContract
{
    public function create($request) {
        $rank = new Rank;

        // Set the Rank properties
        $this->setRankProperties($rank, $request);

        $rank->save();
        return $rank;
    }

    public function edit($rankId, $request) {
        $rank = $this->findById($rankId);

        // Edit the Rank properties
        $this->setRankProperties($rank, $request);

        $rank->save();
        return $rank;
    }

    public function findAll() {
        return Rank::all();
    }

    public function findById($rankId) {
        return Rank::find($rankId);
    }

    public function remove($rankId) {
        $rank = $this->findById($rankId);
        return $rank->delete();
    }

    private function setRankProperties($rank, $request) {
        // Assign attributes to the rank here
        $rank->title = $request->title;
        $rank->peculiar_allowance = $request->peculiar_allowance;
        $rank->consolidated_salary = $request->consolidated_salary;
    }
}
