@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addSalaryComponent">
            <div class="box">
                <div class="box-header">
                    <h2>Add Salary Component</h2><small>Add possible salary components for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'store_salarycomponent', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Salary Component. e.g Car Insurance">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="InputComponentType">Component</label>
                                <select class="form-control c-select" name="component_type" id="InputComponentType">
                                    <option value="Earning">Earning</option>
                                    <option value="Deduction">Deduction</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="InputValueType">Value</label>
                                <select class="form-control c-select" name="value_type" id="InputValueType">
                                    <option value="Percentage">Percentage</option>
                                    <option value="Amount" selected>Amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputAmount">Amount (N)</label>
                            <input type="text" value="0.00" name="amount" class="form-control" id="InputAmount" placeholder="Enter amount">
                            <p class="help-block"><small>Global but overridable for each employee</small></p>
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Salary Component List</h2><small>List of Salary Component</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <table class="table b-t b-b">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Component</th>
                                        <th>Value</th>
                                        <th>Amount (N/%)</th>
                                        <!--<th>Created At</th>-->
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($salaryComponents as $salaryComponent)
                                    <tr>
                                        <td><a href="/salarycomponent/{{$salaryComponent->id}}/edit">{{$salaryComponent->title}}</a></td>
                                        <td>{{$salaryComponent->component_type}}</td>
                                        <td>{{$salaryComponent->value_type}}</td>
                                        <td>{{$salaryComponent->amount}}</td>
                                        <!--<td>{{$salaryComponent->created_at}}</td>-->
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