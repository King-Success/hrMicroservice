<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Employee\EmployeeContract;

class EmployeeController extends Controller
{
    protected $employeeModel;
    public function __construct(EmployeeContract $employeeContract) {
        $this->employeeModel = $employeeContract;
    }

    // Display employees.index with all employees
    public function index() {
        $employees = $this->employeeModel->findAll();
        return view('employees.index', ['employees' => $employees]);
    }

    // Display employees.create
    public function create() {
        return view('employees.create');
    }

    /**
     * Validate form.
     * Save Employee to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employee = $this->employeeModel->create($request);
         if ($employee->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Employee. Try again!');
         }
     }

    // Display employees.edit with employee to edit
    public function edit($id) {
        $employee = $this->employeeModel->findById($id);
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Validate form.
     * Update Employee in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employee = $this->employeeModel->edit($id, $request);
        if ($employee->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Employee. Try again!');
        }
    }

    /**
     * Delete Employee from database
     * Redirect to prefered route or perform other action
     */
    public function delete($id) {
        if ($this->employeeModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete Employee. Try again!');
        }
    }
}
