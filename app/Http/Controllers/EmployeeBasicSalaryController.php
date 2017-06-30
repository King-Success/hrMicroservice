<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Employee\EmployeeContract;
use App\Repositories\EmployeeBasicSalary\EmployeeBasicSalaryContract;

class EmployeeBasicSalaryController extends Controller
{
    //
    
    protected $employeeModel;
    protected $employeeBasicSalaryModel;
    
    public function __construct(EmployeeContract $employeeContract, 
    EmployeeBasicSalaryContract $employeeBasicSalaryContract
        ) {
        $this->employeeModel = $employeeContract;
        $this->employeeBasicSalaryModel = $employeeBasicSalaryContract;
    }
    /**
     * Validate form.
     * Update EmployeeBasicSalary in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
           'amount' => 'required|numeric|min:0',
        //   'employee' => 'required|numeric|exists:employees',
        ]);

        $employeeBasicSalary = $this->employeeBasicSalaryModel->edit($id, $request);
        if ($employeeBasicSalary->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=basic_salary');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Employee. Try again!');
        }
    }
}
