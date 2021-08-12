<?php
$query = $this->db->query("select * from faq ");
$result = $query->result_array();
?>
<div class="breadcrumb-bar">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="breadcrumb-title">
					<h2><?php echo (!empty($user_language[$user_selected]['lg_FAQ'])) ? $user_language[$user_selected]['lg_FAQ'] : $default_language['en']['lg_FAQ']; ?></h2>
				</div>
			</div>
			<div class="col-auto float-right ml-auto breadcrumb-menu">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo (!empty($user_language[$user_selected]['lg_FAQ'])) ? $user_language[$user_selected]['lg_FAQ'] : $default_language['en']['lg_FAQ']; ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<section class="faq-section">
			<div class="content" style="min-height: 77px;">
				<div class="container">
				<?php
echo $result['0']['value']; //die;
				?>
						<!-- <div class="faq-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">
										<a class="collapsed" data-toggle="collapse" href="#collapseOne"> What services do you provide?</a>
									</h4>
									<div id="collapseOne" class="card-collapse collapse">
										
										<p>Tazzer Group is a platform where people can buy and sell a wide range of services.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">
										<a class="collapsed" data-toggle="collapse" href="#collapseTwo"> What areas do you cover? </a>
									</h4>
									<div id="collapseTwo" class="card-collapse collapse">
										<p>We cover all over United Kingdom  however platform is across the globe.</p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">
										<a class="collapsed" data-toggle="collapse" href="#collapseThree"> What if I am not satisfied with our services ? </a>
									</h4>
									<div id="collapseThree" class="card-collapse collapse">
										<p> We are a team of professionals where we make every effort to provide reliable services. However, in any case, you are not satisfied with  any services on our platform, please let us know & we will re-do the complete job for free of charge. </p>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">
										<a class="collapsed" data-toggle="collapse" href="#collapseFour"> What are your working hours? </a>
									</h4>
									<div id="collapseFour" class="card-collapse collapse">
										<p>
										Our platform is available 24/7 across the globe however our office hours are Monday -  Friday 9am - 5pm UK time.

										</p>	</div>
								</div>
							</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">
									<a class="collapsed" data-toggle="collapse" href="#collapseFive"> Why choose Tazzer Group? </a>
								</h4>
								<div id="collapseFive" class="card-collapse collapse">
									<p>Tazzer Group platform  provides a variety of services across the globe.  Our services cover all walks of life across the globe.</p>
								</div>
							</div>
						</div>
					</div> -->
					
				</div>
			</div>
		</section>
