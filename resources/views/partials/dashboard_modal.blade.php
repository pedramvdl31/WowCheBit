

<div class="modal fade" id="dashboard-modal">
	{!! Form::open(array('action' => 'UsersController@postLoginModal', 'class'=>'','role'=>"form",'id'=>'login-form-1')) !!}
	<div class="modal-dialog" style="width: 90%">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #288FB2;">
				<a class="top-cats" style="color: #5CDAD4;cursor: pointer;" this-href="dashboard">Dashboard</a>
				<span>&nbsp-&nbsp</span>
				<a class="top-cats" style="color: #5CDAD4;cursor: pointer;" this-href="profile">Profile</a>
				<span>&nbsp-&nbsp</span>
				<a class="top-cats" style="color: #5CDAD4;cursor: pointer;" this-href="orders">Orders</a>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" style="background:white">


				<div class="top-contents msections" id="dashboard">

					<div class="inner-bgs">
						<div class="container" style="width:100%">

							<div class="row">
								<div class="bs-example bs-example-tabs col-md-6" data-example-id="togglable-tabs" style="overflow: auto;"> 
									<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
										<li class="d-tl" id="buy-tl" role="presentation" class="active">
											<a href="#buy" id="buy-tab" role="tab" data-toggle="tab" aria-controls="buy" aria-expanded="true">Buy</a>
										</li> 
										<li class="d-tl" id="sell-tl" role="presentation" class="">
											<a href="#sell" role="tab" id="sell-tab" data-toggle="tab" aria-controls="sell" aria-expanded="false"><strike>Sell</strike></a>
										</li> 
										<li role="presentation" class="">
											<a href="#pending" role="tab" id="sell-tab" data-toggle="tab" aria-controls="pending" aria-expanded="true">Pending Verification <span class="badge" style="background-color:#f0ad4e">1</span></a>
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
													<option value="{!!$all_methods['id']!!}" des="{!!$all_methods['description_html']!!}">{!!$all_methods['title']!!}</option>
													@endif
													@endforeach
													@endif
												</select>
												<span class="hide" id="sam" style="color:#db4437">You must select a method</span>
											</div>
											<div class="form-group des-form hide">
												<div class="well" style="text-align:left;min-height:150px;overflow: auto;">
													<span id="bdt"></span>
												</div>
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
											<p><strong>Total:&nbsp&nbsp</strong> <span id="buy-total" price="">0</span></p>
											<a id="bbtn" class="btn pull-right modal-btn bd">Review Order</a>
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
												<p><strong>Total:&nbsp&nbsp</strong> <span id="sell-total">0</span></p>
												<a class="btn pull-right modal-btn" >Review Order</a>
											</div>
										</div> 
										<div role="tabpanel" class="tab-pane m-tp fade" id="pending" aria-labelledby="p-tab"> 
											<div class="col-md-12" style="padding:10px">
												<div class="table-responsive">
													<table class="table"> <thead> <tr> <th>#</th> <th>Column heading</th> <th>Column heading</th> <th>Column heading</th> </tr> </thead> <tbody> <tr class="active"> <th scope="row">1</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr> <th scope="row">2</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr class="success"> <th scope="row">3</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr> <th scope="row">4</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr class="info"> <th scope="row">5</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr> <th scope="row">6</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr class="warning"> <th scope="row">7</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr> <th scope="row">8</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> <tr class="danger"> <th scope="row">9</th> <td>Column content</td> <td>Column content</td> <td>Column content</td> </tr> </tbody> </table>
												</div>
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

				<div class="top-contents msections hide" id="profile">

					<div class="inner-bgs">
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

					<div class="inner-bgs">
						<div class="container" style="width:100%">
							<div class="row" style="text-align: left">
								<div class="table-responsive">
									<table class="table table-condensed"> <thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Mark</td> <td>Otto</td> <td>@mdo</td> </tr> <tr> <th scope="row">2</th> <td>Jacob</td> <td>Thornton</td> <td>@fat</td> </tr> <tr> <th scope="row">3</th> <td colspan="2">Larry the Bird</td> <td>@twitter</td> </tr> </tbody> </table>
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