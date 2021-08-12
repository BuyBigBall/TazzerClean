<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Notification List</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

	
						<div class="admin-noti-wrapper">

						<?php
						if(count($admin_notification)>0){
							foreach ($admin_notification as $key => $value) {
								
								$withdraw_flag = preg_match('#\(withdraw subscription\)#', $value['message'], $match);
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
								<?php if($withdraw_flag) { ?>
									<button id="decline" onclick="notify(<?php echo $value['notification_id'];?>, false)">decline</button>
									<?php if($admin_id == 1) {?>
									<button id="accept" onclick="notify(<?php echo $value['notification_id'];?>, true)">accept</button>
									<?php } else { ?> 
									<button id="report" onclick="notify(<?php echo $value['notification_id'];?>, false)">report</button>
								<?php } } ?>
								<div class="noti-avatar">
									<?php
									if(!empty($value['profile_img'])){
										$image=base_url().$value['profile_img'];
									}else{
										$image=base_url().'assets/img/user.jpg';
									}
									?>
									<img src="<?php echo $image;?>" alt="">
								</div>
								<div class="noti-contents">
									<h3><?=strtolower($value['message']);?></h3>
									<span><?=$timeBase;?></span>
								</div>
							</div>

						<?php } }else{ ?>
						<div class="notificationlist">
							<p class="text-danger mt-3">Notification Empty</p>
						</div>
                       <?php } ?>
               </div>
			   
       
</div>
</div>
<script type="text/javascript">
	/**
	 * @desc sending withdrawin declined notification 
	 * @param (int) notification_id : notification id, (bool) flag : send to superadmin when true, else to user    
	 **/
	function notify(notification_id, flag) {
		$.get( "admin/dashboard/withdraw_subscription", { 'notification_id': notification_id, 'flag': flag} );
		$("#" + notification_id + ".noti-list").remove();
	};
</script>