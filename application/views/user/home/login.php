<?php
    
?>

<div data-v-9cf711f2="" class="login-box container container--fluid" style="">
    <div data-v-9cf711f2="" class="mx-auto my-12 logincard v-card v-sheet theme--light">
        <div data-v-9cf711f2="" class="card-left">
            <h3 data-v-9cf711f2="" style="margin-top: 35%;">Welcome To Tazzer Clean &amp; Handyman</h3>
            <p data-v-9cf711f2="">We provide safe vehicles and professional experts, which means you can expect a first class, reliable service.Call Tazzer Clean today</p>
            <img data-v-9cf711f2="" alt="" src="<?=base_url()?>assets/img/login/login5.47298d50.png" transition="scale-transition" style="width: 80%;"></div>
        <div data-v-9cf711f2="" class="card-right">
            <div data-v-9cf711f2="" class="v-card__title">
                <div data-v-9cf711f2="" class="row mt-15 align-left justify-left" style="padding: 10px 8%;">
                    <h2 data-v-9cf711f2="">Login to Your Account!</h2></div>
            </div>
            <br data-v-9cf711f2="">
            <div class="login-card-container">
                <div class="form-group">
                    <!-- <label>Email ID</label> -->
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
                    <!-- <label>Password</label> -->
                    <div class="row">
                        <div class="col-12">
                            <input type="password" class="form-control form-control-lg" autocomplete="off"  placeholder="Enter Password Here.." name="login_password" id='login_password'>
                            <span for='otp_number' id='otp_error_msg_login'></span>
                        </div>
                    </div>
                </div>
                <p class="user_forgot_pwd">Forgot Password? <a href="#"  id="user_forgot_pwd"> Click to Get Link</a></p>
                <span id="err_respwd"></span>
                <button class="login-btn" id="emailregistration_finals" type="submit">Login</button>
                <p class="user_join_us">Don't have a account? <a id="user_join_us" href="javascript:void(0);" data-toggle="modal" data-target="#modal-wizard1"> Join Us </a></p>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/home/login.css">
<script type="text/javascript">
    var history_uri = "<?php echo $history_uri;?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/login.js"></script>