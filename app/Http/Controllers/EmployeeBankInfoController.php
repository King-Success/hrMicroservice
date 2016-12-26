<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeBankInfo\EmployeeBankInfoContract;

class EmployeeBankInfoController extends Controller
{
    protected $employeeBankInfoModel;
    public function __construct(EmployeeBankInfoContract $employeeBankInfoContract) {
        $this->employeeBankInfoModel = $employeeBankInfoContract;
    }

    // Display employeebankinfos.index with all employeebankinfos
    public function index() {
        $employeeBankInfos = $this->employeeBankInfoModel->findAll();
        return view('employeebankinfos.index', ['employeeBankInfos' => $employeeBankInfos]);
    }

    // Display employeebankinfos.create
    public function create() {
        return view('employeebankinfos.create');
    }

    /**
     * Validate form.
     * Save EmployeeBankInfo to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);
         
         $employeeBankInfo = $this->employeeBankInfoModel->findByEmployeeId($request->input('employee'));
         if($employeeBankInfo){
             return $this->update($request, $employeeBankInfo->id);
         }

         $employeeBankInfo = $this->employeeBankInfoModel->create($request);
         if ($employeeBankInfo->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=bank');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeBankInfo. Try again!');
         }
     }

    // Display employeebankinfos.edit with employeebankinfo to edit
    public function edit($id) {
        $employeeBankInfo = $this->employeeBankInfoModel->findById($id);
        return view('employeebankinfos.edit', ['employeeBankInfo' => $employeeBankInfo]);
    }

    /**
     * Validate form.
     * Update EmployeeBankInfo in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeBankInfo = $this->employeeBankInfoModel->edit($id, $request);
        if ($employeeBankInfo->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=bank');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeBankInfo. Try again!');
        }
    }

    /**
     * Delete EmployeeBankInfo from database
     * Redirect to prefered route or perform other action
     */
    public function delete($id) {
        if ($this->employeeBankInfoModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeBankInfo. Try again!');
        }
    }
}
