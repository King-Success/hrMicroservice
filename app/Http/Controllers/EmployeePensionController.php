<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeePension\EmployeePensionContract;

class EmployeePensionController extends Controller
{
    protected $employeePensionModel;
    public function __construct(EmployeePensionContract $employeePensionContract) {
        $this->employeePensionModel = $employeePensionContract;
    }

    // Display employeepensions.index with all employeepensions
    public function index() {
        $employeePensions = $this->employeePensionModel->findAll();
        return view('employeepensions.index', ['employeePensions' => $employeePensions]);
    }

    // Display employeepensions.create
    public function create() {
        return view('employeepensions.create');
    }

    /**
     * Validate form.
     * Save EmployeePension to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
            'pension' => 'required|numeric|exists:pensions,id',
            'employer_contribution' => 'sometimes|required|numeric|min:0',
         ]);
         
         $employeePension = $this->employeePensionModel->findByEmployeeId($request->input('employee'));
         if($employeePension){
             return $this->update($request, $employeePension->id);
         }

         $employeePension = $this->employeePensionModel->create($request);
         if ($employeePension->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=pension');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeePension. Try again!');
         }
     }

    // Display employeepensions.edit with employeepensioninfo to edit
    public function edit($id) {
        $employeePension = $this->employeePensionModel->findById($id);
        return view('employeepensions.edit', ['employeePension' => $employeePension]);
    }

    /**
     * Validate form.
     * Update EmployeePension in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeePension = $this->employeePensionModel->edit($id, $request);
        if ($employeePension->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=pension');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeePension. Try again!');
        }
    }

    /**
     * Delete EmployeePension from database
     * Redirect to prefered route or perform other action
     */
    public function delete($id) {
        if ($this->employeePensionModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeePension. Try again!');
        }
    }
}
