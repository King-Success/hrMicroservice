@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<!--<div class="padding">-->
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">Employees</h2>
		<h5 class="m-b-md">Click on "Add Employee" to add an employee</h5>
		<a href="/employee/create" class="btn rounded btn-outline b-info text-info p-x-md m-y">Add Employee</a>
	</div>
	</div>
<!--</div>-->
 
<!--<div class="padding">-->
    <div class="container">
        <div class="col-md-12">
            <div class="box">
                <!--<div class="box-header">-->
                <!--    <h2>Employees</h2><small>Employee information</small></div>-->
                <!--<div class="box-divider m-a-0"></div>-->
                <!--
                <div class="col-sm-6 push-sm-6">
                    <div class="p-y text-center text-sm-right">
                        <a href="/employee/create" class="btn rounded b-dark">Add</a>
                    </div>
              </div>
              -->
                <div class="col-sm-6 pull-sm-6 box-header">
                    <h2>Employees</h2><small>Employee information</small>
                </div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="table-responsive" id="datatable">
                            <table id="employees" class="table b-t b-b"  data-ui-jp="dataTable" data-ui-options="{
                                  lengthChange: false,
                                  buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
                                  'initComplete': function () {
                                    this.api().buttons().container()
                                      .appendTo( '#datatable .col-md-6:eq(0)' );
                                  }
                                }" >
                                <thead>
                                    <tr>
                                        <!--<th>#</th>-->
                                        <th>Surname</th>
                                        <th>Other Names</th>
                                        <th>Employee Number</th>
                                        <!--<th>Gender</th>-->
                                        <th>Email</th>
                                        <th>Logical Address</th>
                                        <th>Mobile (Home)</th>
                                        <th>Mobile (Work)</th>
                                        <!--<th>Created At</th>-->
                                    </tr>
                                    </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <!--<td>{{ ++$counter }}</td>-->
                                        <td><a href="/employee/{{$employee->id}}">{{$employee->surname}}</a></td>
                                        <td>{{$employee->other_names}}</td>
                                        <td>{{$employee->employee_number}}</td>
                                        <!--<td>{{$employee->gender}}</td>-->
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->logical_address}}</td>
                                        <td>{{$employee->mobile_home}}</td>
                                        <td>{{$employee->mobile_work}}</td>
                                        <!--<td>{{$employee->created_at}}</td>-->
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
<!--</div>-->

@stop


@section('jsFooter')

<script type="text/javascript">
    $( document ).ready(function() {
        
    });
</script>

@stop