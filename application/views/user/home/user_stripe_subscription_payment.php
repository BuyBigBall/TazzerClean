<?php
$params = stripeKeys();
?>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/numeric.js"></script>
 <div class="breadcrumb-bar">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="breadcrumb-title">
					<h2> Subscription Payment - <?php echo $currency.$amount; ?> </h2>
				</div>
			</div>
			 <div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href=" <?php echo base_url();?>"> <?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item"><a href=" <?php echo base_url();?>user-wallet"> Wallet</a></li>
						<li class="breadcrumb-item active" aria-current="page"> Pay Now</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

 <div class="content">
	 <div class="container">
		 <div class="row">
			 <div class="col-4">
				<div class="contact-blk-content">
				<style>
					.payment-errors{color: red;padding-top: 5px;padding-bottom: 5px;}
				</style>
				<div class="payment-errors"></div>
					<form method="post" id="payment-form" class="loginCustomerForm">
					 	<input type="hidden" name=" <?php echo $this->security->get_csrf_token_name(); ?>" value=" <?php echo $this->security->get_csrf_hash(); ?>" />
						<div class="row">
							<div class="form-group hide_div_new col-md-12">
								<label><strong>Card Number</strong></label>
								<input name="data[card_number]" placeholder="Enter card number" class="form-control numeric" data-stripe="number" size="20" maxlength="19" type="text" id="card_number">										
								<span class="card_number_error inline_errors"></span>
							</div>
							<div class="form-group hide_div_new col-md-8">
								<label><strong>Expiration (MM/YY)</strong></label>
							</div>
							<div class="form-group hide_div_new col-md-4">
								<label><strong>CVV</strong></label>
							</div>
							<div class="form-group hide_div_new col-md-4">
								<input name="data[expiration_month]" placeholder="MM" class="form-control numeric" data-stripe="exp_month" size="2" maxlength="2" type="text" id="expiration_month"/>						
								<span class="expiration_month_error inline_errors"></span>
							</div>
							
							<div class="form-group hide_div_new col-md-4">
								<input name="data[expiration_year]" placeholder="YY" class="form-control numeric" data-stripe="exp_year" size="2" maxlength="2" type="text" id="expiration_year">							
								<span class="expiration_year_error inline_errors"></span>
							</div>

							<div class="form-group col-md-4 hide_div_new">
								<input name="data[card_cvs]" placeholder="CVV" class="form-control numeric" data-stripe="CVC" size="4" maxlength="4" type="text" id="card_cvs">	
								<span class="card_cvs_error inline_errors"></span>
							</div>							
						</div>									
						<div class="text-center"><input type="submit" value="Pay Now" class="btn btn-primary submit-btn submit_service_book"></div>
					</form>
										
				</div>
			</div>
			<div class="col-4">
						</div>
			
		</div>


	</div>
</div>
<style>
		.required{border:1px solid red}
		.inline_errors{color:red}
		</style>
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
Stripe.setPublishableKey('<?php echo $params['pub_key'] ?>');
$(function() {

	$(".numeric").numeric({ decimal: false, negative: false }, function() {this.value = ""; this.focus(); });
	var $form = $('#payment-form');
	$form.submit(function(event) {
		var expYear 		= 	$("#expiration_year").val();
		var card_valid		=	true;
		var expMonth 		= 	$("#expiration_month").val();
		var cvv				= 	$("#card_cvs").val();
		var regMonth 		= 	/^01|02|03|04|05|06|07|08|09|10|11|12$/;
		var regYear 		= 	/^20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40$/;
		$(".card_number_error").html('');
		$(".expiration_month_error").html('');
		$(".expiration_year_error").html('');
		$(".card_cvs_error").html('');

		$("#card_number").removeClass('required');
		$("#expiration_month").removeClass('required');
		$("#expiration_year").removeClass('required');
		$("#card_cvs").removeClass('required');
		if($('#card_number').val()=='')
		{
			$("#card_number").addClass('required');
			$(".card_number_error").html('Enter Card Number');
			card_valid		=	false;
		} 
		else if($('#card_number').val().length > 19)
		{
			$("#card_number").addClass('required');
			$(".card_number_error").html('Card number is not valid');
			card_valid		=	false;
		} 
		else if($('#card_number').val().length < 11)
		{
			$(".card_number_error").html('Card number is not valid');
			$("#card_number").addClass('required');
			card_valid		=	false;
		};
		if (expMonth=='') 
		{
			$(".expiration_month_error").html('Enter Month');
			$("#expiration_month").addClass('required');
			card_valid		=	false;
		} 
		else if (!regMonth.test(expMonth)) 
		{
			$(".expiration_month_error").html('Invalid Month');
			$("#expiration_month").addClass('required');
			card_valid		=	false;
		}
		if (expYear=='') 
		{
			$(".expiration_year_error").html('Enter Year');
			$("#expiration_year").addClass('required');
			card_valid		=	false;
		} 
		else if (!regYear.test(expYear)) {
			$(".expiration_year_error").html('Invalid Year');
			$("#expiration_year").addClass('required');
			card_valid		=	false;
		}

		if ($("#card_cvs").val()=='') {
			$(".card_cvs_error").html('Enter CVV');
			$("#card_cvs").addClass('required');
			card_valid		=	false;
		}

		if(card_valid==true)
		{
			var $form = $('#payment-form');
			// Disable the submit button to prevent repeated clicks:
			$form.find('.submit').prop('disabled', true);
			// Request a token from Stripe:
			Stripe.card.createToken($form, stripeResponseHandler);
			// Prevent the form from being submitted:
			return false;
		}
		return false;
	});
});

function stripeResponseHandler(status, response) 
{	
	// Grab the form:
	var $form = $('#payment-form');
	$('.payment-errors').html('');
	if (response.error) 
	{ // Problem!
		// Show the errors on the form:
		$('.payment-errors').html(response.error.message);
		//$('.submit').prop('disabled', false); // Re-enable submission
	} 
	else if(response.type=='card_error')
	{ // Problem!
		// Show the errors on the form:
		$('.payment-errors').html(response.message);
		//$('.submit').prop('disabled', false); // Re-enable submission
	} 
	else { // Token was created!

		// Get the token ID:
		var token = response.id;

		// Insert the token ID into the form so it gets submitted to the server:
		$form.append($('<input type="hidden" id="stripeToken" name="stripeToken">').val(token));
		$.ajax({
		  method: "POST",
		  url: "../user/dashboard/user_stripe_sub_payment_process",
			data:{ 
				   'token':$("#stripeToken").val(),
				   'subscription_id':'<?php echo $subscription_id; ?>',
				   'csrf_token_name':'<?php echo $this->security->get_csrf_hash(); ?>'
				 }
		})
  		.done(function( msg ) {
	 		if(msg.trim()=='success')
			{
				window.location="<?php echo base_url(); ?>provider-subscription/";
			}
			else
			{
				alert(msg.trim());
			}
  		});
  		return false;
	}
};


</script>
