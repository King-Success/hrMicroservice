@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        
        <div class="col-md-6" id="manageBank">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Bank</h2><small>Edit/Remove the selected bank</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/bank/' . $bank->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditBank">Title</label>
                            <input type="text" name="title" value="{{$bank->title}}" class="form-control" id="InputEditBank" placeholder="Enter bank name, e.g Ecobank">
                            <input type="hidden" id="InputEditId" name="id" value="{{$bank->id}}">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/bank/{{$bank->id}}/delete" id="deleteBank" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Bank List</h2><small>List of banks</small></div>
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
                                    @foreach($banks as $bank)
                                    <tr>
                                        <td><a href="/bank/{{$bank->id}}/edit">{{$bank->title}}</a></td>
                                        <td>{{$bank->created_at}}</td>
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