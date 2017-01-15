<?php

namespace App\Repositories\EmployeeRank;

use App\EmployeeRank;
use App\Repositories\EmployeeRank\EmployeeRankContract;
use App\Events\EmployeeAssignedRank;
use App\Repositories\Rank\RankContract;

class EloquentEmployeeRankRepository implements EmployeeRankContract
{
    protected $rankModel;
    
    public function __construct(RankContract $rankContract){
        $this->rankModel = $rankContract;
    }
    
    public function create($request) {
        $employeeRank = new EmployeeRank;

        // Set the EmployeeRank properties
        $this->setEmployeeRankProperties($employeeRank, $request);

        $employeeRank->save();
        event(new EmployeeAssignedRank($this->rankModel->findById($employeeRank->rank_id)->toArray(), 
            $employeeRank->employee_id));
        return $employeeRank;
    }

    public function edit($employeeRankId, $request) {
        $employeeRank = $this->findById($employeeRankId);

        // Edit the EmployeeRank properties
        $this->setEmployeeRankProperties($employeeRank, $request);

        $employeeRank->save();
        event(new EmployeeAssignedRank($this->rankModel->findById($employeeRank->rank_id)->toArray(), 
            $employeeRank->employee_id));
        return $employeeRank;
    }

    public function findAll() {
        return EmployeeRank::all();
    }

    public function findById($employeeRankId) {
        return EmployeeRank::find($employeeRankId);
    }
    
    public function findByEmployeeId($employeeId){
        return EmployeeRank::where('employee_id', $employeeId)->first();
    }

    public function remove($employeeRankId) {
        $employeeRank = $this->findById($employeeRankId);
        return $employeeRank->delete();
    }

    private function setEmployeeRankProperties($employeeRank, $request) {
        // Assign attributes to the employeeRank here
        $employeeRank->employee_id = $request->employee;
        $employeeRank->rank_id = $request->rank;
    }
}
