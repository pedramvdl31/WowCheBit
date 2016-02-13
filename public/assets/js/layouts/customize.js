$(document).ready(function(){
	cust_layout.pageLoad();
	cust_layout.events();
});
cust_layout = {
	pageLoad: function() {
		if ( (location.hash == "#_=_" || location.href.slice(-1) == "#_=_") ) {
		    removeHash();
		}
		var counter = 0;
		$('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})
	},
	events: function() {
		$( "#bms" ).change(function() {
			var option = $('option:selected', this).attr('des');
			var v = parseInt($('option:selected', this).val());
			if (v != 0) {
				$('#bdt').html('');
				if (!$.isBlank(option)) {
					$('.des-form').removeClass('hide');
					$('#bdt').html(option);
				}
				$('.bd').removeAttr('disabled');
				$('#amount-buy').css('background-color','white');	
			} else {
				$('.bd').attr('disabled','disabled');
				$('#amount-buy').css('background-color','#f3f4f5');
				$('.des-form').addClass('hide');
				$('#bdt').html('');
			}

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
		$('.buy-btn').click(function(){
			requestws.user_auth();
		});
		$('#bbtn').click(function(){
			var data_array = [];

			data_array['wallet_address'] =  $('#addb').val();
			data_array['buy_amount'] = $('#amount-buy').val();
			data_array['method'] = $('#bms').find('option:selected').val();
			data_array['message'] = $('#bps_ta').val();
			data_array['currency_price'] = $('#buy_input').attr('price');
			data_array['currency_type'] = $('#dash-currency-select').find('option:selected').val();
			data_array['total_price'] = $('#buy-total').attr('price');

			
			
		});
		$('.sell-btn').click(function(){
			requestws.user_auth();
		});
		$("#amount-buy").keyup(function(){
		    var v = $(this).val();
		    var p = $('.ref-buy').attr('price');
		    if (v == '') {
		    	$('#buy-total').text('0');
		    	$('#buy-total').attr('price','0');
		    } else if (jQuery.isNumeric(v)) {
		    	var total = v*p;
		    	$('#buy-total').attr('price',total);
		    	$('#buy-total').text(addCommas(total));
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
		  requestws.change_currency(selected);
		});
		$("#dash-currency-select").change(function() {
		  var selected = parseInt($("option:selected", this).val());
		  requestws.change_currency(selected);
		});

		$('#submit-btn').click(function(){
			var reg_form = $('#reg-form').serialize();
			requestws.form_validate(reg_form);
		});
		$('#send_message').click(function(){
			var user_email = $('#user_email').val();
			var user_message = $('#user_message').val();
			if (!$.isBlank(user_email)) {
				if (isEmail(user_email)) {
					if (!$.isBlank(user_message)) {
						requestws.send_email(user_email,user_message);
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
requestws = {
	user_auth: function() {
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
						$('#buy_input').attr('price',buy);
						$('#sell_input').attr('price',sell);
						$('#buy_input').val(buy+' EUR/bitcoin');
						$('#sell_input').val(sell+' EUR/bitcoin');
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
									requestws.updatedata();
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

(function($){
  $.isBlank = function(obj){
    return(!obj || $.trim(obj) === "");
  };
})(jQuery);
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