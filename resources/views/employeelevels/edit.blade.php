@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">

        <div class="col-md-6" id="manageLevel">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Level</h2><small>Edit/Remove the selected level</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/employeelevel/' . $employeeLevel->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" value="{{$employeeLevel->title}}" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Level e.g 1">
                            <input type="hidden" id="InputEditId" name="id" value="{{$employeeLevel->id}}">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/employeelevel/{{$employeeLevel->id}}/delete" id="deleteLevel" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Title Levels</h2><small>List of levels</small></div>
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
                                    @foreach($employeeLevels as $_employeeLevel)
                                    <tr>
                                        <td><a href="/employeelevel/{{$_employeeLevel->id}}/edit">{{$_employeeLevel->title}}</a></td>
                                        <td>{{$_employeeLevel->created_at}}</td>
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