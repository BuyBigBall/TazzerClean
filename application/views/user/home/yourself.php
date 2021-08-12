
  <style type="text/css">
 
 .header__btn {
   transition-property: all;
   transition-duration: 0.2s;
   transition-timing-function: linear;
   transition-delay: 0s;
   padding: 10px 20px;
   display: inline-block;
   margin-right: 10px;
   background-color: #fff;
   border: 1px solid #2c2c2c;
   border-radius: 3px;
   cursor: pointer;
   outline: none;
}
 .header__btn:last-child {
   margin-right: 0;
}
 .header__btn:hover, .header__btn.js-active {
   color: #fff;
   background-color: #2c2c2c;

}


 .multisteps-form__progress {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
}
 .multisteps-form__progress-btn {
   transition-property: all;
   transition-duration: 0.15s;
   transition-timing-function: linear;
   transition-delay: 0s;
   position: relative;
   padding-top: 20px;
   color: rgba(108, 117, 125, .7);
   text-indent: -9999px;
   border: none;
   background-color: transparent;
   outline: none !important;
   cursor: pointer;
}
 @media (min-width: 500px) {
   .multisteps-form__progress-btn {
     text-indent: 0;
  }
}
 .multisteps-form__progress-btn:before {
   position: absolute;
   top: 0;
   left: 50%;
   display: block;
   width: 13px;
   height: 13px;
   content: '';
   transform: translateX(-50%);
   transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
   border: 2px solid currentColor;
   border-radius: 50%;
   background-color: #fff;
   box-sizing: border-box;
   z-index: 3;
}
 .multisteps-form__progress-btn:after {
   position: absolute;
   top: 5px;
   left: calc(-50% - 13px / 2);
   transition-property: all;
   transition-duration: 0.15s;
   transition-timing-function: linear;
   transition-delay: 0s;
   display: block;
   width: 100%;
   height: 2px;
   content: '';
   background-color: currentColor;
   z-index: 1;
}
 .multisteps-form__progress-btn:first-child:after {
   display: none;
}
 .multisteps-form__progress-btn.js-active {
   color: #007bff;
}
 .multisteps-form__progress-btn.js-active:before {
   transform: translateX(-50%) scale(1.2);
   background-color: currentColor;
}
 .multisteps-form__form {
   position: relative;
}
 .multisteps-form__panel {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 0;
   opacity: 0;
   visibility: hidden;
}
 .multisteps-form__panel.js-active {
   height: auto;
   opacity: 1;
   visibility: visible;
}
 .multisteps-form__panel[data-animation="scaleOut"] {
   transform: scale(1.1);
}
 .multisteps-form__panel[data-animation="scaleOut"].js-active {
   transition-property: all;
   transition-duration: 0.2s;
   transition-timing-function: linear;
   transition-delay: 0s;
   transform: scale(1);
}
 .multisteps-form__panel[data-animation="slideHorz"] {
   left: 50px;
}
 .multisteps-form__panel[data-animation="slideHorz"].js-active {
   transition-property: all;
   transition-duration: 0.25s;
   transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
   transition-delay: 0s;
   left: 0;
}
 .multisteps-form__panel[data-animation="slideVert"] {
   top: 30px;
}
 .multisteps-form__panel[data-animation="slideVert"].js-active {
   transition-property: all;
   transition-duration: 0.2s;
   transition-timing-function: linear;
   transition-delay: 0s;
   top: 0;
}
 .multisteps-form__panel[data-animation="fadeIn"].js-active {
   transition-property: all;
   transition-duration: 0.3s;
   transition-timing-function: linear;
   transition-delay: 0s;
}
 .multisteps-form__panel[data-animation="scaleIn"] {
   transform: scale(0.9);
}
 .multisteps-form__panel[data-animation="scaleIn"].js-active {
   transition-property: all;
   transition-duration: 0.2s;
   transition-timing-function: linear;
   transition-delay: 0s;
   transform: scale(1);
}
 
  </style>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<div class="content">
  <!--content inner-->
  <div class="content__inner">

    <div class="container overflow-hidden">
      <!--multisteps-form-->
      <div class="multisteps-form">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Personal Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">ID verification</button>
              <button class="multisteps-form__progress-btn" type="button" title="Order Info">Background checks</button>
              <button class="multisteps-form__progress-btn" type="button" title="Comments">Scheduling And Interview  </button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-8 m-auto">
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
                    <input type="text" name="street_address" value="" placeholder="Enter Street Address" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-3">
                    <h5 class="form-title font-weight-bold">Apt # (optional)</h5>
                    <input type="text" name="apt" value="" placeholder="Enter Apt # (optional)" class="form-control border-dark">
                  </div> 


                  <div class="col-xl-6 mt-3">
                    <h5 class="form-title font-weight-bold">City </h5>
                    <input type="text" name="city" value="" placeholder="Enter City" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-3 mt-3">
                    <h5 class="form-title font-weight-bold">Province</h5>
                    <input type="text" name="province" value="" placeholder="Enter Province" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-3 mt-3">
                    <h5 class="form-title font-weight-bold">Postal Code</h5>
                    <input type="number" name="postal_code" value="" placeholder="Enteer Postal Code" class="form-control border-dark">
                  </div>        
   

