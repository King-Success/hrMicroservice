@extends($view_type ? 'layouts.print' : 'layouts.master')

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
		@if(!$view_type)
		<a href="/payslip/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
		@endif
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
                    <h2>{{$AppConfig->company_title}}</h2><small>{{$payroll->title}}</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div><h3>{{$paycheck->employee_prefix}} {{$paycheck->employee_surname}} {{$paycheck->employee_other_names}}</h3><small><i>Staff No: {{$paycheck->employee_number}}</i></small></div>
                    <?php $grossTotal = 0; ?>
                    <table class="table">
                        <tr>
                            <td>Consolidated Salary</td>
                            <td align="right">&#8358;{{number_format($paycheck->consolidated_salary * $paycheck->cycle, 2)}}</td>
                        </tr>
                        <!--
                        <tr>
                            <td>Peculiar Allowance</td>
                            <td align="right">&#8358;{{number_format($paycheck->consolidated_allowance * $paycheck->cycle, 2)}}</td>
                        </tr>
                        -->
                        <!--
                        <tr class="total">
                            <td>Total</td>
                            <td align="right">&#8358;{{number_format(($paycheck->consolidated_salary * $paycheck->cycle) + ($paycheck->consolidated_allowance * $paycheck->cycle), 2)}}</td>
                        </tr>
                        -->
                    <?php $grossTotal += ($paycheck->consolidated_salary * $paycheck->cycle) + ($paycheck->consolidated_allowance * $paycheck->cycle); ?>
                    </table>
                    <div><h5>Allowances</h5><small><i>Earnings</i></small></div>
                    <table class="table">
                        <?php $subTotal = 0; ?>
                        @foreach($paycheckComponents as $paycheckComponent)
                        <?php if($paycheckComponent->employee_id != $paycheck->employee_id ||
                            $paycheckComponent->component_type=="Deduction") continue; ?>
                        <tr>
                            <td>{{$paycheckComponent->component_title}}</td>
                            <?php $subTotal += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
                            <td align="right">&#8358;{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
                        </tr>
                        @endforeach
                        
                        <tr class="total">
                            <td>Total Allowances</td>
                            <td align="right">&#8358;{{number_format($subTotal, 2)}}</td>
                        </tr>
                    </table>
                    <?php $grossTotal += $subTotal; ?>
                    <table class="table">
                        <tr>
                            <td><h5><b>Gross Total</b></h5></td>
                            <td align="right"><h5><b>&#8358;{{number_format($grossTotal, 2)}}</b></h5></td>
                        </tr>
                    </table>

                    <div><h5>Deductions</h5><small><i>Deductions</i></small></div>
                    <table class="table">
                        <?php $subTotal = 0; ?>
                        @foreach($paycheckComponents as $paycheckComponent)
                        <?php if($paycheckComponent->employee_id != $paycheck->employee_id ||
                            $paycheckComponent->component_type=="Earning") continue; ?>
                        <tr>
                            <td>{{$paycheckComponent->component_title}}</td>
                            <?php $subTotal += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
                            <td align="right">&#8358;{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
                        </tr>
                        @endforeach
                        
                        <tr class="total">
                            <td>Total Deductions</td>
                            <td align="right">&#8358;{{number_format($subTotal, 2)}}</td>
                        </tr>
                    </table>
                    <div><h5>Total</h5><small><i></i></small></div>
                    <table class="table">
                        @foreach($paycheckSummaries as $paycheckSummary)
                        <?php if($paycheckSummary->employee_id != $paycheck->employee_id) continue; ?>
                        <tr class="total">
                            <td><h5><b>Net Pay</b></h5></td>
                            <td align="right"><h5><b>&#8358;{{number_format($paycheckSummary->net_pay * $paycheckSummary->cycle, 2)}}</b></h5></td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="container">
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