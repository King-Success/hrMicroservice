@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">Users</h2>
		<h5 class="m-b-md">Click on "Add User" to add a  user</h5>
		<a href="/user/create" class="btn rounded btn-outline b-info text-info p-x-md m-y">Add User</a>
	</div>
	</div>
</div>

<div class="padding">
    <div class="row">

        <div class="col-md-8 offset-sm-2"><!--<div class="col-md-12">-->
            <div class="box">
                <!--<div class="box-header">-->
                <!--    <h2>Employees</h2><small>Employee information</small></div>-->
                <!--<div class="box-divider m-a-0"></div>-->
                <!--
                <div class="col-sm-6 push-sm-6">
                    <div class="p-y text-center text-sm-right">
                        <a href="/user/create" class="btn rounded b-dark">Add</a>
                    </div>
                </div>
                -->
              <div class="col-sm-6 pull-sm-6 box-header">
                  <h2>User</h2><small>User information</small>
              </div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="table-responsive" id="datatable">
                            <table id="users" class="table b-t b-b"  data-ui-jp="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$counter }}</td>
                                        <td><a href="/user/{{$user->id}}/edit">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
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
        
    });
</script>

@stop