@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="manageSalaryComponent">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Salary Component</h2><small>Edit/Remove the selected salary component</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/salarycomponent/' . $salaryComponent->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" name="title" value="{{$salaryComponent->title}}" class="form-control" placeholder="Enter Salary Component E.g Car Insurance">
                            <input type="hidden" id="InputEditId" name="id" value="{{$salaryComponent->id}}">
                        </div>
                        <div class="form-group row">
                            <label for="InputEditComponentType" class="col-sm-2 form-control-label">Component</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select" name="component_type" id="InputEditComponentType">
                                    <option value="Earning" {{$salaryComponent->component_type == 'Earning' ? 'selected' : ''}}>Earning</option>
                                    <option value="Deduction" {{$salaryComponent->component_type == 'Deduction' ? 'selected' : ''}}>Deduction</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="InputEditValueType" class="col-sm-2 form-control-label">Value</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select" name="value_type" id="InputEditValueType">
                                    <option value="Percentage" @if($salaryComponent->value_type == 'Percentage'){{'selected'}}@endif>Percentage</option>
                                    <option value="Amount" @if($salaryComponent->value_type == 'Amount'){{'selected'}}@endif>Amount</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputAmount">Amount (N)</label>
                            <input type="text" value="{{$salaryComponent->amount}}" name="amount" class="form-control" id="InputAmount" placeholder="Enter amount">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/salarycomponent/{{$salaryComponent->id}}/delete" id="deleteSalaryComponent" class="m-b" style="text-decoration: underline;">DELETE</a>
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