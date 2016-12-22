<?php

use Illuminate\Database\Seeder;

use App\Repositories\Employee\EmployeeContract;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    protected $employeeModel;
    
    public function __construct(EmployeeContract $employeeContract) {
        $this->employeeModel = $employeeContract;
    }
    
    public function run()
    {
        $employee = new StdClass;
        $employee->name = "John Doe";
        $employee->dob = "2003-05-11";
        $this->employeeModel->create($employee);
    }
}
