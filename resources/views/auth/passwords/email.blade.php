@extends('layouts.app')

@section('content')

<div class="app" id="app">

<!-- ############ LAYOUT START-->

  <div class="padding">
    <div class="navbar">
      <div class="pull-center">
        <!-- brand -->
        <a href="/" class="navbar-brand">
        	<div data-ui-include="'{{ URL::secure('/') }}/images/logo.svg'"></div>
        	<img src="{{ URL::secure('/') }}/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">aside</span>
        </a>
        <!-- / brand -->
      </div>
    </div>
  </div>
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
        <div>
          <h4>Forgot your password?</h4>
          <p class="text-muted m-y">
            Enter your email below and we will send you instructions on how to change your password.
          </p>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}
          <div class="form-group">
            <input name="reset" value="{{ $email or old('email') }}" placeholder="Email" class="form-control" required="" type="email" required autofocus>
          </div>
          <button type="submit" class="btn black btn-block p-x-md" >Send</button>
        </form>
        <div class="p-y-lg">
          Return to <a href="/login" class="text-primary _600">Sign in</a>
        </div> 
      </div>
    </div>
  </div>

<!-- ############ LAYOUT END-->
  </div>
@endsection