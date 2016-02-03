@extends($layout)
@section('stylesheets')
{!! Html::style('assets/css/users/registration.css') !!}
@stop
@section('scripts')
<script src="/assets/js/login_modal.js"></script>
<script src="assets/js/users/registration.js"></script>
@stop

@section('content')


	{!! Form::open(array('action' => 'UsersController@postRegistration','id'=>'reg-form', 'class'=>'','role'=>"form")) !!}

    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="margin-top:70px">
        <div class="panel panel-default">
            <div class="panel-heading">
        <strong>Register</strong>  
            </div>
            <div class="panel-body">
				<br/>
				<div class="form-group text-center" >
					<a href="#">
						<img class="media-object profile-picture" data-src="holder.js/64x64" alt="64x64" src="/assets/images/profile-images/perm/blank_male.png" data-holder-rendered="true" style="width: 64px; height: 64px;">
					</a>
					<span class="file-wrapper">
						<input type="file" id="form-submit-btn" accept="image/*"/>
						<span class="button" id="sub-btn">Choose File</span>
					</span>
				</div>
				<br/>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control first_name" name="first_name" id="first_name" placeholder="Your Name" />
                    <span class="glyphicon glyphicon-remove form-control-feedback error-first_name hide" aria-hidden="true"></span>
                </div>
                 <div class="form-group input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Your Email" />
                	<span class="glyphicon glyphicon-remove error-email form-control-feedback hide" aria-hidden="true"></span>
                </div>
                 <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" />
                	<span class="glyphicon glyphicon-remove error-phone form-control-feedback hide" aria-hidden="true"></span>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                    <input type="text" class="form-control username" name="username" id="username" placeholder="Username" />
                	<span class="glyphicon glyphicon-remove form-control-feedback error-username hide" aria-hidden="true"></span>
                </div>
              	<div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                    <input type="password" class="form-control password" name="password" id="password" placeholder="Enter Password" />
                	<span class="glyphicon glyphicon-remove error-password form-control-feedback hide" aria-hidden="true"></span>
                </div>
             	<div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                    <input type="password" class="form-control password_again row-margin-btm" name="password_again" id="password_again" placeholder="Retype Password" />
                	<span class="glyphicon glyphicon-remove error-password-again form-control-feedback hide" aria-hidden="true"></span>
                </div>

                <hr>
                <h4>Address <small>Optional</small></h4>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="Address" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="City" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="country" placeholder="Country" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" />
                </div>
             
             <a class="btn btn-success " id="submit-btn">Register</a>
            <hr />
            Already Registered ?  <a href="#" >Login here</a>
        </div>
           
        </div>
    </div>
    <div class="form-frame"></div>
	{!! Form::close() !!}


<style>

</style>


@stop