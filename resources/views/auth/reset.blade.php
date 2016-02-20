@extends('layouts.default')
@section('stylesheets')

@stop
@section('scripts')

@stop

@section('content')
<!-- resources/views/auth/password.blade.php -->

<form method="POST" action="/password/reset">
    {!! csrf_field() !!}
<input type="hidden" name="token" value="{{ $token }}">
<div class="container">
  <div class="row-fluid">
      <strong><h2 class="text-center" style="margin-top:100px">Reset Password</h2></strong>
  </div>
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      
      <section class="login-form" style="margin-top:0px;">
            <div class="form-group">
              <input type="email" name="email" value="{{ old('email') }}" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
             <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required="" />
            </div>
            <div class="form-group">
             <input type="password" name="password_confirmation" class="form-control input-lg" id="password" placeholder="Password Confirmation" required="" />
            </div>
            <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Reset Password</button>
      </section>  
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
</form>

@stop