<h4 class="col-xl-12 mt-5 mb-5"><strong>Work Experience</strong></h4>
<h3 class="col-xl-12 mb-2"><strong>What types of jobs would you like to see?</strong></h3>
<p class="col-xl-12">Note: We may show you more.</p>

 <!-- <div class="form-row"> -->
  <div class="col-9">

    <div class="row">

    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-1" value="Appliance Repair">
          <label class="custom-control-label" for="checkbox-1">Appliance Repair</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-2" value="Cleaner">
          <label class="custom-control-label" for="checkbox-2">Cleaner</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-3" value="Computer & Network Services">
          <label class="custom-control-label" for="checkbox-3">Computer & Network Services</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-4" value="Concrete & Masonry Work">
          <label class="custom-control-label" for="checkbox-4">Concrete & Masonry Work</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-5" value="Doors, Locks & Locksmiths">
          <label class="custom-control-label" for="checkbox-5">Doors, Locks & Locksmiths</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-6" value="Electrician">
          <label class="custom-control-label" for="checkbox-6">Electrician</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-7" value="Fabric Cleaning">
          <label class="custom-control-label" for="checkbox-7">Fabric Cleaning</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-8" value="Furniture Assembly">
          <label class="custom-control-label" for="checkbox-8">Furniture Assembly</label>
        </div>
    </div>
    <div class="col-6">
      <div class="custom-control custom-checkbox checkbox-xl">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-9" value="Garage Door Installation">
          <label class="custom-control-label" for="checkbox-9">Garage Door Installation</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Handyman (Your primary service)">
          <label class="custom-control-label" for="checkbox-10">Handyman (Your primary service)</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Hanging & Mounting">
          <label class="custom-control-label" for="checkbox-10">Hanging &amp; Mounting
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Holiday Light Installation">
          <label class="custom-control-label" for="checkbox-10">Holiday Light Installation
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Home Improvement">
          <label class="custom-control-label" for="checkbox-10">Home Improvement
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Home Theater">
          <label class="custom-control-label" for="checkbox-10">Home Theater
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="HVAC">
          <label class="custom-control-label" for="checkbox-10">HVAC</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Lawn Care">
          <label class="custom-control-label" for="checkbox-10">Lawn Care
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Light Fixture Installation & Repair">
          <label class="custom-control-label" for="checkbox-10">Light Fixture Installation &amp; Repair
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10">
          <label class="custom-control-label" for="checkbox-10">Moving &amp; Junk Removal
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Painting & Wallpaper">
          <label class="custom-control-label" for="checkbox-10">Painting &amp; Wallpaper
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Plumber">
          <label class="custom-control-label" for="checkbox-10">Plumber</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Pool Services">
          <label class="custom-control-label" for="checkbox-10">Pool Services
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Power Washing">
          <label class="custom-control-label" for="checkbox-10">Power Washing
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Roof & Gutter Maintenance">
          <label class="custom-control-label" for="checkbox-10">Roof &amp; Gutter Maintenance
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Smart Home">
          <label class="custom-control-label" for="checkbox-10">Smart Home
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Snow Shoveling">
          <label class="custom-control-label" for="checkbox-10">Snow Shoveling
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Technology Services">
          <label class="custom-control-label" for="checkbox-10">Technology Services
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Tile, Marble & Countertop Work">
          <label class="custom-control-label" for="checkbox-10">Tile, Marble &amp; Countertop Work
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Wall Repairs">
          <label class="custom-control-label" for="checkbox-10">Wall Repairs
