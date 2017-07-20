@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$payroll->title}}</h2>
		<h5 class="m-b-md">Staff Salary Payroll "{{$payroll->title}}" {{$payroll->paid_at}}</h5>
		@if(!$view_type)
		<a href="/payslip/paycheck_summary/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
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
			<h2 style="text-transform: uppercase;">{{$AppConfig->company_title}} - Staff Salary Payroll </h2><small>{{$payroll->title}} {{$payroll->paid_at}}</small>
		<div class="box-divider m-a-0"></div>
		<div class="box-body">
			<div class="app-body">
			<!--<div class="padding">-->
				<div class="table-responsive" id="xdatatable">
					<table id="payrolls" class="table table-striped b-t b-b"  data-ui-jp="xdataTable">
					<thead>
						<tr style="text-transform: uppercase;">
                            <th>S/N</th>
                            <th>Detail</th>
                            <th>Psn No.</th>
                            <th>Rank</th>
                            <th>Level</th>
                            <th>Steps</th>
                            <th>Consolidated Salary</th>
                            <!-- array of allowances-->
                            @foreach ($earnings as $earningComponent)
                            <th>{{$earningComponent->component_title}}</th>
                            @endforeach
                            <th>Gross Total</th>
                            <!-- array of deductions-->
                            @foreach ($deductions as $deductionComponent)
                            <th>{{$deductionComponent->component_title}}</th>
                            @endforeach
                            <th>Total Deductions</th>
                            <th>Net Pay</th>
                        </tr>
					</thead>
					<tbody>
						<?php $counter = 0; $total = 0; ?>
			            @foreach ($paycheckSummaries as $paycheckSummary)
                        <tr>
                            <td>{{ ++$counter }}</td>
                            <td>{{$paycheckSummary->employee_surname}} {{$paycheckSummary->employee_othernames}}</td>
                            <td>{{$paycheckSummary->employee_number}}</td>
                            <td>{{$paycheckSummary->rank}}</td>
                            <td>{{$paycheckSummary->level}}</td>
                            <td>{{$paycheckSummary->step}}</td>
                            <td>{{number_format($paycheckSummary->consolidated_salary * $paycheckSummary->cycle, 2)}}</td>
                            <!-- array of allowances-->
                            
                             @foreach ($earnings as $earningComponent)
                                 <?php $tAmount = 0; ?>
                                 @foreach ($paycheckComponents as $paycheckComponent)
                                     <?php if ($paycheckComponent->employee_id != $paycheckSummary->employee_id ) continue; ?>
                                     <?php if ($paycheckComponent->component_title != $earningComponent->component_title ) continue; ?>
                                     <?php $tAmount = $paycheckComponent->amount; break; ?>
                                 @endforeach
                                 <td>{{number_format($tAmount * $paycheckSummary->cycle, 2)}}</td>
                            @endforeach
                            
                            <?php $grossTotal = $paycheckSummary->consolidated_salary + $paycheckSummary->total_earnings; ?>
                            <td>{{number_format($grossTotal * $paycheckSummary->cycle, 2)}}</td>
                            <!-- array of deductions-->
                            @foreach ($deductions as $deductionComponent)
                                 <?php $tAmount = 0; ?>
                                 @foreach ($paycheckComponents as $paycheckComponent)
                                     <?php if ($paycheckComponent->employee_id != $paycheckSummary->employee_id ) continue; ?>
                                     <?php if ($paycheckComponent->component_title != $deductionComponent->component_title ) continue; ?>
                                     <?php $tAmount = $paycheckComponent->amount; break; ?>
                                 @endforeach
                                 <td>{{number_format($tAmount * $paycheckSummary->cycle, 2)}}</td>
                            @endforeach
                            
                            <td>{{number_format($paycheckSummary->total_deductions * $paycheckSummary->cycle, 2)}}</td>
                            <td>{{number_format($paycheckSummary->net_pay * $paycheckSummary->cycle, 2)}}</td>
                        </tr>
                        @endforeach
                        <!--
                        <tr>
    						<th colspan="3"><b>Total</b></th>
    						<td><b>&#8358;{{number_format(6666, 2)}}</b></td>
						</tr>
						-->
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