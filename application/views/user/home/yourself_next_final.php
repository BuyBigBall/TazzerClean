<div class="content">
  <div class="container">
    <div class="row">
      
      <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="">
     
      <div class="col-xl-9 col-md-8">
        <div class="tab-content pt-0">
          <div class="tab-pane show active" id="user_profile_settings" >
            <div class="widget">
              <!-- <h4 class="widget-title">THE APPLICATION PROCESSES FOR CLEANING SERVICES</h4> -->
              
              <form id="update_user" action="<?php echo base_url()?>fifth_step" method="POST" enctype="multipart/form-data"novalidate >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

<div class="row">
<h3 class="col-xl-12 mt-5 mb-2"><strong>Scheduling And Interview :  </strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">
 
<!--  <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Have you ever been or are you currently going? through any investigation or disciplinary action? </h3>
</div> -->
<div class="row">
     <div class="col-xl-8 mt-3">
        <input type="datetime-local" name="file_" value="" placeholder="Enter Address" class="form-control border-dark">
     </div>        
</div>
</div>
<h3 class="col-xl-12 mt-5 font-weight-bold">Please provide 1 or references maybe current or past employer or business that you have done business with.</h3>
        <div class="row">

            <div class="col-md-6 mt-3 font-weight-bold">First Name:
              <input type="text" name="name" class="form-control border-dark" Placeholder="Enter First Name" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Mobile Number:
              <input type="text" name="phone" class="form-control border-dark" Placeholder="Enter Mobile Number" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Business Address:
              <input type="text" name="address" class="form-control border-dark" Placeholder="Enter Business Address" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">E-mail Address :
              <input type="text" name="email" class="form-control border-dark" Placeholder="Enter E-mail Address">
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Position In The Company :
              <input type="text" name="name" class="form-control border-dark" Placeholder="Enter Position In The Company" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Their Relationship With Them :
              <input type="text" name="name" class="form-control border-dark" Placeholder="Enter Their Relationship With Them" required>
            </div>
        </div>
<h3 class="col-xl-12 mt-5 font-weight-bold">Please provide 2 or references maybe current or past employer or business that you have done business with.</h3>
        <div class="row">

            <div class="col-md-6 mt-3 font-weight-bold">First Name:
              <input type="text" name="name" class="form-control border-dark" Placeholder="Enter First Name" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Mobile Number:
              <input type="text" name="phone" class="form-control border-dark" Placeholder="Enter Mobile Number" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Business Address:
              <input type="text" name="address" class="form-control border-dark" Placeholder="Enter Business Address" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">E-mail Address :
              <input type="text" name="email" class="form-control border-dark" Placeholder="Enter E-mail Address">
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Position In The Company :
              <input type="text" name="name" class="form-control border-dark" Placeholder="Enter Position In The Company" required>
            </div>
            <div class="col-md-6 mt-3 font-weight-bold">Their Relationship With Them :
              <input type="text" name="name" class="form-control border-dark" Placeholder="Enter Their Relationship With Them" required>
            </div>
        </div>
   

</div> 
 <!-- <div class="form-row"> -->
  
</div> 
 <!-- <div class="form-row"> -->

 <!-- <div class="row mt-5">
<div class="col-12 alert alert-danger">
            <div class="custom-control custom-checkbox checkbox-xl">
              <input type="checkbox" class="custom-control-input" id="checkbox-15" >
              <label class="custom-control-label" for="checkbox-15">As part of our requirement, we are expected to carry out few checks for everyone in our platform. Our Vetting Status checks is the central to our service provision. Therefore, all paperwork Must be completed before your profile could be live of our site or start work with us.   By clicking this box means you have given us your permission to out any of the above checks </label>
            </div>
          </div>
        </div> -->
</div>



<!-- <br><br><br><br><br><br><b6><br><br><br><br><br><br><br><br> -->
              <div class="row mt-5">
                <div class="form-group col-xl-12 ">
                    <button name="form_submitss" id="form_submitss" class="btn btn-primary p-3 pr-5 pl-5 m-auto" type="submit">Next</button>
                  </div>
                </div>
                  <input type="hidden" id="country_id_value" value="">
            <input type="hidden" id="state_id_value" value="">
            <input type="hidden" id="city_id_value" value="">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
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

<br><br><br><br><br><br>
<Script> 
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

});
</Script>




















<?php die; ?>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="content">
  <div class="container">
    <div class="row">
      
      <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="">
     
            <div class="col-xl-9 col-md-8">
        <div class="tab-content pt-0">
          <div class="tab-pane show active" id="user_profile_settings" >
            <div class="widget">
              <h4 class="widget-title"></h4>
              <form id="update_user" action="<?php echo base_url()?>yourself_final" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="" />
   
                <div class="row">
                  <div class="col-xl-12">
                    <h5 class="form-title">Provide proof of photo ID you must choose one and upload</h5>
                  </div>
                </div>
      
