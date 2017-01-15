<?php

namespace App\Listeners;

use App\Events\EmployeeAssignedRank;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\EmployeeBasicSalary\EmployeeBasicSalaryContract;
use Cache;

class PopulateEmployeeBasicSalaryIf
{
    protected $employeeBasicSalaryModel;
    protected $appConfig;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EmployeeBasicSalaryContract $employeeBasicSalaryContract)
    {
        //
        $this->employeeBasicSalaryModel = $employeeBasicSalaryContract;
        $this->appConfig = Cache::get('AppConfig');
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeAssignedRank  $event
     * @return void
     */
    public function handle(EmployeeAssignedRank $event)
    {
        if(!$this->appConfig->rank_is_king) return;
        $employeeBasicSalaryModel = $this->employeeBasicSalaryModel->findByEmployeeId($event->employee);
        $employeeBasicSalaryModel->amount = $event->employeeRank['basic_salary'];
        $employeeBasicSalaryModel->allowance = $event->employeeRank['allowance'];
        $employeeBasicSalaryModel->save();
    }
}
