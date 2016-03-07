$(document).ready(function(){
	cust_layout.pageLoad();
	cust_layout.events();
});
cust_layout = {
	pageLoad: function() {
		requestwsj.change_currency(1);
		if ( (location.hash == "#_=_" || location.href.slice(-1) == "#_=_") ) {
		    removeHash();
		}
		var counter = 0;
		$('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});
		$('#NewsContainer').slimScroll({
        	height: '355px'
    	});
			Dropzone.autoDiscover = false;
		  $('#post_upload_zone').dropzone({ 
		    url: "/upload-varification",
		    paramName: "file",
		    maxFilesize: 2,
		    maxFiles: 3,
		    acceptedFiles: "image/jpeg,image/png",
		    init: function() {
    			this.on("sending", function(file, xhr, formData){
    				var this_id = $('#varf-page').attr('this-id');
	                formData.append("this_id", this_id)
	            }),
				 this.on('success', function(file, json) {
		        	var status = json.status;
		        	var all_bs = json.all_bs;
					if (status == 200) {
						alert('Successfully Uploaded! Please wait while we reviewing the verification.');
						$('#verfication_table').html(all_bs);
						//show new page
						$('.msections').addClass('hide');
						$('#orders').removeClass('hide');
						$('#varf-page').addClass('hide');
					}

				 });
				  
				 this.on('addedfile', function(file) {
				 });
				  
				 this.on('drop', function(file) {
				 });

				this.on("removedfile", function(file) {
				}); 
		    }
		  });
	},
	events: function() {
		// var files;
		// $(document).on('change', '.pen-file', function() {
		//   files = event.target.files;
		// });
		// $(document).on("submit", ".var-form", function (event) {
		//   	event.stopPropagation(); // Stop stuff happening
		//     event.preventDefault(); // Totally stop stuff happening
		//     var this_id = $(this).attr('this-id');
		//     // Create a formdata object and add the files
		//     var data = new FormData();
		//     $.each(files, function(key, value)
		//     {
		//         data.append(key, value);
		//     });

		//     data.append('this_id',this_id);
		//     $.ajax({
		//         url: '/upload-varification',
		//         type: 'POST',
		//         data: data,
		//         cache: false,
		//         dataType: 'json',
		//         processData: false, // Don't process the files
		//         contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		//         success: function(data, textStatus, jqXHR)
		//         {	
		//         	$('#upload-modal').modal('hide');
		//         	var status = data.status;
		//         	var all_bs = data.all_bs;
		// 			switch(status) {
		// 				case 200: // Approved
		// 				$('#upload-modal').modal('show');
		// 				alert('Successfully Uploaded! Please wait while we reviewing the verification.');
		// 				$('#verfication_table').html(all_bs);
		// 				break;				
		// 				case 400: // Approved
		// 				break;
		// 				default:
		// 				break;
		// 			}
		//         },
		//         error: function(jqXHR, textStatus, errorThrown)
		//         {
		//         	alert('e');
		//             // Handle errors here
		//             console.log('ERRORS: ' + textStatus);
		//             // STOP LOADING SPINNER
		//         }
		//     });
		// });
		$( "#bms" ).change(function() {
			var option = $('option:selected', this).attr('des');
			var v = parseInt($('option:selected', this).val());
			if (v != 0) {
				$('#bdt').html('');
				if (!$.isBlank(option)) {
					$('.des-form').removeClass('hide');
					$('#bdt').html(option);
				}
			} else {
				$('.des-form').addClass('hide');
				$('#bdt').html('');
			}
		});
		$('.login-cats').click(function(){
			var this_href = $(this).attr('this-href');
			$('.vws').addClass('hide');
			$('#'+this_href).removeClass('hide');
		});
		$('#bps').click(function(){
			s = parseInt($(this).attr('status'));
			if (s == 0) {
				$(this).attr('status',1);
				$('#bps_ta').removeClass('hide');
			} else {
				$(this).attr('status',0);
				$('#bps_ta').addClass('hide');
			}
		});

		$('#bbtn').click(function(){
			var verify = buyverify();
			if (verify==true) {
				var d_a = {};
				d_a['wallet_address'] =  $('#addb').val();
				d_a['paper_amount'] = $('#eur-buy').val();
				d_a['btc_amount'] = $('#btc-buy').val();
				d_a['method'] = $('#bms').find('option:selected').val();
				d_a['message'] = $('#bps_ta').val();
				d_a['currency_type'] = $('#dash-currency-select').find('option:selected').val();
				requestwsj.buy(d_a);
			}
		});

		$('.buy-btn').click(function(){
			var this_k = $(this).attr('this-href');
			var this_s = $(this).attr('this-slug');
			ShowDash(1,this_k,this_s);
		});
		$('.sell-btn').click(function(){
			var this_k = $(this).attr('this-href');
			var this_s = $(this).attr('this-slug');
			ShowDash(1,this_k,this_s);
		});
		$('.m-top-nav').click(function(){
			var this_k = $(this).attr('this-href');
			ShowDash(2,this_k);
		});
		$('.m-top-nav-sb').click(function(){
			var this_k = $(this).attr('this-href');
			var this_s = $(this).attr('this-slug');
			ShowDash(1,this_k,this_s);
		});
		$(document).on('click','.buy-btn-2',function(){
			var this_k = $(this).attr('this-href');
			if ($.isBlank(this_k)) {
				if (this_k==true) {
					var d_a = {};
					d_a['wallet_address'] =  $('#addb').val();
					d_a['paper_amount'] = $('#eur-buy').val();
					d_a['btc_amount'] = $('#btc-buy').val();
					d_a['method'] = $('#bms').find('option:selected').val();
					d_a['message'] = $('#bps_ta').val();
					d_a['currency_type'] = $('#dash-currency-select').find('option:selected').val();
					requestwsj.buy(d_a);
				} else {

					var d_a = {};
					d_a['wallet_address'] =  $('#addb').val();
					d_a['paper_amount'] = $('#eur-buy').val();
					d_a['btc_amount'] = $('#btc-buy').val();

					$html = '<a class="buy-btn-2">Order</a>';
					$(this).append($html);
			        requestwsj.authcheck(d_a);
					// d_a['method'] = $('#bms').find('option:selected').val();
					// d_a['message'] = $('#bps_ta').val();
					// d_a['currency_type'] = $('#dash-currency-select').find('option:selected').val();
					// requestwsj.buy(d_a);
				}
			}
		});

        $(document).on('click','.upload-img',function(){
        	var this_id = $(this).parents('tr:first').attr('this-id');
        	var hours = $(this).parents('tr:first').attr('timer');

        	var _ref = $(this).parents('tr:first').attr('this-ref');
        	var _wal_ad = $(this).parents('tr:first').attr('wal-ad');
        	var cad = $(this).parents('tr:first').attr('this-date');
        	var _total = $(this).parents('tr:first').attr('this-total');
        	var _o_s = $(this).parents('tr:first').attr('this-status');


			var hms = hours;   // your input string
			var a = hms.split(':'); // split it at the colons
			// minutes are worth 60 seconds. Hours are worth 60 minutes.
			var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

			var data_a = {};
			data_a['ref'] = _ref;
			data_a['wal_ad'] = _wal_ad;
			data_a['total'] = _total;
			data_a['os'] = _o_s;
			data_a['cad'] = cad;

        	pumf(this_id,seconds,data_a);
        });


		$('#upd-profile').click(function(){
			var wallet_add = $('#profile_wa').val();
			if (!$.isBlank(wallet_add)) {
				requestwsj.update_profile(wallet_add);
			}
		});
		$('.top-cats').click(function(){
			$('#varf-page').addClass('hide');
			var this_href = $(this).attr('this-href');
			$('.msections').addClass('hide');
			$('#'+this_href).removeClass('hide');
		});
		$("#eur-buy").keyup(function(){
		    var v = $(this).val();
		    var p = $('.ref-buy').attr('price');
		    if (v == '') {
		    	$('#buy-total').text('0');
		    	$('#buy-total').attr('price','0');
		    	$('#btc-buy').text('');
		    } else if (jQuery.isNumeric(v)) {
		    	$total = v/p;
		    	$new_total = $total.toFixed(2);
				$("#btc-buy").val($new_total);
				$commed_v=addCommas(v);
				$('#buy-total').text($commed_v);
				$('#buy-total').attr('price',v);

		    }
		});
		$("#eur-buy, #btc-buy").blur(function(){
			$('#min-buy').addClass('hide');
		    var v = parseInt($(this).val());
		    if (v == '' || v<60) {
		    	$('#min-buy').removeClass('hide');
		    }
		});
		$("#btc-buy").keyup(function(){
		    var v = $(this).val();
		    var p = $('.ref-buy').attr('price');
		    if (v == '') {
		    	$('#buy-total').text('0');
		    	$('#buy-total').attr('price','0');
		    	$('#eur-buy').text('');
		    } else if (jQuery.isNumeric(v)) {
		    	$total = v*p;
		    	$new_total = $total.toFixed(2);
				$("#eur-buy").val($new_total);

				$('#buy-total').text(addCommas($new_total));
				$('#buy-total').attr('price',$total);
		    }
		});
		$("#amount-sell").keyup(function(){
		    var v = $(this).val();
		    var p = $('.ref-sell').attr('price');
		    if (v == '') {
		    	$('#sell-total').text('0');
		    } else if (jQuery.isNumeric(v)) {
		    	var total = v*p;
		    	$('#sell-total').text(addCommas(total));
		    }
		});
		$("#updp").click(function() {
		  var selected = 1;
		  requestwsj.change_currency(selected);
		});
		$("#dash-currency-select").change(function() {
		  var selected = parseInt($("option:selected", this).val());
		  requestwsj.change_currency(selected);
		});

		$('#submit-btn').click(function(){
			var reg_form = $('#reg-form').serialize();
			requestwsj.form_validate(reg_form);
		});
		$('#send_message').click(function(){
			var user_email = $('#user_email').val();
			var user_message = $('#user_message').val();
			if (!$.isBlank(user_email)) {
				if (isEmail(user_email)) {
					if (!$.isBlank(user_message)) {
						requestwsj.send_email(user_email,user_message);
					} else {
						alert('Cannot send empty message');
					}
				 } else {
					alert('Invalid Email Format');
				}

            } else {
            	alert('Please Enter Your Email');
            }

		});

		$('.back-to-home').click(function(){
			window.location = "/";
		});
        $(document).on('click','.login-btn',function(){
			$('#login-modal').modal('show');
        });

	}
}
requestwsj = {
	upload_varification: function(form_data) {
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/upload-varification',
			{
				"_token": token,
				"form_data":form_data
			},
			function(result){
				var status = result.status;
				switch(status) {
					case 200: // Approved
					break;				
					case 400: // Approved
					break;
					default:
					break;
				}
			}
			);
	},
	update_profile: function(wallet_addr) {
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'users/update-profile',
			{
				"_token": token,
				"wa":wallet_addr
			},
			function(result){
				var status = result.status;
				switch(status) {
					case 200: // Approved
					break;				
					case 400: // Approved
					break;
					default:
					break;
				}
			}
			);
	},
	buy: function(d_a) {
		var token = $('meta[name=csrf-token]').attr('content');
		$('#buy-wait').removeClass('hide');
		$.post(
			'admins/buysells/buy',
			{
				"_token": token,
				"d_a":d_a
			},
			function(result){
				var status = result.status;
				var all_bs = result.all_bs;
				var hours = result.hours;
				var this_id = result.this_id;
				var p_data = result.p_data;
				$('#buy-wait').addClass('hide');
				switch(status) {
					case 200: // Approved
						alert('Successfully Purchased. Please verify the payment within next '+hours+' hours.');
						$('#verfication_table').html(all_bs);

						var hms = hours;   // your input string
						var a = hms.split(':'); // split it at the colons
						// minutes are worth 60 seconds. Hours are worth 60 minutes.
						var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
			        	pumf(this_id,seconds,p_data);

					break;				
					case 400: // Approved
					break;
					default:
					break;
				}
			}
			);
	},
		user_auth: function(type,kind,slug) {
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/users/user-auth',
			{
				"_token": token
			},
			function(result){
				var status = result.status;
				switch(status) {
					case 200: // Approved
						$('#dashboard-modal').modal('show');
						switch(type){
							case 1:
								$('.msections').addClass('hide');
								$('#'+kind).removeClass('hide');

								$('.d-tl').removeClass('active');
								$('#'+slug+'-tl').addClass('active');

								$('.m-tp').removeClass('in');
								$('.m-tp').removeClass('active');
								$('#'+slug).addClass('in')
								$('#'+slug).addClass('active');
							break;
							case 2:
								$('.msections').addClass('hide');
								$('#'+kind).removeClass('hide');
							break;
						}
						
					break;				
					case 400: // Approved
						alert('You must be logged in in order to continue');
						$('#login-modal').modal('show');
					break;
					default:
					break;
				}
			}
			);
	},
		authcheck: function(_data) {
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/users/user-authcheck',
			{
				"_token": token,
				_data:_data
			},
			function(result){
				var status = result.status;
				switch(status) {
					case 200: // Approved
						$('#dashboard-modal').modal('show');
						switch(type){
							case 1:
								$('.msections').addClass('hide');
								$('#'+kind).removeClass('hide');

								$('.d-tl').removeClass('active');
								$('#'+slug+'-tl').addClass('active');

								$('.m-tp').removeClass('in');
								$('.m-tp').removeClass('active');
								$('#'+slug).addClass('in')
								$('#'+slug).addClass('active');
							break;
							case 2:
								$('.msections').addClass('hide');
								$('#'+kind).removeClass('hide');
							break;
						}
						
					break;				
					case 400: // Approved
						alert('You must be logged in in order to continue');
						$('#login-modal').modal('show');
					break;
					default:
					break;
				}
			}
			);
	},
		change_currency: function(type) {
		$('.upd_g').removeClass('hide');
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/new-currency',
			{
				"_token": token,
				"type": type,

			},
			function(result){

				$('.upd_g').addClass('hide');
				var status = result.status;
				var buy = result.buy;
				var sell = result.sell;
				switch(status) {
					case 200: 
						var nsp = parseFloat(sell);
						var nbp = parseFloat(buy);

						var f_sp = nsp.toFixed(2);
						var f_bp = nbp.toFixed(2);

						$('.onp-s').text(f_sp);
						$('.onp-b').text(f_bp);
						$('#buy_input').attr('price',buy);
						$('#sell_input').attr('price',sell);
						$('#buy_input').val(f_sp);
						$('#sell_input').val(f_bp);

						var v = $('#eur-buy').val();
					    var p = buy;
					    if (v == '') {
					    	$('#buy-total').text('0');
					    	$('#buy-total').attr('price','0');
					    	$('#btc-buy').text('');
					    } else if (jQuery.isNumeric(v)) {
					    	$total = v/p;
					    	$new_total = $total.toFixed(2);
							$("#btc-buy").val($new_total);
							$commed_v=addCommas(v);
							$('#buy-total').text($commed_v);
							$('#buy-total').attr('price',v);
					    }
					break;				
					case 400: 
					break;
					default:
					break;
				}
			}
			);
	},
	updatedata: function() {
		$('#seconds-text').text('updating...');
		$('#update-btn').addClass('disabled');
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/updatedata',
			{
				"_token": token
			},
			function(result){
				var status = result.status;
				switch(status) {
					case 200: 
						$('#last-price').text(result.last);
						$('#high-price').text(result.high);
						$('#low-price').text(result.low);
						$('#volume-price').text(result.volume);
						$('#seconds-text').text('Just Now');
						var html = '<span id="last_u_counter">0</span> Seconds Ago</span>';
						$('#seconds-text').html(html); 
						var counter = 0;
						setTimeout(function(){ 

							var newInterval = setInterval(function () {
								if (counter > 5) {
									$('#update-btn').removeClass('disabled');
								};
								if (counter == 15) {
									clearInterval(newInterval);
									requestwsj.updatedata();
								};
								++counter;
								$('#last_u_counter').text(counter);
							}, 1000);




						 }, 1000);

					break;				
					case 400: 
					break;
					default:
					break;
				}
			}
			);
	},
	form_validate: function(reg_form) {
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/users/validate',
			{
				"_token": token,
				"reg_form":reg_form
			},
			function(result){
				var status = result.status;
				var call_back = result.validation_callback;
				reset_errors();
				view_errors(call_back);
			}
			);
	},
	send_email: function(email,message) {
		var token = $('meta[name=csrf-token]').attr('content');
		$('#email_loading').removeClass('hide');
		$.post(
			'/send-email',
			{
				"_token": token,
				"email": email,
				"message": message
			},
			function(result){
				var status = result.status;
				$('#email_loading').addClass('hide');
				$('#user_email').val('');
				$('#user_message').val('');
				switch(status) {
					case 200: 
						alert('Successfully Sent.');
					break;				
					case 400: 
						alert('Oops Something went wrong!');
					break;
					default:
					break;
				}

				}
				);
	}
};


