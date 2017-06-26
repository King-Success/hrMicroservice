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
                        @if($AppConfig->rank_is_king)
                        <div class="form-group">
                            <label for="InputBasicSalary">Consolidated Salary</label>
                            <input type="text" value="0.00" name="basic_salary" class="form-control" id="InputBasicSalary" placeholder="Enter Amount">
                        </div>
                        
                        <div class="form-group">
                            <label for="InputPaa">Allowance</label>
                            <input type="text" value="0.00" name="allowance" class="form-control" id="InputPaa" placeholder="Enter Allowance">
                        </div>
                        @else
                        <input type="hidden" name="basic_salary" value="0">
                        <input type="hidden" name="allowance" value="0">
                        @endif
                        <button type="submit" class="btn black m-b">SAVE</button>
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
                                        <th>Allowance</th>
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
                                        <td>{{$_rank->allowance}}</td>
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