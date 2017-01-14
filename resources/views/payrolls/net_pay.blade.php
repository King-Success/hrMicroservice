@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$payroll->title}}</h2>
		<h5 class="m-b-md">Shedule of Payment for "{{$payroll->title}}" {{$payroll->paid_at}}</h5>
		<a href="/payslip/net_pay/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
	</div>
	</div>
</div>
 
@if(count($paycheckSummaries) > 0)
<div class="padding">
	<div class="row">
	<div class="col-md-12">
	<!--<div class="col-md-8 offset-sm-2">-->
		<div class="box">
		<div class="box-header">
			<h2>{{$AppConfig->company_title}} Payment Shedule</h2><small>{{$payroll->title}}</small></div>
		<div class="box-divider m-a-0"></div>
		<div class="box-body">
			<div class="app-body">
			<!--<div class="padding">-->
				<div class="table-responsive" id="xdatatable">
					<table id="payrolls" class="table table-striped b-t b-b"  data-ui-jp="xdataTable">
					<thead>
						<tr>
						<th>#</th>
						<th>Name</th>
						<th>No.</th>
						<th>Rank</th>
						<th>Step</th>
						<th>Level</th>
						<th>Bank</th>
						<th>Sort Code</th>
						<th>Account Name</th>
						<th>Account #</th>
						<th>Net Pay</th>
						<!--<th>Paid At</th>-->
						<!--<th>Created At</th>-->
						</tr>
					</thead>
					<tbody>
						<?php $counter = 0; ?>
						@foreach ($paycheckSummaries as $paycheckSummary)
						<tr>
						<td>{{ ++$counter }}</td>
						<td>{{$paycheckSummary->employee->surname}} {{$paycheckSummary->employee->other_names}}</td>
						<td>{{$paycheckSummary->employee->employee_number}}</td>
						<td>{{$paycheckSummary->employee->employee_rank_info ? $paycheckSummary->employee->employee_rank_info->rank->title : ''}}</td>
						<td>{{$paycheckSummary->employee->employee_paygrade_info ? $paycheckSummary->employee->employee_paygrade_info->paygrade->employee_level->title : ''}}</td>
						<td>{{$paycheckSummary->employee->employee_paygrade_info ? $paycheckSummary->employee->employee_paygrade_info->paygrade->title : ''}}</td>
						<td>{{$paycheckSummary->employee->employee_bank_info->bank->title}}</td>
						<td>{{$paycheckSummary->employee->employee_bank_info->sort_code}}</td>
						<td>{{$paycheckSummary->employee->employee_bank_info->account_name}}</td>
						<td>{{$paycheckSummary->employee->employee_bank_info->account_number}}</td>
						<td>{{number_format($paycheckSummary->cycle * $paycheckSummary->net_pay, 2)}}</td>
						<!--<td>{{$payroll->paid_at}}</td>-->
						<!--<td>{{$paycheckSummary->created_at}}</td>-->
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
				<!--</div>-->
			</div>
			</div>
		</div>
	<!--</div>-->
	</div>
	</div>
</div>
@endif
<!-- ############ PAGE END-->
@stop