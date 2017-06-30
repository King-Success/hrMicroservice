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
                            
                            <div class="col-sm-10">
                                <label for="InputELevel">Employee Level</label>
                                <select class="form-control c-select" name="employee_level_id" id="InputELevel">
                                    @foreach($employeeLevels as $levels)
                                    <option value="{{$levels->id}}">{{$levels->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($AppConfig->rank_is_king)
                        <input type="hidden" value="0.00" name="amount"/>
                        @else
                        <div class="form-group">
                            <label for="InputAmount">Amount (N)</label>
                            <input type="text" value="0.00" name="amount" class="form-control" id="InputAmount" placeholder="Enter amount">
                        </div>
                        @endif
                        <!--
                        <div class="form-group">
                            <label for="InputAllowance">Allowance (N)</label>
                            <input type="text" value="0.00" name="allowance" class="form-control" id="InputAllowance" placeholder="Enter amount">
                        </div>
                        -->
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
                                        @if(!$AppConfig->rank_is_king)
                                        <th>Amount (N)</th>
                                        @endif
                                        <!--<th>Allowance (N)</th>-->
                                        <!--<th>Created At</th>-->
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($paygrades as $paygrade)
                                    <tr>
                                        <td><a href="/paygrade/{{$paygrade->id}}/edit">{{$paygrade->title}}</a></td>
                                        <td>{{$paygrade->employee_level->title}}</td>
                                        @if(!$AppConfig->rank_is_king)
                                        <td>{{$paygrade->amount}}</td>
                                        @endif
                                        <!--<td>{{$paygrade->allowance}}</td>-->
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