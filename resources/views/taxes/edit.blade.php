@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">

        <div class="col-md-6" id="manageTax">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Tax</h2><small>Edit/Remove the selected PFA</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/tax/' . $tax->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditTax">Title</label>
                            <input type="text" value="{{$tax->title}}" name="title" class="form-control" id="InputEditTax" placeholder="default is tax">
                            <input type="hidden" id="InputEditId" name="id" value="{{$tax->id}}">
                        </div>
                        
                        <div class="form-group row">
                            <label for="InputSalaryComponent" class="col-sm-2 form-control-label">Salary Component</label>
                            <div class="col-sm-10">
                                <select class="form-control c-select" name="salary_component" id="InputSalaryComponent">
                                    @foreach($salaryComponents as $salaryComponent)
                                    <option value="{{$salaryComponent->id}}" {{$salaryComponent->id == $tax->salary_component_id ? 'selected' : ''}}>{{$salaryComponent->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn black m-b">SAVE</button>
                        <a href="/tax/{{$tax->id}}/delete" id="deleteTax" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                    @foreach($taxes as $tax)
                                    <tr>
                                        <td><a href="/tax/{{$tax->id}}/edit">{{$tax->title}}</a></td>
                                        <td><a href="/tax/{{$tax->id}}/edit">{{$tax->salary_component->title}}</a></td>
                                        <!--<td>{{$tax->created_at}}</td>-->
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