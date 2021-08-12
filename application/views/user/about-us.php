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
								<h4>WE ARE YOUR PARTNER WHO CARES ABOUT YOUR HEALTHY</h4>
								<span><p class="pclass"> Tazzer Group provides opportunities to workers to display their skills on Tazzer’s Platform. They will be generalized into different categories including Employee, Sole Trader, Organization, Partners. Every category has its perks.Therefore,  Tazzergroup will provide one window operation solution for all your daily chores. All you have to do is to define the category and we will help you to find the best people selling services in town. </p>
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
                    <h4>WE ARE QUALIFIED & EXPERIENCE
CLEANING SERVICES</h4>
                    <span>Tazzer Group provides high quality, professional and on-demand, services that are fully trusted and convenient with a highly professional team
</span>
                </div>
                
                 <div class="heading howitworks">
                     <iframe data-v-60e7013d="" height="500" width="80%" src="https://www.youtube.com/embed/cF9BeGtxXGk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="videoTag"></iframe>
                </div>
               
               
                </div>
                
                </div>
                    
                </div>
</section>
<section class="call-us">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<span>Free Consultation</span>
						<h4 class="pclass">IF YOU’RE NOT HAPPY, JUST LET US KNOW AND

WE’LL WORK TO MAKE IT RIGHT

</h4>
					</div>
					<div class="col-6 call-us-btn">
						<a href="contact" class="btn btn-call-us">Contact US</a>
					</div>
				</div>
			</div>
		</section>
		<section class="how-work">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading howitworks">
							<h2>OUR TEAM</h2>
							<span>Cleaning Company is a minority owned business with a large group of specially trained, dedicated employees to provide professional service with a personal touch.</span>
						</div>
						<div class="">
							<div class="row">
								<div class="col-lg-4">
									<div class="howwork">
										<div class="">
											<img src="assets/img/Ellipse%20281.bf91c4d2.png" alt="">
										</div>
										<h3>Alan Yarbrough</h3>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="">
											<img src="assets/img/Ellipse%20282.319cff00.png" alt="">
										</div>
										<h3>Alina Barlkova</h3>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="">
											<img src="assets/img/Ellipse%20283.c811f4a2.png" alt="">
										</div>
										<h3>David S.</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
