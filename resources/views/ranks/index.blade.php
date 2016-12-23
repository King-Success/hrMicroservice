@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-6" id="addRank">
            <div class="box">
                <div class="box-header">
                    <h2>Add Rank</h2><small>Add possible ranks for the system</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/rank/create', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Rank">
                        </div>
                        
                        <div class="form-group">
                            <label for="InputPaa">PAA/PNAA</label>
                            <input type="text" name="peculiar_allowance" class="form-control" id="InputPaa" placeholder="Enter PAA/PNAA">
                        </div>
                        
                        <button type="submit" class="btn black m-b">SAVE</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6" id="manageRank" style="display: none;">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Rank</h2><small>Edit/Remove the selected rank</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '#', 'role' => 'form', 'id'=>'manageForm', 'method' => 'put')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Rank">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        <div class="form-group">
                            <label for="InputEditPaa">PAA/PNAA</label>
                            <input type="text" name="peculiar_allowance" class="form-control" id="InputEditPaa" placeholder="Enter PAA/PNAA">
                        </div>
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="#" id="deleteRank" class="m-b" style="text-decoration: underline;">DELETE</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h2>Rank List</h2><small>List of ranks</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <table class="table b-t b-b">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>PAA/PNAA</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($ranks as $rank)
                                    <tr>
                                        <td><a href="#" data-paa="{{$rank->peculiar_allowance}}" data-id="{{$rank->id}}" class="selectedRank">{{$rank->title}}</a></td>
                                        <td>{{$rank->peculiar_allowance}}</td>
                                        <td>{{$rank->created_at}}</td>
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
        
        $('.selectedRank').on('click', function(evt){
            $('#addRank').hide();
            $('#manageRank').show();
            $('#InputEditTitle').val($(evt.target).text());
            $('#InputEditId').val($(evt.target).attr('data-id'));
            $('#InputEditPaa').val($(evt.target).attr('data-paa'));
            $('#deleteRank').attr('href', '/rank/' + $(evt.target).attr('data-id') + '/delete');
            $('#manageForm').attr('action', '/rank/' + $(evt.target).attr('data-id') + '/edit');
        });
    });
</script>

@stop