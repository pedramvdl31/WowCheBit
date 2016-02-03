$(document).ready(function(){
	cust_layout.pageLoad();
	cust_layout.events();

});
cust_layout = {
	pageLoad: function() {

	},
	events: function() {

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
        $(document).on('click','#login-btn',function(){
			$('#login-modal').modal('show');
        });
        $(document).on('click','#logout-btn',function(){
			$('#logout-modal').modal('show');
        });

	}
}
requestws = {
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