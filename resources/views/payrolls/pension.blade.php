@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('content')
<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$pension->title}}</h2>
		<h5 class="m-b-md">Shedule of Payment to "{{$pension->title}}" {{$payroll->paid_at}}</h5>
		@if(!$view_type)
		<a href="/payslip/pension/{{$payroll->id}}/{{$pension->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
		@endif
	</div>
	</div>
</div>
 
@if(count($paycheckComponents) > 0)
<div class="padding">
	<div class="row">
	<div class="col-md-12">
	<!--<div class="col-md-8 offset-sm-2">-->
		<div class="box">
		<div class="box-header">
			<h2>{{$AppConfig->company_title}} Payment Shedule</h2><small>{{$pension->title}}</small></div>
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
							<th>Pension</th>
							<th>Pin #</th>
							<th>Employee Contribution</th>
							<th>Employer Contribution</th>
							<th>Total</th>
							<!--<th>Created At</th>-->
						</tr>
					</thead>
					<tbody>
						<?php $counter = 0; $total = 0; $totalEmployee = 0; $totalEmployer = 0; ?>
						@foreach($pensionables as $pensioner)
	                	<tr>
						<td>{{ ++$counter }}</td>
						<td>{{$pensioner->employee->surname}} {{$pensioner->employee->other_names}}</td>
						<td>{{$pensioner->employee->employee_number}}</td>
						<td>{{$pensioner->rank ? $pensioner->rank : ''}}</td>
						<td>{{$pensioner->step ? $pensioner->step : ''}}</td>
						<td>{{$pensioner->level ? $pensioner->level : ''}}</td>
						<td>{{$pension->title}}</td>
						<td>{{$pensioner->pension_pin_number}}</td>
						<?php
						$employeeContribution = $pensioner->cycle * $pensioner->pension_amount;
						$employerContribution = $pensioner->cycle * $pensioner->pension_employee_contribution_amount;
						?>
						<td>{{number_format($employeeContribution, 2)}}</td>
						<td>{{number_format($employerContribution, 2)}}</td>
						<td>{{number_format($employeeContribution + $employerContribution, 2)}}</td>
						<!--<td>{{$pensioner->created_at}}</td>-->
						</tr>
						<?php 
						$totalEmployee += $employeeContribution;
						$totalEmployer += $employerContribution; 
						$total +=  $totalEmployee + $totalEmployer;
						?>
				        @endforeach
				        <tr>
						<th colspan="8"><b>Totals</b></th>
						<td><b>&#8358;{{number_format($totalEmployee, 2)}}</b></td>
						<td><b>&#8358;{{number_format($totalEmployer, 2)}}</b></td>
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