<div class="page-wrapper">
    <div class="content container">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Employee View</h3>
                </div>
                
            </div>
        </div>
        <!-- /Page Header -->


        <div class="row pricing-box">

            <?php

		   $id = $_GET['id'];

		   $query = $this->db->query('SELECT * FROM tbl_yourself WHERE id='.$id);

           $result = $query->result(); 
          //$qqqq = 
           $row = $result['0'];

			?>

            <!-- <form> -->

               <form id="update_user" action="<?php echo base_url()?>second_form" method="POST" enctype="multipart/form-data" novalidate class="multisteps-form__form">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />


              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
              
                <div class="multisteps-form__content">

                  <h4 class="mb-5"><strong>Personal Details</strong></h4>
<h3><strong>Mailing Address</strong></h3>
          <div class="row">
                  <div class="col-xl-6">
                    <h5 class="form-title font-weight-bold">Street Address</h5>
                    <input type="text" name="street_address" value="<?php echo $row->street_address; ?>" placeholder="Enter Street Address" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-3">
                    <h5 class="form-title font-weight-bold">Apt # (optional)</h5>
                    <input type="text" name="apt" value="<?php echo $row->apt; ?>" placeholder="Enter Apt # (optional)" class="form-control border-dark">
                  </div> 


                  <div class="col-xl-6 mt-3">
                    <h5 class="form-title font-weight-bold">City </h5>
                    <input type="text" name="city" value="<?php echo $row->city; ?>" placeholder="Enter City" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-3 mt-3">
                    <h5 class="form-title font-weight-bold">Province</h5>
                    <input type="text" name="province" value="<?php echo $row->province; ?>" placeholder="Enter Province" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-3 mt-3">
                    <h5 class="form-title font-weight-bold">Postal Code</h5>
                    <input type="number" name="postal_code" value="<?php echo $row->postal_code; ?>" placeholder="Enteer Postal Code" class="form-control border-dark">
                  </div>        
   

<h4 class="col-xl-12 mt-5 mb-5"><strong>Work Experience</strong></h4>
<h3 class="col-xl-12 mb-2"><strong>What types of jobs would you like to see?</strong></h3>
<p class="col-xl-12">Note: We may show you more.</p>

 <!-- <div class="form-row"> -->
  <div class="col-9">

    <div class="row">

<?php $aaa = explode(',', $row->what_types_of_jobs_would_you_like_to_see);
$z=1;
foreach ($aaa as $value) {
 ?>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-<?php echo $z; ?>" value="<?php echo $value; ?>" checked="">
          <label class="custom-control-label" for="checkbox-<?php echo $z; ?>"><?php echo $value; ?></label>
        </div>
    </div>
 <?php $z++; } ?>


  </div>
</div> 

</div>
<h3 class="mt-5"><strong>How many years of paid experience do you have?</strong></h3>
<div class="row">
                  <div class="col-xl-9">
                    <select required="true" name="work_experience" class="form-control border-dark">
                        <option disabled="disabled" value="">Select</option>
                        <option <?php if ($row->work_experience=="0 - 6 months") {
                        	echo 'selected="selected"' ;
                        } ?> value="0 - 6 months">0 - 6 months</option>
                        <option <?php if ($row->work_experience=="6 months - 1 year") {
                        	echo 'selected="selected"' ;
                        } ?> value="6 months - 1 year">6 months - 1 year</option>
                        <option <?php if ($row->work_experience=="1 year - 3 years") {
                        	echo 'selected="selected"' ;
                        } ?> value="1 year - 3 years">1 year - 3 years</option>

                        <option <?php if ($row->work_experience=="3 years - 5 years") {
                        	echo 'selected="selected"' ;
                        } ?> value="3 years - 5 years">3 years - 5 years</option>

                        <option <?php if ($row->work_experience=="5+ years") {
                        	echo 'selected="selected"' ;
                        } ?> value="5+ years">5+ years</option>
                    </select>
                  </div> 




</div>
<div class="row">
<h3 class="col-xl-12 mt-5 mb-2"><strong>What are you applying as or for? You can ONLY pick ONE.</strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">

    <div class="row">

<?php $aaa = explode(',', $row->what_are_you_applying_as_or_for_you_can_only_pick_one);
$z=111;
foreach ($aaa as $value) { 
 ?>

     <div class="col-12">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_are_you_applying_as_or_for_you_can_only_pick_one[]" class="custom-control-input" id="checkbox-<?php echo $z; ?>" value="<?php echo $value; ?>" checked="">
          <label class="custom-control-label" for="checkbox-<?php echo $z; ?>"><?php echo $value; ?></label>
        </div>
    </div>
 <?php $z++; } ?>


  <!-- </div> -->

