<?php
    $trackingId = $this->session->userdata('usertype').'-'.$this->session->userdata('id');
    $partnerReferrals = paypalPartnerReferrals(['tracking_id'=>$trackingId]);
    $actionUrl = $partnerReferrals->links[1]->href;
?>

<div class="content">
    <div class="container">
        <div class="row">
            <?php
                if ($this->session->userdata('usertype') == "user") {
                    $this->load->view('user/home/user_sidemenu'); 
                } 
                else {
                    $this->load->view('user/home/provider_sidemenu');
                }
            ?>
            <div class="col-xl-9 col-md-8">
                <!-- Select Verify Payment Method -->
                <div class="row">
                    <span>Select Verify Payment Method</span>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="payment-gateway-box">
                            <div class="cate-widget">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/stripe1.jfif" alt="Chania" width="300" height="200"> 
                            </div>
                            <div>
                            <?php if(!$stripe_account_exist) { ?>
                                <button id="connect-with-stripe" type="button" class="btn btn-primary">Connect with Stripe</button>
                            <?php } else { ?>
                                <?php if($stripe_verified) { ?>
                                    <button id="stripe-verified" type="button" class="btn btn-success"> Verified </button>
                                <?php } else { ?>
                                    <button id="stripe-not-verified" type="button" class="btn btn-warning"> Not Verified </button>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="payment-gateway-box">
                            <div class="cate-widget">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/paypal1.jfif" alt="Chania" width="300" height="200"> 
                            </div>
                            <!-- <button id="connect-with-paypal" type="button" class="btn btn-primary">Connect with Paypal</button> -->
                            <a data-paypal-button="true" type="button" class="btn btn-primary" href="<?php echo $actionUrl; ?>&displayMode=minibrowser" target="PPFrame">Sign up for PayPal</a>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function(d, s, id) {
      var js, ref = d.getElementsByTagName(s)[0];
      if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "https://www.paypal.com/webapps/merchantboarding/js/lib/lightbox/partner.js";
        ref.parentNode.insertBefore(js, ref);
      }
    }(document, "script", "paypal-js"));

  </script>
