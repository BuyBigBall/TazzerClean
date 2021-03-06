<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/application/config/paypal_config.php');
?>

<div class="content">
    <div class="container">
        <div class="row">
            <?php
            if (!empty($_GET['tbs'])) {
                $val = $_GET['tbs'];
            } else {
                $val = 1;
            }
            ?>
            <input type="hidden" name="tab_ctrl" id="tab_ctrl" value="<?= $val; ?>">
            <?php $this->load->view('user/home/user_sidemenu'); ?>

            <div class="col-xl-9 col-md-8">

                <div class="row">
                    <?php
                    $total_cr = 0;
                    $total_dr = 0;
					$user_currency = get_user_currency();
                    $user_currency_code = $user_currency['user_currency_code'];
                    if (!empty($wallet_history)) {
                        foreach ($wallet_history as $key => $value) {
                            
                            if (!empty($value['credit_wallet'])) {
                                $color = 'success';
                                $message = 'Credit';
                            } else {
                                $color = 'danger';
                                $message = 'Debit';
                            }
                            if (!empty($value["fee_amt"]) && $value["fee_amt"] > 1) {
                                $txt_amt = number_format($value["fee_amt"] / 100, 2);
                            } else {
                                $txt_amt = 0;
                            }
                            $total_cr += get_gigs_currency($value['credit_wallet'], $value['currency_code'], $user_currency_code);
                            $total_dr += abs(get_gigs_currency($value['debit_wallet'], $value['currency_code'], $user_currency_code));
                        }
                    }
                    ?>

                    <?php
                    $user_currency_code = '';
                    $userId = $this->session->userdata('id');
                    If (!empty($userId)) {
                        
                        $service_amount1 = $wallet['wallet_amt'];
                        $service_amount2 = $total_cr;
                        $service_amount3 = $total_dr;
                        $get_currency = get_currency();
                        $user_currency = get_user_currency();
                        $user_currency_code = $user_currency['user_currency_code'];
                        $service_amount1 = get_gigs_currency($wallet['wallet_amt'], $wallet['currency_code'], $user_currency_code);
                        
                    } else {
                        $user_currency_code = settings('currency');
                        $service_amount1 = $wallet['wallet_amt'];
                        $service_amount2 = $total_cr;
                        $service_amount3 = $total_dr;
                    }
                    ?>
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Wallet</h4>

                                <div class="wallet-details">
                                    <span>Wallet Balance</span>
                                    <h3><?php echo currency_conversion($user_currency_code) . $wallet['wallet_amt']; ?></h3>


                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">Total Credit<?php //print_r($userId);exit;?></p>
                                            <h4><?php echo currency_conversion($user_currency_code) . number_format($service_amount2, 2); ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-1">Total Debit</p>
                                            <h4><?php echo currency_conversion($user_currency_code) . number_format($service_amount3, 2); ?></h4>
                                        </div>
                                    </div>

                                    <div class="wallet-progress-chart">
                                         <div class="d-flex justify-content-between">
											<?php
                                            if (!empty($wallet['total_credit'])) {
                                                $wallet['total_credit'] = $total_cr;
												$wallet['total_debit'] = $total_dr;
                                            } else {
                                                $wallet['total_credit'] = 0;
												$wallet['total_debit'] = $total_dr;
                                            }
                                            ?>
                                            <span><?= $wallet['currency'] . '' . abs($wallet['total_debit']); ?></span>
                                            <span><?= $wallet['currency'] . '' . number_format($wallet['total_credit'], 2); ?></span>
                                        </div>

                                        <?php
                                        $total_per = 0;
                                        if (!empty($wallet['total_debit']) && !empty($wallet['total_credit'])) {
                                            $total_per = ($wallet['total_debit'] / $wallet['total_credit']) * 100;
                                        }
                                        ?>

                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width:<?= round($total_per); ?>%">
                                                <?= number_format(abs($total_per), 2); ?>%
                                            </div>
                                        </div>                                     
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9">

                        <div class="card">
                            <div class="card-body">
							
                                <h4 class="card-title">Add Wallet</h4>
                                <form action="<?= base_url() ?>user/Dashboard/paytab_payment" method="get" id="paytab_payment">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text display-5"><?= currency_conversion($user_currency_code); ?></label>
                                            </div>
											 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                            <input type="text"  maxlength="10" class="form-control isNumber" name="wallet_amt" id="wallet_amt" placeholder="00.00">
                                            <input type="hidden"  id="currency_val" name="currency_val"  value="<?= $user_currency_code; ?>">
                                            
                                        </div>
                                    </div>
                                </form>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-xl-4">
                                            <a href="javascript:void(0);" id="pay_by_stripe"><img src="<?php echo base_url(); ?>assets/img/stripe.png"></a>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-4">
                                            <a href="javascript:void(0);" id="pay_by_paypal"><img src="<?php echo base_url(); ?>assets/img/paypal.png"></a>
                                        </div>
                                    </div>
								</div> 
                            </div>
                        </div>
                    </div>
                </div>

            <form method="POST" action="<?php echo base_url() . "paypal_braintree" ?>" id="myForm">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <input type="hidden" name="amount" value="" id="paypal_amount">
                <input type="hidden" name="payload_nonce" value="" id="payload_nonce">  
                <input type="hidden" name="orderID" value="" id="orderID">  
            </form>

            <h4 class="mb-4">Wallet Transactions</h4>
            <div class="card transaction-table mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if (!empty($wallet_history)) { ?>
                            <table id="order-summary" class="table table-center mb-0">
                            <?php } else { ?>
                                <table class="table table-center mb-0">
                                <?php } ?>
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Txt / Fee</th>
                                        <!-- <th>Fee amt</th> -->
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_cr = 0;
                                    $total_dr = 0;
                                    if (!empty($wallet_history)) {
                                        foreach ($wallet_history as $key => $value) {

                                            if (!empty($value['credit_wallet'])) {
                                                $color = 'success';
                                                $message = 'Credit';
                                            } else {
                                                $color = 'danger';
                                                $message = 'Debit';
                                            }
                                            if (!empty($value["fee_amt"]) && $value["fee_amt"] > 1) {
                                                $txt_amt = number_format($value["fee_amt"] / 100, 2);
                                            } else {
                                                $txt_amt = 0;
                                            }


                                            $user_currency_code = '';
                                            $userId = $this->session->userdata('id');
                                            $user_details = $this->db->where('id', $userId)->get('users')->row_array();
                                            If (!empty($userId)) {
                                                $service_amount1 = $value["current_wallet"];
                                                $service_amount2 = $value["credit_wallet"];
                                                $service_amount3 = $value["debit_wallet"];
                                                $service_amount4 = $txt_amt;
                                                $service_amount5 = $value["avail_wallet"];
                                                $get_currency = get_currency();
                                                $user_currency = get_user_currency();
                                                $user_currency_code = $user_currency['user_currency_code'];

                                                $service_amount1 = get_gigs_currency($value["current_wallet"], $value["currency_code"], $user_details['currency_code']);
                                                $service_amount2 = get_gigs_currency($value["credit_wallet"], $value["currency_code"], $user_details['currency_code']);
                                                $service_amount3 = get_gigs_currency($value["debit_wallet"], $value["currency_code"], $user_details['currency_code']);
                                                $service_amount4 = get_gigs_currency($txt_amt, $value["currency_code"], $user_details['currency_code']);
                                                $service_amount5 = get_gigs_currency($value["avail_wallet"], $value["currency_code"], $user_details['currency_code']);
                                                $fee_amount = get_gigs_currency($value["fee_amt"], $value["currency_code"], $user_details['currency_code']);
                                            } else {
                                                $user_currency_code = settings('currency');
                                                $service_amount1 = $value["current_wallet"];
                                                $service_amount2 = $value["credit_wallet"];
                                                $service_amount3 = $value["debit_wallet"];
                                                $service_amount4 = $txt_amt;
                                                $service_amount5 = $value["avail_wallet"];
                                                $fee_amount = $value['fee_amt'] / 100;
                                            }
//                               
                                            echo '<tr>
									<td>' . ($key + 1) . '</td>
									<td>' . date("d M Y H:i:s", strtotime($value["created_at"])) . '</td>
									<td>' . currency_conversion($user_currency_code) . '' . $service_amount2 . '</td>
									<td>' . currency_conversion($user_currency_code) . '' . $service_amount3 . '</td>
									<td>' . currency_conversion($user_currency_code) . '' . $service_amount4 . '</td>
									<td><lable>' . $value["reason"] . '</lable></td>
									<td><span class="badge bg-' . $color . '-light">' . $message . '</span></td> 
									</tr>';
                                        }
                                    } else {
                                        echo '<tr> <td colspan="8"> <div class="text-center text-muted">No data found</div></td> </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>


<footer class="footer">
    <?php
   /*  $query = $this->db->query("select * from system_settings WHERE status = 1");
    $result = $query->result_array();
    $stripe_option = '1';
    $publishable_key = '';
    $live_publishable_key = '';
    $logo_front = '';
    foreach ($result as $res) {
        if ($res['key'] == 'stripe_option') {
            $stripe_option = $res['value'];
        }
        if ($res['key'] == 'publishable_key') {
            $publishable_key = $res['value'];
        }
        if ($res['key'] == 'live_publishable_key') {
            $live_publishable_key = $res['value'];
        }

        if ($res['key'] == 'logo_front') {
            $logo_front = $res['value'];
        }
    }

    if ($stripe_option == 1) {
        $stripe_key = $publishable_key;
    } else {
        $stripe_key = $live_publishable_key;
    }

    if (!empty($logo_front)) {
        $web_log = base_url() . $logo_front;
    } else {
        $web_log = base_url() . 'assets/img/logo.png';
    } */
    ?>

    <input type="hidden" id="stripe_key" value="<?= $stripe_key; ?>">
    <input type="hidden" id="logo_front" value="<?= $web_log; ?>">
    <input type="hidden" id="tokens" value="<?= $this->session->userdata('chat_token'); ?>">
</footer>


<span id="success_message"><?php echo $this->session->flashdata('success_message'); ?></span>
<span id="error_message"><?php echo $this->session->flashdata('error_message'); ?></span>
<?php if (!empty($this->session->flashdata('success_message'))) { ?>
    <script src="<?php echo base_url(); ?>assets/js/success_toaster.js"></script>
<?php } ?>

<?php if (!empty($this->session->flashdata('error_message'))) { ?>
    <script src="<?php echo base_url(); ?>assets/js/error_toaster.js"></script>
    <?php
}
$this->session->unset_userdata('error_message');
$this->session->unset_userdata('success_message');
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


