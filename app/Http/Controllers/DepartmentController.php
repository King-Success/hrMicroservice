<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Department\DepartmentContract;

class DepartmentController extends Controller
{
    protected $departmentModel;
    public function __construct(DepartmentContract $departmentContract) {
        $this->departmentModel = $departmentContract;
    }

    // Display departments.index with all departments
    public function index() {
        $departments = $this->departmentModel->findAll();
        return view('departments.index', ['departments' => $departments]);
    }

    // Display departments.create
    public function create() {
        return view('departments.create');
    }

    /**
     * Validate form.
     * Save Department to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $department = $this->departmentModel->create($request);
         if ($department->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Department. Try again!');
         }
     }

    // Display departments.edit with department to edit
    public function edit($id) {
        $department = $this->departmentModel->findById($id);
        return view('departments.edit', ['department' => $department]);
    }

    /**
     * Validate form.
     * Update Department in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $department = $this->departmentModel->edit($id, $request);
        if ($department->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Department. Try again!');
        }
    }

    /**
     * Delete Department from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->departmentModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->with('error', 'Could not delete Department. Try again!');
        }
    }
}