</label>
        </div>
    </div>
    <div class="col-6">
     <div class="custom-control custom-checkbox checkbox-lg">
          <input type="checkbox" name="what_types_of_jobs_would_you_like_to_see[]" class="custom-control-input" id="checkbox-10" value="Window Cleaning & Maintenance">
          <label class="custom-control-label" for="checkbox-10">Window Cleaning &amp; Maintenance</label>
        </div>
    </div>

  </div>
</div> 

</div>
<h3 class="mt-5"><strong>How many years of paid experience do you have?</strong></h3>
<div class="row">
                  <div class="col-xl-9">
                    <select required="true" name="work_experience" class="form-control border-dark">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="0 - 6 months">0 - 6 months</option>
                        <option value="6 months - 1 year">6 months - 1 year</option>
                        <option value="1 year - 3 years">1 year - 3 years</option>
                        <option value="3 years - 5 years">3 years - 5 years</option>
                        <option value="5+ years">5+ years</option>
                    </select>
                  </div> 




</div>
<div class="row">
<h3 class="col-xl-12 mt-5 mb-2"><strong>What are you applying as or for? You can ONLY pick ONE.</strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">

    <div class="row">

          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_you_applying_as_or_for_you_can_only_pick_one[]" class="custom-control-input" id="checkbox-11" value="Employee">
              <label class="custom-control-label" for="checkbox-11">Employee </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_you_applying_as_or_for_you_can_only_pick_one[]" class="custom-control-input" id="checkbox-12" value="Ssubcontractors">
              <label class="custom-control-label" for="checkbox-12">Ssubcontractors</label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_you_applying_as_or_for_you_can_only_pick_one[]" class="custom-control-input" id="checkbox-13" value="Self- employed">
              <label class="custom-control-label" for="checkbox-13">Self- employed </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_you_applying_as_or_for_you_can_only_pick_one[]" class="custom-control-input" id="checkbox-14" value="As a business with own employees – will need bigger dashboard space for them & their individual staff">
              <label class="custom-control-label" for="checkbox-14">As a business with own employees – will need bigger dashboard space for them & their individual staff</label>
            </div>
          </div>

  <!-- </div> -->

</div>
</div>

<h3 class="col-xl-12 mt-5 mb-2"><strong>What are the areas would you like to work in? as them to select</strong></h3>

  <div class="col-9">

    <div class="row">

          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_the_areas_would_you_like_to_work_in_as_them_to_select[]" class="custom-control-input" id="checkbox-15" value="Just around my postcode">
              <label class="custom-control-label" for="checkbox-15">Just around my postcode </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_the_areas_would_you_like_to_work_in_as_them_to_select[]" class="custom-control-input" id="checkbox-16" value="10 miles outside my postcode">
              <label class="custom-control-label" for="checkbox-16">   10 miles outside my postcode </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_the_areas_would_you_like_to_work_in_as_them_to_select[]" class="custom-control-input" id="checkbox-17" value="30 miles">
              <label class="custom-control-label" for="checkbox-17">   30 miles </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_the_areas_would_you_like_to_work_in_as_them_to_select[]" class="custom-control-input" id="checkbox-18" value="50 miles">
              <label class="custom-control-label" for="checkbox-18">50 miles</label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_are_the_areas_would_you_like_to_work_in_as_them_to_select[]" class="custom-control-input" id="checkbox-19" value="All over the country">
              <label class="custom-control-label" for="checkbox-19">       All over the country</label>
            </div>
          </div>
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
                    <input type="text" name="most_recent_company" value="" placeholder="Enter Current or Most Recent Company Name" class="form-control border-dark">
                  </div> 
                  <div class="col-xl-6">
                    <h5 class="form-title font-weight-bold"> Address:</h5>
                    <input type="text" name="most_address_company" value="" placeholder="Enter Address" class="form-control border-dark">
                  </div>  
                  <div class="col-xl-6">
                    <h5 class="form-title font-weight-bold"> Salary/ Wage:</h5>
                    <input type="number" name="salary_wage" value="" placeholder="Enter Salary/ Wage:" class="form-control border-dark">
                  </div>  

                  <div class="col-xl-12 mt-3">
                    <h5 class="form-title font-weight-bold"> From:</h5>
                  </div>
                  <div class="col-xl-5">
                    <input type="numbers" name="company_from" value="" placeholder="Enter Address" class="form-control border-dark">
                  </div> 
                  To:
                  <div class="col-xl-5">
                    <input type="numbers" name="company_to" value="" placeholder="Enter Address" class="form-control border-dark">
                  </div> 
                </div>
