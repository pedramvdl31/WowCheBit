

<div class="modal fade" id="dashboard-modal">
	{!! Form::open(array('action' => 'UsersController@postLoginModal', 'class'=>'','role'=>"form",'id'=>'login-form-1')) !!}
	<div class="modal-dialog" style="width: 90%">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #288FB2;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" style="background:white">

				<div class="top-contents">

					<div class="inner-bgs">
						<div class="container" style="width:100%">

							<div class="row">
								<div class="bs-example bs-example-tabs col-md-6" data-example-id="togglable-tabs" style="overflow: auto;"> 
									<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
										<li role="presentation" class="active">
											<a href="#buy" id="buy-tab" role="tab" data-toggle="tab" aria-controls="buy" aria-expanded="false">Buy</a>
										</li> 
										<li role="presentation" class="">
											<a href="#sell" role="tab" id="sell-tab" data-toggle="tab" aria-controls="sell" aria-expanded="true"><strike>Sell</strike></a>
										</li> 
										<li role="presentation" class="">
											<a href="#pending" role="tab" id="sell-tab" data-toggle="tab" aria-controls="pending" aria-expanded="true">Pending Verification <span class="badge" style="background-color:#f0ad4e">1</span></a>
										</li> 
									</ul> 
									<div id="myTabContent" class="tab-content"> 
										<div role="tabpanel" class="tab-pane fade  active in" id="buy" aria-labelledby="buy-tab"> 
											<div class="col-md-12" style="padding:10px">
												<div class="form-group">
												<input id="addb" type="text" style="background-color:white" class="form-control" id="wallet_address" placeholder="Wallet Address" value="{{$w_a}}">
												</div>
												<div class="form-group">
													<select name="type"
														id="bms"
													 class="form-control">
													<option value="0">Select Method</option>
														@if(isset($all_payment_methods))
														@foreach($all_payment_methods as $all_methods)
														@if($all_methods['type']==1)
														<option value="{!!$all_methods['id']!!}" des="{!!$all_methods['description_html']!!}">{!!$all_methods['title']!!}</option>
														@endif
														@endforeach
														@endif
													</select>
												</div>
												<div class="form-group des-form hide">
													<div class="well" style="text-align:left;min-height:150px;overflow: auto;">
														<span id="bdt"></span>
													</div>
												</div>
												<div class="form-group">
													<input type="text" class="form-control bd" id="amount-buy" placeholder="Amount" disabled="disabled">
												</div>
												<div class="form-group" style="text-align:left;cursor:pointer;">
													<a id="bps" status="0">*Add a personal message</a>
													<br>
													<textarea class="hide" id="bps_ta" rows="4" cols="50" style="resize: none;"></textarea>
												</div>	
												<p><strong>Total:&nbsp&nbsp</strong> <span id="buy-total" price="">0</span></p>
												<a id="bbtn" class="btn pull-right modal-btn bd" disabled="disabled">Review Order</a>
											</div>

										</div> 
										<div role="tabpanel" class="tab-pane fade" id="sell" aria-labelledby="sell-tab"> 
											<div class="col-md-12" style="padding:10px">
												<div class="form-group">
													<input type="text" style="background-color:white" class="form-control" id="wallet-address-sell" placeholder="Account">
												</div>
												<div class="form-group">
													<input type="text" style="background-color:white" class="form-control" id="amount-sell" placeholder="Amount">
												</div>
												<p><strong>Total:&nbsp&nbsp</strong> <span id="sell-total">0</span></p>
												<a class="btn pull-right modal-btn" >Review Order</a>
											</div>
										</div> 
										<div role="tabpanel" class="tab-pane fade" id="pending" aria-labelledby="sell-tab"> 
											<div class="col-md-12" style="padding:10px">
											</div>
										</div> 
									</div> 
								</div>
								<div class="col-md-6" style="padding:10px;overflow: auto;">
									<div class="well" style="overflow: auto;text-align:left">
										<p>REFERENCE PRICE:</p>
										<div class="col-md-7">
											<fieldset class="form-group">
												<label for="buy">BUY</label>
												<input price="{!!$buy!!}" value="{!!$buy!!} EUR/bitcoin" style="background-color:white" type="text" class="form-control ref-buy" readonly="true" id="buy_input" placeholder="Updating...">
											</fieldset>													  
											<fieldset class="form-group">
												<label for="sell">SELL</label>
												<input price="{!!$sell!!}" value="{!!$sell!!} EUR/bitcoin" style="background-color:white" type="text" class="form-control ref-sell" readonly="true" id="sell_input" placeholder="Updating...">
											</fieldset>
										</div>			
										<div class="col-md-5 text-center" style="margin-top:35px">
											<select name="type" class="form-control" id='dash-currency-select'>
												<option value="1">EUR/bitcoin</option>
												<option value="2">USD/bitcoin</option>
											</select>
											<fieldset class="form-group" style="text-align: left">
												<a id="updp" class="btn btn-info btn-sm" style="margin:10px;">Update <img class="upd_g hide" src="/assets/images/icons/gif/loading1.gif" width="20px"></a>
											</fieldset>
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