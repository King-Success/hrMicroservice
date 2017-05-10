<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\User\UserContract;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userModel;
    public function __construct(UserContract $userContract) {
        $this->userModel = $userContract;
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    // Display users.index with all users
    public function index() {
        $users = $this->userModel->findAll();
        return view('users.index', ['users' => $users]);
    }
    
    // Display employeelevels.index with all employeelevels
    public function show($id, Request $request) {
        if(Auth::check() && Auth::user()->id != $id) return back();
        $user = $this->userModel->findById($id);
        return view('users.show', ['user' => $user]);
    }

    // Display users.create
    public function create() {
        return view('users.create');
    }

    /**
     * Validate form.
     * Save User to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request $request) {
         $this->validate($request, [
            // Specify validation rules here
         ]);

         $user = $this->userModel->create($request);
         if ($user->id) {
             // Redirect or do whatever you like
             $request->session()->flash('status', 'Task was successful!');
             return redirect('/user');
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create User. Try again!');
         }
     }

    // Display users.edit with user to edit
    public function edit($id) {
        $user = $this->userModel->findById($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Validate form.
     * Update User in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
           // Specify validation rules here
        ]);

        $user = $this->userModel->edit($id, $request);
        if ($user->id) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/user');
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update User. Try again!');
        }
    }

    /**
     * Delete User from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request $request, $id) {
        if ($this->userModel->remove($id)) {
            // Redirect or do whatever you like
            $request->session()->flash('status', 'Task was successful!');
            return redirect('/user');
        } else {
            return back()
               ->with('error', 'Could not delete User. Try again!');
        }
    }
}