function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function reset_errors()
{
	$('.error-feedback').addClass('hide');
	$('.form-group').removeClass('has-error');
}

function view_errors(data)
{
	var error_status = false;
	$.each(data, function (i, j) {
		var message = null;
 		switch(i){
 			case "email":
 			if (j['status'] == 400) {
 				error_status = true;
 				message = j['message'];
 				$('.email-error-feedback').removeClass('hide').html(message);
 				$('.email-error-feedback').parents('.form-group').addClass('has-error');
 			}
 			break;
 			case "password":
 			if (j['status'] == 400) {
 				error_status = true;
 				message = j['message'];
 				$('.password-error-feedback').removeClass('hide').html(message);
 				$('.password-error-feedback').parents('.form-group').addClass('has-error');

 			}
 			break;
 			case "password_again":
 			if (j['status'] == 400) {
 				error_status = true;
 				message = j['message'];
 				$('.password-again-error-feedback').removeClass('hide').html(message);
 				$('.password-again-error-feedback').parents('.form-group').addClass('has-error');
 			}
 			break;
 		}

	});
 		//IF THERE WAS NO ERRORS SUBMIT THE FORM
 		if (error_status == false) {
 			$('#reg-form').submit()
 		};

}
function removeHash() {
    var scrollV, scrollH, loc = window.location;
    if ('replaceState' in history) {
        history.replaceState('', document.title, loc.pathname + loc.search);
    } else {
        // Prevent scrolling by storing the page's current scroll offset
        scrollV = document.body.scrollTop;
        scrollH = document.body.scrollLeft;

        loc.hash = '';

        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scrollV;
        document.body.scrollLeft = scrollH;
    }
}
function addCommas(val) {

	while (/(\d+)(\d{3})/.test(val.toString())){
	      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
	    }
	    return val;
}
function buyverify() {
	$('#sam').addClass('hide');
	$('#min-buy').addClass('hide');
	var e_buy = parseInt($('#eur-buy').val());
	var met = $('#bms').find('option:selected').val();
    if (met == 0) {
    	$('#sam').removeClass('hide');
    	return false;
    } else if(e_buy == '' || e_buy<60 || $.isBlank(e_buy)){
    	$('#min-buy').removeClass('hide');
    	return false;
    }else{
    	return true;
    }
}
(function($){
  $.isBlank = function(obj){
    return(!obj || $.trim(obj) === "");
  };
})(jQuery);

