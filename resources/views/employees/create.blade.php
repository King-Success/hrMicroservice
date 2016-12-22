@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Add Employee</h2><small>Add an employee to the payroll management system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <form role="form" action="/employee/create" method="POST">
                        
                        <div class="form-group">
                            <label for="InputName">Full  Name</label>
                            <input type="text" class="form-control" id="InputName" placeholder="Enter name">
                        </div>
                        
                        <div class="form-group">
                            <label for="InputDob">Date of Birth</label>
                            <input type="text" class="form-control" id="InputDob" placeholder="Enter Date of Birth">
                        </div>
                        
                        <div class="form-group">
                            <label for="InputEmail">Email address</label>
                            <input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Profile Pic</h2><small>Optional profile picture.</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <form action="api/dropzone" class="dropzone white">
                                <div class="dz-message" data-ui-jp="dropzone" data-ui-options="{ url: 'api/dropzone' }">
                                    <h4 class="m-t-lg m-b-md">Drag and drop the photo</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@stop