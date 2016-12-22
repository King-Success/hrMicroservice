@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addDepartment">
            <div class="box">
                <div class="box-header">
                    <h2>Add Department</h2><small>Add possible departments for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'store_department', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Department">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="manageDepartment" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Department</h2><small>Edit/Remove the selected department</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Department">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deleteDepartment" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                        <td><a href="#" data="{{$department->id}}" class="selectedDepartment">{{$department->title}}</a></td>
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

<script type="text/javascript">
    $( document ).ready(function() {
        
        $('.selectedDepartment').on('click', function(evt){
            $('#addDepartment').hide();
            $('#manageDepartment').show();
            $('#InputEditDepartment').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data'));
            $('#deleteDepartment').attr('href', '/department/' + $(evt.target).attr('data') + '/delete');
            $('#manageForm').attr('action', '/department/' + $(evt.target).attr('data') + '/edit');
        });
    });
</script>

@stop