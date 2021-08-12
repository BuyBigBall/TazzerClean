<br><br><br><br><br><style type="text/css">
	
	.card {
    width: 350px;
    padding: 10px;
    border-radius: 20px;
    background: #eadfdf;
    border: none;
    height:  462px;
    position: relative
}


.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ff8880;
    outline: 0;
    box-shadow: none
}

.cursor {
    cursor: pointer
}
</style>



<div class="d-flex justify-content-center align-items-center container">

    <div class="card py-5 px-3">
                    <?php
        if ($_GET['msg']=='otp_not_verify'){ ?>
           <div class="alert alert-danger">
  <strong>Warning!</strong> Please Verify Your Identity By Giving OTP.
</div>  
       <?php  }
        ?>
    	<form method="POST" action="<?php echo base_url()?>admin/verifyotp" enctype='multipart/form-data'>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
        <?php if($msg=='not'){ ?>
            <div class="alert alert-danger">
              <strong>Entered Otp is Incorrect !</strong>
            </div>
        <?php } ?>
        <h5 class="m-0">Mobile phone verification</h5>
      <!-- <span class="mobile-text">aaa   <?php echo $service_phone; ?> </span></br><span>E-mail :<?php echo $service_email; ?></span> -->
        <input name="phone" type="hidden" value='<?php echo $service_phone; ?>' disabled>  
        <input name="email" type="hidden" value='<?php echo $service_email; ?>' disabled><b class="text-danger">
        <input name="service_data" type="hidden" value='<?php echo $service_data; ?>' >
        <input name="last_id" type="hidden" value='<?php echo $service_email; ?>' >
        <?php 
   //echo "this is for settings";     
   // echo $sess_mobil=$this->session->userdata('mobile_otp');
   // echo    '==='.$sess_email=$this->session->userdata('email_otp',$email_otp);
        ?>
        
            </b>
        <br class="mt-4">
        <label class="mt-4">Enter Mobile Otp</label></br>
        <div class="d-flex ">
        	
        	<input name="mobile_otp" type="text" class="form-control" 
            placeholder="Enter Mobile Otp" autofocus="">
        	            
        </div>
       <!--  <label class="mt-3">Enter E-mail Otp</label></br>
         <div class="d-flex flex-row ">
            
            <input name="email_otp" type="text" class="form-control" 
            placeholder="Enter E-mail Otp"
            autofocus="">
        </div> -->
         <div class="col-md-12 mt-3">
            <div class="text-center">
           <button class="btn btn-primary" type="Submit">Submit</button>
            </div>
        </div>
    </form>
        <!-- <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor">Resend</span></div> -->
    </div>
</div>