<div class="row">
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">passport</label>
                    <input class="form-control" type="file" name="passport" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Driving licence</label>
                    <input class="form-control" type="file" name="Driving_licence" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Biometric card</label>
                    <input class="form-control no_only" type="file" name="Biometric_card"  value="<?php echo $get_details['mobileno']?>"  >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">ID card</label>
                    <input class="form-control no_only" type="file"  value="<?php echo $get_details['mobileno']?>" name="ID_card" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Resident permit</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Resident_permit" value="">
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Other</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Other" value="">
                  </div>               
</div>  
<div class="row">
                  <div class="col-xl-12">
                    <h5 class="form-title">Provide proof of right to work in your country you select a minimum of one and upload.</h5>
                  </div>
                </div>
      
<div class="row">
  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">National Insurence</label>
                    <input class="form-control" type="file" name="National_Insurence" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">passport</label>
                    <input class="form-control" type="file" name="passport" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Driving licence</label>
                    <input class="form-control" type="file" name="Dri_licence" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Biometric card</label>
                    <input class="form-control no_only" type="file" name="Biometriccard" value="<?php echo $get_details['mobileno']?>" name="mobileno" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">ID card</label>
                    <input class="form-control no_only" type="file"  value="<?php echo $get_details['mobileno']?>" name="IDcard" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Resident permit</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Resident_permit" value="">
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Other</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Other1" value="">
                  </div>               
</div>     
<div class="row">
                  <div class="col-xl-12">
                    <h5 class="form-title"> Provide proof of homes  address Must be less than 3 months old from the date of issue</h5>
                  </div>
                </div>  
<div class="row">
  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Telephone Bill</label>
                    <input class="form-control" type="file" name="Telephone_Bill" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Gas or electric bill</label>
                    <input class="form-control" type="file" name="Gas_or_electric" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Bank statement</label>
                    <input class="form-control" type="file" name="Bank_statement" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Letter from the government or school</label>
                    <input class="form-control no_only" type="file" name="Letter_from_government" value="<?php echo $get_details['mobileno']?>" name="mobileno" >
                  </div>
                 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Other</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Other2" value="">
                  </div>               
</div>   
<div class="row">
                  <div class="col-xl-12">
                    <h5 class="form-title">Provide proof of qualification obtained chose and upload</h5>
                  </div>
                </div>  
<div class="row">
  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">NVQ</label>
                    <input class="form-control" type="file" name="NVQ" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">GCE</label>
                    <input class="form-control" type="file" name="GCE" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">A Levels</label>
                    <input class="form-control" type="file" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">College degree</label>
                    <input class="form-control no_only" type="file" name="College_degreev" value="<?php echo $get_details['mobileno']?>" name="mobileno" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">University degree</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="University_degree" value="">
                  </div> 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">HND</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="HND" value="">
                  </div> 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Vocational qualification</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Vocational_qualification" value="">
                  </div> 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">I don't have any qualifications</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="any_qualifications" value="">
                  </div> 

                 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Other</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Other3" value="">
                  </div> 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Please add name and upload</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="name_and_upload" value="">
                  </div>              
</div>  
<div class="row">
                  <div class="col-xl-12">
                    <h5 class="form-title">For business only</h5>
                  </div>
                </div>  
      
<div class="row">
  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Company registration number</label>
                    <input class="form-control" type="file" name="Comp_register_number" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Company registration document</label>
                    <input class="form-control" type="file" name="Comp_register_document" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Business insurance</label>
                    <input class="form-control" type="file" name="Business_insurance" value="" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Method statement</label>
                    <input class="form-control no_only" type="file"  value="<?php echo $get_details['mobileno']?>" name="Methodstatement" >
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Proof of trading address</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="trading_address" value="">
                  </div> 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">The ID of the responsible individual</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="responsible_individual" value="">
                  </div> 
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">Other</label>
                    <input type="file" class="form-control provider_datepicker" autocomplete="off" name="Other4" value="">
                  </div>              
</div>        
                   <!--<div class="col-xl-12">
                    <h5 class="form-title">name5</h5>
                  </div>
                  <div class="form-group col-xl-12">
                    <label class="mr-sm-2">name6</label>
                    <input type="file" class="form-control" name="address" value="">
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">name7</label>
                    <select class="form-control" id="country_id" name="country_id" >
                      <option value=''>name8</option>
                      <option value=''></option> 
                    </select>
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">name9</label>
                    <select class="form-control" name="state_id" id="state_id" >
                    </select>
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">name10</label>
                    <select class="form-control" name="city_id" id="city_id">
                    </select>
                  </div>
                  <div class="form-group col-xl-6">
                    <label class="mr-sm-2">name11</label>
                    <input type="file" class="form-control" name="pincode" value="" >
                  </div> -->  
                  <div class="form-group col-xl-12">
                    <button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="submit">Submit</button>
                  </div>
                  <input type="hidden" id="country_id_value" value="">
            <input type="hidden" id="state_id_value" value="">
            <input type="hidden" id="city_id_value" value="">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