<div class="row">
                  <h3 class="col-xl-12 mt-5"><strong>How many years of paid experience do you have?</strong></h3>

                  <div class="col-xl-7">
                    <select required="true" name="how_many_years_of_paid_experience_do_you_have" class="form-control border-dark" id="colorselector">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="1">Self-taught </option>
                        <option value="2">NVQ</option>
                        <option value="3">GCE</option>
                        <option value="4">College degree</option>
                        <option value="5">University degree</option>
                        <option value="2">HND</option>
                        <option value="3">Vocational qualification</option>
                        <option value="4">I don't have any qualifications.</option>
                        <option value="5">Others</option>
                    </select>
                  </div> 
                  
                 <div class="col-xl-6 mt-3 colors_bb" style="display:none" id="5"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_how_many_years_of_paid_experience_do_you_have" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_how_many_years_of_paid_experience_do_you_have" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div>
<div class="row">

                 <div class="col-xl-6 mt-5"> 
                  <br>
                    <h5 class="form-title font-weight-bold">Qualification Relevant to job applied for:</h5>
                    <input type="text" name="relevant_to_applied" value="" placeholder="Enter Relevant to job applied" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-5"> 
                    <h5 class="form-title font-weight-bold">Member of Professional Body,
PIN number & Expiry date,
Certificates obtained:</h5>
                    <input type="text" name="member_certificate" value="" placeholder="Enter Relevant to job applied" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold">What skills and special experience do you have that will help with this position?</h5>
                    <input type="text" name="skills_special" value="" placeholder="Enter skills and special experience" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold">Why are you applying for this job? and, give an example where you have worked on a similar role:</h5>
                    <input type="text" name="worked_similar" value="" placeholder="Enter you applying for this job?" class="form-control border-dark">
                  
                </div>

              </div> 

<div class="row">
<h3 class="mt-5"><strong>What supplies do you have? Check all that apply.</strong></h3>
</div>
<div class="row">
          <div class="col-xl-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_supplies_do_you_have_check_all_that_apply[]" class="custom-control-input" id="checkbox-20" value="Power tools (circular/table saw, nail gun, shop vac, etc.)">
              <label class="custom-control-label" for="checkbox-20">Power tools (circular/table saw, nail gun, shop vac, etc.)</label>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_supplies_do_you_have_check_all_that_apply[]" class="custom-control-input" id="checkbox-21" value="Painting supplies (roller, brush, drop cloth, tape, etc.)">
              <label class="custom-control-label" for="checkbox-21">Painting supplies (roller, brush, drop cloth, tape, etc.)</label>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_supplies_do_you_have_check_all_that_apply[]" class="custom-control-input" id="checkbox-22" value="Lawn care equipment (mower, leaf blower, string trimmer, hand tools, etc.)">
              <label class="custom-control-label" for="checkbox-22">Lawn care equipment (mower, leaf blower, string trimmer, hand tools, etc.)</label>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="what_supplies_do_you_have_check_all_that_apply[]" class="custom-control-input" id="checkbox-23" value="Ladder">
              <label class="custom-control-label" for="checkbox-23">Ladder</label>
            </div>
          </div>