</div>
</div>

<h3 class="col-xl-12 mt-5 mb-2"><strong>What are the areas would you like to work in? as them to select</strong></h3>

  <div class="col-9"> 

    <div class="row">


<?php $aaa = explode(',', $row->what_are_the_areas_would_you_like_to_work_in_as_them_to_select);
$z=1112;
foreach ($aaa as $value) { 
 ?>

     <div class="col-12">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_are_the_areas_would_you_like_to_work_in_as_them_to_select[]" class="custom-control-input" id="checkbox-<?php echo $z; ?>" value="<?php echo $value; ?>" checked="">
          <label class="custom-control-label" for="checkbox-<?php echo $z; ?>"><?php echo $value; ?></label>
        </div>
    </div>
 <?php $z++; } ?>


</div>
</div>
  <!-- </div> -->
  <div class="row">
    <h3 class="col-xl-12 mt-5 "><strong>Employment History</strong></h3>
    <div class="col-xl-12 exp-note mb-4">
Note: Only complete this if applying as an employee.
</div>
  </div>
    <div class="row">

                  <div class="col-xl-7 mb-3">
                    <h5 class="form-title font-weight-bold"> Current or Most Recent Company Name:</h5>
                    <input type="text" name="most_recent_company" value="<?php echo $row->most_recent_company; ?>" placeholder="Enter Current or Most Recent Company Name" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-6">
                    <h5 class="form-title font-weight-bold"> Address:</h5>
                    <input type="text" name="most_address_company" value="<?php echo $row->most_address_company; ?>" placeholder="Enter Address" class="form-control border-dark">
                  </div>  
                  <div class="col-xl-6">
                    <h5 class="form-title font-weight-bold"> Salary/ Wage:</h5>
                    <input type="number" name="salary_wage" value="<?php echo $row->salary_wage; ?>" placeholder="Enter Salary/ Wage:" class="form-control border-dark">
                  </div>  

                  <div class="col-xl-12 mt-3">
                    <h5 class="form-title font-weight-bold"> From:</h5>
                  </div>
                  <div class="col-xl-5">
                    <input type="numbers" name="company_from" value="<?php echo $row->company_from; ?>" placeholder="Enter Address" class="form-control border-dark">
                  </div> 
                  To:
                  <div class="col-xl-5">
                    <input type="numbers" name="company_to" value="<?php echo $row->company_to; ?>" placeholder="Enter Address" class="form-control border-dark">
                  </div> 
                </div>
<div class="row">
                  <h3 class="col-xl-12 mt-5"><strong>How many years of paid experience do you have?</strong></h3>

                  <div class="col-xl-7">
                    <select required="true" name="how_many_years_of_paid_experience_do_you_have" class="form-control border-dark" id="colorselector">

                        <option disabled="disabled" value="">Select</option>

                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="1") {
                        	echo 'selected="selected"' ;
                        } ?>  value="1">Self-taught </option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="2") {
                        	echo 'selected="selected"' ;
                        } ?>  value="2">NVQ</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="3") {
                        	echo 'selected="selected"' ;
                        } ?>  value="3">GCE</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="4") {
                        	echo 'selected="selected"' ;
                        } ?>  value="4">College degree</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="5") {
                        	echo 'selected="selected"' ;
                        } ?>  value="5">University degree</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="6") {
                        	echo 'selected="selected"' ;
                        } ?>  value="6">HND</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="7") {
                        	echo 'selected="selected"' ;
                        } ?>  value="7">Vocational qualification</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="8") {
                        	echo 'selected="selected"' ;
                        } ?>  value="8">I don't have any qualifications.</option>
                        <option <?php if ($row->how_many_years_of_paid_experience_do_you_have=="9") {
                        	echo 'selected="selected"' ;
                        } ?>  value="9">Others</option>
                    </select>
                  </div> 
                  
                 <div class="col-xl-6 mt-3 colors_bb" <?php if (!$row->how_many_years_of_paid_experience_do_you_have=="9") {
                        	echo 'style="display:none"' ;
                        } ?> id="9"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_how_many_years_of_paid_experience_do_you_have" value="<?php echo $row->name_how_many_years_of_paid_experience_do_you_have; ?>" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_how_many_years_of_paid_experience_do_you_have" value="" placeholder="Enter Address" class="form-control border-dark">
                    <?php if (!$row->file_how_many_years_of_paid_experience_do_you_have=='') {  ?>
                   <a class="btn btn-warning text-light" target="blank" href="<?php echo base_url().'assets/img/'.$row->file_how_many_years_of_paid_experience_do_you_have; ?>">View File</a>
                    <!-- <img src="<?php echo base_url().'assets/img/'.$row->file_how_many_years_of_paid_experience_do_you_have; ?>" alt="" width="200px" height="200px"> -->
                    <?php } ?>
                  
                </div> 

