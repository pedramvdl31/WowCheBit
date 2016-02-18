$(document).ready(function(){
	buynsell.pageLoad();
	buynsell.events();

});
buynsell = {

	pageLoad: function() {
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
		});
		$('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})
	},
	events: function() {
        $(document).on('click','.buynsell',function(){
        	if (!$.isBuynsell('text')) {

            }

            $( ".target" ).change(function() {
			  alert( "Handler for .change() called." );
			});
        	//CHECKBOX
            var $this = $(this);
		     
		    // $this will contain a reference to the checkbox   
		    if ($this.is(':checked')) {
		       
		    } else {
		        // the checkbox was unchecked
		    }
        });
        $(document).on('click','._ignore_',function(){
		});
	}
}
requestbs = {
	buynsell: function(id) {
		var token = $('meta[name=csrf-token]').attr('content');
		$.post(
			'/',
			{
				"_token": token
			},
			function(result){
				var status = result.status;

				switch(status) {
					case 200: 
						
					break;				
					case 400: 
						
					break;
					default:
					break;
				}

				}
				);
	}
};
function buynsellf(url)
{

}
(function($){
  $.isBlank = function(obj){
    return(!obj || $.trim(obj) === "");
  };
})(jQuery);
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}