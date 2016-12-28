<?php

namespace App\Repositories\AppConfig;

use App\AppConfig;
use App\Repositories\AppConfig\AppConfigContract;
use Cache;

class EloquentAppConfigRepository implements AppConfigContract
{
    public function create($request) {
        $appConfig = new AppConfig;

        // Set the AppConfig properties
        $this->setAppConfigProperties($appConfig, $request);

        $appConfig->save();
        $this->clearCache();
        return $appConfig;
    }
    
    private function clearCache(){
        Cache::forget('AppConfig');
    }

    public function edit($appConfigId, $request) {
        $appConfig = $this->findById($appConfigId);

        // Edit the AppConfig properties
        $this->setAppConfigProperties($appConfig, $request);

        $appConfig->save();
        $this->clearCache();
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
        $appConfig->cargodriveClientId = $request->cargodriveClientId;
        $appConfig->cargodriveSecret = $request->cargodriveSecret;
    }
    
    public function updateCompanyProfile($id, $request){
        $appConfig = $this->findById($id);
        $appConfig->company_title = $request->company_title;
        if($request->has('rank_is_king')){
            $appConfig->rank_is_king = true;
        }else{
            $appConfig->rank_is_king = false;
        }
        $appConfig->save();
        $this->clearCache();
        return $appConfig;
    }
    
    public function updateCargoProfile($id, $request){
        $appConfig = $this->findById($id);
        $appConfig->cargodriveClientId = $request->cargodriveClientId;
        $appConfig->cargodriveSecret = $request->cargodriveSecret;
        $appConfig->save();
        $this->clearCache();
        return $appConfig;
    }
}
