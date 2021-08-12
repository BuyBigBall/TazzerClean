<?php
$country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>

<?php 
	$stripe_option='1';
	$publishable_key='';
	$live_publishable_key='';
	$logo_front='';
	$login_type='';
	$map_key = "";
	if (isset($settings['stripe_option'])) {
		$stripe_option = $settings['stripe_option'];
	}
	if (isset($settings['publishable_key'])) {
		$publishable_key = $settings['publishable_key'];
	}
	if (isset($settings['live_publishable_key'])) {
		$live_publishable_key = $settings['live_publishable_key'];
	}
	if (isset($settings['logo_front'])) {
		$logo_front = $settings['logo_front'];
	}
	if (isset($settings['login_type'])) {
		$login_type = $settings['login_type'];
	}
	if (isset($settings['map_key'])) {
		$map_key = $settings['map_key'];
	}

	if($stripe_option==1){
		$stripe_key= $publishable_key;
	}else{
		$stripe_key= $live_publishable_key;
	}

	if(!empty($logo_front)){
		$web_log=base_url().$logo_front;
	}else{
		$web_log=base_url().'assets/img/logo.png';
	}
?>
<!-- Review Modal -->
<div class="modal fade" id="myReview">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">	
				<h5 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Write_review'])) ? $user_language[$user_selected]['lg_Write_review'] : $default_language['en']['lg_Write_review']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label><?php echo (!empty($user_language[$user_selected]['lg_Reviews'])) ? $user_language[$user_selected]['lg_Reviews'] : $default_language['en']['lg_Reviews']; ?></label>
					<div class="star-rating rate">
						<input class="rates" id="star5" type="radio" name="rates" value="5">
						<label for="star5" title="5 stars">
							<i class="active fa fa-star"></i>
						</label>
						<input class="rates" id="star4" type="radio" name="rates" value="4">
						<label for="star4" title="4 stars">
							<i class="active fa fa-star"></i>
						</label>
						<input class="rates" id="star3" type="radio" name="rates" value="3">
						<label for="star3" title="3 stars">
							<i class="active fa fa-star"></i>
						</label>
						<input class="rates" id="star2" type="radio" name="rates" value="2">
						<label for="star2" title="2 stars">
							<i class="active fa fa-star"></i>
						</label>
						<input class="rates" id="star1" type="radio" name="rates" value="1">
						<label for="star1" title="1 star">
							<i class="active fa fa-star"></i>
						</label>
					</div>
				</div>
				<p class="error_rating error" ><?php echo (!empty($user_language[$user_selected]['lg_Rating_required'])) ? $user_language[$user_selected]['lg_Rating_required'] : $default_language['en']['lg_Rating_required']; ?></p>
				<input type="hidden" id="myInput">
				<input type="hidden" id="booking_id">
				<input type="hidden" id="provider_id">
				<input type="hidden" id="user_id">
				<input type="hidden" id="service_id">
				
				<?php $rating_type = $this->db->where('status',1)->get('rating_type')->result_array(); ?>
				<div class="form-group">
					<label>Title of your review</label>
					<select name="type" id="type" class="form-control">
						<?php foreach ($rating_type as $type) 
						{
							?>
							<option value="<?=$type['id']?>"><?php echo $type['name']?></option>
						<?php } ?>
					</select>
					<p class="error_type error" ><?php echo (!empty($user_language[$user_selected]['lg_Rating_type_required'])) ? $user_language[$user_selected]['lg_Rating_type_required'] : $default_language['en']['lg_Rating_type_required']; ?></p>
				</div>
				<div class="form-group">
					<label><?php echo (!empty($user_language[$user_selected]['lg_Your_review'])) ? $user_language[$user_selected]['lg_Your_review'] : $default_language['en']['lg_Your_review']; ?></label>
					<textarea class="form-control" rows="4" id="review"></textarea>
					<p class="error_review error"><?php echo (!empty($user_language[$user_selected]['lg_Review_required'])) ? $user_language[$user_selected]['lg_Review_required'] : $default_language['en']['lg_Review_required']; ?></p>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-theme py-2 px-4 text-white mx-auto" id="rate_booking" ><?php echo (!empty($user_language[$user_selected]['lg_Submit'])) ? $user_language[$user_selected]['lg_Submit'] : $default_language['en']['lg_Submit']; ?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Review Modal -->

