@extends('layouts.master')

@section('css_header')
<style type="text/css">
    .payslip .table td, .table th {
        padding: 2px;
    }
    
    .payslip .total{
        font-weight: bold; 
        font-size: 16px;
        border-top: 2px solid #eceeef;
    }
</style>
@stop

@section('content')

<!-- ############ PAGE START-->
<div class="row-col">
	<div class="col-lg b-r">
		<div class="row no-gutter">
			<?php $netPay = 0; $consolidatedSalary = 0; $consolidatedAllowance = 0; $grossTotal = 0;  ?>
			@foreach($paycheckSummaries as $paycheckSummary)
			<?php 
			$netPay += $paycheckSummary->net_pay * $paycheckSummary->cycle;
			$consolidatedSalary += $paycheckSummary->consolidated_salary * $paycheckSummary->cycle;
			$consolidatedAllowance += $paycheckSummary->consolidated_allowance * $paycheckSummary->cycle;
			?>
			@endforeach
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-paper-airplane text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">{{count($paycheckSummaries)}}</h6>
						<p class="text-muted m-b-md"><a href="/payslip/{{$paychecks[0]->payroll_id}}">Payslips</a></p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($consolidatedSalary, 2)}}</h6>
						<p class="text-muted m-b-md">Consolidated Salary</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($consolidatedAllowance, 2)}}</h6>
						<p class="text-muted m-b-md">Allowance</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-3 b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($netPay, 2)}}</h6>
						<p class="text-muted m-b-md"><a href="/payslip/net_pay/{{$payroll->id}}">Net Pay</a></p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			<?php $edgeDetection = 1; ?>
			@foreach($salaryComponents as $salaryComponent)
			<?php $sum = 0; ?>
			@foreach($paycheckComponents as $paycheckComponent)
			<?php 
			if($paycheckComponent->component_id != $salaryComponent->id) continue; 
			$sum += $paycheckComponent->amount * $paycheckComponent->cycle;
			?>
			@endforeach
			<div class="col-xs-6 col-sm-3 {{$edgeDetection % 4 != 0 ? 'b-r' : ''}} b-b">
			<?php $edgeDetection++; ?>
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa {{$salaryComponent->component_type == "Earning" ? 'fa-caret-up' : 'fa-caret-down'}} text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-document text-muted"></i></span>
					</div>
					<div class="text-center">
						<h6 class="text-center _600">&#8358;{{number_format($sum, 2)}}</h6>
						<p class="text-muted m-b-md"><a href="/payslip/salary_component/{{$payroll->id}}/{{$salaryComponent->id}}">{{$salaryComponent->title}}<!-- ({{$salaryComponent->component_type == "Earning" ? '+' : '-'}}) --></a></p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="padding">
			<div class="row">
		    <!--<div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">52</span>
		                <h3>Members</h3>
		            </div>
		            <div class="p-b-sm">
		                <ul class="list no-border m-a-0">
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar danger">
							                  <span>C</span>
		                            <i class="on b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Chris Fox</a></div>
		                            <small class="text-muted text-ellipsis">Designer, Blogger</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar purple">
							                  <span>M</span>
		                            <i class="on b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Mogen Polish</a></div>
		                            <small class="text-muted text-ellipsis">Writter, Mag Editor</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar info">
							                  <span>J</span>
		                            <i class="off b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Joge Lucky</a></div>
		                            <small class="text-muted text-ellipsis">Art director, Movie Cut</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar warning">
							                  <span>F</span>
		                            <i class="on b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Folisise Chosielie</a></div>
		                            <small class="text-muted text-ellipsis">Musician, Player</small>
		                        </div>
		                    </li>
		                    <li class="list-item">
		                        <a href="#" class="list-left">
		                            <span class="w-40 avatar success">
							                  <span>P</span>
		                            <i class="away b-white bottom"></i>
		                            </span>
		                        </a>
		                        <div class="list-body">
		                            <div><a href="#">Peter</a></div>
		                            <small class="text-muted text-ellipsis">Musician, Player</small>
		                        </div>
		                    </li>
		                </ul>
		            </div>
		        </div>
		    </div>-->
		    <div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">{{count($banks)}}</span>
		                <h3>Banks</h3>
		            </div>
		            <div class="p-b-sm">
		                <div class="list-group no-border no-radius">
		                	@foreach($bankables as $bankCompany => $bankers)
		                	<?php $amountInEntity = 0; ?>
		                		@foreach($bankers as $banker)
				                	<?php $amountInEntity += $banker['net_pay'] * $banker['cycle']; ?>
							    @endforeach
					        <div class="list-group-item">
					            <span class="pull-right text-muted">&#8358;{{number_format($amountInEntity, 2)}}</span>
					            <i class="label label-xs red m-r-sm"></i><a href="/payslip/bank/{{$payroll->id}}/{{$bankers[0]['bank_id']}}">{{$bankCompany}}</a>
					        </div>
					        @endforeach
					    </div>
		            </div>
		        </div>
		    </div>
		    <div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">1</span>
		                <h3>Tax</h3>
		            </div>
		            <div class="p-b-sm">
		                <div class="list-group no-border no-radius">
		                	<?php $amountInEntity = 0; ?>
		                	@foreach($paycheckComponents as $paycheckComponent)
		                	<?php if($paycheckComponent->component_permanent_title != 'tax') continue; ?>
		                	<?php $amountInEntity += $paycheckComponent->amount * $paycheckComponent->cycle; ?>
					        @endforeach
					        <div class="list-group-item">
					            <span class="pull-right text-muted">&#8358;{{number_format($amountInEntity, 2)}}</span>
					            <i class="label label-xs red m-r-sm"></i><a href="/payslip/tax/{{$payroll->id}}">{{$tax->title}}</a>
					        </div>
					    </div>
		            </div>
		        </div>
		    </div>
		    <div class="col-sm-6">
		        <div class="box">
		            <div class="box-header">
		                <span class="label success pull-right">{{count($pensions)}}</span>
		                <h3>Pension</h3>
		            </div>
		            <div class="p-b-sm">
		                <div class="list-group no-border no-radius">
		                	@foreach($pensionables as $pensionCompany => $pensioners)
		                	<?php $amountInEntity = 0; ?>
		                		@foreach($pensioners as $pensioner)
				                	<?php $amountInEntity += $pensioner['pension_amount'] * $pensioner['cycle']; ?>
							    @endforeach
					        <div class="list-group-item">
					            <span class="pull-right text-muted">&#8358;{{number_format($amountInEntity, 2)}}</span>
					            <i class="label label-xs red m-r-sm"></i><a href="/payslip/pension/{{$payroll->id}}/{{$pensioners[0]['pension_id']}}">{{$pensionCompany}}</a>
					        </div>
					        @endforeach
					    </div>
		            </div>
		        </div>
		    </div>
		</div>
		</div>
	</div>
	<div class="col-lg w-lg w-auto-md white bg">
		<div>
			<div class="p-a">
				<h6 class="text-muted m-a-0"><a href="/payslip/{{$paychecks[0]->payroll_id}}">{{$paychecks[0]->payroll->title}} - {{$paychecks[0]->payroll->paid_at}}</a></h6>
			</div>
			<div class="list inset">
				@foreach($paychecks as $paycheck)
				<a class="list-item" data-toggle="modal" data-target="#employee_{{$paycheck->employee_id}}" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="on avatar-center no-border"></i>
							<img src="/images/a1.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
							{{$paycheck->employee->prefix->title}} {{$paycheck->employee->surname}} {{$paycheck->employee->other_names}}
					</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>



