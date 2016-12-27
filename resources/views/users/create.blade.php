@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Add User</h2><small>Add a user to the payroll management system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/user/create', 'role' => 'form', 'method'=>'POST')) !!}
                        <div class="form-group">
                            <label for="InputEditName">Name</label>
                            <input type="text" value="" name="name" class="form-control" id="InputEditName" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="InputEditEmail">Email</label>
                            <input type="email" value="" name="email" class="form-control" id="InputEditEmail" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="InputEditPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="InputEditPassword" placeholder="Enter Password">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE CHANGES</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop