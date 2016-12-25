<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Employee\EmployeeContract;
use App\Repositories\Prefix\PrefixContract;

use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    protected $employeeModel;
    protected $prefixModel;
    
    public function __construct(EmployeeContract $employeeContract, PrefixContract $prefixContract) {
        $this->employeeModel = $employeeContract;
        $this->prefixModel = $prefixContract;
    }
    
    public function ajaxSearch(){
         return Datatables::of($this->employeeModel->findAll())->make(true);
    }

    // Display employees.index with all employees
    public function index() {
        $employees = $this->employeeModel->findAll();
        return view('employees.index', ['employees' => $employees]);
    }

    // Display employees.create
    public function create() {
        $prefixes = $this->prefixModel->findAll();
        return view('employees.create', ['prefixes' => $prefixes]);
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
            $request->session()->flash('status', 'Task was successful!');
            return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Employee. Try again!');
         }
     }
     
     // Display employees.edit with employee to edit
    public function show(Request $request, $id) {
        $employee = $this->employeeModel->findById($id);
        return view('employees.show', ['employee' => $employee]);
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
            $request->session()->flash('status', 'Task was successful!');
            return back();
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
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->with('error', 'Could not delete Employee. Try again!');
        }
    }
}