function ShowDash(type,kind,slug) {
	$('#varf-page').addClass('hide');
	var _auth = parseInt($('#_auth').attr('data'));
	if (_auth == 1) {
		$('#dashboard-modal').modal('show');
		switch(type){
			case 1:
				$('.msections').addClass('hide');
				$('#'+kind).removeClass('hide');

				$('.d-tl').removeClass('active');
				$('#'+slug+'-tl').addClass('active');

				$('.m-tp').removeClass('in');
				$('.m-tp').removeClass('active');
				$('#'+slug).addClass('in')
				$('#'+slug).addClass('active');
			break;
			case 2:
				$('.msections').addClass('hide');
				$('#'+kind).removeClass('hide');
			break;
		}
	} else {
		alert('You must be logged in in order to continue');
		$('#login-modal').modal('show');
	}
}

function pumf(this_id,this_timer,p_data) {
	Dropzone.forElement("#post_upload_zone").removeAllFiles(true);

	$('#varf-page').attr('this-id',this_id);

	set_uploadmodal_data(p_data);
	var count = this_timer;
	    for (var i = 1; i < 9999; i++)
	    {
	    	window.clearInterval(i);
	    }
        
	var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

	function timer() {
	    count = count - 1;
	    if (count == -1) {
	        clearInterval(counter);
	        return;
	    }
	    var seconds = count % 60;
	    var minutes = Math.floor(count / 60);
	    var hours = Math.floor(minutes / 60);
	    minutes %= 60;
	    hours %= 60;
	    document.getElementById("timer").innerHTML = hours + ":" + minutes + ":" + seconds + " seconds left!"; // watch for spelling
	}
	//show new page
	$('.msections').addClass('hide');
	$('#varf-page').removeClass('hide');

}

function set_uploadmodal_data(p_data) {
	$('#m_ref').text(p_data['ref']);
	$('#m_wa').text(p_data['wal_ad']);
	$('#m_os').text(p_data['os']);
	$('#m_tot').text(p_data['total']);
	$('#m_odate').text(p_data['cad']);
}