</div>
<div class="row">

                 <div class="col-xl-6 mt-5"> 
                  <br>
                    <h5 class="form-title font-weight-bold">Qualification Relevant to job applied for:</h5>
                    <input type="text" name="relevant_to_applied" value="<?php echo $row->relevant_to_applied; ?>" placeholder="Enter Relevant to job applied" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-5"> 
                    <h5 class="form-title font-weight-bold">Member of Professional Body,
PIN number & Expiry date,
Certificates obtained:</h5>
                    <input type="text" name="member_certificate" value="<?php echo $row->member_certificate; ?>" placeholder="Enter Relevant to job applied" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold">What skills and special experience do you have that will help with this position?</h5>
                    <input type="text" name="skills_special" value="<?php echo $row->skills_special; ?>" placeholder="Enter skills and special experience" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold">Why are you applying for this job? and, give an example where you have worked on a similar role:</h5>
                    <input type="text" name="worked_similar" value="<?php echo $row->worked_similar; ?>" placeholder="Enter you applying for this job?" class="form-control border-dark">
                  
                </div>

              </div> 

<div class="row">
<h3 class="mt-5"><strong>What supplies do you have? Check all that apply.</strong></h3>
</div>
<div class="row">  


<?php $aaa = explode(")", $row->what_supplies_do_you_have_check_all_that_apply);
$z=11123;
foreach ($aaa as $value) { 
 ?>

     <div class="col-12">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_supplies_do_you_have_check_all_that_apply[]" class="custom-control-input" id="checkbox-<?php echo $z; ?>" value="<?php echo $value; ?>" checked="">
          <label class="custom-control-label" for="checkbox-<?php echo $z; ?>"><?php echo $value; ?></label>
        </div>
    </div>
 <?php $z++; } ?>



</div>
</div>
<div class="row">
<h3 class="mt-5"><strong>Are you legally eligible to work in the United Kingdom?</strong></h3>
</div>
<div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_legally_eligible_to_work_in_the_united_kingdom" class="custom-control-input" id="checkbox-24" value="Yes" <?php if ($row->are_you_legally_eligible_to_work_in_the_united_kingdom=="Yes") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-24">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_legally_eligible_to_work_in_the_united_kingdom" class="custom-control-input" id="checkbox-25" value="No" <?php if ($row->are_you_legally_eligible_to_work_in_the_united_kingdom=="No") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-25">No</label>
            </div>
          </div>
          
