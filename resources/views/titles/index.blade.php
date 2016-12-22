@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addTitle">
            <div class="box">
                <div class="box-header">
                    <h2>Add Title</h2><small>Add possible title for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'store_title', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Title, e.g Mr.">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="manageTitle" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Title</h2><small>Edit/Remove the selected title</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Title">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deleteTitle" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Title List</h2><small>List of titles</small></div>
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
                                    @foreach($titles as $title)
                                    <tr>
                                        <td><a href="#" data="{{$title->id}}" class="selectedTitle">{{$title->title}}</a></td>
                                        <td>{{$title->created_at}}</td>
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
        
        $('.selectedTitle').on('click', function(evt){
            $('#addTitle').hide();
            $('#manageTitle').show();
            $('#InputEditTitle').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data'));
            $('#deleteTitle').attr('href', '/title/' + $(evt.target).attr('data') + '/delete');
            $('#manageForm').attr('action', '/title/' + $(evt.target).attr('data') + '/edit');
        });
    });
</script>

@stop