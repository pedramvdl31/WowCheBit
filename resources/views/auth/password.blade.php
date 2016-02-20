@extends('layouts.default')
@section('stylesheets')

@stop
@section('scripts')

@stop

@section('content')
<!-- resources/views/auth/password.blade.php -->

<form method="POST" action="/password/email">
    {!! csrf_field() !!}

<div class="container">
  <div class="row-fluid">
      <strong><h2 class="text-center" style="margin-top:100px">Reset Password</h2></strong>
  </div>
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      
      <section class="login-form" style="margin-top:0px;">
            <div class="form-group">
              <input type="email" name="email" value="{{ old('email') }}" class="form-control input-lg">
            </div>
            <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Send Password Reset Link</button>
      </section>  
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
</form>

@stop