</div>

                  <!-- <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div> -->
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                
                <div class="multisteps-form__content">
                  
                  <h3 class="col-xl-12 mt-5 mb-2"><strong>ID verification. </strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Provide proof of photo ID you must choose at least one from the list and upload.</h3>

                  <div class="col-xl-7">
                    <select required="true" name="provide_proof_of_photo_id_you_must_choose_at_least_one_from_the_list_and_upload" class="form-control border-dark" id="colorselector1">
                        <option disabled="disabled" value="">Select</option>
                        <option <?php if ($row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="1") {
                        	echo 'selected="selected"' ;
                        } ?> value="1">Passport </option>
                        <option <?php if ($row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="2") {
                        	echo 'selected="selected"' ;
                        } ?> value="2">Driving licence</option>
                        <option <?php if ($row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="3") {
                        	echo 'selected="selected"' ;
                        } ?> value="3">Biometric card</option>
                        <option <?php if ($row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="4") {
                        	echo 'selected="selected"' ;
                        } ?> value="4">ID card</option>
                        <option <?php if ($row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="5") {
                        	echo 'selected="selected"' ;
                        } ?> value="5">Resident permit.</option>

                        <option <?php if ($row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="6") {
                        	echo 'selected="selected"' ;
                        } ?> value="6">Other</option>
                    </select>
                  </div> 
 
                 <div class="col-xl-6 mt-3 colors_bb1" <?php if (!$row->provide_proof_of_photo_id_you_must_choose_at_least_one_from_the=="6") {
                        	echo 'style="display:none"' ;
                        } ?> id="6"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_provide_proof_of_photo_id_you_must_choose_at_least_one_from_the_list_and_upload" value="<?php echo $row->name_provide_proof_of_photo_id_you_must_choose_at_least_one_from; ?>" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_provide_proof_of_photo_id_you_must_choose_at_least_one_from_the_list_and_upload" value="" placeholder="Enter Address" class="form-control border-dark">

                    <?php if (!$row->file_provide_proof_of_photo_id_you_must_choose_at_least_one_from=='') {  ?>
 				<a class="btn btn-warning text-light" target="blank" href="<?php echo base_url().'assets/img/'.$row->file_provide_proof_of_photo_id_you_must_choose_at_least_one_from; ?>">View File</a>
                    <!-- <img src="<?php echo base_url().'assets/img/'.$row->file_provide_proof_of_photo_id_you_must_choose_at_least_one_from; ?>" alt="" width="200px" height="200px"> -->
                    <?php } ?>
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold"> Provide proof of right to work in your country you select a minimum of one and upload.</h3>

                  <div class="col-xl-7">
                    <select required="true" name="provide_proof_of_right_to_work_in_your_country_you_select_a_minimum_of_one_and_upload" class="form-control border-dark" id="colorselector27">
                        <option disabled="disabled" value="">Select</option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="1") {
                        	echo 'selected="selected"' ;
                        } ?>  value="1">National Insurance </option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="2") {
                        	echo 'selected="selected"' ;
                        } ?>  value="2">Passport</option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="3") {
                        	echo 'selected="selected"' ;
                        } ?>  value="3">Driving licence</option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="4") {
                        	echo 'selected="selected"' ;
                        } ?>  value="4">Biometric card</option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="5") {
                        	echo 'selected="selected"' ;
                        } ?>  value="5">ID card</option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="6") {
                        	echo 'selected="selected"' ;
                        } ?>  value="6">Resident permit</option>
                        <option <?php if ($row->provide_proof_of_right_to_work_in_your_country_you_select_a_mini=="7") {
                        	echo 'selected="selected"' ;
                        } ?>  value="7">Other</option>
                    </select>
                  </div> 
               
                 <div class="col-xl-6 mt-3 colors_bb27" <?php if (!$row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="7") {
                        	echo 'style="display:none"' ;
                        } ?> id="7"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_provide_proof_of_right_to_work_in_your_country_you_select_a_minimum_of_one_and_upload" value="<?php echo $row->name_provide_proof_of_right_to_work_in_your_country_you_select_a; ?>" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_provide_proof_of_right_to_work_in_your_country_you_select_a_minimum_of_one_and_upload" value="" placeholder="Enter Address" class="form-control border-dark">
                    <?php if (!$row->file_provide_proof_of_right_to_work_in_your_country_you_select_a=='') {  ?>
                    <a class="btn btn-warning text-light" target="blank" href="<?php echo base_url().'assets/img/'.$row->file_provide_proof_of_right_to_work_in_your_country_you_select_a; ?>">View File</a>
                    <!-- <img src="<?php echo base_url().'assets/img/'.$row->file_provide_proof_of_right_to_work_in_your_country_you_select_a; ?>" alt="" width="200px" height="200px"> -->
                    <?php } ?>
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Provide proof of homes address Must be less than 3 months old from the date of issue</h3>

                  <div class="col-xl-7">
                    <select required="true" name="provide_proof_of_homes_address_must_be_less_than_3_months_old_from_the_date_of_issue" class="form-control border-dark" id="colorselector2">
                        <option disabled="disabled" value="">Select</option>
                        <option <?php if ($row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="1") {
                        	echo 'selected="selected"' ;
                        } ?>  value="1">Telephone Bill </option>
                        <option <?php if ($row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="2") {
                        	echo 'selected="selected"' ;
                        } ?>  value="2">Gas or electric bill</option>
                        <option <?php if ($row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="3") {
                        	echo 'selected="selected"' ;
                        } ?>  value="3">Bank statement</option>
                        <option <?php if ($row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="4") {
                        	echo 'selected="selected"' ;
                        } ?>  value="4">Letter from the government or school</option>
                        <option <?php if ($row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="5") {
                        	echo 'selected="selected"' ;
                        } ?>  value="5">Other</option>
                    </select>

                  </div> 

                  <div class="col-xl-6 mt-3 colors_bb2" <?php if (!$row->provide_proof_of_homes_address_must_be_less_than_3_months_old_fr=="5") {
                        	echo 'style="display:none"' ;
                        } ?>  id="5"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_provide_proof_of_homes_address_must_be_less_than_3_months_old_from_the_date_of_issue" value="<?php echo $row->name_provide_proof_of_homes_address_must_be_less_than_3_months_o; ?>" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_provide_proof_of_homes_address_must_be_less_than_3_months_old_from_the_date_of_issue" value="" placeholder="Enter Address" class="form-control border-dark">
                    <?php if (!$row->file_provide_proof_of_homes_address_must_be_less_than_3_months_o=='') {  ?>
                   <a class="btn btn-warning text-light" target="blank" href="<?php echo base_url().'assets/img/'.$row->file_provide_proof_of_homes_address_must_be_less_than_3_months_o; ?>">View File</a>
                    <!-- <img src="<?php echo base_url().'assets/img/'.$row->file_provide_proof_of_homes_address_must_be_less_than_3_months_o; ?>" alt="" width="200px" height="200px"> -->
                    <?php } ?>
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">For business only</h3>

                  <div class="col-xl-7">
                    <select required="true" name="for_business_only" class="form-control border-dark" id="colorselector4">
                        <option disabled="disabled" value="">Select</option>
                        <option <?php if ($row->for_business_only=="1") {
                        	echo 'selected="selected"' ;
                        } ?>  value="1">Company registration number </option>
                        <option <?php if ($row->for_business_only=="2") {
                        	echo 'selected="selected"' ;
                        } ?>  value="2">Company registration document</option>
                        <option <?php if ($row->for_business_only=="3") {
                        	echo 'selected="selected"' ;
                        } ?>  value="3">Business insurance</option>
                        <option <?php if ($row->for_business_only=="4") {
                        	echo 'selected="selected"' ;
                        } ?>  value="4">Method statement</option>
                        <option <?php if ($row->for_business_only=="5") {
                        	echo 'selected="selected"' ;
                        } ?>  value="5">Proof of trading address</option>
                        <option <?php if ($row->for_business_only=="6") {
                        	echo 'selected="selected"' ;
                        } ?>  value="6">The ID of the responsible individual</option>
                        <option <?php if ($row->for_business_only=="7") {
                        	echo 'selected="selected"' ;
                        } ?>  value="7">provide website link if any</option>
                        <option <?php if ($row->for_business_only=="8") {
                        	echo 'selected="selected"' ;
                        } ?>  value="8">Other</option>
                    </select>
                  </div> 

          <div class="col-xl-6 mt-3 colors_bb4" <?php if (!$row->for_business_only=="8") {
                        	echo 'style="display:none"' ;
                        } ?>  id="8"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_for_business_only" value="<?php echo $row->name_for_business_only; ?>" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_for_business_only" value="" placeholder="Enter Address" class="form-control border-dark">
                    <?php if (!$row->file_for_business_only=='') {  ?>
                    	<a class="btn btn-warning text-light" target="blank" href="<?php echo base_url().'assets/img/'.$row->file_for_business_only; ?>">View File</a>
                     <!-- <img src="<?php echo base_url().'assets/img/'.$row->file_for_business_only; ?>" alt="" width="200px" height="200px"> -->
               	    <?php } ?>
                  
                </div> 

