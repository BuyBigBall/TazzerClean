<div class="content">
  <div class="container">
    <div class="row">
      
      <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="">
     
      <div class="col-xl-9 col-md-8">
        <div class="tab-content pt-0">
          <div class="tab-pane show active" id="user_profile_settings" >
            <div class="widget">
              <!-- <h4 class="widget-title">THE APPLICATION PROCESSES FOR CLEANING SERVICES</h4> -->
              
              <form id="update_user" action="<?php echo base_url()?>third_form" method="POST" enctype="multipart/form-data"novalidate >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

<div class="row">
<h3 class="col-xl-12 mt-5 mb-2"><strong>ID verification. </strong></h3>

 <!-- <div class="form-row"> -->
  <div class="col-9">
 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Provide proof of photo ID you must choose at least one from the list and upload.</h3>

                  <div class="col-xl-7">
                    <select required="true" class="form-control border-dark" id="colorselector1">
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
                    <input type="text" name="name_" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold"> Provide proof of right to work in your country you select a minimum of one and upload.</h3>

                  <div class="col-xl-7">
                    <select required="true" class="form-control border-dark" id="colorselector2">
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
               
                 <div class="col-xl-6 mt-3 colors_bb2" style="display:none" id="7"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">Provide proof of homes address Must be less than 3 months old from the date of issue</h3>

                  <div class="col-xl-7">
                    <select required="true" class="form-control border-dark" id="colorselector3">
                        <option disabled="disabled" selected="selected" value="">Select</option>
                        <option value="1">Telephone Bill</option>
                        <option value="2">Gas or electric bill</option>
                        <option value="3">Bank statement</option>
                        <option value="4">Letter from the government or school</option>
                        <option value="5">Other</option>
                    </select>
                  </div> 

                 <div class="col-xl-6 mt-3 colors_bb3" style="display:none" id="5"> 
                    <h5 class="form-title font-weight-bold"> Please add name:</h5>
                    <input type="text" name="name_" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div> 
 <div class="row">
                  <h3 class="col-xl-12 mt-5 font-weight-bold">For business only</h3>

                  <div class="col-xl-7">
                    <select required="true" class="form-control border-dark" id="colorselector4">
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
                    <input type="text" name="name_" value="" placeholder="Please add name" class="form-control border-dark">
                  
                </div> 
                 <div class="col-xl-6 mt-3"> 
                    <h5 class="form-title font-weight-bold"> Please add upload:</h5>
                    <input type="file" name="file_" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div>
 <div class="row">
             <h4 class="col-xl-12 mb-5"><strong></strong></h4>
<h3 class="col-xl-12 mb-2"><strong>Please upload the must current photo which will be used to send to clients for recognition and identification.  </strong></h3>
<p class="col-xl-12">Note: This photo must be very clear with all your face clearly showing it must be from your chest level upwards.</p>
                 <div class="col-xl-6">
                    <input type="file" name="file_" value="" placeholder="Enter Address" class="form-control border-dark">
                  
                </div> 

</div>
</div>

</div>



<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
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