</div>
</div>
<div class="row">
<h3 class="mt-5"><strong>Are you legally eligible to work in the United Kingdom?</strong></h3>
</div>
<div class="row">
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_legally_eligible_to_work_in_the_united_kingdom" class="custom-control-input" id="checkbox-24" value="Yes">
              <label class="custom-control-label" for="checkbox-24">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_legally_eligible_to_work_in_the_united_kingdom" class="custom-control-input" id="checkbox-25" value="No">
              <label class="custom-control-label" for="checkbox-25">No</label>
            </div>
          </div>
          
</div>

                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
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
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="1">Passport </option>
                        <option value="2">Driving licence</option>
                        <option value="3">Biometric card</option>
                        <option value="4">ID card</option>
                        <option value="5">Resident permit.</option>
                        <option value="6">Other</option>
                    </select>
                  </div> 
 
                 <div class="col-xl-6 mt-3 colors_bb1" style="display:none" id="6"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_provide_proof_of_photo_id_you_must_choose_at_least_one_from_the_list_and_upload" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_provide_proof_of_photo_id_you_must_choose_at_least_one_from_the_list_and_upload" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold"> Provide proof of right to work in your country you select a minimum of one and upload.</h3>

                  <div class="col-xl-7">
                    <select required="true" name="provide_proof_of_right_to_work_in_your_country_you_select_a_minimum_of_one_and_upload" class="form-control border-dark" id="colorselector27">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="1">National Insurance </option>
                        <option value="2">Passport</option>
                        <option value="3">Driving licence</option>
                        <option value="4">Biometric card</option>
                        <option value="5">ID card</option>
                        <option value="6">Resident permit</option>
                        <option value="7">Other</option>
                    </select>
                  </div> 
               
                 <div class="col-xl-6 mt-3 colors_bb27" style="display:none" id="7"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_provide_proof_of_right_to_work_in_your_country_you_select_a_minimum_of_one_and_upload" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_provide_proof_of_right_to_work_in_your_country_you_select_a_minimum_of_one_and_upload" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Provide proof of homes address Must be less than 3 months old from the date of issue</h3>

                  <div class="col-xl-7">
                    <select required="true" name="provide_proof_of_homes_address_must_be_less_than_3_months_old_from_the_date_of_issue" class="form-control border-dark" id="colorselector2">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="1">Telephone Bill </option>
                        <option value="2">Gas or electric bill</option>
                        <option value="3">Bank statement</option>
                        <option value="4">Letter from the government or school</option>
                        <option value="5">Other</option>
                    </select>

                  </div> 

                  <div class="col-xl-6 mt-3 colors_bb2" style="display:none" id="5"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_provide_proof_of_homes_address_must_be_less_than_3_months_old_from_the_date_of_issue" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_provide_proof_of_homes_address_must_be_less_than_3_months_old_from_the_date_of_issue" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">For business only</h3>

                  <div class="col-xl-7">
                    <select required="true" name="for_business_only" class="form-control border-dark" id="colorselector4">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="1">Company registration number </option>
                        <option value="2">Company registration document</option>
                        <option value="3">Business insurance</option>
                        <option value="4">Method statement</option>
                        <option value="5">Proof of trading address</option>
                        <option value="6">The ID of the responsible individual</option>
                        <option value="7">provide website link if any</option>
                        <option value="8">Other</option>
                    </select>
                  </div> 

          <div class="col-xl-6 mt-3 colors_bb4" style="display:none" id="8"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_for_business_only" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_for_business_only" value="" placeholder="Enter Address" class="form-control border-dark">
                  
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

               
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
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
              <input type="radio" name="Have_you_ever_been_or_are_you_currently_going_through_any_investigation_or_disciplinary_action" class="custom-control-input" id="checkbox-26" value="Yes">
              <label class="custom-control-label" for="checkbox-26">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="Have_you_ever_been_or_are_you_currently_going_through_any_investigation_or_disciplinary_action" class="custom-control-input" id="checkbox-27" value="No">
              <label class="custom-control-label" for="checkbox-27">No</label>
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
              <input type="radio" name="have_you_been_dismissed_from_any_employment_or_lost_contract" class="custom-control-input" id="checkbox-28" value="Yes">
              <label class="custom-control-label" for="checkbox-28">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="have_you_been_dismissed_from_any_employment_or_lost_contract" class="custom-control-input" id="checkbox-29" value="No">
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
              <input type="radio" name="do_you_have_any_spent_unspent_convictions_or_cautions_under_the_rehabilitation_of_offenders_act_1974" class="custom-control-input" id="checkbox-30" value="Yes">
              <label class="custom-control-label" for="checkbox-30">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="do_you_have_any_spent_unspent_convictions_or_cautions_under_the_rehabilitation_of_offenders_act_1974" class="custom-control-input" id="checkbox-31" value="No">
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
              <input type="radio" name="are_you_facing_any_criminal_prosecutions" class="custom-control-input" id="checkbox-32" value="Yes">
              <label class="custom-control-label" for="checkbox-32">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="are_you_facing_any_criminal_prosecutions" class="custom-control-input" id="checkbox-33" value="No">
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
              <input value="1" type="radio" name="cars1" class="custom-control-input" id="checkbox-34">
              <label class="custom-control-label" for="checkbox-34">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input value="0" type="radio" name="cars1" class="custom-control-input" id="checkbox-35">
              <label class="custom-control-label" for="checkbox-35">No</label>
            </div>
          </div>
          <div class="col-xl-7 mt-3 colors_bb3 desc1" style="display:none" id="Cars11"> 
                  <!--   <h5 class="form-title font-weight-bold"> Please add name:</h5> -->
                    <input type="text" name="name_if_business_has_any_of_your_director_been_disqualify_as_a_director_for_the_last_5_years" value="" placeholder="Please Enter" class="form-control border-dark">
                  
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
              <input value="1" type="radio" name="cars" class="custom-control-input" id="checkbox-36">
              <label class="custom-control-label" for="checkbox-36">Yes</label>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input value="0" type="radio" name="cars" class="custom-control-input" id="checkbox-37">
              <label class="custom-control-label" for="checkbox-37">No</label>
            </div>
          </div>
          <div class="col-xl-7 mt-3 colors_bb3 desc" style="display:none" id="Cars1"> 
                  <!--   <h5 class="form-title font-weight-bold"> Please add name:</h5> -->
                    <input type="text" name="name_has_any_of_them_been_made_bankrupt_and_or_insolvency" value="" placeholder="Please Enter" class="form-control border-dark">
                  
           </div>
          
