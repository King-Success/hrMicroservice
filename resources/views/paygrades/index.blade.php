@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addPaygrade">
            <div class="box">
                <div class="box-header">
                    <h2>Add Pay Grade</h2><small>Add possible pay grades for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('route' => 'store_paygrade', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Pay Grade">
                        </div>
                        <div class="form-group">
                            <label for="InputAmount">Amount</label>
                            <input type="text" name="amount" class="form-control" id="InputAmount" placeholder="Enter Amount">
                        </div>
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="managePaygrade" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Pay Grade</h2><small>Edit/Remove the selected pay grade</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Pay Grade Level">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <div class="form-group">
                            <label for="InputEditAmount">Amount (N)</label>
                            <input type="text" name="amount" class="form-control" id="InputEditAmount" placeholder="Enter Amount">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deletePaygrade" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Pay Grade List</h2><small>List of Pay Grades</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <table class="table b-t b-b">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($paygrades as $paygrade)
                                    <tr>
                                        <td><a href="#" data-id="{{$paygrade->id}}" data-amount="{{$paygrade->amount}}" class="selectedPaygrade">{{$paygrade->title}}</a></td>
                                        <td>{{$paygrade->amount}}</td>
                                        <td>{{$paygrade->created_at}}</td>
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
        
        $('.selectedPaygrade').on('click', function(evt){
            $('#addPaygrade').hide();
            $('#managePaygrade').show();
            $('#InputEditTitle').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data-id'));
            $('#InputEditAmount').val($(evt.target).attr('data-amount'));
            $('#deletePaygrade').attr('href', '/paygrade/' + $(evt.target).attr('data-id') + '/delete');
            $('#manageForm').attr('action', '/paygrade/' + $(evt.target).attr('data-id') + '/edit');
        });
    });
</script>

@stop