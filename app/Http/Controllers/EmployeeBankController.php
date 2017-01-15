<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeBank\EmployeeBankContract;

class EmployeeBankController extends Controller
{
    protected $employeeBankModel;
    public function __construct(EmployeeBankContract $employeeBankContract) {
        $this->employeeBankModel = $employeeBankContract;
    }

    // Display employeebanks.index with all employeebanks
    public function index() {
        $employeeBanks = $this->employeeBankModel->findAll();
        return view('employeebanks.index', ['employeeBanks' => $employeeBanks]);
    }

    // Display employeebanks.create
    public function create() {
        return view('employeebanks.create');
    }

    /**
     * Validate form.
     * Save EmployeeBank to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);
         
         $employeeBank = $this->employeeBankModel->findByEmployeeId($request->input('employee'));
         if($employeeBank){
             return $this->update($request, $employeeBank->id);
         }

         $employeeBank = $this->employeeBankModel->create($request);
         if ($employeeBank->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=bank');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeBank. Try again!');
         }
     }

    // Display employeebanks.edit with employeebankinfo to edit
    public function edit($id) {
        $employeeBank = $this->employeeBankModel->findById($id);
        return view('employeebanks.edit', ['employeeBank' => $employeeBank]);
    }

    /**
     * Validate form.
     * Update EmployeeBank in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeBank = $this->employeeBankModel->edit($id, $request);
        if ($employeeBank->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=bank');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeBank. Try again!');
        }
    }

    /**
     * Delete EmployeeBank from database
     * Redirect to prefered route or perform other action
     */
    public function delete($id) {
        if ($this->employeeBankModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeBank. Try again!');
        }
    }
}
