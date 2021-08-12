<?php 
$user_id = $this->uri->segment('2');
$user_details = $this->db->where('id',$user_id)->get('users')->row_array();
?>
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Users Details</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body text-center">
						<?php if($user_details['profile_img'] != '')
						{?>
						<img class="rounded-circle img-fluid mb-3" alt="User Image" src="<?php echo $base_url.$user_details['profile_img'] ?>">
						<?php } else { ?>
						<img class="rounded-circle img-fluid mb-3" alt="User Image" src="<?php echo $base_url?>assets/img/user.jpg">
						<?php } ?>
						<h5 class="card-title text-center">
							<span>Account Status</span>
						</h5>
						<?php
						if($user_details['status']==1) {
							$val='checked';
						}
						else {
							$val='';
						}
						?>
						<?php if($user_details['status'] == 1) { ?>
						<button class="btn btn-success" type="button"><i class="fa fa-user-check"></i> Active</button>
						<?php } else { ?>
						<button class="btn btn-danger" type="button"><i class="fa fa-user-check"></i> Inactive</button>
						<?php } ?>
					</div>
				</div>
			</div>
			
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-between">
							<span>Personal Details</span>
						</h5>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
							<p class="col-sm-9"><?php echo $user_details['name']."&nbsp;".$user_details['l_name']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
							<p class="col-sm-9"><?php echo $user_details['email']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
							<p class="col-sm-9"><?php echo $user_details['mobileno']?></p>
						</div>
					</div>
				</div> 
 
				<div class="card">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-between">
							<span>Account Details</span>
						</h5>
						<div class="row">
							<p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Account holder name</p>
							<p class="col-sm-8"><?php echo $user_details['acc_holder_name']?></p>
						</div>
						<div class="row">
							<p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Account Number</p>
							<p class="col-sm-8"><?php echo $user_details['account_number_new']?></p>
						</div>
						<!-- <div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">IBAN Number</p>
							<p class="col-sm-9"><?php echo $user_details['account_iban']?></p>
						</div> -->
						<div class="row">
							<p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Bank Name</p>
							<p class="col-sm-8 mb-0"><?php echo $user_details['bank_name']?></p>
						</div>
						<div class="row">
							<p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Bank Address</p>
							<p class="col-sm-8 mb-0"><?php echo $user_details['bank_address']?></p>
						</div>
						<div class="row">
							<p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Sort Code</p>
							<p class="col-sm-8 mb-0"><?php echo $user_details['sort_code']?></p>
						</div>
						<div class="row">
							<p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Swift Code</p>
							<p class="col-sm-8 mb-0"><?php echo $user_details['swost_code']?></p>
						</div>
						<!-- <div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">IFSC Code</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['account_ifsc']?></p>
						</div> -->
					</div>
				</div> 
			
			</div> </div>
<?php if ($user_details['you_are_appling_as']==1 || $user_details['you_are_appling_as']==2 || $user_details['you_are_appling_as']==3 || $user_details['you_are_appling_as']==4 || $user_details['you_are_appling_as']==5 || $user_details['you_are_appling_as']==6 || $user_details['you_are_appling_as']==7) { ?>
			<div class="card">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-between">
							<span>Need to know of about you.</span>
						</h5>
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">How many years of paid experience do you have?</p>
							<p class="col-sm-6">
								<?php 
if ($user_details['how_many_years_of_paid_experience_do_you_have']==1) {
	echo "None  ";
}
if ($user_details['how_many_years_of_paid_experience_do_you_have']==2) {
	echo "3 months";
}
if ($user_details['how_many_years_of_paid_experience_do_you_have']==3) {
	echo "6 months ";
}
if ($user_details['how_many_years_of_paid_experience_do_you_have']==4) {
	echo "9 months ";
}
if ($user_details['how_many_years_of_paid_experience_do_you_have']==5) {
	echo "12 months ";
}
if ($user_details['how_many_years_of_paid_experience_do_you_have']==6) {
	echo "1 year & above";
}
							?></p>
						</div>
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Provide proof of qualification obtained choose to do your job and upload.</p>
<p class="col-sm-6">

<?php
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==1) {
	echo "Self-taught ";
}
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==2) {
	echo "NVQ";
}
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==3) {
	echo "GCE";
}
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==4) {
	echo "College degree";
}
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==5) {
	echo "University degree";
}
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==6) {
	echo "HND";
}
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==7) {
	echo "Vocational qualification";
} 
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==8) {
	echo "I don't have any qualifications.";
} 
if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==9) {
	echo "Other";
} 

