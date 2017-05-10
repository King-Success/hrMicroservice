@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$tax->title}}</h2>
		<h5 class="m-b-md">Shedule of Payment "{{$tax->title}}" {{$payroll->paid_at}}</h5>
		@if(!$view_type)
		<a href="/payslip/tax/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
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
			<h2>{{$AppConfig->company_title}} Payment Shedule</h2><small>{{$tax->title}}</small></div>
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
							<th>Amount</th>
							<!--<th>Created At</th>-->
						</tr>
					</thead>
					<tbody>
						<?php $taxableEmployees = $tax->salary_component->employee_salary_components; ?>
						<?php $counter = 0; $amountInEntity = 0; ?>
						@foreach($taxableEmployees as $taxableEmployee)
						@foreach ($paycheckComponents as $paycheckComponent)
						<?php if($paycheckComponent->employee_salary_component_info_id != $taxableEmployee->id) continue; ?>
				        <?php if($paycheckComponent->employee->employee_tax->tax_id != $tax->id) continue; ?>
						<?php $amountInEntity += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
						<tr>
						<td>{{ ++$counter }}</td>
						<td>{{$paycheckComponent->employee->surname}} {{$paycheckComponent->employee->other_names}}</td>
						<td>{{$paycheckComponent->employee->employee_number}}</td>
						<td>{{$paycheckComponent->employee->employee_rank ? $paycheckComponent->employee->employee_rank->rank->title : ''}}</td>
						<?php
						$amount = $paycheckComponent->cycle * $paycheckComponent->amount;
						?>
						<td>{{number_format($amount, 2)}}</td>
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