

<div class="modal fade" id="dashboard-modal">
	{!! Form::open(array('action' => 'UsersController@postLoginModal', 'class'=>'','role'=>"form",'id'=>'login-form-1')) !!}
	<div class="modal-dialog" style="width: 75%">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #288FB2;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" style="background:white">

				<div class="top-contents">

					<div class="inner-bgs">
						<div class="container" style="width:100%">

							<div class="row">
								<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
									<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
										<li role="presentation" class="active">
											<a href="#buy" id="buy-tab" role="tab" data-toggle="tab" aria-controls="buy" aria-expanded="false">Buy</a>
										</li> 
										<li role="presentation" class="">
											<a href="#sell" role="tab" id="sell-tab" data-toggle="tab" aria-controls="sell" aria-expanded="true">Sell</a>
										</li> 
									</ul> 
									<div id="myTabContent" class="tab-content"> 
										<div role="tabpanel" class="tab-pane fade  active in" id="buy" aria-labelledby="buy-tab"> 
										



											<div class="col-md-6" style="padding:10px">
												<div class="form-group">
												    <input type="email" class="form-control" id="email" placeholder="Account">
												</div>
												<div class="form-group">
												    <input type="email" class="form-control" id="email" placeholder="Amount">
												</div>
												<div class="form-group">
	    											{!! Form::select('payment_method', $all_payment_methods, null ,array('id'=>'payment_method','class'=>'form-control')) !!}
												</div>
												<p>Total: </p>
												<a class="btn pull-right modal-btn" >Review Order</a>
												
											</div>
											<div class="col-md-6" style="padding:10px">
												<div class="well" style="height:268px;">
													<p>Pending Approval:</p>
												</div>
											</div>







										</div> 
										<div role="tabpanel" class="tab-pane fade" id="sell" aria-labelledby="sell-tab"> 





											<div class="col-md-6" style="padding:10px">
												<div class="form-group">
												    <input type="email" class="form-control" id="email" placeholder="Account">
												</div>
												<div class="form-group">
												    <input type="email" class="form-control" id="email" placeholder="Amount">
												</div>
												<div class="form-group">
	    											{!! Form::select('payment_method', $all_payment_methods, null ,array('id'=>'payment_method','class'=>'form-control')) !!}
												</div>
												<p>Total: </p>
												<a class="btn pull-right modal-btn" >Review Order</a>
												
											</div>
											<div class="col-md-6" style="padding:10px">
												<div class="well" style="height:268px;">
													<p>Pending Approval:</p>
												</div>
											</div>





										</div> 
									</div> 
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