</div>

</div>
                 
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
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
        <input type="datetime-local" name="scheduling_and_interview" value="" placeholder="Enter" class="form-control border-dark">
     </div>        
</div>
</div>
<h3 class="col-xl-12 mt-5 font-weight-bold">Please provide 1 or references maybe current or past employer or business that you have done business with.</h3>
        <div class="row">

            <div class="col-md-6 mt-3 font-weight-bold">Name:
              <input type="text" name="name_provide1" class="form-control border-dark" Placeholder="Enter First Name" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Mobile Number:
              <input type="number" name="phone_provide1" class="form-control border-dark" Placeholder="Enter Mobile Number" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Business Address:
              <input type="text" name="address_provide1" class="form-control border-dark" Placeholder="Enter Business Address" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">E-mail Address :
              <input type="email" name="email_provide1" class="form-control border-dark" Placeholder="Enter E-mail Address">
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Position In The Company :
              <input type="text" name="position_company_provide1" class="form-control border-dark" Placeholder="Enter Position In The Company" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Their Relationship With Them :
              <input type="text" name="relationship_provide1" class="form-control border-dark" Placeholder="Enter Their Relationship With Them" >
            </div>
        </div>
<h3 class="col-xl-12 mt-5 font-weight-bold">Please provide 2 or references maybe current or past employer or business that you have done business with.</h3>
        <div class="row">

            <div class="col-md-6 mt-3 font-weight-bold">First Name:
              <input type="text" name="name_provide2" class="form-control border-dark" Placeholder="Enter First Name" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Mobile Number:
              <input type="number" name="phone_provide2" class="form-control border-dark" Placeholder="Enter Mobile Number" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Business Address:
              <input type="text" name="address_provide2" class="form-control border-dark" Placeholder="Enter Business Address" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">E-mail Address :
              <input type="email" name="email_provide2" class="form-control border-dark" Placeholder="Enter E-mail Address">
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Position In The Company :
              <input type="text" name="position_company_provide1" class="form-control border-dark" Placeholder="Enter Position In The Company" >
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Their Relationship With Them :
              <input type="text" name="relationship_provide2" class="form-control border-dark" Placeholder="Enter Their Relationship With Them" >
            </div>
        </div>
   


                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                
                <div class="multisteps-form__content">


