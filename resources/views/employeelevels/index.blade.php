@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addLevel">
            <div class="box">
                <div class="box-header">
                    <h2>Add Level</h2><small>Add possible level for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'store_employeelevel', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Level</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Level, e.g 1">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
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