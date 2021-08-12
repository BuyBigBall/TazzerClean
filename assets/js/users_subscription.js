(function($) {
	"use strict";
	
	var csrf_token=$('#admin_csrf').val();
	var base_url=$('#base_url').val();
	var page=$('#page').val();
	if(page == 'user-subscription'){
		var users_table = $('#users_subscription_table').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
			"ajax": {
				"url":base_url+'user-subscription-list',
				"type": "POST",

				"data":{csrf_token_name:csrf_token}
			},
			"columnDefs" : [ {
	            orderable: false,
	            className: 'select-checkbox',
	            targets:   0
	        } ],
	        select: {
	            style:    'os',
	            selector: 'td:first-child'
	        },
			
		});	

		$('body').on('click', '.modal-open', function (e) {
			var email =  $(this).data("id");
			$("#email").val(email);
			$('#promo-code-modal').modal('show');

			
		});
			
		$('#submit-promo-offer').click(function (e) {
			var promo =  $("#promo-code").val();
			var description = $("#offer").val();
			var csrfHash = $("#admin_csrf").val();
			var email = $("#email").val();
			if(promo && description) {
				$.ajax({
		            type: "POST",
		            url:base_url+'user-promo-code-notification',
		            data:{email : email, promo :promo, description : description, csrf_token_name: csrfHash },
		            dataType: "json",
		            beforeSend:function(){
						$('#submit-promo-offer').html('Processing...');
					},
		            success: function(response){
		            	if(response.status) {
		            		$('#promo-code-modal').modal('hide');
		            		$('#submit-promo-offer').html('Submit');
		            		bootbox.alert({
							    message: "Notification Sent Successfully !!",
							    size: 'small'
							});
		            	}else {
		            		swal("Something Went Wrong", "warning");
		            	}
		            },
		            //Alert errors from backend
		            error: function(data) {
		                //Sweet alert js function
		                swal(data, "warning");
		            }
		        });
			} else {
				swal("", "Please enter promo code and description respectively", "error");
			}
			
		})
	}
		
		
})(jQuery);