<div class="row">

            <div class="col-xl-4 font-weight-bold">Please tell us if you are working full or part-time:
              <!-- <input type="text" name="name" class="form-control border-dark" Placeholder="Enter First Name" required> -->
            </div>
            <div class="col-xl-4">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="please_tell_us_if_you_are_working_full" class="custom-control-input" id="checkbox-2669" value="Full-time">
              <label class="custom-control-label" for="checkbox-2669">Full-time</label>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="please_tell_us_if_you_are_working_full" class="custom-control-input" id="checkbox-2779" value="Part full">
              <label class="custom-control-label" for="checkbox-2779">Part full</label>
            </div>
          </div>
<div class="col-xl-4 mt-5 font-weight-bold">Please tell us your working days:</div>
           <div class="col-xl-6 mt-5">
                    <!-- <select required="true" name="please_tell_us_your_working_days" class="form-control border-dark">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thursday">Thursday</option>
                          <option value="Friday">Friday</option>
                          <option value="Saturday">Saturday</option>
                          <option value="Sunday">Sunday</option>
                    </select> -->
                     <div class="row">

          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-119" value="Monday">
              <label class="custom-control-label" for="checkbox-119">Monday </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-129" value="Tuesday">
              <label class="custom-control-label" for="checkbox-129">Tuesday</label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-139" value="Wednesday">
              <label class="custom-control-label" for="checkbox-139">Wednesday </label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-144" value="Thursday">
              <label class="custom-control-label" for="checkbox-144">Thursday</label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-145" value="Friday">
              <label class="custom-control-label" for="checkbox-145">Friday</label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-146" value="Saturday">
              <label class="custom-control-label" for="checkbox-146">Saturday</label>
            </div>
          </div>
          <div class="col-12">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" name="please_tell_us_your_working_days[]" class="custom-control-input" id="checkbox-147" value="Sunday">
              <label class="custom-control-label" for="checkbox-147">Sunday</label>
            </div>
          </div>

  <!-- </div> -->

