@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
	<div class="p-y-lg clearfix" id="tagline">
	<div class="text-center">
		<h2 class="_700 m-b">Employees</h2>
		<h5 class="m-b-md">Employees wil be filtered based on your search parameters</h5>
		<form action="/search" method="get">
		    <div class="form-group">
		        <div class="col-md-4">
		            <label for="department">Department</label>
		            <select id="department" name="department" class="form-control">
		                <option value="All">All</option>
		                @foreach($departments as $department)
		                <option value="{{$department->id}}">{{$department->title}}</option>
		                @endforeach
		            </select>
		        </div>
		        <div class="col-md-4">
		            <label for="salary_component">Salary Component</label>
		            <select name="salary_component" id="salary_component" class="form-control">
		                <option value="All">All</option>
		                @foreach($salaryComponents as $salaryComponent)
		                <option value="{{$salaryComponent->id}}">{{$salaryComponent->title}}</option>
		                @endforeach
		            </select>
		        </div>
		        <div class="col-md-4">
		            <label for="rank">Rank</label>
		            <select name="rank" id="rank" class="form-control">
		                <option value="All">All</option>
		                @foreach($ranks as $rank)
		                <option value="{{$rank->id}}">{{$rank->title}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="col-md-4">
		            <label for="pension">Pension</label>
		            <select name="pension" id="pension" class="form-control">
		                <option value="All">All</option>
		                @foreach($pensions as $pension)
		                <option value="{{$pension->id}}">{{$pension->title}}</option>
		                @endforeach
		            </select>
		        </div>
		        <div class="col-md-4">
		            <label for="bank">Banks</label>
		            <select name="bank" id="bank" class="form-control">
		                <option value="All">All</option>
		                @foreach($banks as $bank)
		                <option value="{{$bank->id}}">{{$bank->title}}</option>
		                @endforeach
		            </select>
		        </div>
		        <div class="col-md-4">
		            <label for="employee_type">Employee Type</label>
		            <select name="employee_type" id="employee_type" class="form-control">
		                <option value="All">All</option>
		                @foreach($employeeTypes as $employeeType)
		                <option value="{{$employeeType->id}}">{{$employeeType->title}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
		        <!--<a href="/payroll/create" class="btn rounded btn-outline b-info text-info p-x-md m-y">Add Employee</a>-->
		        <button class="btn blue rounded btn-outline b-default text-default p-x-md m-y">Filter</button>
		    </div>
		</form>
	</div>
	</div>
 </div>
@if(count($employees) > 0)
<!--<div class="padding">-->
    <div class="container">
        <div class="col-md-12">
            <div class="box">
                <div class="col-sm-6 push-sm-6">
                    <div class="p-y text-center text-sm-right">
                        <a href="/employee/create" class="btn rounded b-dark">Add</a>
                    </div>
              	</div>
                <div class="col-sm-6 pull-sm-6 box-header">
                    <h2>Employees</h2><small>Employee information</small>
                </div>
                <div class="box-body">
                    <div class="app-body">
                        <div class="" id="datatable">
                            <table id="employees" class="table b-t b-b"  data-ui-jp="dataTable" data-ui-options="{
                                  lengthChange: false,
                                  buttons: [ /*'copy', */'excel', 'pdf', 'colvis' ],
                                  'initComplete': function () {
                                    this.api().buttons().container()
                                      .appendTo( '#datatable .col-md-6:eq(0)' );
                                  }
                                }" >
                                <thead>
                                    <tr>
                                        <!--<th>#</th>-->
                                        <th>Surname</th>
                                        <th>Other Names</th>
                                        <th>Employee Number</th>
                                        <!--<th>Gender</th>-->
                                        <th>Email</th>
                                        <th>Logical Address</th>
                                        <th>Mobile (Home)</th>
                                        <th>Mobile (Work)</th>
                                        <!--<th>Created At</th>-->
                                    </tr>
                                    </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    @foreach ($employees as $employee)
                                    <?php if($department_present && $employee->employee_department && $employee->employee_department->department->id != $department_present) continue; ?>
                                    <?php if($rank_present && $employee->employee_rank && $employee->employee_rank->rank->id != $rank_present) continue; ?>
                                    <?php if($pension_present && $employee->employee_pension && $employee->employee_pension->pension->id != $rank_present) continue; ?>
                                    <?php if($bank_present && $employee->employee_bank && $employee->employee_bank->bank->id != $bank_present) continue; ?>
                                    <?php if($employee_type_present && $employee->employee_type && $employee->employee_type->id != $employee_type_present) continue; ?>
                                    <?php
                                    	if($salary_component_present){
                                    		$found = false;
                                    		foreach($employee->employee_salary_components as $employeeSalaryComponent){
                                    			if($employeeSalaryComponent->salary_component->id == $salary_component_present){
                                    				$found = true;
                                    			}
                                    		}
                                    		if(!$found){
                                    			continue;
                                    		}
                                    	}
                                    ?>
                                    <tr>
                                        <!--<td>{{ ++$counter }}</td>-->
                                        <td><a href="/employee/{{$employee->id}}">{{$employee->surname}}</a></td>
                                        <td>{{$employee->other_names}}</td>
                                        <td>{{$employee->employee_number}}</td>
                                        <!--<td>{{$employee->gender}}</td>-->
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->logical_address}}</td>
                                        <td>{{$employee->mobile_home}}</td>
                                        <td>{{$employee->mobile_work}}</td>
                                        <!--<td>{{$employee->created_at}}</td>-->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--</div>-->

@endif
<!-- ############ PAGE END-->
@stop