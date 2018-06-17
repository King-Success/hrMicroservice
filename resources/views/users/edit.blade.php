@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Edit User</h2><small>Edit this user</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/user/' . $user->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditName">Name</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control" id="InputEditName" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="InputEditEmail">Email</label>
                            <input type="email" value="{{$user->email}}" name="email" class="form-control" id="InputEditEmail" placeholder="Enter Email">
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
        
        <div class="col-md-6">
            {!! Form::open(array('url' => '/user/' . $user->id, 'role' => 'form', 'method'=>'DELETE', 'id'=> 'deleteUser')) !!}
            <button class="m-b btn">DELETE</button>
            {!! Form::close() !!}
        </div>
        <script type="text/javascript">
            $('#deleteUser').submit(function(evt){
                evt.preventDefault();
                if(confirm("Are you sure you want to delete this record?")){
                    console.log("goodluck deleting.");
                    this.submit()
                }
            })
        </script>
    </div>
</div>

@stop