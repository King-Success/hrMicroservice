@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<!--<div class="padding">-->
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">It's pay day already?</h2>
		<h5 class="m-b-md">Click on "Start Now" to generate the payroll</h5>
		<a href="/payroll/create" class="btn rounded btn-outline b-info text-info p-x-md m-y">Start Now</a>
		@if($payroll)
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
		@endif
	</div>
	</div>
 <!--</div>-->
@if(count($payrolls) > 0)
<!--<div class="padding">-->
	<div class="row">
	<!--<div class="col-md-12">-->
	<div class="col-md-8 offset-sm-2">
		<div class="box">
		<div class="box-header">
			<h2>Payroll History</h2><small>Payroll History</small></div>
		<div class="box-divider m-a-0"></div>
		<div class="box-body">
			<div class="app-body">
			<!--<div class="padding">-->
				<div class="table-responsive" id="datatable">
					<table id="payrolls" class="table b-t b-b"  data-ui-jp="dataTable">
					<thead>
						<tr>
						<!--<th>#</th>-->
						<th>Title</th>
						<th>Payslip</th>
						<th>Date</th>
						<th>Cycle</th>
						<th>Description</th>
						<!--<th>Created At</th>-->
						</tr>
					</thead>
					<tbody>
						<?php $counter = 0; ?>
						@foreach ($payrolls as $payroll)
						<tr>
						<!--<td>{{ ++$counter }}</td>-->
						<td><a href="/payroll/{{$payroll->id}}">{{$payroll->title}}</a></td>
						<td><a href="/payslip/{{$payroll->id}}">View</a></td>
						<td>{{$payroll->paid_at}}</td>
						<td>{{$payroll->cycle}}</td>
						<td>{{$payroll->description}}</td>
						<!--<td>{{$payroll->created_at}}</td>-->
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
				<!--</div>-->
			</div>
			</div>
		</div>
	</div>
	<!--</div>-->
	</div>
<!--</div>-->
@endif
<!-- ############ PAGE END-->
@stop