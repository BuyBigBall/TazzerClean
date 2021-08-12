<?php 
	$admin_id=$this->session->userdata('admin_id');
	$admin_profile=$this->db->where('user_id',$admin_id)->get('administrators')->row_array();
	if(!empty($admin_profile['profile_img'])){
		$prof_img = $admin_profile['profile_img'];
	}else{
		$prof_img = "assets/img/user.jpg";
	}
	
	$admin_profile_img = base_url().$prof_img;
?>
<style>
	.user-info-box img {
		width: 30px;
		height: 30px;
	}
	.send-noti-box {
		margin-top: 10px;
	}
	.send-noti-box .type_msg {
		height: 50px;
	}
</style>
<div class="page-wrapper">
	<div class="content container-fluid">	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Notification List</h3>
					<?php
						if(!empty($user_info['profile_img'])){
							$image=base_url().$user_info['profile_img'];
						}else{
							$image=base_url().'assets/img/user.jpg';
						}
						?>
					<div class='user-info-box'>
						<img src="<?php echo $image;?>" alt="">
						<span><?php echo $user_info['name'];?></span>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="admin-noti-wrapper">
			<?php
			if(count($notifications)>0){
				foreach ($notifications as $key => $value) {
					
					$full_date =date('Y-m-d H:i:s', strtotime($value['utc_date_time']));
					$date=date('Y-m-d',strtotime($full_date));
					$date_f=date('d-m-Y',strtotime($full_date));
					$yes_date=date('Y-m-d',(strtotime ( '-1 day' , strtotime (date('Y-m-d')) ) ));
					$time=date('H:i',strtotime($full_date));
					$session = date('h:i A', strtotime($time));
					if($date == date('Y-m-d')){
						$timeBase ="Today ".$session;
					}elseif($date == $yes_date){
						$timeBase ="Yester day ".$session;
					}else{
						$timeBase =$date_f." ".$session;
					}
				?>
				<div class="noti-list" id="<?php echo $value['notification_id'];?>">
					<div class="noti-avatar">
						<img src="<?php echo $admin_profile_img;?>" alt="">
					</div>
					<div class="noti-contents">
						<h3><?=strtolower($value['message']);?></h3>
						<span><?=$timeBase;?></span>
					</div>
				</div>
			<?php 
				}
			} 
			?>
		</div>
		<div class="send-noti-box">
			<div class="input-group">
				<input type="hidden" name="user_token" value="<?php echo $user_token;?>">
				<input name="" class="form-control type_msg mh-auto empty_check" placeholder="Type your message..." maxlength="1000">
				<div class="input-group-append">
					<button id="submit" class="btn btn-primary btn_send" disabled="disabled"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
				</div>
			</div>		
		</div>   
       
	</div>
</div>