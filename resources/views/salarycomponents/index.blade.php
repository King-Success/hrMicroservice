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
                            <label for="InputComponentType" class="col-sm-2 form-control-label">Component Type</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select">
                                    <option>Earning</option>
                                    <option>Deduction</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="InputValueType" class="col-sm-2 form-control-label">Value Type</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select">
                                    <option>Amount</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="manageSalaryComponent" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Salary Component</h2><small>Edit/Remove the selected salary component</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Salary Component E.g Car Insurance">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <div class="form-group row">
                            <label for="InputEditComponentType" class="col-sm-2 form-control-label">Component Type</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select">
                                    <option>Earning</option>
                                    <option>Deduction</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="InputEditValueType" class="col-sm-2 form-control-label">Value Type</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select">
                                    <option>Amount</option>
                                    <option>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deleteSalaryComponent" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                        <th>Component Type</th>
                                        <th>Value Type</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($salaryComponents as $salaryComponent)
                                    <tr>
                                        <td><a href="#" data-id="{{$salaryComponent->id}}" data-ctype="{{$salaryComponent->component_type}}" data-vtype="{{$salaryComponent->value_type}}" class="selectedSalaryComponent">{{$salaryComponent->title}}</a></td>
                                        <td>{{$salaryComponent->component_type}}</td>
                                        <td>{{$salaryComponent->value_type}}</td>
                                        <td>{{$salaryComponent->created_at}}</td>
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

<script type="text/javascript">
    $( document ).ready(function() {
        
        $('.selectedSalaryComponent').on('click', function(evt){
            $('#addSalaryComponent').hide();
            $('#manageSalaryComponent').show();
            $('#InputEditTitle').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data-id'));
            $('#InputEditComponentType').val($(evt.target).attr('data-ctype'));
            $('#InputEditValueType').val($(evt.target).attr('data-vtype'));
            $('#deleteSalaryComponent').attr('href', '/salarycomponent/' + $(evt.target).attr('data-id') + '/delete');
            $('#manageForm').attr('action', '/salarycomponent/' + $(evt.target).attr('data-id') + '/edit');
        });
    });
</script>

@stop