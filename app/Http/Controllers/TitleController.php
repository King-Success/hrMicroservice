<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\Title\TitleContract;

class TitleController extends Controller
{
    protected $titleModel;
    public function __construct(TitleContract $titleContract) {
        $this->titleModel = $titleContract;
    }

    // Display titles.index with all titles
    public function index() {
        $titles = $this->titleModel->findAll();
        return view('titles.index', ['titles' => $titles]);
    }

    // Display titles.create
    public function create() {
        return view('titles.create');
    }

    /**
     * Validate form.
     * Save Title to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $title = $this->titleModel->create($request);
         if ($title->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return back();
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create Title. Try again!');
         }
     }

    // Display titles.edit with title to edit
    public function edit($id) {
        $title = $this->titleModel->findById($id);
        return view('titles.edit', ['title' => $title]);
    }

    /**
     * Validate form.
     * Update Title in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $title = $this->titleModel->edit($id, $request);
        if ($title->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update Title. Try again!');
        }
    }

    /**
     * Delete Title from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->titleModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return back();
        } else {
            return back()
               ->with('error', 'Could not delete Title. Try again!');
        }
    }
}
