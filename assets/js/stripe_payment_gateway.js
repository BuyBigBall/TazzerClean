(function($) {
	"use strict";
  
	var csrf_token=$('#admin_csrf').val();
	var base_url=$('#base_url').val();
	
	$( document ).ready(function() {
		$('.stripe_payment').on('change',function(){
			var id=$(this).val();
		  payment(id);
		});
	});
	function payment(value) {
		if(value!=''){
			$.ajax({
				type: "post",
				url: base_url+"admin/settings/payment_type",
				data:{type:value,'csrf_token_name':csrf_token}, 
				dataType:'json',
				success: function (data) {
					if(data !== '' && data !== null && typeof data === "object"){
						$('#gateway_name').val(data.gateway_name);
						$('#api_key').val(data.api_key);
						$('#secret_key').val(data.secret_key);
						$('#rest_key').val(data.rest_key);
					}
					else {
						$('#api_key').val("");
						$('#secret_key').val("");
						$('#rest_key').val("");
					}
				}
			});		
		}
	}
	
})(jQuery);