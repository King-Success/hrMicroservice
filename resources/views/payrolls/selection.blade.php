@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
    <div class="row" id="new_payroll_form">
        <div class="col-md-12 offset-sm-0">
            <div class="box">
                <div class="box-header">
                    <h2>Payroll</h2><small>Select & Deselect employees</small>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            {!! Form::open(array('url' => '/payroll/apply_to_employees', 'role' => 'form')) !!}
                            <table class="table">
                                <thead>
                                    <td></td>
                                    <th>Employee</th>
                                    <th>PSN No.</th>
                                    <th>Rank</th>
                                    <th>Level</th>
                                    <th>Step</th>
                                    <th>Consolidated</th>
                                    <th>PAA/PNAA</th>
                                    <th>Gross Total</th>
                                    <!--Autocreate columns here for all deductions/earnings -->
                                    <th>Total Deduction</th>
                                    <th>Total Earning</th>
                                    <th>Net Pay</th>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td></td>
                                        <td>{{$employee->surname}} {{$employee->other_names}}</td>
                                        <td>{{$employee->employee_number}}</td>
                                        <td>{{$employee->employee_rank_info ? $employee->employee_rank_info->rank->title : ''}}</td>
                                        <td>{{$employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->employee_level->title : ''}}</td>
                                        <td>{{$employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->title : ''}}</td>
                                        <td>{{number_format($employee->employee_basic_salary->amount, 2)}}</td>
                                        <td>{{number_format($employee->employee_basic_salary->allowance, 2)}}</td>
                                        <?php
                                        $grossTotal = $employee->employee_basic_salary->amount + $employee->employee_basic_salary->allowance;
                                        ?>
                                        <td>{{number_format($grossTotal, 2)}}</td>
                                        <?php
                                        $basic_salary = $employee->employee_basic_salary->amount;
                                        $totalDeductions = 0;
                                        $totalEarnings = 0;
                                        if(count($employee->employee_salary_component_infos) > 0){
                                            foreach($employee->employee_salary_component_infos as $employee_salary_component_info){
                                                if($employee_salary_component_info->salary_component->component_type == 'Earning'){
                                                    if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                                                        $totalEarnings += $employee_salary_component_info->amount;
                                                    }else{
                                                        $totalEarnings += $basic_salary * ($employee_salary_component_info->amount / 100);
                                                    }
                                                }else{
                                                    if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                                                        $totalDeductions += $employee_salary_component_info->amount;
                                                    }else{
                                                        $totalDeductions += $basic_salary * ($employee_salary_component_info->amount / 100);
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        <td>{{number_format($totalDeductions, 2)}}</td>
                                        <td>{{number_format($totalEarnings, 2)}}</td>
                                        <td>{{number_format($grossTotal + $totalEarnings - $totalDeductions, 2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- ############ PAGE END-->
@stop