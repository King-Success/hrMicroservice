<?php

namespace App\Repositories\Prefix;

use App\Prefix;
use App\Repositories\Prefix\PrefixContract;

class EloquentPrefixRepository implements PrefixContract
{
    public function create($request) {
        $prefix = new Prefix;

        // Set the Prefox properties
        $this->setPrefixProperties($prefix, $request);

        $prefix->save();
        return $prefix;
    }

    public function edit($prefixId, $request) {
        $prefix = $this->findById($prefixId);

        // Edit the Prefix properties
        $this->setPrefixProperties($prefix, $request);

        $prefix->save();
        return $prefix;
    }

    public function findAll() {
        return Prefix::all();
    }

    public function findById($prefixId) {
        return Prefix::find($prefixId);
    }

    public function remove($prefixId) {
        $prefix = $this->findById($prefixId);
        return $prefix->delete();
    }

    private function setPrefixProperties($prefix, $request) {
        // Assign attributes to the prefix here
        $prefix->title = $request->title;
    }
}
