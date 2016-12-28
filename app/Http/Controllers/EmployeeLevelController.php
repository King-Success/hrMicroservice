<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeLevel\EmployeeLevelContract;

class EmployeeLevelController extends Controller
{
    protected $employeeLevelModel;
    public function __construct(EmployeeLevelContract $employeeLevelContract) {
        $this->employeeLevelModel = $employeeLevelContract;
    }

    // Display employeelevels.index with all employeelevels
    public function index() {
        $employeeLevels = $this->employeeLevelModel->findAll();
        return view('employeelevels.index', ['employeeLevels' => $employeeLevels]);
    }

    // Display employeelevels.create
    public function create() {
        return view('employeelevels.create');
    }

    /**
     * Validate form.
     * Save EmployeeLevel to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employeeLevel = $this->employeeLevelModel->create($request);
         if ($employeeLevel->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeLevel. Try again!');
         }
     }

    // Display employeelevels.edit with employeelevel to edit
    public function edit($id) {
        $employeeLevel = $this->employeeLevelModel->findById($id);
        $employeeLevels = $this->employeeLevelModel->findAll();
        return view('employeelevels.edit', ['employeeLevel' => $employeeLevel, 'employeeLevels' => $employeeLevels]);
    }

    /**
     * Validate form.
     * Update EmployeeLevel in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeLevel = $this->employeeLevelModel->edit($id, $request);
        if ($employeeLevel->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeLevel. Try again!');
        }
    }

    /**
     * Delete EmployeeLevel from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeLevelModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employeelevel');
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeLevel. Try again!');
        }
    }
}
