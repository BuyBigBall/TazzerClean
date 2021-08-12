<?php 
$user_id = $this->uri->segment('2');
$user_details = $this->db->where('id',$user_id)->get('providers')->row_array();
?>
<style type="text/css">
span {cursor:pointer; }
.minus, .plus{
	width:28px;
	height:34px;
	background:#f2f2f2;
	border-radius:4px;
	padding:4px 5px 8px 5px;
	border:1px solid #ddd;
	display: inline-block;
	vertical-align: middle;
	text-align: center;
}
input{
	height:34px;
	width: 60px;
	text-align: center;
	font-size: 18px;
	border:1px solid #ddd;
	border-radius:4px;
	display: inline-block;
	vertical-align: middle;
}
</style>
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Provider Details</h3>
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
							<p class="col-sm-9"><?php echo $user_details['name']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
							<p class="col-sm-9"><?php echo $user_details['email']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
							<p class="col-sm-9"><?php echo $user_details['mobileno']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Service Limit</p>
							<p class="col-sm-9">
								<span class="minus" onclick="limitChange(<?= $user_details['id']?>, '-1');">-</span>
								<input type="text" id="service-limit" value="<?php echo $user_details['service_limit']?>" disabled="" />
								<span class="plus" onclick="limitChange(<?= $user_details['id']?>, '+1');">+</span>
							</p>
						</div>
					</div>
				</div> 
				<div class="card">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-between">
							<span>Account Details</span>
						</h5>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Account holder name</p>
							<p class="col-sm-9"><?php echo $user_details['account_holder_name']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Account Number</p>
							<p class="col-sm-9"><?php echo $user_details['account_number']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">IBAN Number</p>
							<p class="col-sm-9"><?php echo $user_details['account_iban']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Bank Name</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['bank_name']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Bank Address</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['bank_address']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Sort Code</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['sort_code']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Swift Code</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['routing_number']?></p>
						</div>
						<div class="row">
							<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">IFSC Code</p>
							<p class="col-sm-9 mb-0"><?php echo $user_details['account_ifsc']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function limitChange(id, type){
var csrf_token=$('#admin_csrf').val();
var base_url=$('#base_url').val();
  $.ajax({
    url:base_url+'admin/service/change_limit',
    data:{id:id,type:type,csrf_token_name:csrf_token},
    type:"POST",
    success: function(res){
      $('#service-limit').val(res)
    }
  });
}
</script>