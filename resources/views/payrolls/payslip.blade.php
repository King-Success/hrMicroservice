@extends('layouts.payslip')

@section('content')

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
                    <table class="table table-striped">
                        <tr>
                            <td>Consolidated Salary</td>
                            <td align="right">{{number_format($paycheck->consolidated_salary * $paycheck->cycle, 2)}}</td>
                        </tr>
                        <tr>
                            <td>PAA</td>
                            <td align="right">{{number_format($paycheck->consolidated_allowance * $paycheck->cycle, 2)}}</td>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <td align="right">{{number_format(($paycheck->consolidated_salary * $paycheck->cycle) + ($paycheck->consolidated_allowance * $paycheck->cycle), 2)}}</td>
                        </tr>
                    </table>
                    <div><h5>Allowances</h5><small><i>Earnings/Deductions</i></small></div>
                    <table class="table table-striped">
                        @foreach($paycheckComponents as $paycheckComponent)
                        <?php if($paycheckComponent->employee_id != $paycheck->employee_id) continue; ?>
                        <tr>
                            <td>{{$paycheckComponent->employee_salary_component_info->salary_component->title}}</td>
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