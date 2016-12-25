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
                        <div class="row m-b">
                              <div class="col-sm-2">
                                <label>Title</label>
                                <select class="form-control c-select" name="title" id="InputEditTitle">
                                    <option value="1">Mr</option>
                                    <option value="2">Mrs.</option>
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
                              <input type='text'  placeholder="Enter Date of Birth" id="InputDob" class="form-control" />
                              <span class="input-group-addon">
                                  <span class="fa fa-calendar"></span>
                              </span>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputEmail">Email address</label>
                            <input type="email" class="form-control" id="InputEmail" required placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="6" data-minwords="6" required placeholder="Please Type Physical Address"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Bank Information</h2><small>Bank Information.</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <form action="{{ URL::secure('/') }}/api/dropzone" class="dropzone white">
                            <div class="form-group">
                              <label>Account Name</label>
                              <input type="text" name="bank_account_name" class="form-control" required>                        
                            </div>
                            <div class="row m-b">
                              <div class="col-sm-6">
                                <label>Bank</label>
                                <select class="form-control c-select" name="bank_id" id="InputEditBank">
                                    <option value="Percentage">UBA</option>
                                    <option value="Amount">Access Bank</option>
                                </select>
                              </div>
                              <div class="col-sm-6">
                                <label>Sort Code</label>
                                <input type="sort_code" class="form-control" data-parsley-equalto="#pwd" required>      
                              </div>   
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Organization Info</h2><small>Employee Information.</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <form action="{{ URL::secure('/') }}/api/dropzone" class="dropzone white">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" required>                        
                            </div>
                            <div class="row m-b">
                              <div class="col-sm-6">
                                <label>Enter password</label>
                                <input type="password" class="form-control" required id="pwd">   
                              </div>
                              <div class="col-sm-6">
                                <label>Confirm password</label>
                                <input type="password" class="form-control" data-parsley-equalto="#pwd" required>      
                              </div>   
                            </div>
                            <button type="submit" class="btn black m-b">SAVE</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@stop