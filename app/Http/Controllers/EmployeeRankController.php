<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EmployeeRank\EmployeeRankContract;

class EmployeeRankController extends Controller
{
    protected $employeeRankModel;
    public function __construct(EmployeeRankContract $employeeRankContract) {
        $this->employeeRankModel = $employeeRankContract;
    }

    // Display employeeranks.index with all employeeranks
    public function index() {
        $employeeRanks = $this->employeeRankModel->findAll();
        return view('employeeranks.index', ['employeeRanks' => $employeeRanks]);
    }

    // Display employeeranks.create
    public function create() {
        return view('employeeranks.create');
    }

    /**
     * Validate form.
     * Save EmployeeRank to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);
         
         $employeeRank = $this->employeeRankModel->findByEmployeeId($request->input('employee'));
         if($employeeRank){
             return $this->update($request, $employeeRank->id);
         }

         $employeeRank = $this->employeeRankModel->create($request);
         if ($employeeRank->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=rank');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create EmployeeRank. Try again!');
         }
     }

    // Display employeeranks.edit with employeerankinfo to edit
    public function edit($id) {
        $employeeRank = $this->employeeRankModel->findById($id);
        return view('employeeranks.edit', ['employeeRank' => $employeeRank]);
    }

    /**
     * Validate form.
     * Update EmployeeRank in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $employeeRank = $this->employeeRankModel->edit($id, $request);
        if ($employeeRank->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/employee/' . $request->input('employee') . '?tab=rank');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update EmployeeRank. Try again!');
        }
    }

    /**
     * Delete EmployeeRank from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->employeeRankModel->remove($id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete EmployeeRank. Try again!');
        }
    }
}
