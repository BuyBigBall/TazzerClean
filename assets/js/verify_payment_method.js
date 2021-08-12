$(document).ready(function() {
	var csrf_token = $('#csrf_token').val();
	// console.log(csrf_token); 
	$("#connect-with-stripe").click(function() {
		showLoader();
		// console.log(csrf_token);
        $.ajax({
            url: base_url+'onboard-stripe',
            type: 'post',
            dataType: 'json',
            data: {csrf_token_name: csrf_token},
            success: function (data) {
            	// console.log(data);
				if (data.url) {
					window.location.href = data.url;
				} else {
					hideLoader();
					console.log("data", data);
				}
            },
            error: function (error) {
                hideLoader();
                console.error(error.status, error.statusText);
                // alert(error.responseText);
            }
        });

        // $.post(base_url+'onboard-stripe-provider',{csrf_token_name: csrf_token}, function(response) {

        // });
	});

	$("#stripe-not-verified").click(function() {
		showLoader();
		// console.log(csrf_token);
        $.ajax({
            url: base_url+'onboard-stripe',
            type: 'post',
            dataType: 'json',
            data: {csrf_token_name: csrf_token},
            success: function (data) {
            	// console.log(data);
				if (data.url) {
					window.location.href = data.url;
				} else {
					hideLoader();
					// console.log("data", data);
				}
            },
            error: function (error) {
                hideLoader();
                console.error(error.status, error.statusText);
                // alert(error.responseText);
            }
        });
	});

	$("#stripe-verified").click(function() {
		showLoader();
        $.ajax({
            url: base_url+'onboard-stripe',
            type: 'post',
            dataType: 'json',
            data: {csrf_token_name: csrf_token},
            success: function (data) {
				if (data.url) {
					window.location.href = data.url;
				} else {
					hideLoader();
				}
            },
            error: function (error) {
                hideLoader();
            }
        });
	});

	$("#connect-with-paypal").on("click", function(event) {

	});
});

function initEvents() {

	
}