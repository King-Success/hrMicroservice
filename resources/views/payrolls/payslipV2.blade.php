@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('css_header')
        <style type="text/css">
                .total{
                    font-weight: bold; 
                    font-size: 16px;
                    border-top: 2px solid #eceeef;
                }
                            
                @media all {
                	.page-break	{ display: none; }
                }
                
                @media print {
                	.page-break	{ display: block; page-break-before: always; }
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
		<a href="/v2/payslip/{{$payroll->id}}?view_type=print" class="btn rounded btn-outline b-info text-info p-x-md m-y">Print</a>
		<a href="/payroll/{{$payroll->id}}" class="btn blue rounded btn-outline b-default text-default p-x-md m-y">{{$payroll->title}}</a>
		@endif
	</div>
	</div>
</div>

<div class="padding">
    <div class="row">
        <?php $counter = 1; ?>
        @foreach($payslips as $paycheck)
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h2>{{$AppConfig->company_title}}</h2><h5>{{$payroll->title}}</h5></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div><h3>{{$paycheck[0]->employee_prefix}} {{$paycheck[0]->employee_surname}} {{$paycheck[0]->employee_othernames}}</h3><small><i>Staff No: {{$paycheck[0]->employee_number}}</i></small></div>
                    <?php $grossTotal = 0; ?>
                    <table class="table">
                        <tr>
                            <td>Consolidated Salary</td>
                            <td align="right">&#8358;{{number_format($paycheck[0]->consolidated_salary * $paycheck[0]->cycle, 2)}}</td>
                        </tr>
                        
                    <?php $grossTotal += ($paycheck[0]->consolidated_salary * $paycheck[0]->cycle) + ($paycheck[0]->consolidated_allowance * $paycheck[0]->cycle); ?>
                    </table>
                    <div><h5>Allowances</h5><small><i>Earnings</i></small></div>
                    <table class="table">
                        <?php $subTotal = 0; ?>
                        @foreach($paycheck as $paycheckComponent)
                        <?php if($paycheckComponent->component_type=="Deduction") continue; ?>
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
                        @foreach($paycheck as $paycheckComponent)
                        <?php if($paycheckComponent->component_type=="Earning") continue; ?>
                        <tr>
                            <td>{{$paycheckComponent->component_title}}</td>
                            <?php $subTotal += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
                            <td align="right">&#8358;{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
                        </tr>
                        @if($paycheckComponent->component_permanent_title == 'pension' && 
                        	$paycheckComponent->pension_voluntary_contribution_amount > 0)
                        <tr>
                            <td>Pension: Voluntary Contribution</td>
                            <?php $subTotal += $paycheckComponent->pension_voluntary_contribution_amount * $paycheckComponent->cycle; ?>
                            <td align="right">&#8358;{{number_format($paycheckComponent->pension_voluntary_contribution_amount * $paycheckComponent->cycle, 2)}}</td>
                        </tr>
                        @endif
                        @endforeach
                        
                        <tr class="total">
                            <td>Total Deductions</td>
                            <td align="right">&#8358;{{number_format($subTotal, 2)}}</td>
                        </tr>
                    </table>
                    <div><h5>Total</h5><small><i></i></small></div>
                    <table class="table">
                        <tr class="total">
                            <td><h5><b>Net Pay</b></h5></td>
                            <td align="right"><h5><b>&#8358;{{number_format($paycheck[0]->net_pay * $paycheck[0]->cycle, 2)}}</b></h5></td>
                        </tr>
                    </table>
                    <div class="container">
                        <div>Authorized Signature_________________________</div>
                    </div>
                </div>
            </div>
        </div>
        @if($counter % 3 == 0)
            <div class="page-break"></div>
        @endif
        <?php $counter++; ?>
        @endforeach
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
  $('.table td, .table th').css('padding', '0px');
  $('.table').css('margin-bottom', '0px');
});
</script>

@stop