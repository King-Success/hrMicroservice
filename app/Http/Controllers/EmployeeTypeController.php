<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeType\EmployeeTypeContract;

class EmployeeTypeController extends Controller
{
    protected $employeeTypeModel;
    public function __construct(EmployeeTypeContract $employeeTypeContract) {
        $this->employeeTypeModel = $employeeTypeContract;
    }

    // Display employeetypes.index with all employeetypes
    public function index() {
        $employeeTypes = $this->employeeTypeModel->findAll();
        return view('employeetypes.index', ['employeeTypes' => $employeeTypes]);
    }

    // Display employeetypes.create
    public function create() {
        return view('employeetypes.create');
    }

    /**
     * Validate form.
     * Save EmployeeType to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employeeType = $this->employeeTypeModel->create($request);
         if ($employeeType->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeType. Try again!');
         }
     }

    // Display employeetypes.edit with employeetype to edit
    public function edit($id) {
        $employeeType = $this->employeeTypeModel->findById($id);
        return view('employeetypes.edit', ['employeeType' => $employeeType]);
    }

    /**
     * Validate form.
     * Update EmployeeType in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeType = $this->employeeTypeModel->edit($id, $request);
        if ($employeeType->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeType. Try again!');
        }
    }

    /**
     * Delete EmployeeType from database
     * Redirect to prefered route or perform other action
     */
    public function delete($id) {
        if ($this->employeeTypeModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeType. Try again!');
        }
    }
}
