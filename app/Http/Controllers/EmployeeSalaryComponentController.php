<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeSalaryComponent\EmployeeSalaryComponentContract;

class EmployeeSalaryComponentController extends Controller
{
    protected $employeeSalaryComponentModel;
    public function __construct(EmployeeSalaryComponentContract $employeeSalaryComponentContract) {
        $this->employeeSalaryComponentModel = $employeeSalaryComponentContract;
    }

    // Display employeesalarycomponents.index with all employeesalarycomponents
    public function index() {
        $employeeSalaryComponents = $this->employeeSalaryComponentModel->findAll();
        return view('employeesalarycomponents.index', ['employeeSalaryComponents' => $employeeSalaryComponents]);
    }

    // Display employeesalarycomponents.create
    public function create() {
        return view('employeesalarycomponents.create');
    }

    /**
     * Validate form.
     * Save EmployeeSalaryComponent to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);
        //  Delete existing
        $this->employeeSalaryComponentModel->clear($request->input('employee'));
         
        $selectedSalaryComponents = $request->input('salary_components');
        $salaryComponentAmounts = $request->input('salary_component_amount');
        
        foreach($selectedSalaryComponents as $selectedSalaryComponent){
             $salaryComponent = new \StdClass;
             $salaryComponent->employee = $request->input('employee');
             $salaryComponent->salary_component = $selectedSalaryComponent;
             $salaryComponent->amount = $salaryComponentAmounts[$selectedSalaryComponent];
             if($this->employeeSalaryComponentModel->create($salaryComponent)) continue;
             throw new \Exception('A fatal error occured.');
         }
         
         if (true) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=salarycomponent');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeSalaryComponent. Try again!');
         }
     }

    // Display employeesalarycomponents.edit with employeesalarycomponentinfo to edit
    public function edit($id) {
        $employeeSalaryComponent = $this->employeeSalaryComponentModel->findById($id);
        return view('employeesalarycomponents.edit', ['employeeSalaryComponent' => $employeeSalaryComponent]);
    }

    /**
     * Validate form.
     * Update EmployeeSalaryComponent in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeSalaryComponent = $this->employeeSalaryComponentModel->edit($id, $request);
        if ($employeeSalaryComponent->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeSalaryComponent. Try again!');
        }
    }

    /**
     * Delete EmployeeSalaryComponent from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeSalaryComponentModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeSalaryComponent. Try again!');
        }
    }
}
