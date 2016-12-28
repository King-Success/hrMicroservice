@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        
        <div class="col-md-6" id="managePrefix">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Prefix</h2><small>Edit/Remove the selected Prefix</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/prefix/' . $prefix->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" value="{{$prefix->title}}" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Prefix, e.g Mr.">
                            <input type="hidden" id="InputEditId" name="id" value="{{$prefix->id}}">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/prefix/{{$prefix->id}}/delete" id="deletePrefix" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Prefixes</h2><small>List of Prefix</small></div>
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
                                    @foreach($prefixes as $_prefix)
                                    <tr>
                                        <td><a href="/prefix/{{$_prefix->id}}/edit">{{$_prefix->title}}</a></td>
                                        <td>{{$_prefix->created_at}}</td>
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