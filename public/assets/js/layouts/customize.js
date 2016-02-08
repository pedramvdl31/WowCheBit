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
		requestws.updatedata();
	},
	events: function() {

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