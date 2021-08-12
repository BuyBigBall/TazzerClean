<?php
    $page = $this->uri->segment(1);
    $active =$this->uri->segment(2);
	$access_result_data_array = $this->session->userdata('access_module');	
	$admin_id=$this->session->userdata('admin_id');
	//echo "<pre>";print_r($this->session->userdata('admin_id'));exit;
	$website_logo_front ='assets/img/logo-icon.png';
    
    if (TEMPLATE_THEME == "old_tazzer") {
    	$website_logo_front = "assets/img/logo-icon-old.png";
    }
 ?>
 <div class="sidebar" id="sidebar">
	<div class="sidebar-logo">
		<a href="<?php echo $base_url; ?>dashboard">
			<img src="<?php echo $base_url.$website_logo_front; ?>" class="img-fluid" alt="">
		</a>
	</div>
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="<?php echo ($page == 'dashboard')?'active':'';?>">
					<a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-columns"></i> <span>Dashboard</span></a>
				</li>
				<?php if(in_array(1,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'adminusers')?'active':''; echo ($page == 'edit_adminuser')?'active':''; echo ($page == 'adminuser_details')?'active':'';?>" >
					<a href="<?php echo $base_url; ?>adminusers"><i class="fa fa-user"></i> <span>Staffs</span></a>
				</li>
                <?php }if(in_array(2,$access_result_data_array)) { ?>                
				<li class="<?php echo ($page == 'categories')?'active':''; echo ($page == 'add-category')?'active':''; echo ($page == 'edit-category')?'active':'';?>">
					<a href="<?php echo $base_url; ?>categories"><i class="fa fa-layer-group"></i> <span>Categories</span></a>
				</li>
				<?php }if(in_array(3,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'subcategories')?'active':''; echo ($page == 'add-subcategory')?'active':''; echo ($page == 'edit-subcategory')?'active':'';?>">
					<a href="<?php echo $base_url; ?>subcategories"><i class="fab fa-buffer"></i> <span>Sub Categories</span></a>
				</li>
				<?php }if(in_array(4,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'service-list')?'active':''; echo ($page == 'service-details')?'active':''; ?>">
					<a href="<?php echo $base_url; ?>service-list"><i class="fa fa-bullhorn"></i> <span> Services</span></a>
				</li>
				<li class="<?php echo ($page == 'job-view')?'active':''; echo ($page == 'job-detail')?'active':''; ?>">
					<a href="<?php echo $base_url; ?>job-view"><i class="fa fa-user"></i> <span> Job View</span></a>
				</li>
				<?php }if(in_array(5,$access_result_data_array)) { ?>
				<li class="<?php echo ($active =='total-report' || $active =='pending-report' || $active == 'inprogress-report' || $active == 'complete-report' || $active == 'reject-report' || $active == 'cancel-report' ||$active == 'reject-payment/(:num)')? 'active':''; ?>">
					<a href="<?php echo $base_url; ?>admin/total-report"><i class="fa fa-calendar-check"></i> <span> Manage Booking</span></a>
				</li>
				<?php if($admin_id==1){ ?>						
				<li class="<?php echo ($page == 'admin' && $active == 'settings')?'active':'';?>">
				<a href="<?php echo $base_url; ?>admin/settings"><i class="fa fa-layer-group"></i> <span>Genaral Settings</span></a>
				</li> 
				<?php } ?>
				<?php }if(in_array(6,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'payment_list')?'active':''; echo ($page == 'admin-payment')?'active':'';?>">
					<a href="<?php echo $base_url; ?>payment_list"><i class="fa fa-hashtag"></i> <span>Payments</span></a>
				</li>
				<?php }if($admin_id==1 || in_array(16,$access_result_data_array)){ ?>
				<li class="<?php echo ($page == 'admin' && $active == 'contact')?'active':''; ?>">
					<a href="<?php echo $base_url; ?>admin/contact"><i class="fa fa-layer-group"></i> <span>Enquiries</span></a>
				</li>
				<?php } ?>
				<?php if(in_array(7,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'ratingstype')?'active':''; echo ($page == 'add-ratingstype')?'active':''; echo ($page == 'edit-ratingstype')?'active':'';?>">
					 <a href="<?php echo $base_url; ?>ratingstype"><i class="fa fa-star-half-alt"></i> <span>Rating Type</span></a>
				</li> 
				<?php }if(in_array(8,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'review-reports')?'active':''; echo ($page == 'add-review-reports')?'active':''; echo ($page == 'edit-review-reports')?'active':'';?>">
					 <a href="<?php echo $base_url; ?>review-reports"><i class="fa fa-star"></i> <span>User Ratings</span></a>
				</li>
				<?php }if(in_array(9,$access_result_data_array)) { ?>				
				<li class="<?php echo ($page == 'subscriptions')?'active':''; echo ($page == 'add-subscription')?'active':''; echo ($page == 'edit-subscription')?'active':'';?>">
					<a href="<?php echo $base_url; ?>subscriptions"><i class="fa fa-calendar"></i> <span>Manage Subscriptions</span></a>
				</li>
				<?php }if(in_array(10,$access_result_data_array)) { ?>
				<li class="<?php echo ($active =='wallet' || $active =='wallet-history')? 'active':''; ?>">
					 <a href="<?php echo $base_url; ?>admin/wallet"><i class="fa fa-wallet"></i> <span> Wallet</span></a>
				</li>
				<?php }if(in_array(12,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'service-providers')?'active':'';?>" >
					<a href="<?php echo $base_url; ?>service-providers"><i class="fa fa-user-tie"></i> <span> Service Providers</span></a>
				</li>
				<?php }if(in_array(11,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'Revenue')?'active':'';?>" >
					<a href="<?php echo $base_url; ?>Revenue"><i class="fa fa-percent"></i> <span>Profit</span></a>
				</li>
                                
                                <!--Add Multiple Languages-->
                                
                                <!-- <li class="<?php echo ($page == 'language')?'active':'';?>" >
					<a href="<?php echo $base_url; ?>language"><i class="fa fa-flag"></i> <span>Language</span></a>
				</li> -->
				<!-- <li class="<?php echo ($page == 'country_code_config')?'active':'';?>">
					<a href="<?php echo $base_url; ?>admin/country_code_config"><i class="fa fa-columns"></i> <span>Country Code</span></a>
				</li> -->
				<?php }if(in_array(13,$access_result_data_array)) { ?>
				<li class="<?php echo ($page == 'users')?'active':'';?>" >
					<a href="<?php echo $base_url; ?>users"><i class="fa fa-user"></i> <span>Users</span></a>
				</li>
				<?php }if(in_array(14,$access_result_data_array)) { ?>
				<!-- <li class="<?php echo ($active == 'settings' || $active =='emailsettings' || $active =='stripe_payment_gateway')? 'active':''; ?>">
					<a href="<?php echo $base_url; ?>admin/settings"><i class="fa fa-cog"></i> <span> Settings</span></a>
				</li>  -->
<?php }if(in_array(15,$access_result_data_array)) { ?>
				<li class="<?php echo ($active == 'emailtemplate' || $active =='edit-emailtemplate')? 'active':''; ?>">
					<a href="<?php echo $base_url; ?>admin/emailtemplate"><i class="fa fa-envelope"></i> <span> Email Templates</span></a>
				</li>
				<?php }?>	

		<?php if($admin_id==1){ ?>		
	
				<li class="<?php echo ($page == 'admin' && $active == 'custom_review')?'active':'';?>">
					<a href="<?php echo $base_url; ?>admin/custom_review"><i class="fa fa-columns"></i> <span>Custom Review</span></a>
				</li>
 				<li class="<?php echo ($page == 'admin' && $active == 'footer_menu')?'active':'';?>">
					<a href="<?php echo $base_url; ?>admin/footer_menu"><i class="fa fa-columns"></i> <span>Footer Menu</span></a>
				</li>
                                
				<li class="<?php echo ($page == 'admin' && $active == 'footer_submenu')?'active':'';?>">
					<a href="<?php echo $base_url; ?>admin/footer_submenu"><i class="fa fa-layer-group"></i> <span>Footer Sub menu</span></a>
				</li> 

				<li class="<?php echo ($page == 'admin' && $active == 'faq')?'active':'';?>">
					<a href="<?php echo $base_url; ?>admin/faq"><i class="fa fa-layer-group"></i> <span>faq</span></a>
				</li> 
				
				<li class="<?php echo ($page == 'employee_form')?'active':'';?>">
					<a href="<?php echo $base_url; ?>employee_form"><i class="fa fa-layer-group"></i> <span>Employee List</span></a>
				</li> 

				</li> 
				<li class="<?php echo ($page == 'user-subscription')?'active':'';?>">
					<a href="<?php echo $base_url; ?>user-subscription"><i class="fa fa-layer-group"></i> <span>Email Subscriptions</span></a>
				</li> 

				<li class="<?php echo ($page == 'user-login-history')?'active':'';?>">
					<a href="<?php echo $base_url; ?>user-login-history"><i class="fa fa-history"></i> <span>User Login History</span></a>
				</li>
				<li class="<?php echo ($page == 'user-chat-history')?'active':'';?>">
					<a href="<?php echo $base_url; ?>user-chat-history"><i class="fa fa-history"></i> <span>User Chat History</span></a>
				</li>
				<li class="<?php echo ($page == 'admin' && $active == 'blog')?'active':'';?>">
					<a href="<?php echo $base_url; ?>admin/blog"><i class="fa fa-layer-group"></i> <span>Blog</span></a>
				</li>		
		<?php } ?>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">

</script>
