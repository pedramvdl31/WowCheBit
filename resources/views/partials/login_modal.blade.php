

<div class="modal fade" id="login-modal" style="">
	{!! Form::open(array('action' => 'UsersController@postLoginModal', 'class'=>'','role'=>"form",'id'=>'login-form-1')) !!}
	  <div class="modal-dialog" style="width: 50%">
	    <div class="modal-content">
	      	<div class="modal-header" style="background-color: #288FB2;">


	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	</div>
	      <div class="modal-body" style="padding-left: 0;
    		padding-right: 0;"	>

	        <div class="top-content">
	        	
	            <div class="inner-bg">
	                <div class="container" style="width:100%">
	                	
	                    <div class="row">
	                        <div id="signin" class="col-sm-12 vws">
	                        	
	                        	<div class="form-box">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Login to our site</h3>
		                            		<p>Enter username and password to log on:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-key"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
		                            	{!! Form::open(array('action' => 'UsersController@getLogin','id'=>'reg-form', 'class'=>'','role'=>"form")) !!}
					                    	<div class="form-group">
					                    		<label class="sr-only" for="form-username">Username</label>
					                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
					                        </div>
					                        <div class="form-group">
					                        	<label class="sr-only" for="form-password">Password</label>
					                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
					                        </div>
					                        <p>
						                        <a href="password/email" class="clickables-a">Forgot Password?</a>&nbspOr&nbsp
						                        <a this-href="signup" class="login-cats clickables-a" >Register new account</a>
					                        </p>
					                        <button type="submit" class="btn modal-btn btn-primary">Sign in!</button>
				                    	{!! Form::close() !!}
			                        	<a class="btn btn-link-1 btn-link-1-facebook" href="auth/facebook">
			                        		<i class="fa fa-facebook"></i>  Connect
			                        	</a>
				                    </div>
			                    </div>
	                        </div>
	                        <div id="signup" class="col-sm-12 hide vws">
	                        	{!! Form::open(array('action' => 'UsersController@postRegistration','id'=>'reg-form', 'class'=>'','role'=>"form")) !!}
	                        	<div class="form-box">
	                        		<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Sign up now</h3>
		                            		<p>Fill in the form below to get instant access:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-pencil"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
					                        <div class="form-group">
					                        	<input type="text" placeholder="Email..." class="form-email form-control" id="email" name="email">
					                        	<span class="error-feedback email-error-feedback hide">Not Matched</span>
					                        </div>
					                        <div class="form-group">
					                        	<input type="password" placeholder="Password..." class="form-password form-control password" name="password" id="password">
					                        	<span class="error-feedback password-error-feedback hide">Not Matched</span>
					                        </div>
					                        <div class="form-group">
					                        	<input type="password" placeholder="Password Again..." class="form-password form-control password_again"  name="password_again" id="password_again">
					                        	<span class="error-feedback password-again-error-feedback hide">Not Matched</span>
					                        </div>
					                        <div class="form-group">
					                        	<input type="text" placeholder="Wallet Address (Optional)" class="form-email form-control" name="wallet_address">
					                        </div>
					                        <p>
						                        <a this-href="signin" class="login-cats clickables-a" >Back To Login</a>
					                        </p>
					                        <a class="btn modal-btn btn-primary" id="submit-btn">Sign me up!</a>
				                    </div>
	                        	</div>
	                        	{!! Form::close() !!}
		                        
	                        </div>
	                    </div>
	                    
	                </div>
	            </div>
	            
	        </div>

	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	{!! Form::close() !!}
</div><!-- /.modal -->