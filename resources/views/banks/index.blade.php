@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addBank">
            <div class="box">
                <div class="box-header">
                    <h2>Add Bank</h2><small>Add possible banks for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/bank/create', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputBank">Title</label>
                            <input type="text" name="title" class="form-control" id="InputBank" placeholder="Enter bank name, e.g Ecobank.">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="manageBank" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Bank</h2><small>Edit/Remove the selected bank</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditBank">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditBank" placeholder="Enter bank name, e.g Ecobank">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deleteBank" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                        <td><a href="#" data="{{$bank->id}}" class="selectedBank">{{$bank->title}}</a></td>
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

<script type="text/javascript">
    $( document ).ready(function() {
        
        $('.selectedBank').on('click', function(evt){
            $('#addBank').hide();
            $('#manageBank').show();
            $('#InputEditBank').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data'));
            $('#deleteBank').attr('href', '/bank/' + $(evt.target).attr('data') + '/delete');
            $('#manageForm').attr('action', '/bank/' + $(evt.target).attr('data') + '/edit');
        });
    });
</script>

@stop