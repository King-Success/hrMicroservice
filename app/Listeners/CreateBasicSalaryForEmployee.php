<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Repositories\User\UserContract;
use App\Repositories\EmployeeBasicSalary\EmployeeBasicSalaryContract;

class CreateBasicSalaryForEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
     
    protected $userModel;
    protected $employeeBasicSalaryModel;
    
    public function __construct(UserContract $userContract, EmployeeBasicSalaryContract $employeeBasicSalaryContract)
    {
        //
        $this->userModel = $userContract;
        $this->employeeBasicSalaryModel = $employeeBasicSalaryContract;
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeCreated  $event
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
        //
        $employeeBasicSalaryObject = new \StdClass;
        $employeeBasicSalaryObject->employee = $event->employee['id'];
        $employeeBasicSalaryObject->amount = 0;
        $this->employeeBasicSalaryModel->create($employeeBasicSalaryObject);
    }
}
