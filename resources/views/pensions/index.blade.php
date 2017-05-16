@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addPension">
            <div class="box">
                <div class="box-header">
                    <h2>Add PFA</h2><small>Add possible PFAs for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/pension/create', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputPension">Title</label>
                            <input type="text" name="title" class="form-control" id="InputPension" placeholder="Enter PFA name, e.g Trust Fund.">
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="InputSalaryComponent">Salary Component</label>
                                <select class="form-control c-select" name="salary_component" id="InputSalaryComponent">
                                    @foreach($salaryComponents as $salaryComponent)
                                    <option value="{{$salaryComponent->id}}">{{$salaryComponent->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>PFA List</h2><small>List of PFAs</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <table class="table b-t b-b">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Salary Component</th>
                                        <!--<th>Created At</th>-->
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($pensions as $pension)
                                    <tr>
                                        <td><a href="/pension/{{$pension->id}}/edit">{{$pension->title}}</a></td>
                                        <td><a href="/pension/{{$pension->id}}/edit">{{$pension->salary_component->title}}</a></td>
                                        <!--<td>{{$pension->created_at}}</td>-->
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