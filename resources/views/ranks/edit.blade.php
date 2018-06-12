@extends('layouts.master')

@section('content')

<div class="padding">
    <div class="row">
        
        <div class="col-md-6" id="manageRank">
            <div class="box">
                <div class="box-header">
                    <h2>Manage Rank</h2><small>Edit/Remove the selected rank</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    {!! Form::open(array('url' => '/rank/' . $rank->id . '/edit', 'role' => 'form', 'method'=>'PUT')) !!}
                        <div class="form-group">
                            <label for="InputEditTitle">Title</label>
                            <input type="text" value="{{$rank->title}}" name="title" class="form-control" id="InputEditTitle" placeholder="Enter Rank">
                            <input type="hidden" id="InputEditId" name="id" value="">
                        </div>
                        @if($AppConfig->rank_is_king)
                        <div class="form-group">
                            <label for="InputEditBasicSalary">Consolidated Salary (per annum)</label>
                            <input type="text" value="{{$rank->basic_salary}}" name="basic_salary" class="form-control" id="InputEditBasicSalary" placeholder="Enter Amount">
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="InputEditPaa">Allowance</label>
                            <input type="text" value="{{$rank->allowance}}" name="allowance" class="form-control" id="InputEditPaa" placeholder="Enter Allowance">
                        </div>
                        -->
                        <input type="hidden" value="{{$rank->allowance}}" name="allowance">
                        @else
                        <input type="hidden" name="basic_salary" value="0">
                        <input type="hidden" name="allowance" value="0">
                        @endif
                        <button type="submit" class="btn black m-b">UPDATE</button>
                        <a href="/rank/{{$rank->id}}/delete" id="deleteRank" class="m-b" style="text-decoration: underline;">DELETE</a>
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
                                        @if($AppConfig->rank_is_king)
                                        <!--<th>Allowance</th>-->
                                        <th>Consolidated Salary</th>
                                        @else
                                        <th>Created At</th>
                                        @endif
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($ranks as $_rank)
                                    <tr>
                                        <td><a href="/rank/{{$_rank->id}}/edit">{{$_rank->title}}</a></td>
                                        @if($AppConfig->rank_is_king)
                                        <!--<td>{{$_rank->allowance}}</td>-->
                                        <td>{{$_rank->basic_salary}}</t>
                                        @else
                                        <td>{{$_rank->created_at}}</td>
                                        @endif
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