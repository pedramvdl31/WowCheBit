

<div class="modal fade" id="dashboard-modal">

	<div class="modal-dialog" style="width: 60%">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #288FB2;">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="pull-right">&nbsp&nbsp</span>
				<a class="top-cats pull-right" style="color: white;cursor: pointer;" this-href="profile"><i class="glyphicon glyphicon-user"></i>&nbspProfile</a>
				<span class="pull-right">&nbsp-&nbsp</span>
				<a class="top-cats pull-right" style="color: white;cursor: pointer;" this-href="orders"><i class="glyphicon glyphicon-list-alt"></i>&nbspOrders</a>
				<span class="pull-right">&nbsp-&nbsp</span>
				<a class="top-cats pull-right" style="color: white;cursor: pointer;" this-href="dashboard"><i class="glyphicon glyphicon-cog"></i>&nbspDashboard</a>
				



			</div>
			<div class="modal-body" style="background:white">


				<div class="top-contents msections" id="dashboard">

					<div class="inner-bgs">
						<div class="container" style="width:100%">

							<div class="row">
								{!! Form::open(array('action' => 'UsersController@postLoginModal', 'class'=>'','role'=>"form",'id'=>'login-form-1')) !!}
										<div class="bs-example bs-example-tabs col-md-5" data-example-id="togglable-tabs" style="overflow: auto;">

									<div class="well" style="overflow: auto;text-align:left;
									    background-image: linear-gradient(to bottom,rgba(92, 184, 92, 0.44) 0,rgba(92, 184, 92, 0.5) 100%);
									    padding: 5px;">
										
										<div class="col-md-12">
											<p>REFERENCE PRICE:</p>
											<div class="col-md-6" style="padding-left: 0">
												<select name="type" class="ref-p-input form-control" id='dash-currency-select'>
												<option value="1">EUR/bitcoin</option>
												</select>		
											</div>
											<div class="col-md-6">
													<fieldset class="form-group" style="text-align: left">
													<a id="updp" class="btn btn-info btn-sm" style="height: 35px;
														line-height: 17px;">Update <img class="upd_g hide" src="/assets/images/icons/gif/loading1.gif" width="20px"></a>
													</fieldset>		
											</div>
	

										</div>
										<div class="col-md-6">
											<fieldset class="form-group">
												<label for="buy">BUY</label>
												<input price="" value="0 EUR/bitcoin" style="background-color:white" type="text" class="ref-p-input form-control ref-buy" readonly="true" id="buy_input" placeholder="Updating...">
											</fieldset>												
										</div>	
										<div class="col-md-6">
											<fieldset class="form-group">
												<label for="sell">SELL</label>
												<input price="" value="0 EUR/bitcoin" style="background-color:white" type="text" class="ref-p-input form-control ref-sell" readonly="true" id="sell_input" placeholder="Updating...">
											</fieldset>
										</div>



									</div> 
									<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
										<li class="d-tl" id="buy-tl" role="presentation" class="active">
											<a href="#buy" id="buy-tab" role="tab" data-toggle="tab" aria-controls="buy" aria-expanded="true">Buy</a>
										</li> 
										<li class="d-tl" id="sell-tl" role="presentation" class="">
											<a href="#sell" role="tab" id="sell-tab" data-toggle="tab" aria-controls="sell" aria-expanded="false"><strike>Sell</strike></a>
										</li> 
									</ul> 
									<div id="myTabContent" class="tab-content"> 
										<div role="tabpanel" class="tab-pane m-tp fade active in" id="buy" aria-labelledby="buy-tab"> 
											<div class="col-md-12" style="padding:10px">
												<div class="form-group">
													<input id="addb" type="text" style="background-color:white" class="form-control" id="wallet_address" placeholder="Wallet Address" value="{{$w_a}}">
												</div>
												<div class="form-group" style="text-align: left;">
													<select name="type"
														id="bms"
														class="form-control">
														<option value="0">Select Method</option>
														@if(isset($all_payment_methods))
														@foreach($all_payment_methods as $all_methods)
														@if($all_methods['type']==1)
														<option value="{!!$all_methods['id']!!}" des="{!!$all_methods['description_html']!!}</br>Verify within next {!!$all_methods['default_wait_hours']!!} hours">{!!$all_methods['title']!!}</option>
														@endif
														@endforeach
														@endif
													</select>
													<span class="hide" id="sam" style="color:#db4437">You must select a method</span>
												</div>

												<div class="form-group col-md-6" id="eur-buy-fm" style="text-align: left;padding: 0;padding-right: 5px;">
													<input type="text" class="form-control bd" id="eur-buy" placeholder="EUR" >
													<span class="hide" id="min-buy" style="color:#db4437">Minimum €60</span>
												</div>									
												<div class="form-group col-md-6" id="btc-buy-fm" style="padding: 0;padding-left: 5px;">
													<input type="text" class="form-control bd" id="btc-buy" placeholder="BTC" >
												</div>
												</br>
												<div class="form-group col-md-12" style="text-align:left;cursor:pointer;">
													<a id="bps" status="0">*Add a personal message</a>
													<br>
													<textarea class="hide" id="bps_ta" rows="4" cols="50" style="resize: none;"></textarea>
												</div>	
												<p><strong>Total:&nbsp&nbsp</strong> €<span id="buy-total" price="">0</span></p>
												<a id="bbtn" class="btn pull-right modal-btn bd btn-primary">Order</a>
											</div>
										</div> 
										<div role="tabpanel" class="tab-pane m-tp fade" id="sell" aria-labelledby="sell-tab"> 
											<div class="col-md-12" style="padding:10px">
												<div class="form-group">
													<input type="text" style="background-color:white" class="form-control" id="wallet-address-sell" placeholder="Account">
												</div>
												<div class="form-group">
													<input type="text" style="background-color:white" class="form-control" id="amount-sell" placeholder="Amount">
												</div>
												<p><strong>Total:&nbsp&nbsp</strong> €<span id="sell-total">0</span></p>
												<a class="btn pull-right modal-btn btn-primary" >Order</a>
											</div>
										</div> 
									</div> 
										</div>
								{!! Form::close() !!}
								<div class="col-md-7">
									<div class="form-group">
										<h4 style="color: black">Details:</h4>
										<div class="well hide des-form" style="text-align:left;min-height:150px;overflow: auto;">
											<span id="bdt"></span>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>
					</div>				
				</div>

				<div class="top-contents msections hide" id="profile">

					<div class="inner-bgs" style="padding: 15px">
						<div class="container" style="width:100%">
							<div class="row" style="text-align: left">
								<div class="form-group">
									<label for="comment">Email:</label>
									<input disabled="1" type="text" class="form-control" id="" placeholder="email" value="{!!Auth::user()->email!!}">
								</div>	
								<div class="form-group">
									<label for="comment">Wallet Address:</label>
									<input  type="text" class="form-control bd white-input" id="profile_wa" placeholder="Wallet Address" value="{{$w_a}}">
								</div>	
								<div class="form-group">
									<a class="btn btn-info pull-right" id="upd-profile">Update</a>
								</div>	
							</div>
						</div>				
					</div>				
				</div>

				<div class="top-contents msections hide" id="orders">
					<div class="inner-bgs" style="padding: 15px">
						<div class="container" style="width:100%">
							<div class="row" style="text-align: left">
								{!!$all_orders!!}
							</div>
						</div>				
					</div>				
				</div>

			</div>

		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

</div><!-- /.modal -->