?>

<?php if ($user_details['provide_proof_of_qualification_obtained_choose_to_do_your_job_an']==9) { ?>

<?php echo " => ".$user_details['name_provide_proof_of_qualification_obtained_choose_to_do_your_j']?>

	&nbsp; &nbsp; &nbsp; &nbsp;

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_qualification_obtained_choose_to_do_your_j']?>" target="blank">View file</a>

<?php }elseif (!$user_details['file_provide_proof_of_qualification_obtained_choose_to_do_your_j']=="") { ?>

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_qualification_obtained_choose_to_do_your_j']?>" target="blank">View file</a>

<?php } ?>
  
</p>
						</div>
						<!-- <div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">IBAN Number</p>
							<p class="col-sm-9"><?php echo $user_details['account_iban']?></p>
						</div> -->
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">What supplies do you have? Check all that apply.</p>
							<p class="col-sm-6 mb-0"><?php
	$what_supplies_do_you_have_check_all_that_apply = $user_details['what_supplies_do_you_have_check_all_that_apply'];
	$dataa = (explode(",",$what_supplies_do_you_have_check_all_that_apply));
	foreach ($dataa as $value) {
		if ($value==1) {
			echo "Basic tools (drill, wrench, hammer, level, etc.)<br>";
		}
		if ($value==2) {
			echo "Power tools (circular/table saw, nail gun, shop vac, etc.)<br>";
		}
		if ($value==3) {
			echo "Painting supplies (roller, brush, drop cloth, tape, etc.)<br>";
		}
		if ($value==4) {
			echo "Lawn care equipment (mower, leaf blower, string trimmer, hand tools, etc.)<br>";
		}
		if ($value==5) {
			echo "Ladder";
		}
	}
							?></p>
						</div>
						<div class="mt-3 row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Are you legally eligible to work in the county you are current in?</p>
							<p class="col-sm-6 mb-0"><?php echo $user_details['are_you_legally_eligible_to_work_in_the_current']?></p>
						</div>
						
					</div>
				</div>
				<?php } ?>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-between">
							<span>ID verification.</span>
						</h5>
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Provide proof of photo ID you must choose at least one from the list and upload.</p>
<p class="col-sm-6">

<?php
if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==1) {
	echo "Passport ";
}
if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==2) {
	echo "Driving licence";
}
if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==3) {
	echo "Biometric card";
}
if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==4) {
	echo "ID card";
}
if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==5) {
	echo "Resident permit";
}
if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==6) {
	echo "Other";
} 

?>

<?php if ($user_details['provide_proof_of_photo_id_you_must_choose_at_least_one_from']==6) { ?>

<?php echo " => ".$user_details['name_provide_proof_of_photo_id_you_must_choose_at_least_one_from']?>

	&nbsp; &nbsp; &nbsp; &nbsp;

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_photo_id_you_must_choose_at_least_one_from']?>" target="blank">View file</a>

<?php }elseif (!$user_details['file_provide_proof_of_photo_id_you_must_choose_at_least_one_from']=="") { ?>

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_photo_id_you_must_choose_at_least_one_from']?>" target="blank">View file</a>

<?php } ?>
  
</p>
						</div>
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Provide proof of right to work in your country you select a minimum of one and upload.</p>
<p class="col-sm-6">

<?php
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==1) {
	echo "National Insurance  ";
}
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==2) {
	echo "Passport";
}
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==3) {
	echo "Driving licence";
}
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==4) {
	echo "Biometric card";
}
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==5) {
	echo "ID card";
}
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==6) {
	echo "Resident permit";
}
if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==7) {
	echo "Other";
} 

?>

