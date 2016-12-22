<?php

namespace App\Repositories\Title;

use App\Title;
use App\Repositories\Title\TitleContract;

class EloquentTitleRepository implements TitleContract
{
    public function create($request) {
        $title = new Title;

        // Set the Title properties
        $this->setTitleProperties($title, $request);

        $title->save();
        return $title;
    }

    public function edit($titleId, $request) {
        $title = $this->findById($titleId);

        // Edit the Title properties
        $this->setTitleProperties($title, $request);

        $title->save();
        return $title;
    }

    public function findAll() {
        return Title::all();
    }

    public function findById($titleId) {
        return Title::find($titleId);
    }

    public function remove($titleId) {
        $title = $this->findById($titleId);
        return $title->delete();
    }

    private function setTitleProperties($title, $request) {
        // Assign attributes to the title here
        $title->title = $request->title;
    }
}
