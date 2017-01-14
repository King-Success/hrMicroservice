@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$pension->title}}</h2>
		<h5 class="m-b-md">Shedule of Payment to "{{$pension->title}}" {{$payroll->paid_at}}</h5>
		<a href="/payslip/pension/{{$payroll->id}}/{{$pension->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
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
						<?php $pensionableEmployees = $pensions[0]->salary_component->employee_salary_component_infos; ?>
						<?php $counter = 0; $amountInEntity = 0; ?>
						@foreach($pensionableEmployees as $pensionableEmployee)
						@foreach ($paycheckComponents as $paycheckComponent)
						<?php if($paycheckComponent->employee_salary_component_info_id != $pensionableEmployee->id) continue; ?>
				        <?php if($paycheckComponent->employee->employee_pension_info->pension_id != $pension->id) continue; ?>
						<?php $amountInEntity += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
						<tr>
						<td>{{ ++$counter }}</td>
						<td>{{$paycheckComponent->employee->surname}} {{$paycheckComponent->employee->other_names}}</td>
						<td>{{$paycheckComponent->employee->employee_number}}</td>
						<td>{{$paycheckComponent->employee->employee_rank_info ? $paycheckComponent->employee->employee_rank_info->rank->title : ''}}</td>
						<td>{{$paycheckComponent->employee->employee_paygrade_info ? $paycheckComponent->employee->employee_paygrade_info->paygrade->employee_level->title : ''}}</td>
						<td>{{$paycheckComponent->employee->employee_paygrade_info ? $paycheckComponent->employee->employee_paygrade_info->paygrade->title : ''}}</td>
						<td>{{$paycheckComponent->employee->employee_pension_info->pension->title}}</td>
						<td>{{$paycheckComponent->employee->employee_pension_info->pin_number}}</td>
						<?php
						$employeeContribution = $paycheckComponent->cycle * $paycheckComponent->amount;
						$employerContribution = $paycheckComponent->cycle * $paycheckComponent->employee->employee_pension_info->employer_contribution;
						?>
						<td>{{number_format($employeeContribution, 2)}}</td>
						<td>{{number_format($employerContribution, 2)}}</td>
						<td>{{number_format($employeeContribution + $employerContribution, 2)}}</td>
						<!--<td>{{$paycheckComponent->created_at}}</td>-->
						</tr>
						@endforeach
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