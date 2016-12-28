<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Bank\BankContract;

class BankController extends Controller
{
    protected $bankModel;
    public function __construct(BankContract $bankContract) {
        $this->bankModel = $bankContract;
    }

    // Display banks.index with all banks
    public function index() {
        $banks = $this->bankModel->findAll();
        return view('banks.index', ['banks' => $banks]);
    }

    // Display banks.create
    public function create() {
        return view('banks.create');
    }

    /**
     * Validate form.
     * Save Bank to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $bank = $this->bankModel->create($request);
         if ($bank->id) {
             // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Bank. Try again!');
         }
     }

    // Display banks.edit with bank to edit
    public function edit($id) {
        $bank = $this->bankModel->findById($id);
        $banks = $this->bankModel->findAll();
        return view('banks.edit', ['bank' => $bank, 'banks' => $banks]);
    }

    /**
     * Validate form.
     * Update Bank in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $bank = $this->bankModel->edit($id, $request);
        if ($bank->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Bank. Try again!');
        }
    }

    /**
     * Delete Bank from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->bankModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->with('error', 'Could not delete Bank. Try again!');
        }
    }
}
