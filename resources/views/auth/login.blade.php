@extends('layouts.app')

@section('content')

        <div class="app" id="app">
            <div class="padding">
                <div class="navbar">
                    <div class="pull-center">
                        <a href="index.html" class="navbar-brand">
                            <div data-ui-include="'images/logo.svg'"></div>
                            <img src="/images/logo.png" alt="." class="hide"> <span class="hidden-folded inline">Payroll</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="b-t">
                <div class="center-block w-xxl w-auto-xs p-y-md text-center">
                    <div class="p-a-md">
                        <!--
                        <div>
                            <a href="#" class="btn btn-block indigo text-white m-b-sm"><i class="fa fa-facebook pull-left"></i> Sign in with Facebook</a>
                            <a href="#" class="btn btn-block red text-white"><i class="fa fa-google-plus pull-left"></i> Sign in with Google+</a>
                        </div>
                        <div class="m-y text-sm">OR</div>
                        -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <input type="password" name="password" class="form-control" placeholder="password" value="" required>
                            </div>
                             <div class="m-b-md">
                                <label class="md-check"><input type="checkbox" name="remember">
                                    <i class="primary"></i> Keep me signed in</label>
                                </div> 
                            <button type="submit" class="btn btn-lg black p-x-lg">Sign in</button>
                        </form>
                         <div class="m-y"><a href="{{ url('/password/reset') }}" class="_600">Forgot password?</a></div> 
                         <div>Do not have an account? <a href="/register" class="text-primary _600">Sign up</a></div> 
                    </div>
                </div>
            </div>
        </div>
@endsection