</div>
 <div class="row">
             <h4 class="col-xl-12 mb-5"><strong></strong></h4>
<h3 class="col-xl-12 mb-2"><strong>Please upload the must current photo which will be used to send to clients for recognition and identification.  </strong></h3>
<p class="col-xl-12">Note: This photo must be very clear with all your face clearly showing it must be from your chest level upwards.</p>
                 <div class="col-xl-6">
                    <input type="file" name="file_please_upload_the_must_current_photo_which_will_be_used_to_send_to_clients_for_recognition_and_identification" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div>
</div>

               
                  <!-- <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div> -->
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                
                <div class="multisteps-form__content">

                  <h3 class="col-xl-12 mt-5 mb-2"><strong>Background checks:  </strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Have you ever been or are you currently going? through any investigation or disciplinary action? </h3>
</div>
 <div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="Have_you_ever_been_or_are_you_currently_going_through_any_investigation_or_disciplinary_action" class="custom-control-input" id="checkbox-26" value="Yes" <?php if ($row->Have_you_ever_been_or_are_you_currently_going_through_any_invest=="Yes") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-26">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="Have_you_ever_been_or_are_you_currently_going_through_any_investigation_or_disciplinary_action" class="custom-control-input" id="checkbox-27" value="No">
              <label class="custom-control-label" for="checkbox-27" <?php if ($row->Have_you_ever_been_or_are_you_currently_going_through_any_invest=="No") {
                        	echo 'checked="checked"' ;
                        } ?> >No</label>
            </div>
          </div>
          
</div>

</div> 
 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Have you been dismissed from any employment? Or lost contract </h3>
