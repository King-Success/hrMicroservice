@extends('layouts.payslip')

@section('content')

<div class="padding">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h2>{{$AppConfig->company_title}}</h2><small>January 2015 Payslip</small></div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <div><h3>Retnan Daser</h3><small><i>Staff No: 056</i></small></div>
                    <table class="table table-striped">
                        <tr>
                            <td>Consolidated</td>
                            <td align="right">200,000</td>
                        </tr>
                        <tr>
                            <td>PAA</td>
                            <td align="right">40,000</td>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <td align="right">240,000</td>
                        </tr>
                    </table>
                    <div><h5>Allowances</h5><small><i>Earnings/Deductions</i></small></div>
                    <table class="table table-striped">
                        <tr>
                            <td>Consolidated</td>
                            <td align="right">200,000</td>
                        </tr>
                        <tr>
                            <td>PAA</td>
                            <td align="right">40,000</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td align="right">240,000</td>
                        </tr>
                        <tr>
                            <td>Deductions</td>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td>Mosque</td>
                            <td align="right">3,000</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td align="right">5,300</td>
                        </tr>
                        <tr class="total">
                            <td>Net Pay</td>
                            <td align="right">150,300</td>
                        </tr>
                    </table>
                    <div class="padding">
                        <div>Authorized Signature_________________________</div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@stop