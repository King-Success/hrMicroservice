<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Pension\PensionContract;

class PensionController extends Controller
{
    protected $pensionModel;
    public function __construct(PensionContract $pensionContract) {
        $this->pensionModel = $pensionContract;
    }

    // Display pensions.index with all pensions
    public function index() {
        $pensions = $this->pensionModel->findAll();
        return view('pensions.index', ['pensions' => $pensions]);
    }

    // Display pensions.create
    public function create() {
        return view('pensions.create');
    }

    /**
     * Validate form.
     * Save Pension to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $pension = $this->pensionModel->create($request);
         if ($pension->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Pension. Try again!');
         }
     }

    // Display pensions.edit with pension to edit
    public function edit($id) {
        $pension = $this->pensionModel->findById($id);
        $pensions = $this->pensionModel->findAll();
        return view('pensions.edit', ['pension' => $pension, 'pensions' => $pensions]);
    }

    /**
     * Validate form.
     * Update Pension in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $pension = $this->pensionModel->edit($id, $request);
        if ($pension->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Pension. Try again!');
        }
    }

    /**
     * Delete Pension from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->pensionModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/pension');
        } else {
            return back()
               ->with('error', 'Could not delete Pension. Try again!');
        }
    }
}