</div>
 <div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="have_you_been_dismissed_from_any_employment_or_lost_contract" class="custom-control-input" id="checkbox-28" value="Yes" <?php if ($row->have_you_been_dismissed_from_any_employment_or_lost_contract=="Yes") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-28">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="have_you_been_dismissed_from_any_employment_or_lost_contract" class="custom-control-input" id="checkbox-29" value="No" <?php if ($row->have_you_been_dismissed_from_any_employment_or_lost_contract=="No") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-29">No</label>
            </div>
          </div>
          
</div>

</div> 
 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Do you have any spent/unspent convictions or cautions under The Rehabilitation of Offenders Act 1974? </h3>
</div>
 <div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="do_you_have_any_spent_unspent_convictions_or_cautions_under_the_rehabilitation_of_offenders_act_1974" class="custom-control-input" id="checkbox-30" value="Yes" <?php if ($row->do_you_have_any_spent_unspent_convictions_or_cautions_under_the_=="Yes") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-30">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="do_you_have_any_spent_unspent_convictions_or_cautions_under_the_rehabilitation_of_offenders_act_1974" class="custom-control-input" id="checkbox-31" value="No" <?php if ($row->do_you_have_any_spent_unspent_convictions_or_cautions_under_the_=="No") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-31">No</label>
            </div>
          </div>
          
</div>

</div> 
 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Are you facing any criminal prosecutions?  </h3>
</div>
 <div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_facing_any_criminal_prosecutions" class="custom-control-input" id="checkbox-32" value="Yes" <?php if ($row->are_you_facing_any_criminal_prosecutions=="Yes") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-32">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_facing_any_criminal_prosecutions" class="custom-control-input" id="checkbox-33" value="No" <?php if ($row->are_you_facing_any_criminal_prosecutions=="No") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-33">No</label>
            </div>
          </div>
          
</div>

</div> 
 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">If business has any of your director been disqualify as a director for the last 5 years </h3>
</div>
 <div class="row">   
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input value="1" type="radio" name="cars1" class="custom-control-input" id="checkbox-34" <?php if ($row->if_business_has_any_of_your_director_been_disqualify_as_a_direct=="1") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-34">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input value="0" type="radio" name="cars1" class="custom-control-input" id="checkbox-35" <?php if ($row->if_business_has_any_of_your_director_been_disqualify_as_a_direct=="0") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-35">No</label>
            </div>
          </div>
          <div class="col-xl-7 mt-3 colors_bb3 desc1" <?php if (!$row->if_business_has_any_of_your_director_been_disqualify_as_a_direct=="1") {
                        	echo 'style="display:none"' ;
                        } ?>  id="Cars11"> 
                  <!--   <h5 class="form-title font-weight-bold"> Please add name:</h5> -->
                    <input type="text" name="name_if_business_has_any_of_your_director_been_disqualify_as_a_director_for_the_last_5_years" value="<?php echo $row->name_if_business_has_any_of_your_director_been_disqualify_as_a_d; ?>" placeholder="Please Enter" class="form-control border-dark">
                  
           </div>
          
</div>

</div> 
 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Has any of them been made bankrupt, CCJ and or insolvency.  </h3>
</div>
 <div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input value="1" type="radio" name="cars" class="custom-control-input" id="checkbox-36" <?php if ($row->has_any_of_them_been_made_bankrupt_and_or_insolvency=="1") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-36">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input value="0" type="radio" name="cars" class="custom-control-input" id="checkbox-37" <?php if ($row->has_any_of_them_been_made_bankrupt_and_or_insolvency=="0") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-37">No</label>
            </div>
          </div>
          <div class="col-xl-7 mt-3 colors_bb3 desc" <?php if (!$row->has_any_of_them_been_made_bankrupt_and_or_insolvency=="1") {
                        	echo 'style="display:none"' ;
                        } ?>  id="Cars1"> 
                  <!--   <h5 class="form-title font-weight-bold"> Please add name:</h5> -->
                    <input type="text" name="name_has_any_of_them_been_made_bankrupt_and_or_insolvency" value="<?php echo $row->name_has_any_of_them_been_made_bankrupt_and_or_insolvency; ?>" placeholder="Please Enter" class="form-control border-dark">
                  
           </div>
          
</div>

</div>
                 
                  <!-- <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div> -->
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                
                <div class="multisteps-form__content">
                  

                  <h3 class="col-xl-12 mt-5 mb-2"><strong>Scheduling And Interview :  </strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">
 
<!--  <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Have you ever been or are you currently going? through any investigation or disciplinary action? </h3>
</div> -->
<div class="row">
     <div class="col-xl-8 mt-3">
        <input type="datetime-local" name="scheduling_and_interview" value="<?php echo $row->scheduling_and_interview; ?>" placeholder="Enter" class="form-control border-dark">
     </div>        
