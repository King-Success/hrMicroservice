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
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($pensions as $pension)
                                    <tr>
                                        <td><a href="/pension/{{$pension->id}}/edit">{{$pension->title}}</a></td>
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


@stop