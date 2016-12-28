<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\SalaryComponent\SalaryComponentContract;

class SalaryComponentController extends Controller
{
    protected $salaryComponentModel;
    public function __construct(SalaryComponentContract $salaryComponentContract) {
        $this->salaryComponentModel = $salaryComponentContract;
    }

    // Display salarycomponents.index with all salarycomponents
    public function index() {
        $salaryComponents = $this->salaryComponentModel->findAll();
        return view('salarycomponents.index', ['salaryComponents' => $salaryComponents]);
    }

    // Display salarycomponents.create
    public function create() {
        return view('salarycomponents.create');
    }

    /**
     * Validate form.
     * Save SalaryComponent to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $salaryComponent = $this->salaryComponentModel->create($request);
         if ($salaryComponent->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create SalaryComponent. Try again!');
         }
     }

    // Display salarycomponents.edit with salarycomponent to edit
    public function edit($id) {
        $salaryComponent = $this->salaryComponentModel->findById($id);
        $salaryComponents = $this->salaryComponentModel->findAll();
        return view('salarycomponents.edit', ['salaryComponent' => $salaryComponent, 'salaryComponents' => $salaryComponents]);
    }

    /**
     * Validate form.
     * Update SalaryComponent in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $salaryComponent = $this->salaryComponentModel->edit($id, $request);
        if ($salaryComponent->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update SalaryComponent. Try again!');
        }
    }

    /**
     * Delete SalaryComponent from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->salaryComponentModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/salarycomponent');
        } else {
            return back()
               ->with('error', 'Could not delete SalaryComponent. Try again!');
        }
    }
}
