@extends('layouts.master')

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
						<h3 class="text-center _600">{{count($paycheckSummaries)}}</h3>
						<p class="text-muted m-b-md">Payslips</p>
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
						<h3 class="text-center _600">{{number_format($consolidatedSalary, 2)}}</h3>
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
						<span class="text-muted l-h-1x"><i class="ion-ios-grid-view text-muted"></i></span>
					</div>
					<div class="text-center">
						<h3 class="text-center _600">{{number_format($consolidatedAllowance, 2)}}</h3>
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
						<span class="text-muted l-h-1x"><i class="ion-ios-grid-view text-muted"></i></span>
					</div>
					<div class="text-center">
						<h3 class="text-center _600">{{number_format($netPay, 2)}}</h3>
						<p class="text-muted m-b-md">Net Pay</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			@foreach($salaryComponents as $salaryComponent)
			<?php $sum = 0; ?>
			@foreach($paycheckComponents as $paycheckComponent)
			<?php 
			if($paycheckComponent->employee_salary_component_info->salary_component->id != $salaryComponent->id) continue; 
			$sum += $paycheckComponent->amount * $paycheckComponent->cycle;
			?>
			@endforeach
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-caret-up text-primary m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-document text-muted"></i></span>
					</div>
					<div class="text-center">
						<h3 class="text-center _600">{{number_format($sum, 2)}}</h3>
						<p class="text-muted m-b-md">{{$salaryComponent->title}} ({{$salaryComponent->component_type == "Earning" ? '+' : '-'}})</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col-lg w-lg w-auto-md white bg">
		<div>
			<div class="p-a">
				<h6 class="text-muted m-a-0">Pay Slip</h6>
			</div>
			<div class="list inset">
				<a class="list-item" data-toggle="modal" data-target="#chat" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="on avatar-center no-border"></i>
							<img src="images/a1.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
							Jonathan Morina
					</span>
				</a>
				<a class="list-item" data-toggle="modal" data-target="#chat" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="on avatar-center no-border"></i>
							<img src="images/a2.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
						Crystal Guerrero
					</span>
				</a>
				<a class="list-item" data-toggle="modal" data-target="#chat" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="on avatar-center no-border"></i>
							<img src="images/a3.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
						Judith Garcia
					</span>
				</a>
				<a class="list-item" data-toggle="modal" data-target="#chat" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="away avatar-center no-border"></i>
							<img src="images/a4.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
						Melissa Garza
					</span>
				</a>
				<a class="list-item" data-toggle="modal" data-target="#chat" data-dismiss="modal">
					<span class="list-left">
						<span class="avatar">
							<i class="off avatar-center no-border"></i>
							<img src="images/a5.jpg" class="w-20" alt=".">
						</span>
					</span>
					<span class="list-body text-ellipsis">
						Douglas Torres
					</span>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- ############ PAGE END-->
@stop