<?php $counter = 0; ?>
@foreach($paychecks as $paycheck)
<div class="modal fade inactive payslip" id="employee_{{$paycheck->employee_id}}" data-backdrop="false">
    <div class="modal-right w-xxl dark-white b-l">
        <div class="row-col">
            <a data-dismiss="modal" class="pull-right text-muted text-lg p-a-sm m-r-sm">&times;</a>
            <div class="p-a b-b">
                <span class="h5">Payslip</span>
            </div>
            <div class="row-row light">
				<!--<div class="col-md-12">-->
				    <div class="box">
				        <div class="box-header">
				            <h2>{{$AppConfig->company_title}}</h2><small>{{$payroll->title}} {{$payroll->paid_at}}</small></div>
				        <div class="box-divider m-a-0"></div>
				        <div class="box-body">
				            <div><h3>{{$paycheck->employee->prefix->title}} {{$paycheck->employee->surname}} {{$paycheck->employee->other_names}}</h3><small><i>Staff No: {{$paycheck->employee->employee_number}}</i></small></div>
				            <table class="table">
				                <tr>
				                    <td>Consolidated Salary</td>
				                    <td align="right">&#8358;{{number_format($paycheck->consolidated_salary * $paycheck->cycle, 2)}}</td>
				                </tr>
				                <tr>
				                    <td>Peculiar Allowance</td>
				                    <td align="right">&#8358;{{number_format($paycheck->consolidated_allowance * $paycheck->cycle, 2)}}</td>
				                </tr>
				                <tr class="total">
				                    <td>Total</td>
				                    <td align="right">&#8358;{{number_format(($paycheck->consolidated_salary * $paycheck->cycle) + ($paycheck->consolidated_allowance * $paycheck->cycle), 2)}}</td>
				                </tr>
				            </table>
				            <div><h5>Allowances</h5><small><i>Earnings/Deductions</i></small></div>
				            <table class="table">
				                @foreach($paycheckComponents as $paycheckComponent)
				                <?php if($paycheckComponent->employee_id != $paycheck->employee_id) continue; ?>
				                <tr>
				                    <td>{{$paycheckComponent->component_title}}</td>
				                    <td align="right">&#8358;{{number_format($paycheckComponent->amount * $paycheckComponent->cycle, 2)}}</td>
				                </tr>
				                @endforeach
				                
				                @foreach($paycheckSummaries as $paycheckSummary)
				                <?php if($paycheckSummary->employee_id != $paycheck->employee_id) continue; ?>
				                <tr class="total">
				                    <td>Net Pay</td>
				                    <td align="right">&#8358;{{number_format($paycheckSummary->net_pay * $paycheckSummary->cycle, 2)}}</td>
				                </tr>
				                @endforeach
				            </table>
				            <div class="container" style="margin-top: 50px; margin-bottom: 40px;">
                        		<div>Authorized Signature_________________________</div>
                    		</div>
                    		<!--
                    		<div class="container">
                        		<center><button class="md-btn md-fab m-b-sm blue print_slip">
                        			<i class="fa fa-print"></i></button></center>
                    		</div>
                    		-->
				        </div>
				    </div>
				<!--</div>-->
			</div>
		</div>
    </div>
</div>
@endforeach

<!-- ############ PAGE END-->
@stop