</div>
            </div>

            <div class="col-md-4 mt-5 font-weight-bold">Please tell your working ours
            </div>
            <div class="col-md-6 mt-5">
              <input type="time" name="please_tell_your_working_ours" value="" class="form-control border-dark">
            </div>

        
        </div>






                  <h3 class="col-xl-12 mt-5 mb-2"><strong>Onboarding :  </strong></h3>

 <!-- <div class="form-row"> -->
  

        <div class="row">

            <div class="col-md-3 mt-3 font-weight-bold">T-Shirt Preference:
              <!-- <input type="text" name="name" class="form-control border-dark" Placeholder="Enter First Name" required> -->
            </div>
            <div class="col-xl-4 mt-3">
              <div class="row">
            <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="t_shirt_preference" class="custom-control-input" id="checkbox-266" value="Men's">
              <label class="custom-control-label" for="checkbox-266">Men's</label>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="t_shirt_preference" class="custom-control-input" id="checkbox-277" value="Women's">
              <label class="custom-control-label" for="checkbox-277">Women's</label>
            </div>
          </div>
        </div>
        </div>

           <div class="col-xl-4">
                    <select required="true" name="size" class="form-control border-dark" id="colorselector">
                        <option disabled="disabled" selected="selected" value="">Size</option>
                          <option value="Small">Small</option>
                          <option value="Medium">Medium</option>
                          <option value="Large">Large</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                    </select>
                  </div>

            <div class="col-md-5 mt-5 font-weight-bold">How do you plan on commuting to jobs?
            </div>

          <div class="col-xl-7 mt-5">
              <div class="row">
            <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-283" value="My own car">
              <label class="custom-control-label" for="checkbox-283">My own car</label>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-293" value="Public transportation">
              <label class="custom-control-label" for="checkbox-293">Public transportation</label>
            </div>
          </div>
            <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-303" value="Borrowing a car">
              <label class="custom-control-label" for="checkbox-303">Borrowing a car</label>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="radio" name="how_do_you_plan_on_commuting_to_jobs" class="custom-control-input" id="checkbox-313" value="Other / not sure yet">
              <label class="custom-control-label" for="checkbox-313">Other / not sure yet</label>
            </div>
          </div>
        </div> 
      </div>
 <div class="row mt-5">
<div class="col-12 alert alert-danger">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-155" >
              <label class="custom-control-label" for="checkbox-155">As part of our requirement, we are expected to carry out few checks for everyone in our platform. Our Vetting Status checks is the central to our service provision. Therefore, all paperwork Must be completed before your profile could be live of our site or start work with us.   By clicking this box means you have given us your permission to out any of the above checks </label>
            </div>
          </div>
        </div>
        
        </div>
   
                 

                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-success ml-auto" name="form_submitss" type="submit" title="Send">Send</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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

   

  "use strict";

//DOM elements
const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next'
}; //remove class from a set of items

const removeClasses = (elemSet, className) => {
  elemSet.forEach(elem => {
    elem.classList.remove(className);
  });
}; //return exect parent node of the element


const findParent = (elem, parentClass) => {
  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;
}; //get active button step number


const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
}; //set all steps before clicked (and clicked too) to active


const setActiveStep = activeStepNum => {
  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active'); //set picked items to active

  DOMstrings.stepsBtns.forEach((elem, index) => {
    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }
  });
}; //get active panel


const getActivePanel = () => {
  let activePanel;
  DOMstrings.stepFormPanels.forEach(elem => {
    if (elem.classList.contains('js-active')) {
      activePanel = elem;
    }
  });
  return activePanel;
}; //open active panel (and close unactive panels)


const setActivePanel = activePanelNum => {
  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active'); //show active panel

  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {
      elem.classList.add('js-active');
      setFormHeight(elem);
    }
  });
}; //set form height equal to current panel height


const formHeight = activePanel => {
  const activePanelHeight = activePanel.offsetHeight;
  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;
};

const setFormHeight = () => {
  const activePanel = getActivePanel();
  formHeight(activePanel);
}; //STEPS BAR CLICK FUNCTION


DOMstrings.stepsBar.addEventListener('click', e => {
  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  } //get active button step number


  const activeStep = getActiveStep(eventTarget); //set all steps before clicked (and clicked too) to active

  setActiveStep(activeStep); //open active panel

  setActivePanel(activeStep);
}); //PREV/NEXT BTNS CLICK

DOMstrings.stepsForm.addEventListener('click', e => {
  const eventTarget = e.target; //check if we clicked on `PREV` or NEXT` buttons

  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
    return;
  } //find active panel


  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel); //set active step and active panel onclick

  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;
  } else {
    activePanelNum++;
  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);
}); //SETTING PROPER FORM HEIGHT ONLOAD

window.addEventListener('load', setFormHeight, false); //SETTING PROPER FORM HEIGHT ONRESIZE

window.addEventListener('resize', setFormHeight, false); //changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
}; //selector onchange - changing animation


const animationSelect = document.querySelector('.pick-animation__select');
animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;
  setAnimationType(newAnimationType);
});
</script>
