@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>User Details</h2><small>Current User</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/user/' . $user->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditName">Name</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control" id="InputEditName" placeholder="Enter Name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="InputEditEmail">Email</label>
                            <input type="email" value="{{$user->email}}" name="email" class="form-control" id="InputEditEmail" placeholder="Enter Email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="InputEditPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="InputEditPassword" value="******" disabled>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop