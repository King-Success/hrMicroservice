@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        @if($taxes && count($taxes) == 0)
        <div class="col-md-6" id="addTax">
            <div class="box">
                <div class="box-header">
                    <h2>Add Tax</h2><small>Add tax typically a single entry is enough</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/tax/create', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTax">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTax" placeholder="default is Tax">
                        </div>
                        
                        <div class="form-group row">
                            <label for="InputSalaryComponent" class="col-sm-2 form-control-label">Salary Component</label>
                            <div class="col-sm-10">
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
        @endif
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Tax List</h2><small>List of Taxes</small></div>
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