<!-- Cancel Modal -->
<div class="modal fade" id="myCancel">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Reason_Cancel'])) ? $user_language[$user_selected]['lg_Reason_Cancel'] : $default_language['en']['lg_Reason_Cancel']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="cancel_myInput">
				<input type="hidden" id="cancel_booking_id">
				<input type="hidden" id="cancel_provider_id">
				<input type="hidden" id="cancel_user_id">
				<input type="hidden" id="cancel_service_id">
				
				<div class="form-group">
					<label>Reason</label>
					<textarea class="form-control" rows="5" id="cancel_review"></textarea>
					<p class="error_cancel error" ><?php echo (!empty($user_language[$user_selected]['lg_Reason_required'])) ? $user_language[$user_selected]['lg_Reason_required'] : $default_language['en']['lg_Reason_required']; ?></p>
				</div>
				<div class="text-center">
					<?php if($this->session->userdata('type')=="user"){?>
						<button type="button" class="btn btn-theme py-2 px-4 text-white mx-auto" id="cancel_booking" ><?php echo (!empty($user_language[$user_selected]['lg_Submit'])) ? $user_language[$user_selected]['lg_Submit'] : $default_language['en']['lg_Submit']; ?></button>
					<?php }else{?>
						<button type="button" class="btn btn-theme py-2 px-4 text-white mx-auto" id="provider_cancel_booking"><?php echo (!empty($user_language[$user_selected]['lg_Submit'])) ? $user_language[$user_selected]['lg_Submit'] : $default_language['en']['lg_Submit']; ?></button>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Cancel Modal -->

<!-- Alert Modal -->
<div class="modal" id="account_alert">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Alert'])) ? $user_language[$user_selected]['lg_Alert'] : $default_language['en']['lg_Alert']; ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<p><?php echo (!empty($user_language[$user_selected]['lg_Please_Enter_Profile_informations'])) ? $user_language[$user_selected]['lg_Please_Enter_Profile_informations'] : $default_language['en']['lg_Please_Enter_Profile_informations']; ?></p>
					<button type="button" class="btn btn-primary" id="go_user_settings"><?php echo (!empty($user_language[$user_selected]['lg_Ok'])) ? $user_language[$user_selected]['lg_Ok'] : $default_language['en']['lg_Ok']; ?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Alert Modal -->

<!-- Account Alert Modal -->
<div class="modal" id="account_alert_provider">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Alert'])) ? $user_language[$user_selected]['lg_Alert'] : $default_language['en']['lg_Alert']; ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<p><?php echo (!empty($user_language[$user_selected]['lg_Please_Fill_Account_Informations'])) ? $user_language[$user_selected]['lg_Please_Fill_Account_Informations'] : $default_language['en']['lg_Please_Fill_Account_Informations']; ?></p>
					<button type="button" class="btn btn-primary go_provider_availability"><?php echo (!empty($user_language[$user_selected]['lg_Ok'])) ? $user_language[$user_selected]['lg_Ok'] : $default_language['en']['lg_Ok']; ?></button>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /Account Alert Modal -->

<!-- Account Alert Modal -->
<div class="modal" id="account_alert_provider_sub">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Alert'])) ? $user_language[$user_selected]['lg_Alert'] : $default_language['en']['lg_Alert']; ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<p><?php echo (!empty($user_language[$user_selected]['lg_Please_Subscripe'])) ? $user_language[$user_selected]['lg_Please_Subscripe'] : $default_language['en']['lg_Please_Subscripe']; ?></p>
					<button type="button" class="btn btn-primary go_provider_availability" ><?php echo (!empty($user_language[$user_selected]['lg_Ok'])) ? $user_language[$user_selected]['lg_Ok'] : $default_language['en']['lg_Ok']; ?></button>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /Account Alert Modal -->

<div class="modal" id="account_alert_provider_avail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo (!empty($user_language[$user_selected]['lg_Alert'])) ? $user_language[$user_selected]['lg_Alert'] : $default_language['en']['lg_Alert']; ?></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<p><?php echo (!empty($user_language[$user_selected]['lg_Please_Fill_Availability'])) ? $user_language[$user_selected]['lg_Please_Fill_Availability'] : $default_language['en']['lg_Please_Fill_Availability']; ?></p>

					<button type="button" class="btn btn-primary go_provider_availability" ><?php echo (!empty($user_language[$user_selected]['lg_Ok'])) ? $user_language[$user_selected]['lg_Ok'] : $default_language['en']['lg_Ok']; ?></button>
				</div>
			</div>

		</div>
	</div>
</div>

<form class="modal account-modal fade multi-step" id="modal-wizard" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header d-block p-0 border-0 overflow-hidden">
				<div class="m-progress">
					<div class="m-progress-bar-wrapper">
						<div class="m-progress-bar">
						</div>
					</div>
					<div class="m-progress-stats">
						<span class="m-progress-current">
						</span>
						/
						<span class="m-progress-total">
						</span>
					</div>
					<div class="m-progress-complete">
					</div>
				</div>
				<button type="button" class="close close_login m-0 position-absolute r-0" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body step-1" data-step="1">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<h3><?php echo (!empty($user_language[$user_selected]['lg_Join_Professional'])) ? $user_language[$user_selected]['lg_Join_Professional'] : $default_language['en']['lg_Join_Professional']; ?></h3>
								<p class="text-muted"><?php echo (!empty($user_language[$user_selected]['lg_Registration_Provider'])) ? $user_language[$user_selected]['lg_Registration_Provider'] : $default_language['en']['lg_Registration_Provider']; ?></p>
							</div>
						</div>
						<label><?php echo (!empty($user_language[$user_selected]['lg_What_Service_do_you_Provide'])) ? $user_language[$user_selected]['lg_What_Service_do_you_Provide'] : $default_language['en']['lg_What_Service_do_you_Provide']; ?></label>                
						<select class="form-control" title="Category" name="categorys" id="categorys">
							<option value='' ><?php echo (!empty($user_language[$user_selected]['lg_Select_your_service'])) ? $user_language[$user_selected]['lg_Select_your_service'] : $default_language['en']['lg_Select_your_service']; ?></option>
						</select>
						<span class="category_error"></span>
					</div>
				</div>
			</div>

			<div class="modal-body step-2" data-step="2">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<h3><?php echo (!empty($user_language[$user_selected]['lg_Join_Professional'])) ? $user_language[$user_selected]['lg_Join_Professional'] : $default_language['en']['lg_Join_Professional']; ?></h3>
								<p class="text-muted"><?php echo (!empty($user_language[$user_selected]['lg_Registration_Provider'])) ? $user_language[$user_selected]['lg_Registration_Provider'] : $default_language['en']['lg_Registration_Provider']; ?></p>
							</div>
						</div>
						<form id="new_second_page">
							<label><?php echo (!empty($user_language[$user_selected]['lg_Choose_the_Sub_Category'])) ? $user_language[$user_selected]['lg_Choose_the_Sub_Category'] : $default_language['en']['lg_Choose_the_Sub_Category']; ?></label>
							<select class="form-control" title="Sub Category" name="subcategorys" id="subcategorys">
								<option value=''><?php echo (!empty($user_language[$user_selected]['lg_Enter_your_sub_category'])) ? $user_language[$user_selected]['lg_Enter_your_sub_category'] : $default_language['en']['lg_Enter_your_sub_category']; ?></option>
							</select>
						</form>
					</div>
				</div>
			</div>

			<div class="modal-body step-3" data-step="3">
				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<h3><?php echo (!empty($user_language[$user_selected]['lg_Join_Professional'])) ? $user_language[$user_selected]['lg_Join_Professional'] : $default_language['en']['lg_Join_Professional']; ?></h3>
								<p class="text-muted"><?php echo (!empty($user_language[$user_selected]['lg_Registration_Provider'])) ? $user_language[$user_selected]['lg_Registration_Provider'] : $default_language['en']['lg_Registration_Provider']; ?></p>
							</div>
						</div>
						<form action="" method='post' id="new_third_page">
							<input type="hidden" name="upload_type" id="upload_type" value="">
							<div class="form-group">
								<label><?php echo (!empty($user_language[$user_selected]['lg_Name'])) ? $user_language[$user_selected]['lg_Name'] : $default_language['en']['lg_Name']; ?></label>
								<input type="text" class="form-control" name="userName" id='userName' minlength="3">
							</div>
							<div class="form-group">
								<label><?php echo (!empty($user_language[$user_selected]['lg_Email'])) ? $user_language[$user_selected]['lg_Email'] : $default_language['en']['lg_Email']; ?></label>
								<input type="text" class="form-control" name="userEmail" id='userEmail'>
								<input type="hidden" class="form-control user_logintype" name="userLogintype" value="<?=$login_type?>" >
							</div>
							<?php 
								if($login_type=='email'){
								?>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="userPassword" id='UserPassword'>
								</div>
								<?php } ?>
							<div class="form-group">
								<label><?php echo (!empty($user_language[$user_selected]['lg_Mobile_Number'])) ? $user_language[$user_selected]['lg_Mobile_Number'] : $default_language['en']['lg_Mobile_Number']; ?></label>
								<div class="row">
									<div class="col-4 pr-0">
										<select name="countryCode" id="countryCode" class="form-control countryCode final_provider_c_code">
											<?php
											foreach ($country_list as $key => $country) { 
												if($country['country_id']=='91'){$select='selected';}else{ $select='';} ?>
												<option <?=$select;?> data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>"><?=$country['country_name'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-8">
										<input type="text" class="form-control form-control-lg provider_final_no user_mobile" placeholder="Enter Mobile No" name="userMobile" id='userMobile' >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Valid ID Proof</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="id_proof" data-title="Valid ID Proof"><strong>Upload</strong></a> <span id='id_proof_progress'></span>
								<input type="file" class="form-control" name="id_proof" id='id_proof'>
								<input type="hidden" class="form-control" name="id_proof_done" id='id_proof_done'>
							</div>
							<div class="form-group">
								<label>Qualification Document</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="qualification_document" data-title="Qualification Document"><strong>Upload</strong></a> <span id='qualification_document_progress'></span>
								<input type="file" class="form-control" name="qualification_document" id='qualification_document'>
								<input type="hidden" class="form-control" name="qualification_document_done" id='qualification_document_done'>
							</div>
							<div class="form-group">
								<label>Proof Of Address</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="address_proof" data-title="Proof Of Address"><strong>Upload</strong></a> <span id='address_proof_progress'></span>
								<input type="file" class="form-control" name="address_proof" id='address_proof'>
								<input type="hidden" class="form-control" name="address_proof_done" id='address_proof_done'>
							</div>
							
							<div class="form-group">
								<label>MOT Certificate</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="mot_certificate" data-title="MOT Certificate"><strong>Upload</strong></a> <span id='mot_certificate_progress'></span>
								<input type="file" class="form-control" name="mot_certificate" id='mot_certificate'>
								<input type="hidden" class="form-control" name="mot_certificate_done" id='mot_certificate_done'>
							</div>
							<div class="form-group">
								<label>Driving License</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="driving_license" data-title="Driving License"><strong>Upload</strong></a> <span id='driving_license_progress'></span>
								<input type="file" class="form-control" name="driving_license" id='driving_license'>
								<input type="hidden" class="form-control" name="driving_license_done" id='driving_license_done'>
							</div>
							<div class="form-group">
								<label>Car Insurance</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="car_insurance" data-title="Car Insurance"><strong>Upload</strong></a> <span id='car_insurance_progress'></span>
								<input type="file" class="form-control" name="car_insurance" id='car_insurance'>
								<input type="hidden" class="form-control" name="car_insurance_done" id='car_insurance_done'>
							</div>
							<div class="form-group">
								<label>Business Insurance</label>&nbsp;&nbsp;<a href="javascript:void(0)" class="upload_file" rel="business_insurance" data-title="Business Insurance"><strong>Upload</strong></a> <span id='business_insurance_progress'></span>
								<input type="file" class="form-control" name="business_insurance" id='business_insurance'>
								<input type="hidden" class="form-control" name="business_insurance_done" id='business_insurance_done'>
							</div>
							
							<div class="form-group">
								<div class="custom-control custom-control-xs custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="agreeCheckbox" id="agree_checkbox" value="1">
									<label class="custom-control-label" for="agree_checkbox"><?php echo (!empty($user_language[$user_selected]['lg_agree'])) ? $user_language[$user_selected]['lg_agree'] : $default_language['en']['lg_agree']; ?> <?=settingValue('website_name')?></label> <a tabindex="-1" href="javascript:void(0);">Privacy Policy</a> &amp; <a tabindex="-1" href="javascript:void(0);"> Terms.</a>
								</div>
							</div>
							<div class="form-group">
								<button id="registration_submit" type="submit" class="btn login-btn"><?php echo (!empty($user_language[$user_selected]['lg_Register'])) ? $user_language[$user_selected]['lg_Register'] : $default_language['en']['lg_Register']; ?></button>
							</div>
							<div class="account-footer text-center">
								Already have an account? <a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#tab_login_modal"><?php echo (!empty($user_language[$user_selected]['lg_login'])) ? $user_language[$user_selected]['lg_login'] : $default_language['en']['lg_login']; ?></a>
							</div>
						</form> 
					</div>
				</div>
			</div>

			<div class="modal-body step-4" data-step="4">
				<div class="login-header">
					<h3>OTP</h3>
					<p class="text-muted"><?php echo (!empty($user_language[$user_selected]['lg_Verification_account'])) ? $user_language[$user_selected]['lg_Verification_account'] : $default_language['en']['lg_Verification_account']; ?></p>
				</div>
				<form action="<?php echo base_url()?>user/login/send_otp_request" method='post' id="new_fourth_page">
					<div class="form-group">
						<input type="hidden" class="form-control form-control-lg enteredMobiles" placeholder="Mobile Number" name='enteredMobile'>
					</div>
					<div class="alert alert-success text-center" role="alert">
						<strong><?php echo (!empty($user_language[$user_selected]['lg_We Have_OTP'])) ? $user_language[$user_selected]['lg_We Have_OTP'] : $default_language['en']['lg_We Have_OTP']; ?></strong>
						<strong><?php echo (!empty($user_language[$user_selected]['lg_Registration_Provider'])) ? $user_language[$user_selected]['lg_Registration_Provider'] : $default_language['en']['lg_Registration_Provider']; ?> </strong>
					</div>
					<?php if(settingValue('default_otp')==1){ ?>
					<div class="alert alert-danger text-center" role="alert">
						We have used default otp for demo purpose.<br> <strong>Default OTP 1234</strong>
					</div>
				<?php }?>
					<div class="form-group">
						<input  type="text" class="form-control form-control-lg no_only" maxlength="4" autocomplete="off" minlength="4" placeholder=" Enter OTP Here...." name="otp_number" id='otp_number'>
						<span for='otp_number' id='otp_error_msg'><?php echo (!empty($user_language[$user_selected]['lg_Please_Check_Your_Registered_Mobile'])) ? $user_language[$user_selected]['lg_Please_Check_Your_Registered_Mobile'] : $default_language['en']['lg_Please_Check_Your_Registered_Mobile']; ?></span>
					</div>
					<p class="resend-otp"><?php echo (!empty($user_language[$user_selected]['lg_Didnt_receive_the_OTP'])) ? $user_language[$user_selected]['lg_Didnt_receive_the_OTP'] : $default_language['en']['lg_Didnt_receive_the_OTP']; ?> <a href="#" id="re_send_otp_provider" > <?php echo (!empty($user_language[$user_selected]['lg_Resend_OTP'])) ? $user_language[$user_selected]['lg_Resend_OTP'] : $default_language['en']['lg_Resend_OTP']; ?></a></p>
					<div>
						<button id='registration_final_old' type="submit" class="login-btn" ><?php echo (!empty($user_language[$user_selected]['lg_Finish'])) ? $user_language[$user_selected]['lg_Finish'] : $default_language['en']['lg_Finish']; ?></button>
					</div>
					<div>
						<button id='registration_resend_new' type="button" class="invisible login-btn" ><?php echo (!empty($user_language[$user_selected]['lg_Resend'])) ? $user_language[$user_selected]['lg_Resend'] : $default_language['en']['lg_Resend']; ?></button>
					</div>
				</form> 
			</div>

			<div class="modal-footer mx-auto">
				<button type="button" class="btn btn-theme text-white px-5 py-2 mt-0 mb-4 step step-1" disabled="disabled" id='step1_footer' data-step="2"><?php echo (!empty($user_language[$user_selected]['lg_Continue'])) ? $user_language[$user_selected]['lg_Continue'] : $default_language['en']['lg_Continue']; ?></button>
				<button type="button" class="btn btn-theme text-white px-5 py-2 mt-0 mb-4 step step-2"  id='step2_footer' data-step="1" ><?php echo (!empty($user_language[$user_selected]['lg_back'])) ? $user_language[$user_selected]['lg_back'] : $default_language['en']['lg_back']; ?></button>
				<button type="button" class="btn btn-theme text-white px-5 py-2 mt-0 mb-4 step step-2"  disabled="disabled" id='step3_footer' data-step="3" ><?php echo (!empty($user_language[$user_selected]['lg_Continue'])) ? $user_language[$user_selected]['lg_Continue'] : $default_language['en']['lg_Continue']; ?></button>
			</div>
		</div>
	</div>
</form>

<div class="modal account-modal fade multi-step" id="modal-wizard1" data-keyboard="false" data-backdrop="static">
	<div class=" modal-lg modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header p-0 border-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" data-step="1">

				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<h3>Join Us</h3>
								<!-- <p class="text-muted">Registration for Customer</p> -->
							</div> 

							<form method='post' id="new_third_page_user">
							 <h3><strong>Personal Details</strong></h3>
							 <div class="row">
	                           <div class="form-group col-md-6 mt-3">
									<label>First Name</label>
									<input type="text" class="form-control border-dark" name="userName" id='user_name' minlength="3">
								</div>
	                           <div class="form-group col-md-6 mt-3">
									<label>Last Name</label>
									<input type="text" class="form-control border-dark" name="last_name" id='l_name' minlength="3">
								</div>
								<div class="form-group col-md-6 mt-3">
									<label>Email</label>
									<input type="email" class="form-control border-dark" name="userEmail" id='user_email'>
									<input type="hidden" class="form-control user_logintype" name="userLogintype" value="<?=$login_type?>" >
								</div>
								<?php 
								if($login_type=='email'){
								?>
								<div class="form-group col-md-6 mt-3">
									<label>Password</label>
									<input type="password" class="form-control border-dark" name="userPassword" id='user_password'>
								</div>
								<?php } ?>

								<div class="form-group col-md-6 mt-3">
									<label>Postal Code/zipcode</label>
									<input type="number" name="postal_code" id="p_code" class="form-control border-dark" Placeholder="Enter Postal Code">
								</div>
								<!-- <div class="form-group col-md-6 mt-3">
									<label>Your Primary service</label>
									<select required="true" class="form-control category-list" name="service_values">
										<option value="">Select</option>      
										<option value="1">Business, Accounting, Human Resources & Legal</option>      
										<option value="2">Construction Service </option>      
										<option value="3">Cleaning Services</option>      
										<option value="4">Clearance & Rubbish Removal Service </option>      
										<option value="5">Domestic helpers’ Services </option>      
										<option value="6">Dog Walking or Pet services</option>      
										<option value="7">Design, Media & Architecture</option>      
										<option value="8">Data Entry & Admin</option>      
										<option value="9">Engineering & Science</option>       
										<option value="10">Freight, Shipping & Transportation</option>      
										<option value="11">Gardening and maintenance services</option>      
										<option value="12">Handyman Services </option>      
										<option value="13">Hair Addressing </option>      
										<option value="14">Local Jobs & Services</option>      
										<option value="15">Mobile Phones & Computing</option>      
										<option value="16">Marketing</option>      
										<option value="17">Product Sourcing & Manufacturing</option>      
										<option value="18">Property and facilities management services </option>       
										<option value="19">Scaffolding & building</option>      
										<option value="20"> Sales & Marketing</option>      
										<option value="21">Telecommunications</option>      
										<option value="22">Translation & Languages</option>      
										<option value="23">Websites, IT & Software</option>      
										<option value="24">Writing & Content</option>      
										<option value="25">Other</option>      
									</select>
								</div> -->
								<div class="form-group col-md-6 mt-3">
									<label>You are Appling As</label>
									<select required="true" class="form-control category-list" name="you_are_appling_as" id="are_appling_as">
										<option selected value="0">Select</option>      
										<option value="1">Freelancer</option>      
										<option value="2">Products vendon(shop)</option>      
										<option value="3">Local jobs and service</option>      
										<option value="4">Solely Online vender</option>      
										<option value="5">Sub-Contractor</option>      
										<option value="6">Sole trader</option>      
										<option value="7">Business</option>      
										<option value="8">Employees</option>      
										<option value="9">Buyer (Users)</option>      
									</select>
								</div>
								<h3 class="col-md-12 mt-3"><strong>Mailing Address</strong></h3>
								<div class="form-group col-md-4 mt-3">
									<label>House name</label>
									<input type="text" name="house_name" id="h_name" value="" placeholder="Enter Street Address" class="form-control border-dark">
								</div>
								<div class="form-group col-md-4 mt-3">
									<label>House or flat number</label>
									<input type="number" name="house_number" id="h_number" value="" placeholder="House or flat number" class="form-control border-dark">
								</div>
								<div class="form-group col-md-4 mt-3">
									<label>Street Address</label>
									<input type="text" name="street_address" id="st_address" value="" placeholder="Enter Street Address" class="form-control border-dark">
								</div>

								<div class="form-group col-md-4 mt-3">
									<label>City</label>
									 <input type="text" name="city" id="c_city" value="" placeholder="Enter City" class="form-control border-dark">
								</div>
								<div class="form-group col-md-4 mt-3">
									<label> County/ Province</label>
									<input type="text" name="province" id="p_province" value="" placeholder="Enter Province" class="form-control border-dark">
								</div>
								<div class="form-group col-md-4 mt-3">
									<label>Postal Code</label>
									<input type="number" name="postal_code2" id="p_postal_code" value="" placeholder="Enteer Postal Code" class="form-control border-dark">
								</div>
								<div class="form-group col-md-10 mt-3">
									<label>Mobile Number</label>
									<div class="row">
										<div class="col-4 pr-0">
											<select name="countryCode" id="country_code" class="form-control countryCode final_country_code">
												<?php
												foreach ($country_list as $key => $country) { 
													if($country['country_code']==$main_code){$select='selected';}else{ $select='';} ?>
													<option <?=$select;?> data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>"><?=$country['country_name'];?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-8">
											<input type="text" class="form-control user_final_no user_mobile border-dark" placeholder="Enter Mobile No" name="userMobile" id='user_mobile'>
										</div>
									</div>
								</div>
							</div>
								<div class="form-group">
									<div class="custom-control custom-control-xs custom-checkbox">
										<input type="checkbox" class="custom-control-input" name="agreeCheckboxUser" id="agree_checkbox_user" value="1">
										<label class="custom-control-label" for="agree_checkbox_user">I agree to <?=settingValue('website_name')?></label> <a tabindex="-1" href="javascript:void(0);">Privacy Policy</a> &amp; <a tabindex="-1" href="javascript:void(0);"> Terms.</a>
									</div>
								</div>
								<div class="form-group">
									<button id="registration_submit_user" type="submit" class="login-btn btn">Register</button>
								</div>
								<div class="account-footer text-center">
									Already have an account? <a href="javascript:void(0);" data-dismiss="modal" data-toggle="modal" data-target="#tab_login_modal">Login</a>
								</div>
							</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal-body step-2" data-step="2">
				<div class="login-header">
					<h3>OTP</h3>
					<p class="text-muted">Verification your account</p>
				</div>
				<form action="<?php echo base_url()?>user/login/send_otp_request_user" method='post' class='new_fourth_page_user'>
					<div class="form-group">
						<input type="hidden" class="form-control form-control-lg enteredMobiles" placeholder="Mobile Number" name='enteredMobile'>
					</div>
					<div class="form-group">
						<div class="alert alert-success text-center" role="alert">
							<strong>We Have Send SMS Via OTP</strong>
							<strong>Please Check Your Registered Mobile Number </strong>
						</div>
						<?php if(settingValue('default_otp')==1){ ?>
						<div class="alert alert-danger text-center" role="alert">
						</div>
					<?php }?>
						<input type="text" class="form-control form-control-lg no_only otp_number_user" autocomplete="off" maxlength="4" minlength="4" placeholder="Enter OTP Here.." name="otp_number">
						<span for='otp_number' id='otp_error_msg'></span>
					</div>
					
					<p class="resend-otp">Didn't receive the OTP? <a href="#" id="re_send_otp_user"> Resend OTP</a></p>
					<div>
						<button class='registration_final' type="submit" class="login-btn" >Enter</button>
					</div>
					<div>
						<button class='registration_resend' type="button" class="invisible login-btn" >Resend</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
</div>

<div class="modal account-modal fade multi-step" id="modal-wizardreset" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header p-0 border-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="header-content-blk text-center">
				<div class="alert alert-success text-center" id="flash_succ_message2" ></div>
			</div> 
			<div class="modal-body step-1" data-step="1">

				<div class="account-content">
					<div class="account-box">
						<div class="login-right">
							<div class="login-header">
								<h3>Forgot Password </h3>
								<p class="text-muted">Reset Email ID</p>
							</div> 

							<form method='post' id="forgetpwddiv">
								<div class="form-group">
									<label>Email ID</label>
									<input type="text" name="login_mode1" id="login_mode1" value="1">
									<input type="hidden" class="form-control user_logintype" name="userLogintype" value="<?=$login_type?>" >
									<input type="text" class="form-control" name="forgot_mailid" id='forgot_mailid'>
								</div>
								<div class="form-group">
									<button id="forgotpwdmail" type="submit" class="login-btn btn">Submit</button>
								</div>
								
							</form> 
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal-body step-2" data-step="2">
				<div class="login-header">
					<h3>OTP</h3>
					<p class="text-muted">Verification your account</p>
				</div>
				<form action="<?php echo base_url()?>user/login/send_otp_request_user" method='post' class="new_fourth_page_user">
					<div class="form-group">
						<input type="hidden" class="form-control form-control-lg enteredMobiles" placeholder="Mobile Number" name='enteredMobile'>
					</div>
					<div class="form-group">
						<div class="alert alert-success text-center" role="alert">
							<strong>We Have Send SMS Via OTP</strong>
							<strong>Please Check Your Registered Mobile Number </strong>
						</div>
						<?php if(settingValue('default_otp')==1){ ?>
						<div class="alert alert-danger text-center" role="alert">
						</div>
					<?php }?>
						<input type="text" class="form-control form-control-lg no_only otp_number_user" autocomplete="off" maxlength="4" minlength="4" placeholder="Enter OTP Here.." name="otp_number">
						<span for='otp_number' id='otp_error_msg'></span>
					</div>
					
					<p class="resend-otp">Didn't receive the OTP? <a href="#" id="re_send_otp_user"> Resend OTP</a></p>
					<div>
						<button class='registration_final' type="submit" class="login-btn" >Enter</button>
					</div>
					<div>
						<button class='registration_resend' type="button" class="invisible login-btn" >Resend</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
</div>

<footer class="footer">

	<input type="hidden" id="stripe_key" value="<?=$stripe_key;?>">
	<input type="hidden" id="logo_front" value="<?=$web_log;?>">

	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-3 col-md-6">
				  <div class="footer-widget footer-menu">
				  	<h2 class="footer-title">About</h2>
                    <div class="footer-line">
                        <span></span>
                    </div>
				    <div class="about">
				      <div class="contactdet">
				        <ul>
				          <li class="color-grey">
				            <p><a href="<?php echo base_url();?>"><img alt="Logo" class="img-fluid" src="<?php echo base_url(); ?>assets/img/logo-icon-old.png" /></a></p>
							<p>Tazzer Clean provides high quality, professional and on-demand, services that are fully trusted and convenient with a highly professional team. We will bring together the entire Industrial Services in one place.</p>
				            <div class="email-subscription">
								<h2>Subscribe to our Newsletter</h2>
								<div class="input-group">
							         <input type="email" class="form-control" id="email-sub" placeholder="Enter your email">
							         <span class="input-group-btn">
							         <button class="btn btn-theme mail-subscribe" type="submit">Subscribe</button>
							         </span>
							    </div>
							    <p class="sub-msg"></p>
							</div>
				          </li>
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="col-lg-3 col-md-6">
				  <div class="footer-widget footer-menu">
				  	<h2 class="footer-title">Official Info</h2>
                    <div class="footer-line">
                        <span></span>
                    </div>
				    <div class="about">
				      <div class="contactdet">
				        <ul>
				          <li class="color-grey">
				          	<p></p><p><span style="font-size:16px"><img src="<?php echo base_url(); ?>assets/img/locate.8eb7c7e8.svg">&nbsp; &nbsp;South Yorkshire, S66 7AW</span></p>
							<p><span style="font-size:16px"><img src="<?php echo base_url(); ?>assets/img/call.3c7e5ae4.svg">&nbsp; &nbsp; (+44)(0)79 6124 2587 </span></p>
							<p><span style="font-size:16px"><img src="<?php echo base_url(); ?>assets/img/call.3c7e5ae4.svg">&nbsp; &nbsp; (+44)(0)33 3404 1413 </span></p>
							<p><span style="font-size:16px"><img src="<?php echo base_url(); ?>assets/img/mail-box.394d51c7.svg">&nbsp; &nbsp;info@<?php echo base_uri(); ?></span></p>
				          </li>
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="col-lg-3 col-md-6">
				  <div class="footer-widget footer-menu">
				  	<h2 class="footer-title">Popular Services</h2>
                    <div class="footer-line">
                        <span></span>
                    </div>
				    <div class="about">
				      <div class="contactdet">
				        <ul>
				          
				          <li class="color-grey">
				            <ul>
								<li><a href="<?php echo base_url(); ?>all-categories">Cleaning Services </a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Clearance &amp; Rubbish Removal Services</a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Dog Walking &amp; Pet Services </a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Domestic Helpers Services</a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Gardening Services</a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Handyman Services </a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Hair &amp; Beauty Services </a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Property Management Services</a></li>
								<li><a href="<?php echo base_url(); ?>all-categories">Scaffolding &amp; Building Services </a></li>
							</ul>
				          </li>
				          
				          
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="col-lg-3 col-md-6">
				  <div class="footer-widget footer-menu">
				  	<h2 class="footer-title">Open Hours</h2>
                    <div class="footer-line">
                        <span></span>
                    </div>
				    <div class="about">
				      <div class="contactdet">
				        <ul>
				          
				          <li class="color-grey">
				            <p>(Mon to Sun) 24 hours</p>
				            <p>&nbsp;</p>
							<table border="0" cellpadding="1" cellspacing="1" style="width:100%">
								<tbody>
									<tr>
										<td><img alt="" src="<?php echo base_url(); ?>assets/img/q1.png" style="float:left; height:48px; width:120px"></td>
										<td><img alt="" src="<?php echo base_url(); ?>assets/img/q2.png" style="float:left; height:48px; width:120px"></td>
									</tr>
								</tbody>
							</table>
							<p>&nbsp;</p>
							<table border="0" cellpadding="1" cellspacing="1" style="width:100%">
								<tbody>
									<tr>
										<td><img alt="" src="<?php echo base_url(); ?>assets/img/q3.jpg" style="height:100px; width:120px"></td>
										<td><img alt="" src="<?php echo base_url(); ?>assets/img/q4.png" style="height:100px; width:120px"></td>
									</tr>
								</tbody>
							</table>
				          </li>
				         
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>

			</div>
		</div>
	</div>
	<!-- /Footer Top -->

	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="container">

			<!-- Copyright -->
			<div class="copyright">
				<div class="row">
					<div class="col-md-6 col-lg-6">
						<div class="copyright-text">
							<p class="mb-0">&copy; <?php echo date('Y').' '.$this->website_name;?></p>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">

						<!-- Copyright Menu -->
						<div class="copyright-menu">
							<ul class="policy-menu">
								<!-- <li><a type=""  data-toggle="modal" data-target="#myModal">Career</a>
									</li> -->
								<li><a href="<?php echo base_url()?>faq">FAQ</a></li>
								<li><a href="<?php echo base_url()?>terms-conditions">Terms and Conditions</a></li>
								<li><a href="<?php echo base_url()?>privacy">Privacy</a></li>
							</ul>
						</div>
						<!-- /Copyright Menu -->

					</div>
				</div>
			</div>
			<!-- /Copyright -->

		</div>
	</div>
	<!-- /Footer Bottom -->

</footer>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title m-auto">APPLICATION FORM EMPLOYEES </h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         <form method="POST" action="<?php echo base_url()?>yourself" enctype='multipart/form-data'>

         	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
        <div class="modal-body row">
        	 <div class="col-md-12">
           <h5>Personal Details</h5>
       </div>
		 <div class="col-md-6 mt-3">First Name: 
		 <input type="text" name="first_name" class="form-control" Placeholder="Enter First Name" required>
		 </div>
		  <div class="col-md-6 mt-3">Last Name: 
		 <input type="text" name="last_name" class="form-control" Placeholder="Enter Last Name" required>
		 </div>
		  <div class="col-md-6 mt-3">Mobile Number: 
		 <input type="number" name="phone" class="form-control" Placeholder="Enter Mobile Number" required>
		 </div>
		  <div class="col-md-6 mt-3">E-mail:
		 <input type="email" name="email" class="form-control" Placeholder="Enter E-mail">
		  </div>
		 <div class="col-md-6 mt-3">Password:
		 <input type="password" name="password" class="form-control" Placeholder="Create Password">
		  </div>
		  <div class="col-md-6 mt-3">Postal Code: 
		 <input type="number" name="postal_code" class="form-control" Placeholder="Enter Postal Code" required>
		 </div>   
		<div class="col-md-6 mt-3">What are you apllying for ?:
		<select required="true" class="form-control category-list" name="service_values">
			<option value="">Select</option>      
		</select>
		</div>
	 </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      
        </div>
    </div>
         </form>  
      </div>
  </div>
</div>
 
<input type="hidden" id="base_url" value="<?php echo $base_url; ?>">
<input type="hidden" id="site_name" value="<?php echo $this->website_name;?>">
<input type="hidden" id="csrf_token" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" id="csrfName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
<input type="hidden" id="csrfHash" value="<?php echo $this->security->get_csrf_hash(); ?>">

<script src="<?php echo $base_url; ?>assets/js/moment.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>

<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/datatables.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/cropper_profile_provider.js"></script>
<script src="<?php echo base_url();?>assets/js/cropper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/script_crop.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
<!-- Sticky Sidebar JS -->
<script src="<?php echo base_url();?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?php echo base_url();?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<!-- Toaster -->
<script src="<?php echo base_url();?>assets/plugins/toaster/toastr.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
		
<script src="https://maps.googleapis.com/maps/api/js?key=<?=$map_key?>&v=3.exp&libraries=places"></script>  
<input type="hidden" id="map_key" name="map_key" value="<?php echo $map_key;?>">
<input type="hidden" id="modules_page" value="<?php echo $module;?>">
<input type="hidden" id="current_page" value="<?php echo $this->uri->segment(1);?>">
	
<?php
	$edit_service=$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
	if($this->uri->segment(1)!='add-service'|| $edit_service!='user/service/edit_service'&&$this->uri->segment(1)!='update_booking'&&$this->uri->segment(1)!='update_booking') {
?>
			<input type="hidden" id="service_location" class="asf">
<?php		
	}
?>

<?php if($module=='service' || $module == 'chat' || $module == 'terms' || $module == 'privacy'){ ?>
			
	<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/tagsinput.js"></script>
	<script src="<?php echo base_url();?>assets/js/service.js?v1.0"></script>

<?php } ?>

<?php if($module=='home') { ?>
	<?php if(!empty($this->uri->segment(1))) { ?>
		<input type='hidden' id='user_address'>
	<?php }?>
	<input type="hidden" id="user_address_values" value="<?=$this->session->userdata('user_address');?>">
	<input type="hidden" id="user_latitude_values" value="<?=$this->session->userdata('user_latitude');?>">
	<input type="hidden" id="user_longitude_values" value="<?=$this->session->userdata('user_longitude');?>">

	<script src="<?php echo base_url();?>assets/js/place.js?v1.04"></script>
<?php } ?>

<script src="<?php echo base_url();?>assets/js/multi-step-modal.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jquery-confirm/jquery-confirm.min.css">
<script src="<?php echo base_url();?>assets/plugins/jquery-confirm/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>assets/js/functions.js?v1.03"></script>
<input type="hidden" id="user_type" value="<?= $this->session->userdata('usertype'); ?>">
		

<!-- login -->
<?php if(empty($this->session->userdata('id'))){?>
	<script src="<?php echo $base_url; ?>assets/js/login.js?v1.02"></script>
<?php }?>

<script src="<?php echo base_url();?>assets/js/script.js?v1.01"></script>

<!-- External js-->
<?php if($this->uri->segment(1)=="user-chat"){ ?>
	<script src="<?php echo $base_url; ?>assets/js/user_chats.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="provider-availability"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/provider_availability.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="provider-bookings"){ ?>
	<script src="<?php echo $base_url; ?>assets/js/provider_bookings.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="provider-settings"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/provider_settings.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="provider-subscription"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/provider_subscription.js?v1.05"></script>
<?php }?>
<?php if($this->uri->segment(1)=="provider-wallet"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/provider_wallet.js?v1.0"></script>
<?php }?>
<?php if($this->uri->segment(1)=="user-bookings"){ ?>
	<script src="<?php echo $base_url; ?>assets/js/user_bookings.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="user-settings"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/user_settings.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="user-wallet"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/user_wallet.js?v1.03"></script>
	<!-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> -->
	<!-- Load the client component. -->
	<!-- <script src="https://js.braintreegateway.com/web/3.60.0/js/client.min.js"></script> -->
	<!-- Load the PayPal Checkout component. -->
	<!-- <script src="https://js.braintreegateway.com/web/3.60.0/js/paypal-checkout.min.js"></script> -->
<?php }?>
<?php if($this->uri->segment(1)=="edit_service"){ ?>
	<script src="<?php echo $base_url; ?>assets/js/edit_service.js"></script>
<?php }?>	
<?php if($this->uri->segment(1)=="all-services" ||$this->uri->segment(1)=="search"){ ?>
	<script src="<?php echo base_url(); ?>assets/js/service_search.js?v1.02"></script>
<?php }?>
<?php if($this->uri->segment(1)=="book-service"){ ?>
 <script src="<?php echo base_url(); ?>assets/js/book_service.js"></script>
<?php }?>
<?php if($this->uri->segment(1)=="verify-payment-method"){ ?>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/verify_payment_method.css">
 	<script src="<?php echo base_url(); ?>assets/js/verify_payment_method.js?v1.01"></script>
<?php }?>
<!---External js end-->

<?php
	$type = $this->session->userdata('usertype');
	$userId = $this->session->userdata('id');

	if ($this->session->userdata('user_select_language') == '') {

    	$lang = $default_language['language_value'];
	} else {
    	$lang = $this->session->userdata('user_select_language');
	}
?>

<?php

	if ($this->session->userdata('user_select_language') == '') {

    	if ($default_language_select['tag'] == 'rtl') {
        
        	echo'<script src="' . base_url() . 'assets/js/app-rtl.js"></script>';
    	}
	} else {
    	if ($this->session->userdata('tag') == 'rtl') {

        	echo'<script src="' . base_url() . 'assets/js/app-rtl.js"></script>';
    	}
	}
?>

<?php 
	if($login_type=='email'){
?>

	<div class="modal account-modal fade" id="tab_login_modal" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger text-center"  id="flash_error_message1" ></div>
					<div id="login_form_div">
						<div class="account-content">
							<div class="account-box">
								<div class="login-right">
									<div class="login-header">
										<h3>Login</h3>
										<p class="text-muted">Access to our <?=settingValue('website_name')?></p>
									</div>
									<div class="form-group">
										<label>Email ID</label>
										<div class="row">
											<div class="col-12">
												<input type="hidden" name="login_mode" id="login_mode" value="1">
												<input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" id="login_csrf">
												<input class="form-control login_email" type="text" name="login_email" id="login_email" placeholder="Enter EMail ID" >
												<span id="mailid_error"></span>
											</div>
										
										</div>
									</div>
									<div class="form-group">
										<label>Password</label>
										<div class="row">
											<div class="col-12">
												<input type="password" class="form-control form-control-lg" autocomplete="off"  placeholder="Enter Password Here.." name="login_password" id='login_password'>
												<span for='otp_number' id='otp_error_msg_login'></span>
											</div>
										</div>
									</div>
									<p class="user_forgot_pwd">Forgot Password ? <a href="#"  id="user_forgot_pwd"> Click to Get Link</a></p>
									<span id="err_respwd"></span>
									<button class="login-btn" id="emailregistration_finals" type="submit">Login</button>
								</div>
							</div>
						</div>
					</div>

					<div class="step-2" data-step="2" id="otp_final_div" >
						<!-- <div class="login-header">
							<h3>Password</h3>
							<p class="text-muted">Verification your account</p>
						</div>
						<div class="form-group">
							<input type="hidden" name="" id="login_email_hide">
							<input type="hidden" name="" id="login_mode_hide">
							<input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" id="fp_csrf">
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-lg" autocomplete="off"  placeholder="Enter Password Here.." name="login_password" id='login_password'>
							<span for='otp_number' id='otp_error_msg_login'></span>
						</div>
						<p class="user_forgot_pwd">Forgot Password ? <a href="#"  id="user_forgot_pwd"> Click to Get Link</a></p>
						<span id="err_respwd"></span>
						<div>
							<button id='emailregistration_finals' type="button" class="login-btn" >Enter</button>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } else { ?>

	<div class="modal account-modal fade" id="tab_login_modal" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger text-center"  id="flash_error_message1" ></div>
					<div id="login_form_div">
						<div class="account-content">
							<div class="account-box">
								<div class="login-right">
									<div class="login-header">
										<h3>Login</h3>
										<p class="text-muted">Access to our <?=settingValue('website_name')?></p>
									</div>
									<div class="form-group">
										<label>Mobile Number</label>
										<div class="row">
											<div class="col-4 pr-0">
												<input type="hidden" name="login_mode" id="login_mode" value="1">
												<input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" id="login_csrf">
												<select name="countryCode" id="login_country_code" class="form-control login_country_code">
													<?php
													foreach ($country_list as $key => $country) { 
														if($country['country_id']=='91'){$select='selected';}else{ $select='';} ?>
														<option <?=$select;?> data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>"><?=$country['country_name'];?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-8">
												<input class="form-control login_mobile" type="text" name="login_mobile" id="login_mobile" placeholder="Enter Mobile No" min="10" max="10">
												<span id="mobile_no_error"></span>
											</div>
										</div>
									</div>
									<button class="login-btn" id="login_submit" type="submit">Login</button>
								</div>
							</div>
						</div>
					</div>

					<div class="step-2" data-step="2" id="otp_final_div" >
						<div class="login-header">
							<h3>OTP</h3>
							<p class="text-muted">Verification your account</p>
						</div>
						<div class="form-group">
							<input type="hidden" name="" id="login_country_code_hide">
							<input type="hidden" name="" id="login_mobile_hide">
							<input type="hidden" name="" id="login_mode_hide">
						</div>
						<div class="form-group">
							<div class="alert alert-success text-center" role="alert">
								<strong>We Have Send SMS Via OTP</strong>
								<strong>Please Check Your Registered Mobile Number </strong>
							</div>
							<?php if(settingValue('default_otp')==1){ ?>
							<div class="alert alert-danger text-center" role="alert">
								We have used default otp for demo purpose.<br> <strong>Default OTP 1234</strong>
							</div>
						<?php }?>
							<input type="text" class="form-control form-control-lg no_only" autocomplete="off" maxlength="4" minlength="4" placeholder="Enter OTP Here.." name="otp_numbers" id='login_otp'>
							<span for='otp_number' id='otp_error_msg_login'></span>
						</div>
						<p class="resend-otp">Didn't receive the OTP? <a href="#" id="login_resend_otp"> Resend OTP</a></p>
						<div>
							<button id='registration_finals' type="button" class="login-btn" >Enter</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<!-- Cancel Modal -->
<div id="cancelModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cancelation Reason</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="cancel_reason"></p>
			</div>
		</div>
	</div>
</div>
<!-- Cancel Modal -->
<span id="success_message"><?php echo $this->session->flashdata('success_message');?></span>
<span id="error_message"><?php echo $this->session->flashdata('error_message');?></span>

<?php
	if(!empty($this->session->flashdata('success_message'))){ ?>
		<script src="<?php echo base_url();?>assets/js/success_toaster.js"></script>
<?php } ?>

<?php
	if(!empty($this->session->flashdata('error_message'))) { 
?>
		<script src="<?php echo base_url();?>assets/js/error_toaster.js"></script>
<?php 
	} 
	$this->session->unset_userdata('error_message');
	$this->session->unset_userdata('success_message');
?>

</body>

</html>
        
<script>
    function change_language(e){
        var lg =  $(e).attr('lang');
        var tag =  $(e).attr('lang_tag'); 
        
        var csrf_token = $('#csrf_lang').val();
        
      	$.post(
      		'<?php echo base_url(); ?>admin/language/change_language',
      		{
      			lg:lg,
      			tag:tag,
                csrf_token_name: csrf_token
      		},
      		function(res){
            location.reload();
        })    

  	}

    function user_currency(code){
        
	    if(code!=""){
	          
	        var csrf_token = $('#csrf_lang').val();
	        $.ajax({
	           type:'POST',
	           url: '<?php echo base_url(); ?>ajax/add_user_currency',
	           data :  {code:code,csrf_token_name: csrf_token},
	           dataType:'json',
	           success:function(response)
	           {  
	             	if(response.success)
	             	{   
	               		location.reload();
	           		}
	           		else {    
	            		location.reload();
	        		}
	    		}
			});
		}
	}
</script>
