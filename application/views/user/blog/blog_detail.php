<?php 
	
?>
<div class="breadcrumb-bar">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="breadcrumb-title">
					<h2>Blog Detail</h2>
				</div>
			</div>
			 <div class="col-auto float-right ml-auto breadcrumb-menu"> 
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href=" <?php echo base_url();?>"> <?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<main class="v-main blog" data-booted="true" style="padding: 0px;">
    <div class="v-main__wrap">
        <div class="container container--fluid" style="padding: 0px !important;">
            <div class="container mx-auto container--fluid" style="padding: 0px !important;">
                <div class="container container--fluid" style="width: 90%; background: rgb(231, 231, 231); margin-top: 20px;">
                    <div class="row row--dense">

						<div class="col-sm-12 col-md-12 col-lg-12 col-12">
					        <div class="v-card v-sheet theme--light elevation-0">
					            <div class="v-image v-responsive theme--light" reverse-transition="fade-transition" style="height: 320px;">
					                <div class="v-responsive__sizer" style="padding-bottom: 73.9612%;"></div>
					                <div class="v-image__image v-image__image--cover" style="background-image: url(&quot;<?=base_url().$blogData['image']?>&quot;); background-position: center center;"></div>
					                <div class="v-responsive__content" style="width: 361px;"></div>
					            </div>
					            <div tabindex="-1" class="v-list-item theme--light">
					                <div class="v-list-item__content">
					                    <div class="v-list-item__title" style="font-size: 18px;"><i aria-hidden="true" class="v-icon notranslate fa fa-user theme--light" style="font-size: 24px; color: rgb(37, 203, 242); caret-color: rgb(37, 203, 242); margin-right: 20px;"></i><?=$blogData['author']?></div>
					                </div>
					                <div class="v-list-item__content" style="margin-left: -40%;">
					                    <div class="v-list-item__title" style="font-size: 18px;"><i aria-hidden="true" class="v-icon notranslate fa fa-clock-o theme--light" style="font-size: 24px; color: rgb(37, 203, 242); caret-color: rgb(37, 203, 242); margin-right: 20px;"></i><?=date("M d, Y", strtotime($blogData['created_at']))?></div>
					                </div>
					            </div>
					            <div class="v-card__title" style="font-size: 24px;"><?=$blogData['title']?></div>
					            <div class="v-card__text">
					                <div class="row mx-0 align-center">
					                    <div class="v-rating v-rating--readonly v-rating--dense"><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light amber--text" style="font-size: 18px;"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light amber--text" style="font-size: 18px;"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light amber--text" style="font-size: 18px;"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light amber--text" style="font-size: 18px;"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light amber--text" style="font-size: 18px;"></button></div>
					                </div>
					                <div style="margin-top: 12px;"><?=$blogData['content']?></div>
					            </div>
					            <div class="v-card__actions">
									<a href="<?=base_url()."blog"?>" type="button" class="v-btn theme--light elevation-0 v-size--default"><span class="v-btn__content"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp; Go Back to Blog List</span></a>
								</div>
					        </div>
					    </div>
					    
					</div>
                </div>
            </div>
        </div>
    </div>
</main>