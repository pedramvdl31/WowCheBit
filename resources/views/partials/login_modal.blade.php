<div class="modal fade" tabindex="-1" role="dialog" id="login-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" >
        <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:black" aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sign In</h4>
      </div>
      <div class="modal-body">
        

        <div id="signin" class="vws">
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

                <button type="submit" class="btn btn-primary" style="height: 50px">Sign in!</button>
        		<a class="btn btn-link-1 btn-link-1-facebook" href="auth/facebook">
	        		<i class="fa fa-facebook"></i>  Connect
	        	</a>
        	{!! Form::close() !!}

        </div>


        <div id="signup" class="hide vws">
        	{!! Form::open(array('action' => 'UsersController@postRegistration','id'=>'reg-form', 'class'=>'','role'=>"form")) !!}
        	<div class="form-box">
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

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->