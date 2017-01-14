@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
    <div class="row" id="new_payroll_form">
        <div class="col-md-6 offset-sm-3">
            <div class="box">
                <div class="box-header">
                    <h2>Payroll</h2><small>Create a new payroll</small>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            {!! Form::open(array('route' => 'store_payroll', 'role' => 'form')) !!}
                            <div class="form-group">
                                <label for="InputTitle">Title</label>
                                <input name="title" class="form-control" id="InputTitle" required placeholder="Enter Title" type="text">
                            </div>
                            <div class="row m-b">
                              <div class="col-sm-6">
                                <label>Cycle</label>
                                <select name="cycle" class="form-control c-select">
                                    <option value = "1" selected>1 X</option>
                                    <option value = "2">2 X</option>
                                    <option value = "3">3 X</option>
                                    <option value = "4">4 X</option>
                                    <option value = "5">5 X</option>
                                    <option value = "6">6 X</option>
                                </select>
                              </div>
                              <div class="col-sm-6">
                                <label for="InputPayday">Payment Date</label>
                                  <div class='input-group date' data-ui-jp="datetimepicker" data-ui-options="{
                                        viewMode: 'months',
                                        format: 'YYYY-MM-DD',
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
                                      <input type='text' name="paid_at"  placeholder="Payment Date" id="InputPayday" class="form-control" required/>
                                      <span class="input-group-addon">
                                          <span class="fa fa-calendar"></span>
                                      </span>
                                  </div>
                              </div>   
                            </div>
                            <div class="form-group">
                                <label>Description (optional)</label>
                                <textarea name="description" class="form-control" rows="3" data-minwords="6" placeholder="Description"></textarea>
                            </div>
                            <button type="submit" class="btn black m-b">Create</button>
                            <a href="/payroll" class="b-primary text-info p-x-md m-y">Cancel</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- ############ PAGE END-->
@stop