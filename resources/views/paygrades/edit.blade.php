@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        
        <div class="col-md-6" id="managePaygrade">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Pay Grade</h2><small>Edit/Remove the selected pay grade</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/paygrade/' . $paygrade->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title/Step</label>
                            <input type="text" value="{{$paygrade->title}}" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Title/Step">
                            <input type="hidden" id="InputEditId" name="id" value="{{$paygrade->id}}">
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="InputELevel">Employee Level</label>
                                <select class="form-control c-select" name="employee_level_id" id="InputELevel">
                                    @foreach($employeeLevels as $levels)
                                    <option value="{{$levels->id}}" {{$levels->id == $paygrade->employee_level_id ? 'selected' : ''}}>{{$levels->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputEditAmount">Amount (N)</label>
                            <input type="text" value="{{$paygrade->amount}}" name="amount" class="form-control" id="InputEditAmount" placeholder="Enter amount">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/paygrade/{{$paygrade->id}}/delete" id="deletePaygrade" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                        <!--<th>Created At</th>-->
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($paygrades as $paygrade)
                                    <tr>
                                        <td><a href="/paygrade/"{{$paygrade->id}}/edit">{{$paygrade->title}}</a></td>
                                        <td>{{$paygrade->employee_level->title}}</td>
                                        <td>{{$paygrade->amount}}</td>
                                        <!--<td>{{$paygrade->created_at}}</td>-->
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