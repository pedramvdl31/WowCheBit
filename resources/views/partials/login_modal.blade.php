

<div class="modal fade" id="login-modal">
	{!! Form::open(array('action' => 'UsersController@postLoginModal', 'class'=>'','role'=>"form",'id'=>'login-form-1')) !!}
	  <div class="modal-dialog" style="width: 75%">
	    <div class="modal-content">
	      	<div class="modal-header" style="background-color: #288FB2;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	</div>
	      <div class="modal-body">

	        <div class="top-content">
	        	
	            <div class="inner-bg">
	                <div class="container" style="width:100%">
	                	
	                    <div class="row">
	                        <div class="col-sm-5">
	                        	
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
					                    <form role="form" action="" method="post" class="login-form">
					                    	<div class="form-group">
					                    		<label class="sr-only" for="form-username">Username</label>
					                        	<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
					                        </div>
					                        <div class="form-group">
					                        	<label class="sr-only" for="form-password">Password</label>
					                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
					                        </div>
					                        <a type="submit" class="btn">Sign in!</a>
					                    </form>
				                    </div>
			                    </div>
			                
			                	<div class="social-login">
		                        	<h3>...or login with:</h3>
		                        	<div class="social-login-buttons">
			                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
			                        		<i class="fa fa-facebook"></i>  Facebook
			                        	</a>
			                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
			                        		<i class="fa fa-twitter"></i> Twitter
			                        	</a>
			                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
			                        		<i class="fa fa-google-plus"></i> Google Plus
			                        	</a>
		                        	</div>
		                        </div>
		                        
	                        </div>
	                        
	                        <div class="col-sm-1 middle-border" style="padding:0"></div>
	                        <div class="col-sm-1"></div>
	                        	
	                        <div class="col-sm-5">
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
					                        <a class="btn" id="submit-btn">Sign me up!</a>
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