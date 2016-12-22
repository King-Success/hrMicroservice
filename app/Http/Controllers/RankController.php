<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Rank\RankContract;

class RankController extends Controller
{
    protected $rankModel;
    public function __construct(RankContract $rankContract) {
        $this->rankModel = $rankContract;
    }

    // Display ranks.index with all ranks
    public function index() {
        $ranks = $this->rankModel->findAll();
        return view('ranks.index', ['ranks' => $ranks]);
    }

    // Display ranks.create
    public function create() {
        return view('ranks.create');
    }

    /**
     * Validate form.
     * Save Rank to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $rank = $this->rankModel->create($request);
         if ($rank->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Rank. Try again!');
         }
     }

    // Display ranks.edit with rank to edit
    public function edit($id) {
        $rank = $this->rankModel->findById($id);
        return view('ranks.edit', ['rank' => $rank]);
    }

    /**
     * Validate form.
     * Update Rank in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $rank = $this->rankModel->edit($id, $request);
        if ($rank->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Rank. Try again!');
        }
    }

    /**
     * Delete Rank from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->rankModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->with('error', 'Could not delete Rank. Try again!');
        }
    }
}
