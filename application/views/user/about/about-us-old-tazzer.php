 <div class="breadcrumb-bar">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="breadcrumb-title">
					<h2> <?php echo (!empty($user_language[$user_selected]['lg_about'])) ? $user_language[$user_selected]['lg_about'] : $default_language['en']['lg_about']; ?></h2>
				</div>
			</div>
			 <div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href=" <?php echo base_url();?>"> <?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"> <?php echo (!empty($user_language[$user_selected]['lg_about'])) ? $user_language[$user_selected]['lg_about'] : $default_language['en']['lg_about']; ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
 <?php
$query = $this->db->query("select * from system_settings WHERE status = 1");
$result = $query->result_array();
?>

<section class="about-us">
			<div class="content">
				<div class="container">
					<div class="row">
					<div class="col-xl-5 col-sm-5 col-12">
							<div class="about-blk-image">
								<img src="assets/img/aboutus1.8d9172eb.png" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-xl-7 col-sm-7 col-12">
							<div class="about-blk-content">
								<h4>WE ARE YOUR PARTNER WHO CARES ABOUT YOUR BUISNESS</h4>
								<span> <style type="text/css">p {
    color: white !important;
}</style><p class="pclass"> 
<?php
$query = $this->db->query("SELECT * FROM system_settings ");
$query11=$query->result_array($query);
//echo $query->num_rows(); die;
if( $query->num_rows() > 0) {
    $result = $query->result(); //or $query->result_array() to get an array
    foreach( $result as $row )
    {
      if($row->key=="about_us"){
      	 echo $row->value;
      } //access columns as $row->column_name
    }
}
 ?>
								</p>
							</span>
							</div>
							<div class="row">
					<div class="col-xl-6 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									
									<div class="dash-widget-info2">
										
										<h6 class="text-muted">We're Expertise</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									
									<div class="dash-widget-info2">
										<h6 class="text-muted">100% Satisfaction Guaranteed</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									
									<div class="dash-widget-info2">
										<h6 class="text-muted">Experienced & Reliable</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									
									<div class="dash-widget-info2">
										<h6 class="text-muted">Subscription</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<section>
      <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="heading howitworks">
                    <h4>WE ARE QUALIFIED & EXPERIENCED SERVICE PROVIDERS</h4>
                    <span>We help you reach your target audience & cover any demographics that you like. So, we know how to help your company succeed. Save time and money by allowing us to do all of the legwork for you
</span>
                </div>
                
                 <div class="heading howitworks">
                     <iframe height="500" width="80%" src="https://www.youtube.com/embed/cF9BeGtxXGk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>
                </div>
               
               
                </div>
                
                </div>
                    
                </div>
</section>
<section class="call-us">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<span></span>
						<h4 class="pclass">Get your business on the map with our app & extend your business.

</h4>
					</div>
					<div class="col-6 call-us-btn">
						<a href="contact" class="btn btn-call-us">Join US</a>
					</div>
				</div>
			</div>
		</section>
		<section class="how-work">
			<div class="">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading howitworks container">
							<h2>OUR TEAM</h2>
							<span>Cleaning Company is a minority owned business with a large group of specially trained, dedicated employees to provide professional service with a personal touch.</span>
						</div>
						<!-- <div class="ml-5"> -->
							<div class="row">
								<!-- <div class="col-lg-2">
									<div class="howwork">
										<div class="">
											<img width="225px" height="225px" src="assets/img/imgpsh_fullsize_animneww.png" style="border-radius: 50%;" alt="">
										</div>
										<h3 style="">Rose W.</h3>
									</div>
								</div> -->
								<div class="col-lg-3 col-md-6">
									<div class="howwork">
										<div class="">
											<img width="225px" height="225px" src="assets/img/imgpsh_fullsize_anim11.png" style="border-radius: 50%;" alt="">
										</div>
										<h3 style="">Aaron W.</h3>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="howwork">
										<div class="">
											<img width="225px" height="225px" src="assets/img/imgpsh_fullsize_anim (1)neww.png" style="border-radius: 50%;" alt="">
										</div>
										<h3 style="">Roselyn N.</h3>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="howwork">
										<div class="">
											<img width="225px" height="225px" src="assets/img/imgpsh_fullsize_anim (2)neww.png" style="border-radius: 50%;" alt="">
										</div>
										<h3 style="">Mahadi H.</h3>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="howwork"> 
										<div class="">
											<img width="225px" height="225px" src="assets/img/imgpsh_fullsize_anim (2).png" style="border-radius: 50%;" alt="">
										</div>
										<h3 style="">Duncan E.</h3>
									</div>
								</div>
							</div>
						<!-- </div> -->
					</div>
				</div>
			</div>
		</section>
