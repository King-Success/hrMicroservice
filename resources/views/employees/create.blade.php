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
                    {!! Form::open(array('url' => '/employee/create', 'role' => 'form', 'method'=>'POST')) !!}
                        <div class="row m-b">
                              <div class="col-sm-2">
                                <label>Prefix</label>
                                <select class="form-control c-select" name="prefix" id="InputEditPrefix">
                                    @foreach($prefixes as $prefix)
                                    <option value="{{$prefix->id}}">{{$prefix->title}}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-sm-5">
                                <label>Surname</label>
                                <input type="text" name="surname" class="form-control" required id="InputSurname">   
                              </div>
                              <div class="col-sm-5">
                                <label>Other Names</label>
                                <input type="text" class="form-control" name="other_names" required id="InputOtherNames">      
                              </div>   
                        </div>
                         <div class="form-group">
                                <label>Employee Type</label>
                                <select class="form-control c-select" name="employee_type" id="InputEditPrefix">
                                    @foreach($employeeTypes as $employeeType)
                                    <option value="{{$employeeType->id}}">{{$employeeType->title}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="row m-b">
                              <div class="col-sm-6">
                                <label>PSN No.</label>
                                <input type="text" name="employee_number" class="form-control" id="InputPSNNo">   
                              </div>
                              <div class="col-sm-6">
                                <label for="InputDob">Date of Birth</label>
                                  <div class='input-group date' data-ui-jp="datetimepicker" data-ui-options="{
                                        viewMode: 'years',
                                        format: 'DD/MM/YYYY',
                                        icons: {
                                          date: 'fa fa-calendar',
                                          up: 'fa fa-chevron-up',
                                          down: 'fa fa-chevron-down',
                                          previous: 'fa fa-chevron-left',
                                          next: 'fa fa-chevron-right',
                                          today: 'fa fa-screenshot',
                                          clear: 'fa fa-trash',
                                          close: 'fa fa-remove'
                                        }
                                      }">
                                      <input type='text' name="dob"  placeholder="Enter Date of Birth" id="InputDob" class="form-control" required/>
                                      <span class="input-group-addon">
                                          <span class="fa fa-calendar"></span>
                                      </span>
                                  </div>
                              </div>   
                        </div>
                        
                        <div class="row m-b">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="InputEmail">Email address</label>
                                    <input type="email" name="email" class="form-control" id="InputEmail" required placeholder="Enter email">
                                </div>   
                              </div>
                              <div class="col-sm-6">
                                <label>Gender</label>
                                <select class="form-control c-select" name="gender" id="InputGender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>     
                              </div>   
                        </div>
                        <div class="row m-b">
                              <div class="col-sm-6">
                                <label>Mobile No. (Home)</label>
                                <input name="mobile_home" type="tel" class="form-control" required id="InputMobileHome">   
                              </div>
                              <div class="col-sm-6">
                                <label>Mobile no. (Work)</label>
                                <input name="mobile_work" type="tel" class="form-control" id="InputMobileWork" required>      
                              </div>   
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="6" data-minwords="6" required placeholder="Please Type Physical Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Logical Address</label>
                            <input type="text" name="logical_address" class="form-control" placeholder="Employee's Logical Address"></textarea>
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        
    </div>
</div>

@stop