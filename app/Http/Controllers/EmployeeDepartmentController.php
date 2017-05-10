<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeDepartment\EmployeeDepartmentContract;

class EmployeeDepartmentController extends Controller
{
    protected $employeeDepartmentModel;
    public function __construct(EmployeeDepartmentContract $employeeDepartmentContract) {
        $this->employeeDepartmentModel = $employeeDepartmentContract;
    }

    // Display employeedepartments.index with all employeedepartments
    public function index() {
        $employeeDepartments = $this->employeeDepartmentModel->findAll();
        return view('employeedepartments.index', ['employeeDepartments' => $employeeDepartments]);
    }

    // Display employeedepartments.create
    public function create() {
        return view('employeedepartments.create');
    }

    /**
     * Validate form.
     * Save EmployeeDepartment to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
            'department' => 'required|numeric|exists:departments,id',
            'employee' => 'required|numeric|exists:employees,id',
         ]);
         
         $employeeDepartment = $this->employeeDepartmentModel->findByEmployeeId($request->input('employee'));
         if($employeeDepartment){
             return $this->update($request, $employeeDepartment->id);
         }

         $employeeDepartment = $this->employeeDepartmentModel->create($request);
         if ($employeeDepartment->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=department');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeDepartment. Try again!');
         }
     }

    // Display employeedepartments.edit with employeedepartmentinfo to edit
    public function edit($id) {
        $employeeDepartment = $this->employeeDepartmentModel->findById($id);
        return view('employeedepartments.edit', ['employeeDepartment' => $employeeDepartment]);
    }

    /**
     * Validate form.
     * Update EmployeeDepartment in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeDepartment = $this->employeeDepartmentModel->edit($id, $request);
        if ($employeeDepartment->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=department');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeDepartment. Try again!');
        }
    }

    /**
     * Delete EmployeeDepartment from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeDepartmentModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeDepartment. Try again!');
        }
    }
}
