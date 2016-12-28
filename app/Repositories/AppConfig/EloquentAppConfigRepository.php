<?php

namespace App\Repositories\AppConfig;

use App\AppConfig;
use App\Repositories\AppConfig\AppConfigContract;

class EloquentAppConfigRepository implements AppConfigContract
{
    public function create($request) {
        $appConfig = new AppConfig;

        // Set the AppConfig properties
        $this->setAppConfigProperties($appConfig, $request);

        $appConfig->save();
        return $appConfig;
    }

    public function edit($appConfigId, $request) {
        $appConfig = $this->findById($appConfigId);

        // Edit the AppConfig properties
        $this->setAppConfigProperties($appConfig, $request);

        $appConfig->save();
        return $appConfig;
    }

    public function findAll() {
        return AppConfig::all();
    }

    public function findById($appConfigId) {
        return AppConfig::find($appConfigId);
    }

    public function remove($appConfigId) {
        $appConfig = $this->findById($appConfigId);
        return $appConfig->delete();
    }

    private function setAppConfigProperties($appConfig, $request) {
        // Assign attributes to the appConfig here
        $appConfig->company_title = $request->company_title;
        $appConfig->rank_is_king = $request->rank_is_king; //if true, rank determines basic salary & allowances
    }
}