<?php if ($user_details['provide_proof_of_right_to_work_in_your_country_you_select_a_mini']==7) { ?>

<?php echo " => ".$user_details['name_provide_proof_of_right_to_work_in_your_country_you_select_a']?>

	&nbsp; &nbsp; &nbsp; &nbsp;

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_right_to_work_in_your_country_you_select_a']?>" target="blank">View file</a>

<?php }elseif (!$user_details['file_provide_proof_of_right_to_work_in_your_country_you_select_a']=="") { ?>

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_right_to_work_in_your_country_you_select_a']?>" target="blank">View file</a>

<?php } ?>
  
</p>
						</div>
						<!-- <div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">IBAN Number</p>
							<p class="col-sm-9"><?php echo $user_details['account_iban']?></p>
						</div> -->
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Provide proof of homes address Must be less than 3 months old from the date of issue</p>
<p class="col-sm-6">

<?php
if ($user_details['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==1) {
	echo "Telephone Bill  ";
}
if ($user_details['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==2) {
	echo "Gas or electric bill";
}
if ($user_details['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==3) {
	echo "Bank statement";
}
if ($user_details['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==4) {
	echo "Letter from the government or school";
}
if ($user_details['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==5) {
	echo "Other";
} 

?>

<?php if ($user_details['provide_proof_of_homes_address_must_be_less_than_3_months_old_fr']==5) { ?>

<?php echo " => ".$user_details['name_provide_proof_of_homes_address_must_be_less_than_3_months_o']?>

	&nbsp; &nbsp; &nbsp; &nbsp;

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_homes_address_must_be_less_than_3_months_o']?>" target="blank">View file</a>

<?php }elseif (!$user_details['file_provide_proof_of_homes_address_must_be_less_than_3_months_o']=="") { ?>

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_provide_proof_of_homes_address_must_be_less_than_3_months_o']?>" target="blank">View file</a>

<?php } ?>
  
</p>
						</div>
						<div class="row">
							<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">For business only</p>
<p class="col-sm-6">

<?php
if ($user_details['for_business_only']==1) {
	echo "Company registration number  ";
}
if ($user_details['for_business_only']==2) {
	echo "Company registration document";
}
if ($user_details['for_business_only']==3) {
	echo "Business insurance";
}
if ($user_details['for_business_only']==4) {
	echo "Method statement";
}
if ($user_details['for_business_only']==5) {
	echo "Proof of trading address";
}
if ($user_details['for_business_only']==6) {
	echo "The ID of the responsible individual";
}
if ($user_details['for_business_only']==7) {
	echo "provide website link if any";
}
if ($user_details['for_business_only']==8) {
	echo "Other";
} 

?>

<?php if ($user_details['for_business_only']==8) { ?>

<?php echo " => ".$user_details['name_for_business_only']?>

	&nbsp; &nbsp; &nbsp; &nbsp;

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_for_business_only']?>" target="blank">View file</a>

<?php }elseif (!$user_details['file_for_business_only']=="") { ?>

	<a class="btn btn-warning" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['file_for_business_only']?>" target="blank">View file</a>

<?php } ?>
  
</p>
						</div>
						<div class="row">
							<p class="mt-3 col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">the must current photo</p>
&nbsp; &nbsp; &nbsp; &nbsp;
<?php if (!$user_details['upload_the_must_current_photo_of_you']=="") { ?>

	<a class="btn btn-warning mt-3" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['upload_the_must_current_photo_of_you']?>" target="blank">View file</a>

<?php } ?>
						</div>
						<div class="row">
							<p class="mt-3 col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Facial Video verification is a must</p>
&nbsp; &nbsp; &nbsp; &nbsp;
<?php if (!$user_details['facial_video_verification_is_a_must']=="") { ?>

	<a class="btn btn-warning mt-3" href="<?php echo base_url(); ?>assets/img/<?php echo $user_details['facial_video_verification_is_a_must']?>" target="blank">View file</a>

<?php } ?>
						</div>
						<!-- <div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">IFSC Code</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['account_ifsc']?></p>
						</div> -->
					</div>
				</div>                      
			
		</div>
	</div>
</div>