<?php
$country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>

<?php 
	$stripe_option='1';
	$publishable_key='';
	$live_publishable_key='';
	$logo_front='';
	$map_key = "";
	if (isset($settings['stripe_option'])) {
		$stripe_option = $settings['stripe_option'];
	}
	if (isset($settings['publishable_key'])) {
		$publishable_key = $settings['publishable_key'];
	}
	if (isset($settings['live_publishable_key'])) {
		$live_publishable_key = $settings['live_publishable_key'];
	}
	if (isset($settings['logo_front'])) {
		$logo_front = $settings['logo_front'];
	}
	if (isset($settings['map_key'])) {
		$map_key = $settings['map_key'];
	}

	if($stripe_option==1){
		$stripe_key= $publishable_key;
	}else{
		$stripe_key= $live_publishable_key;
	}

	if(!empty($logo_front)){
		$web_log=base_url().$logo_front;
	}else{
		$web_log=base_url().'assets/img/logo.png';
	}
?>
 
		<input type="hidden" id="base_url" value="<?php echo $base_url; ?>">
		<input type="hidden" id="site_name" value="<?php echo $this->website_name;?>">
		<input type="hidden" id="csrf_token" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<input type="hidden" id="csrfName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
		<input type="hidden" id="csrfHash" value="<?php echo $this->security->get_csrf_hash(); ?>">

		<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatables/datatables.min.js"></script>
		<script src="<?php echo $base_url; ?>assets/js/cropper_profile_provider.js"></script>
		<script src="<?php echo base_url();?>assets/js/cropper.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/script_crop.js"></script>

		<!-- Sticky Sidebar JS -->
		<script src="<?php echo base_url();?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		<!-- Toaster -->
		<script src="<?php echo base_url();?>assets/plugins/toaster/toastr.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/owlcarousel/owl.carousel.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
				
		<script src="https://maps.googleapis.com/maps/api/js?key=<?=$map_key?>&v=3.exp&libraries=places"></script>  
		<input type="hidden" id="map_key" name="map_key" value="<?php echo $map_key;?>">
		<input type="hidden" id="modules_page" value="<?php echo $module;?>">


		<script src="<?php echo base_url();?>assets/js/multi-step-modal.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jquery-confirm/jquery-confirm.min.css">
		<script src="<?php echo base_url();?>assets/plugins/jquery-confirm/jquery-confirm.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/functions.js?v1.05"></script>
		<input type="hidden" id="user_type" value="<?= $this->session->userdata('usertype'); ?>">

		<script src="<?php echo base_url();?>assets/js/script.js?v1.01"></script>


		<span id="success_message"><?php echo $this->session->flashdata('success_message');?></span>
		<span id="error_message"><?php echo $this->session->flashdata('error_message');?></span>

		<?php
			if(!empty($this->session->flashdata('success_message'))){ ?>
				<script src="<?php echo base_url();?>assets/js/success_toaster.js"></script>
		<?php } ?>

		<?php
			if(!empty($this->session->flashdata('error_message'))) { 
		?>
				<script src="<?php echo base_url();?>assets/js/error_toaster.js"></script>
		<?php 
			} 
			$this->session->unset_userdata('error_message');
			$this->session->unset_userdata('success_message');
		?>

	</body>

</html>