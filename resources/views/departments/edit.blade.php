@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">

        <div class="col-md-6" id="manageDepartment">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Department</h2><small>Edit/Remove the selected department</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/department/' . $department->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditDepartment">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditDepartment" placeholder="Enter Department" value="{{$department->title}}">
                            <input type="hidden" id="InputEditId" name="id" value="{{$department->id}}">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/department/{{$department->id}}/delete" id="deleteDepartment" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Department List</h2><small>List of departments</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <table class="table b-t b-b">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                    <tr>
                                        <td><a href="#" data="/department/{{$department->id}}/edit">{{$department->title}}</a></td>
                                        <td>{{$department->created_at}}</td>
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