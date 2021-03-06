@extends('layouts.print')

@section('css_header')
        <style type="text/css">
            .page-break{
                page-break-after: always;
            }
            
            .table td, .table th {
                padding: 2px;
            }
            
            .total{
                font-weight: bold; 
                font-size: 16px;
                border-top: 2px solid #eceeef;
            }
        </style>
@stop

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">{{$payroll->title}}</h2>
		<h5 class="m-b-md">Payment Slips for {{$payroll->title}} {{$payroll->paid_at}}</h5>
		<a href="/payslip/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
	</div>
	</div>
</div>

<div class="padding">
    <div class="row">
        <?php $counter = 0; ?>
        @foreach($paychecks as $paycheck)
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h2>{{$AppConfig->company_title}}</h2><small>January 2015 Payslip</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div><h3>{{$paycheck->employee->prefix->title}} {{$paycheck->employee->surname}} {{$paycheck->employee->other_names}}</h3><small><i>Staff No: {{$paycheck->employee->employee_number}}</i></small></div>
                    <table class="table">
                        <tr>
                            <td>Consolidated Salary</td>
                            <td align="right">{{number_format($paycheck->consolidated_salary * $paycheck->cycle, 2)}}</td>
                        </tr>
                        <tr>
                            <td>Peculiar Allowance</td>
                            <td align="right">{{number_format($paycheck->consolidated_allowance * $paycheck->cycle, 2)}}</td>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <td align="right">{{number_format(($paycheck->consolidated_salary * $paycheck->cycle) + ($paycheck->consolidated_allowance * $paycheck->cycle), 2)}}</td>
                        </tr>
                    </table>
                    <div><h5>Allowances</h5><small><i>Earnings/Deductions</i></small></div>
                    <table class="table">
                        @foreach($paycheckComponents as $paycheckComponent)
                        <?php if($paycheckComponent->employee_id != $paycheck->employee_id) continue; ?>
                        <tr>
                            <td>{{$paycheckComponent->component_title}}</td>
                            <td align="right">{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
                        </tr>
                        @endforeach
                        
                        @foreach($paycheckSummaries as $paycheckSummary)
                        <?php if($paycheckSummary->employee_id != $paycheck->employee_id) continue; ?>
                        <tr class="total">
                            <td>Net Pay</td>
                            <td align="right">{{number_format($paycheckSummary->net_pay * $paycheckSummary->cycle, 2)}}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="padding">
                        <div>Authorized Signature_________________________</div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($counter % 3 == 0){ $counter = 0; ?>
        <div class="page-break"></div> <!-- Break every 3 Counts -->
        <?php } ?>
        @endforeach
    </div>
</div>

@stop