</div>
</div>
<h3 class="col-xl-12 mt-5 font-weight-bold">Please provide 1 or references maybe current or past employer or business that you have done business with.</h3>
        <div class="row">

            <div class="col-md-6 mt-3 font-weight-bold">Name:
              <input value="<?php echo $row->name_provide1; ?>" type="text" name="name_provide1" class="form-control border-dark" Placeholder="Enter First Name" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Mobile Number:
              <input value="<?php echo $row->phone_provide1; ?>" type="number" name="phone_provide1" class="form-control border-dark" Placeholder="Enter Mobile Number" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Business Address:
              <input value="<?php echo $row->address_provide1; ?>" type="text" name="address_provide1" class="form-control border-dark" Placeholder="Enter Business Address" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">E-mail Address :
              <input value="<?php echo $row->email_provide1; ?>" type="email" name="email_provide1" class="form-control border-dark" Placeholder="Enter E-mail Address">
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Position In The Company :
              <input value="<?php echo $row->position_company_provide1; ?>" type="text" name="position_company_provide1" class="form-control border-dark" Placeholder="Enter Position In The Company" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Their Relationship With Them :
              <input value="<?php echo $row->relationship_provide1; ?>" type="text" name="relationship_provide1" class="form-control border-dark" Placeholder="Enter Their Relationship With Them" >
            </div>
        </div>
<h3 class="col-xl-12 mt-5 font-weight-bold">Please provide 2 or references maybe current or past employer or business that you have done business with.</h3>
        <div class="row">

            <div class="col-md-6 mt-3 font-weight-bold">First Name:
              <input value="<?php echo $row->name_provide2; ?>" type="text" name="name_provide2" class="form-control border-dark" Placeholder="Enter First Name" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Mobile Number:
              <input value="<?php echo $row->phone_provide2; ?>" type="number" name="phone_provide2" class="form-control border-dark" Placeholder="Enter Mobile Number" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Business Address:
              <input value="<?php echo $row->address_provide2; ?>" type="text" name="address_provide2" class="form-control border-dark" Placeholder="Enter Business Address" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">E-mail Address :
              <input value="<?php echo $row->email_provide2; ?>" type="email" name="email_provide2" class="form-control border-dark" Placeholder="Enter E-mail Address">
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Position In The Company :
              <input value="<?php echo $row->relationship_provide2; ?>" type="text" name="position_company_provide2" class="form-control border-dark" Placeholder="Enter Position In The Company" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Their Relationship With Them :
              <input value="<?php echo $row->relationship_provide2; ?>" type="text" name="relationship_provide2" class="form-control border-dark" Placeholder="Enter Their Relationship With Them" >
            </div>
        </div>
   


                  <!-- <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div> -->
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                
                <div class="multisteps-form__content">
<div class="row">

            <div class="col-xl-4 font-weight-bold">Please tell us if you are working full or part-time:
              <!-- <input type="text" name="name" class="form-control border-dark" Placeholder="Enter First Name" required> -->
            </div>
            <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="please_tell_us_if_you_are_working_full" class="custom-control-input" id="checkbox-2669" value="Full-time" <?php if ($row->please_tell_us_if_you_are_working_full=="Full-time") {
                        	echo 'checked="checked"' ;
                        } ?>>
              <label class="custom-control-label" for="checkbox-2669">Full-time</label>
            </div>
          </div>
          <div class="col-xl-5">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="please_tell_us_if_you_are_working_full" class="custom-control-input" id="checkbox-2779" value="Part full" <?php if ($row->please_tell_us_if_you_are_working_full=="Part full") {
                        	echo 'checked="checked"' ;
                        } ?>>
              <label class="custom-control-label" for="checkbox-2779">Part full</label>
            </div>
          </div>
