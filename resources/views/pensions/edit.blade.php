@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">

        <div class="col-md-6" id="managePension">
            <div class="box">
                <div class="box-header">
                    <h2>Manage PFA</h2><small>Edit/Remove the selected PFA</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/pension/' . $pension->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditPension">Title</label>
                            <input type="text" value="{{$pension->title}}" name="title" class="form-control" id="InputEditPension" placeholder="Enter PFA name, e.g Trust Fund">
                            <input type="hidden" id="InputEditId" name="id" value="{{$pension->id}}">
                        </div>
                        
                        <div class="form-group row">
                            <label for="InputSalaryComponent" class="col-sm-2 form-control-label">Salary Component</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select" name="salary_component" id="InputSalaryComponent">
                                    @foreach($salaryComponents as $salaryComponent)
                                    <option value="{{$salaryComponent->id}}" {{$salaryComponent->id == $pension->salary_component_id ? 'selected' : ''}}>{{$salaryComponent->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn black m-b">SAVE</button>
                        <a href="/pension/{{$pension->id}}/delete" id="deletePension" class="m-b" style="text-decoration: underline;">DELETE</a>
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