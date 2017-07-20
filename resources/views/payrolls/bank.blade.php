@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$bank->title}}</h2>
		<h5 class="m-b-md">Schedule of Payment to {{$bank->title}} for {{$payroll->title}} {{$payroll->paid_at}}</h5>
		@if(!$view_type)
		<a href="/payslip/bank/{{$payroll->id}}/{{$bank->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
		@endif
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
			<h2>{{$AppConfig->company_title}} Payment Schedule</h2><small>{{$bank->title}}</small></div>
		<div class="box-divider m-a-0"></div>
		<div class="box-body">
			<div class="app-body">
			<!--<div class="padding">-->
				<div class="table-responsive" id="xdatatable">
					<table id="payrolls" class="table table-striped b-t b-b"  data-ui-jp="xdataTable">
					<thead>
						<tr>
						<th>#</th>
						<th>No.</th>
						<th>Rank</th>
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
						<?php $counter = 0; $total = 0; ?>
						@foreach ($paycheckSummaries as $paycheckSummary)
						<?php if(!$paycheckSummary->bankable || $paycheckSummary->bank_id != $bank->id) continue; ?>
						<tr>
						<td>{{ ++$counter }}</td>
						<td>{{$paycheckSummary->employee_number}}</td>
						<td>{{$paycheckSummary->rank ? $paycheckSummary->rank : ''}}</td>
						<td>{{$paycheckSummary->bankable ? $paycheckSummary->bank : ''}}</td>
						<td>{{$paycheckSummary->bankable ? $paycheckSummary->bank_sort_code : ''}}</td>
						<td>{{$paycheckSummary->bankable ? $paycheckSummary->bank_account_name : ''}}</td>
						<td>{{$paycheckSummary->bankable ? $paycheckSummary->bank_account_number : ''}}</td>
						<td>{{number_format($paycheckSummary->cycle * $paycheckSummary->net_pay, 2)}}</td>
						<!--<td>{{$payroll->paid_at}}</td>-->
						<!--<td>{{$paycheckSummary->created_at}}</td>-->
						</tr>
						<?php $total += $paycheckSummary->cycle * $paycheckSummary->net_pay; ?>
						@endforeach
						<tr>
						<th colspan="8"><b>Total</b></th>
						<td><b>&#8358;{{number_format($total, 2)}}</b></td>
						</tr>
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