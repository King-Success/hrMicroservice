@extends('layouts.app')

@section('content')

  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <div class="padding">
    <div class="navbar">
      <div class="pull-center">
        <!-- brand -->
        <a href="index.html" class="navbar-brand">
        	<div data-ui-include="'images/logo.svg'"></div>
        	<img src="images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">aside</span>
        </a>
        <!-- / brand -->
      </div>
    </div>
  </div>
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
          <!--
        <div>
          <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign up with Facebook
          </a>
          <a href="#" class="btn btn-block red text-white">
            <i class="fa fa-google-plus pull-left"></i>
            Sign up with Google+
          </a>
        </div>
        <div class="m-y text-sm">
          OR
        </div>
        -->
        <form name="form" action="{{ url('/register') }}" method="POST">
            {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
          </div>
                        
          <div class="m-b-md text-sm">
            <span class="text-muted">By clicking Sign Up, I agree to the</span> 
            <a href="#">Terms of service</a> 
            <span class="text-muted">and</span> 
            <a href="#">Policy Privacy.</a>
          </div>
          <button type="submit" class="btn btn-lg black p-x-lg">Sign Up</button>
        </form>
        <div class="p-y-lg text-center">
          <div>Already have an account? <a href="/login" class="text-primary _600">Sign in</a></div>
        </div>
      </div>
    </div>
  </div>

<!-- ############ LAYOUT END-->
  </div>
@endsection
