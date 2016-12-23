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
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="managePension" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage PFA</h2><small>Edit/Remove the selected PFA</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditPension">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditPension" placeholder="Enter PFA name, e.g Trust Fund">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deletePension" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($pensions as $pension)
                                    <tr>
                                        <td><a href="#" data="{{$pension->id}}" class="selectedPension">{{$pension->title}}</a></td>
                                        <td>{{$pension->created_at}}</td>
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
        
        $('.selectedPension').on('click', function(evt){
            $('#addPension').hide();
            $('#managePension').show();
            $('#InputEditPension').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data'));
            $('#deletePension').attr('href', '/pension/' + $(evt.target).attr('data') + '/delete');
            $('#manageForm').attr('action', '/pension/' + $(evt.target).attr('data') + '/edit');
        });
    });
</script>

@stop