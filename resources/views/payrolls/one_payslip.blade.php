@extends($view_type ? 'layouts.print' : 'layouts.master')

@section('css_header')
        <style type="text/css">
            .total{
                font-weight: bold; 
                font-size: 16px;
                border-top: 2px solid #eceeef;
            }
        </style>
@stop

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h2>{{$AppConfig->company_title}}</h2><small>{{$payroll->title}}</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div><h3>{{$paycheck->employee_prefix}} {{$paycheck->employee_surname}} {{$paycheck->employee_othernames}}</h3><h6><i>Staff No: {{$paycheck->employee_number}}</i></h6></div>
                    <?php $grossTotal = 0; ?>
                    <table class="table">
                        <tr>
                            <td>Consolidated Salary</td>
                            <td align="right">&#8358;{{number_format($paycheck->consolidated_salary * $paycheck->cycle, 2)}}</td>
                        </tr>
                    <?php $grossTotal += ($paycheck->consolidated_salary * $paycheck->cycle) + ($paycheck->consolidated_allowance * $paycheck->cycle); ?>
                    </table>
                    <div><p style="font-size: 16px; font-weight: bold; margin:0px; padding:0px;">Allowances</p><small><i>Earnings</i></small></div>
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

                    <!--<div><h5>Deductions</h5><small><i>Deductions</i></small></div>-->
                    <div><p style="font-size: 16px; font-weight: bold; margin:0px; padding:0px;">Deductions</p><small><i>Deductions</i></small></div>
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
                        <div>Authorized Signature ___________________</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
  $('.table td, .table th').css('padding', '0px');
  $('.table').css('margin-bottom', '0px');
});
</script>
@stop