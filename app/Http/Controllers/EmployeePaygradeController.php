<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeePaygrade\EmployeePaygradeContract;

class EmployeePaygradeController extends Controller
{
    protected $employeePaygradeModel;
    public function __construct(EmployeePaygradeContract $employeePaygradeContract) {
        $this->employeePaygradeModel = $employeePaygradeContract;
    }

    // Display employeepaygrades.index with all employeepaygrades
    public function index() {
        $employeePaygrades = $this->employeePaygradeModel->findAll();
        return view('employeepaygrades.index', ['employeePaygrades' => $employeePaygrades]);
    }

    // Display employeepaygrades.create
    public function create() {
        return view('employeepaygrades.create');
    }

    /**
     * Validate form.
     * Save EmployeePaygrade to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
            'paygrade' => 'required|numeric|exists:paygrades',
            'employee' => 'required|numeric|exists:employees',
         ]);
         
         $employeePaygrade = $this->employeePaygradeModel->findByEmployeeId($request->input('employee'));
         if($employeePaygrade){
             return $this->update($request, $employeePaygrade->id);
         }

         $employeePaygrade = $this->employeePaygradeModel->create($request);
         if ($employeePaygrade->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=paygrade');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeePaygrade. Try again!');
         }
     }

    // Display employeepaygrades.edit with employeepaygradeinfo to edit
    public function edit($id) {
        $employeePaygrade = $this->employeePaygradeModel->findById($id);
        return view('employeepaygrades.edit', ['employeePaygrade' => $employeePaygrade]);
    }

    /**
     * Validate form.
     * Update EmployeePaygrade in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeePaygrade = $this->employeePaygradeModel->edit($id, $request);
        if ($employeePaygrade->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=paygrade');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeePaygrade. Try again!');
        }
    }

    /**
     * Delete EmployeePaygrade from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeePaygradeModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeePaygrade. Try again!');
        }
    }
}