<div class="col-xl-4 mt-5 font-weight-bold">Please tell us your working days:</div>
           <div class="col-xl-6 mt-5">
                    <!-- <select required="true" name="please_tell_us_your_working_days" class="form-control border-dark" id="colorselector">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Monday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Monday">Monday</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Tuesday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Tuesday">Tuesday</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Wednesday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Wednesday">Wednesday</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Thursday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Thursday">Thursday</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Friday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Friday">Friday</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Saturday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Saturday">Saturday</option>
                          <option <?php if ($row->please_tell_us_your_working_days=="Sunday") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Sunday">Sunday</option>
                    </select> -->
                     <?php $aaa = explode(',', $row->please_tell_us_your_working_days);
                    $z=111;
                    foreach ($aaa as $value) { 
                     ?>

                         <div class="col-12">
                          <div class="custom-control custom-checkbox checkbox-lg">
                              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox1-<?php echo $z; ?>" value="<?php echo $value; ?>" checked="">
                              <label class="custom-control-label" for="checkbox1-<?php echo $z; ?>"><?php echo $value; ?></label>
                            </div>
                        </div>
                     <?php $z++; } ?>
            </div>

            <div class="col-md-4 mt-5 font-weight-bold">Please tell your working ours
            </div>
            <div class="col-md-6 mt-5">
              <input type="time" name="please_tell_your_working_ours" value="<?php echo $row->please_tell_your_working_ours; ?>" class="form-control border-dark">
            </div>

        
        </div>

                  <h3 class="col-xl-12 mt-5 mb-2"><strong>Onboarding :  </strong></h3>

 <!-- <div class="form-row"> -->
  

        <div class="row">

            <div class="col-md-3 mt-3 font-weight-bold">T-Shirt Preference:
              <!-- <input type="text" name="name" class="form-control border-dark" Placeholder="Enter First Name" required> -->
            </div>
            <div class="col-xl-4">
              <div class="row">
            <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="t_shirt_preference" class="custom-control-input" id="checkbox-266" value="Men's" <?php if ($row->t_shirt_preference=="Men's") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-266">Men's</label>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="t_shirt_preference" class="custom-control-input" id="checkbox-277" value="Women's" <?php if ($row->t_shirt_preference=="Women's") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-277">Women's</label>
            </div>
          </div>
        </div>
        </div>

           <div class="col-xl-4">
                    <select required="true" name="size" class="form-control border-dark" id="colorselector">
                        <option disabled="disabled" value="">Size</option>
                          <option <?php if ($row->size=="Small") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Small">Small</option>
                          <option <?php if ($row->size=="Medium") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Medium">Medium</option>
                          <option <?php if ($row->size=="Large") {
                        	echo 'selected="selected"' ;
                        } ?>  value="Large">Large</option>
                          <option <?php if ($row->size=="XL") {
                        	echo 'selected="selected"' ;
                        } ?>  value="XL">XL</option>
                          <option <?php if ($row->size=="XXL") {
                        	echo 'selected="selected"' ;
                        } ?>  value="XXL">XXL</option>
                    </select>
            </div>

            <div class="col-md-4 mt-5 font-weight-bold">How do you plan on commuting to jobs?
            </div>

          <div class="col-xl-6 mt-5">
              <div class="row">
            <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-283" value="My own car" <?php if ($row->how_do_you_plan_on_commuting_to_jobs=="My own car") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-283">My own car</label>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-293" value="Public transportation" <?php if ($row->how_do_you_plan_on_commuting_to_jobs=="Public transportation") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-293">Public transportation</label>
            </div>
          </div>
            <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-303" value="Borrowing a car" <?php if ($row->how_do_you_plan_on_commuting_to_jobs=="Borrowing a car") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-303">Borrowing a car</label>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-313" value="Other / not sure yet" <?php if ($row->how_do_you_plan_on_commuting_to_jobs=="Other / not sure yet") {
                        	echo 'checked="checked"' ;
                        } ?> >
              <label class="custom-control-label" for="checkbox-313">Other / not sure yet</label>
            </div>
          </div>
        </div> 
      </div>
 
        
        </div>
   
                 

                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-success ml-auto" name="form_submitss" type="submit" title="Send">Send</button>
                  </div>
                </div>
              </div>
            </form>


        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

 $(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

    $('#colorselector').change(function(){
        $('.colors_bb').hide();
        $('#' + $(this).val()).show();
    });

});

      $(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

    $('#colorselector1').change(function(){
        $('.colors_bb1').hide();
        $('#' + $(this).val()).show();
    });
    $('#colorselector2').change(function(){
        $('.colors_bb2').hide();
        $('#' + $(this).val()).show();
    });
    $('#colorselector3').change(function(){
        $('.colors_bb3').hide();
        $('#' + $(this).val()).show();
    });
    $('#colorselector4').change(function(){
        $('.colors_bb4').hide();
        $('#' + $(this).val()).show();
    });

    $('#colorselector27').change(function(){
       /// $('.colors_bb27').hide();
        $('#' + $(this).val()).show();
    });

});

       $(document).ready(function() {
    $("input[name$='cars']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Cars" + test).show();
    });
     $("input[name$='cars1']").click(function() {
        var test = $(this).val();

        $("div.desc1").hide();
        $("#Cars1" + test).show();
    });
});

 </script>
