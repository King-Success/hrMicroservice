@extends('layouts.master')

@section('content')

<!-- ############ PAGE START-->
<div class="padding">
  <div class="p-y-lg clearfix" id="tagline">
    <div class="text-center">
      <h2 class="_700 m-b">The payroll "{{$currentPayroll->title}}" is being generated</h2>
      <h5 class="m-b-md">Please reload after sometime</h5>
      <a href="/payroll" class="btn rounded btn-outline b-info text-info p-x-md m-y">Reload</a>
    </div>
  </div>
 </div>
<!-- ############ PAGE END-->
@stop