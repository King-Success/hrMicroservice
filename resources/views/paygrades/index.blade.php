@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addPaygrade">
            <div class="box">
                <div class="box-header">
                    <h2>Add Pay Grade</h2><small>Add possible pay grades for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'store_paygrade', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Title/Step</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Title/Step">
                        </div>
                        
                        <div class="form-group row">
                            <label for="InputELevel" class="col-sm-2 form-control-label">Employee Level</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select" name="employee_level_id" id="InputELevel">
                                    @foreach($employeeLevels as $levels)
                                    <option value="{{$levels->id}}">{{$levels->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAmount">Amount (N)</label>
                            <input type="text" value="0.00" name="amount" class="form-control" id="InputAmount" placeholder="Enter amount">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Pay Grade List</h2><small>List of Pay Grades</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <table class="table b-t b-b">
                                <thead>
                                    <tr>
                                        <th>Title/Step</th>
                                        <th>Level</th>
                                        <th>Amount (N)</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($paygrades as $paygrade)
                                    <tr>
                                        <td><a href="/paygrade/{{$paygrade->id}}/edit">{{$paygrade->title}}</a></td>
                                        <td>{{$paygrade->employee_level->title}}</td>
                                        <td>{{$paygrade->amount}}</td>
                                        <td>{{$paygrade->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@stop


@section('jsFooter')

@stop