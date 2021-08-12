<?php
  // print_r($client_token);
  // print_r($client_id);
  // exit;
  $user_currency = get_user_currency();
  $user_currency_code = $user_currency['user_currency_code'];
?>

<script src="https://www.paypal.com/sdk/js?client-id=<?=$client_id;?>&components=buttons,marks,messages,funding-eligibility&currency=<?=$user_currency['user_currency_code'];?>&enable-funding=venmo"> // Replace YOUR_CLIENT_ID with your sandbox client ID
</script>

<div class="row paypal-payment-box" style="margin-top: 150px; margin-bottom: 50px;">
  <div class="col-md-1 col-lg-1"></div>
  <div class="col-md-5 col-lg-5">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Wallet</h4>
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
      </div>
    </div>
  </div>
  <div class="col-lg-5 col-md-5">
    <div id="paypal-button-container"></div>
  </div>
</div>

<!-- Add the checkout buttons, set up the order and approve the order -->
<script>
  $(document).ready(function() {
    var csrf_token = $('#csrf_token').val();

    paypal.Buttons({
      createOrder: function(data, actions) {
        // return actions.order.create({
        //   purchase_units: [{
        //     amount: {
        //       value: '0.01'
        //     }
        //   }]
        // });
        if($("#wallet_amt").val() > 0)
        {
          var wallet_amt = $("#wallet_amt").val();
          showLoader();
          var data = new URLSearchParams();   // not FormData()
          data.append("csrf_token_name", csrf_token);
          data.append("wallet_amt", wallet_amt);
          return fetch(base_url+'create-paypal-user-wallet', {
              method: 'post',
              headers: {
                // 'content-type': 'application/json'
                // 'content-type': 'form-data'
                'content-type': 'application/x-www-form-urlencoded'
              },
              body: data
              // body: JSON.stringify({csrf_token_name: csrf_token, wallet_amt: wallet_amt})
          }).then(function(res) {
              return res.json();
          }).then(function(data) {
              // console.log(data.id) // Use the key sent by your server's response, ex. 'id' or 'token'
              hideLoader();
              return data.id;
          })
          .catch(function(error) {
            console.log("Error getting document:", error);
            hideLoader();
          });
        }
        else
        {
          alert("Please enter wallet amount");
          $("#wallet_amt").focus();
          return;
        }
      },
      onApprove: function(data, actions) {
        // console.log(data,actions);
        // return actions.order.capture().then(function(details) {
        //   alert('Transaction completed by ' + details.payer.name.given_name);
        // });
        showLoader();
        var params = new URLSearchParams();   // not FormData()
        params.append("csrf_token_name", csrf_token);
        params.append('order_id', data.orderID);
        return fetch(base_url+'capture-paypal-user-wallet', {
          method: "post",
          headers: {
            // 'content-type': 'application/json'
            'content-type': 'application/x-www-form-urlencoded'
          },
          // body: JSON.stringify({order_id: data.orderID})
          body: params
        }).then(function(res) {
          return res.json();
        }).then(function(details) {
          hideLoader();
          // console.log(details.payer.name.given_name);
          // alert('Transaction funds captured from ' + details.payer.name.given_name);
          // check for INSTRUMENT_DECLINED and restart OnApprove if true
          if (details.error === 'INSTRUMENT_DECLINED') {
            return actions.restart();
          }
          window.location.href = base_url+'paypal-add-wallet-success/'+details.id;
        })
        .catch(function(error) {
          console.log("Error getting document:", error);
          hideLoader();
        });
      }
    }).render('#paypal-button-container'); // Display payment options on your web page
  });
</script>