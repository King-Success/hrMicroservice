@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
    <div class="row" id="new_payroll_form">
        <div class="col-md-12">
            {!! Form::open(array('url' => '/payroll/apply_to_employees', 'role' => 'form')) !!}
            <div class="box">
                <div class="col-sm-6 push-sm-6">
                    <div class="p-y text-center text-sm-right">
                        <button class="btn rounded b-dark">Pay</button>
                    </div>
                </div>
                <div class="col-sm-6 pull-sm-6 box-header">
                    <h2>Payroll ({{$payroll->title}})</h2><small>Select & Deselect employees</small>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="padding">
                            <div class="table-responsive" id="datatable">

                            <table class="table b-t b-b"  data-ui-jp="dataTable" data-ui-options="{
                                  lengthChange: false,
                                  buttons: ['excel', 'pdf', 'colvis' ],
                                  'initComplete': function () {
                                    this.api().buttons().container()
                                      .appendTo( '#datatable .col-md-6:eq(0)' );
                                  }
                                }" >
                                <thead>
                                    <td></td>
                                    <th>Employee</th>
                                    <th>ENo</th>
                                    <th>Rank</th>
                                    <th>Level</th>
                                    <th>Step</th>
                                    <th>Paygrade</th>
                                    <th>P-Allowance</th>
                                    <th>Basic</th>
                                    <th>PAA/PNAA</th>
                                    <th>Total</th>
                                    <!--Autocreate columns here for all deductions/earnings -->
                                    <th>Deductions</th>
                                    <th>Earnings</th>
                                    <th>Net Pay</th>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>
                                            <label class="md-check">
                                                <input class="has-value" checked="" type="checkbox" name="employees[{{$employee->id}}]">
                                                <i class="teal no-icon"></i>
                                            </label>
                                        </td>
                                        <td>{{$employee->surname}} {{$employee->other_names}}</td>
                                        <td>{{$employee->employee_number}}</td>
                                        <td>{{$employee->employee_rank_info ? $employee->employee_rank_info->rank->title : ''}}</td>
                                        <td>{{$employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->employee_level->title : ''}}</td>
                                        <td>{{$employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->title : ''}}</td>
                                        <?php
                                        $paygrade = $employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->amount : 0;
                                        $paygradeAllowance = $employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->allowance : 0;
                                        ?>
                                        <td>{{number_format($employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->amount : 0.00, 2)}}</td>
                                        <td>{{number_format($employee->employee_paygrade_info ? $employee->employee_paygrade_info->paygrade->allowance : 0.00, 2)}}</td>
                                        <td>{{number_format($employee->employee_basic_salary->amount, 2)}}</td>
                                        <td>{{number_format($employee->employee_basic_salary->allowance, 2)}}</td>
                                        <?php
                                        $grossTotal = $employee->employee_basic_salary->amount + $employee->employee_basic_salary->allowance + $paygrade + $paygradeAllowance;
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
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
 </div>
<!-- ############ PAGE END-->
@stop
