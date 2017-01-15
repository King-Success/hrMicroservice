<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeTax\EmployeeTaxContract;

class EmployeeTaxController extends Controller
{
    protected $employeeTaxModel;
    public function __construct(EmployeeTaxContract $employeeTaxContract) {
        $this->employeeTaxModel = $employeeTaxContract;
    }

    // Display employeetaxs.index with all employeetaxs
    public function index() {
        $employeeTaxs = $this->employeeTaxModel->findAll();
        return view('employeetaxs.index', ['employeeTaxs' => $employeeTaxs]);
    }

    // Display employeetaxs.create
    public function create() {
        return view('employeetaxs.create');
    }

    /**
     * Validate form.
     * Save EmployeeTax to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $employeeTax = $this->employeeTaxModel->create($request);
         if ($employeeTax->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeTax. Try again!');
         }
     }

    // Display employeetaxs.edit with employeetax to edit
    public function edit($id) {
        $employeeTax = $this->employeeTaxModel->findById($id);
        return view('employeetaxs.edit', ['employeeTax' => $employeeTax]);
    }

    /**
     * Validate form.
     * Update EmployeeTax in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeTax = $this->employeeTaxModel->edit($id, $request);
        if ($employeeTax->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeTax. Try again!');
        }
    }

    /**
     * Delete EmployeeTax from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeTaxModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeTax. Try again!');
        }
    }
}
