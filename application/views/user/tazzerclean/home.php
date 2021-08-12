<?php
$services_count = countServices();

// $currency_option = settingValue('currency_option');
?>

<style type="text/css">
    .slider {
        width: calc(100% - 30px);
        margin: 30px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before { 
      color: black;
    }
    @media screen and (max-width: 600px) {

        a.navbar-brand.logo-small {
            display: none;
        }
    }
</style>
<section class="hero-section">
    <div class="layer">
        <div data-v-60e7013d="" class="home-banner"></div>	
        <div data-v-60e7013d="" class="home-content content">
            <div data-v-60e7013d="" class="row">
                <div data-v-60e7013d="" class="display-5 white--text">
                    <h4>WE ARE TAZZER!</h4>
                </div>
            </div>
            <div data-v-60e7013d="" class="row">
                <div data-v-60e7013d="" class="display-2 white--text">
                    <h2>Affordable And Flexible Pricing</h2>
                </div>
            </div>
            <div data-v-60e7013d="" class="row mt-30">
                <div data-v-60e7013d="" class="display-5 white--text">
                    <p> At Tazzer Clean, you will find all professional cleaning & handymen services at affordable and flexible rates. We believe in providing quality work at cheapest prices. Put your business on the map by joining us as Partners , Professionals , Companies and sell your services </p>
                </div>
            </div>
            <div data-v-60e7013d="" class="width60">
                <div data-v-60e7013d="" style="display: flex;">
                    <div data-v-60e7013d="" class="book-section">
                        <a href="<?php echo base_url(); ?>all-services" class="v-btn first-image-button">BOOK A SERVICE</a>
                    </div>
                </div>
            </div>
            <div data-v-60e7013d="" class="row align-center justify-center"></div>
        </div>
    </div>
</section>

<div data-v-60e7013d="" class="service-block">
    <div data-v-60e7013d="" link="<?php echo base_url();?>service-category-detail/1" class="box1">
        <div data-v-60e7013d="">
            <img data-v-60e7013d="" alt="HOUSE CLEANING" src="<?php echo base_url();?>assets/img/tazzer_old/house.49445a85.jpg" transition="scale-transition">
        </div>
        <h3 data-v-60e7013d="">HOUSE CLEANING</h3>
    </div>
    <div data-v-60e7013d="" link="<?php echo base_url();?>services" class="box1">
        <div data-v-60e7013d="">
            <img data-v-60e7013d="" alt="ALL SERVICES" src="<?php echo base_url();?>assets/img/tazzer_old/bucket.098577b2.jpg" transition="scale-transition">
        </div>
        <h3 data-v-60e7013d="">ALL SERVICES</h3>
    </div>
    <div data-v-60e7013d="" link="https://tazzershop.azurewebsites.net" class="box1">
        <div data-v-60e7013d="">
            <img data-v-60e7013d="" alt="SHOP" src="<?php echo base_url();?>assets/img/tazzer_old/shop.26aa299e.jpg" transition="scale-transition">
        </div>
        <h3 data-v-60e7013d="">SHOPPING CENTER</h3>
    </div>
</div>

<div class="container search-block">
    <div class="row">          
        <div class="col-lg-10 con">
            <div class="section-search">
                <div class="search-box">
                    <form action="<?php echo base_url(); ?>search" id="search_service" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <div class="search-input line">
                            <i class="fa fa-tv bficon"></i>
                            <div class="form-group mb-0">
                                <input type="text" class="form-control common_search" name="common_search" id="search-blk" placeholder="Please type what you want here" >
                            </div>
                        </div>
                         <div class="search-input">
                            <i class="fa fa-location-arrow bficon"></i>
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" value="" name="user_address" id="user_address" placeholder="Postcode / Zipcode">
                                <input type="hidden" value="" name="user_latitude" id="user_latitude">
                                <input type="hidden" value="" name="user_longitude" id="user_longitude">
                                <a class="current-loc-icon current_location" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                            </div>
                        </div>
                        <div class="search-btn">
                            <button class="btn search_service" name="search" value="search"  type="button"><?php echo (!empty($user_language[$user_selected]['lg_search'])) ? $user_language[$user_selected]['lg_search'] : $default_language['en']['lg_search']; ?></button>
                        </div>
                    </form>
                </div>
                <div class="search-cat">
                    <i class="fa fa-circle"></i>
                    <span><?php echo (!empty($user_language[$user_selected]['lg_popular_search'])) ? $user_language[$user_selected]['lg_popular_search'] : $default_language['en']['lg_popular_search']; ?></span>
                    <?php foreach ($popularServices as $popular_service) { ?>
                        <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $popular_service['service_title']) . '?sid=' . md5($popular_service['id']); ?>">
                            <?php echo $popular_service['service_title'] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT -->
<div data-v-60e7013d="" class="row about-block">
    <div data-v-60e7013d="" class="about-block-left col col-5">
        <div data-v-60e7013d="" aria-label="" class="v-image v-responsive rounded-lg theme--light">
            <div class="v-responsive__sizer" style="padding-bottom: 83.8658%;"></div>
            <div class="v-image__image v-image__image--cover" style="background-image: url(&quot;<?php echo base_url();?>assets/img/tazzer_old/establish.1d5b7975.jpg?v1.0&quot;); background-position: center center;"></div>
            <div class="v-responsive__content" style="width: 626px;"></div>
        </div>
    </div>
    <div data-v-60e7013d="" class="about-block-right col col-7">
        <div data-v-60e7013d="" class="display-5 white--text">
            <!-- <h2 data-v-60e7013d="" class="text-uppercase">About Cleaning Agency </h2> -->
        </div>
        <div data-v-60e7013d="" class="display-2 mt-4 white--text text-uppercase">
            <h4 data-v-60e7013d="">WHY WILL YOU CHOOSE</h4>
        </div>
        <div data-v-60e7013d="" class="display-2 mt-3 white--text text-uppercase">
            <p data-v-60e7013d="">OUR SERVICES?</p>
        </div>
        <div data-v-60e7013d="" class="display-5 mt-5 mb-13 white--text">
            <p data-v-60e7013d="">We are the Best &amp; Top-Rated Cleaning & Handyman Industry</p>
            <p data-v-60e7013d="">Tazzer Clean provides high quality, professional and on-demand, cleaning & handyman services that are highly trusted and convenient with a highly professional team. <!-- Book your professional insured house cleaning services at the cheapest and affordable prices. We deliver quality work &amp; provide the best domestic house cleaners in the United Kingdom. --></p>
        </div>
        <div data-v-60e7013d="" style="display: inline-flex;">
            <div data-v-60e7013d="" aria-label="" class="v-image v-responsive theme--light" style="width: 170px; border-radius: 8px; max-width: 170px;">
                <div class="v-responsive__sizer" style="padding-bottom: 83.8658%;"></div>
                <div class="v-image__image v-image__image--cover" style="background-image: url(&quot;<?php echo base_url();?>assets/img/tazzer_old/establish.1d5b7975.jpg?v1.0&quot;); background-position: center center;"></div>
                <div class="v-responsive__content" style="width: 626px;"></div>
            </div>
            <div data-v-60e7013d="">
                <div data-v-60e7013d="" class="display-5 mt-5 mb-13" style="color: white; margin-left: 50px;">
                    <p data-v-60e7013d="">We are <b data-v-60e7013d="">TazzerClean!</b> Learn more about us. </p>
                </div>
                <button data-v-60e7013d="" type="button" class="about-us-button v-btn v-btn--contained theme--light v-size--default">
                    <span class="v-btn__content"> About Us </span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- OUR SERVICES -->
<div data-v-60e7013d="" class="row mt-15 our-services">
    <div data-v-60e7013d="" class="per-block-header">
        <h3 data-v-60e7013d="" class="text-uppercase">OUR SERVICES</h3>
        <h1 data-v-60e7013d="" class="font40-upper">WE OFFERS PROFESSIONAL WORK</h1>
        <p data-v-60e7013d=""><b data-v-60e7013d="">Tazzer Clean provides Partners , Professionals , Companies to register and sell their services too</b></p>
        <!-- <p data-v-60e7013d="">We at Tazzer Clean focus on delivering quality work and helping our customers with house cleaning services. We focus on domestic cleaning, local handyman, and other tasks professionally.</p> -->
    </div>
    <div data-v-60e7013d="" class="row offer-block" style="padding: 50px 3%;">
        <div data-v-60e7013d="" class="offer-col col col-4">
            <?php
                $categoryCount = count($category);
                $leftCount = intval(($categoryCount+1)/2);
                $rightCount = $categoryCount - $leftCount;
                for ($i = 0; $i < $leftCount; $i ++) {
                    ?>
            <div data-v-60e7013d="" link="<?php echo base_url();?>service-category-detail/<?=$category[$i]['id']?>" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url().$category[$i]['icon'];?>" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d=""><?=$category[$i]['category_name']?></h3>
                    <p data-v-60e7013d=""><?=$category[$i]['description']?></p>
                </div>
            </div>
                    <?php
                }
            ?>
            <!-- <div data-v-60e7013d="" link="<?php echo base_url();?>search/cleaning-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-1.104cb41b.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Cleaning services</h3>
                    <p data-v-60e7013d="">The objective of cleaning is not just to clean, but to feel happiness living within that environment.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/property-and-facilities-management-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-2.0c6a62fe.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Property and facilities management services</h3>
                    <p data-v-60e7013d="">Every Day we help many different people with many different things.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/handyman-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-3.ba999593.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Handyman services</h3>
                    <p data-v-60e7013d="">Anything broke we can fix it , No job is too big.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/scaffolding-and-netting-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-3.ba999593.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Scaffolding And Netting Services</h3>
                    <p data-v-60e7013d="">We offer both commercial & Private services therefore do not hesitate to give us a call or book through our platform.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/construction-and-builders-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-3.ba999593.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Construction And Builders Services</h3>
                    <p data-v-60e7013d="">Put any of your construction work into the hand of our tradesmen and women and you won't be disappointed.</p>
                </div>
            </div> -->
        </div>
        <div data-v-60e7013d="" class="offer-col col col-4">
            <img data-v-60e7013d="" class="go-service-list" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/professional.96e2b9e5.jpg" transition="scale-transition" style="width: 94%; margin-left: 3%; margin-bottom: 30px;">
        </div>
        <div data-v-60e7013d="" class="offer-col col col-4">
            <?php
                for ($i = $leftCount; $i < $categoryCount; $i ++) {
                    ?>
            <div data-v-60e7013d="" link="<?php echo base_url();?>service-category-detail/<?=$category[$i]['id']?>" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url().$category[$i]['icon'];?>" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d=""><?=$category[$i]['category_name']?></h3>
                    <p data-v-60e7013d=""><?=$category[$i]['description']?></p>
                </div>
            </div>
                    <?php
                }
            ?>
            <!-- <div data-v-60e7013d="" link="<?php echo base_url();?>search/domestic-helpers-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-4.063cf3f5.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Domestic Helpers Services</h3>
                    <p data-v-60e7013d="">This service would support you with lots of things around your home such as shopping, completing paperwork & many others.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/gardening-and-landscaping-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-5.67b0b84f.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Gardening And Landscaping Services</h3>
                    <p data-v-60e7013d="">Maintenance comes with the job of gardening</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/clearance-and-rubbish-removal-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-6.01efc161.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Clearance And Rubbish Removal Services</h3>
                    <p data-v-60e7013d="">Put your office, home, and garage clearance in your hands. We also do removal of rubbish & goods as well as transfers of all types.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/dog-walking-and-pet-service" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-3.ba999593.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Dog Walking And Pet Services</h3>
                    <p data-v-60e7013d="">You don’t need to strain or worry about your pets anymore just get to our platform & look for someone to help you with it.</p>
                </div>
            </div>
            <div data-v-60e7013d="" link="<?php echo base_url();?>search/security-services" class="offer_btn"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/p-3.ba999593.png" transition="scale-transition">
                <div data-v-60e7013d="" class="offer-title">
                    <h3 data-v-60e7013d="">Security Services</h3>
                    <p data-v-60e7013d="">Our security men and women are well trained & know our customer expectations as well. we also cover Locksmith & Fire Safety.</p>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div data-v-60e7013d="" class="service-block-1">
    <div data-v-60e7013d="" class="per-block-header">
        <h3 data-v-60e7013d="" class="text-uppercase white--text">OUR SERVICES</h3>
        <h1 data-v-60e7013d="" class="font40-upper white--text">Why will you choose our services?</h1>
        <p data-v-60e7013d="" class="white--text"><b data-v-60e7013d="">Tazzer Clean provides Professional &amp; Eco-Friendly Cleaning Services in UK</b></p>
        <p data-v-60e7013d="" class="white--text">We at Tazzer Clean focus on delivering quality work and helping our customers with house cleaning services. We focus on domestic cleaning, local handyman, and other tasks professionally.</p>
    </div>
    <div data-v-60e7013d="" class="row service-block-2 contact-div">
        <div data-v-60e7013d="" class="service-block-2-item col col-3">
            <div data-v-60e7013d="" class="box2"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/wash.f29a5c34.png" transition="scale-transition" class="width60">
                <h3 data-v-60e7013d="" class="mt-50">Wash &amp; Fold Laundry Service</h3>
                <p data-v-60e7013d="">you wear it || we wash it || we fold it || we deliver it</p>
            </div>
        </div>
        <div data-v-60e7013d="" class="service-block-2-item col col-3">
            <div data-v-60e7013d="" class="box2"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/commercial.7cc49e52.png" transition="scale-transition" class="width60">
                <h3 data-v-60e7013d="" class="mt-50">Commercial Laundry Service</h3>
                <p data-v-60e7013d="">Affordability || The professional Result || Speed || Convenience. || cost ||Time and energy</p>
            </div>
        </div>
        <div data-v-60e7013d="" class="service-block-2-item col col-3">
            <div data-v-60e7013d="" class="box2"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/eco.bf1e04bf.png" transition="scale-transition" class="width60">
                <h3 data-v-60e7013d="" class="mt-50">Eco-Friendly Dry Cleaning</h3>
                <p data-v-60e7013d="">Environment safer. || synthetic Solvent || Better care of Fabrics || Odorless || Harmless || Gentle || nonTOxic || BIodegradable</p>
            </div>
        </div>
        <div data-v-60e7013d="" class="service-block-2-item col col-3">
            <div data-v-60e7013d="" class="box2"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/self.28d91250.png" transition="scale-transition" class="width60">
                <h3 data-v-60e7013d="" class="mt-50">Self Service and Laundromat</h3>
                <p data-v-60e7013d="">save time and money || 24X7 support || Free detergent, softener and disinfectant </p>
            </div>
        </div>
    </div>
</div>

<div data-v-60e7013d="" class="pt90-mb50 client-testimonials">
    <div data-v-60e7013d="" class="per-block-header mb-10">
        <h3 data-v-60e7013d="" class="text-uppercase">Client’s Testimonials</h3>
        <h1 data-v-60e7013d="" class="font40-upper">OUR PROPERTY CLEARANCE SERVICE IS THE BEST AROUND!</h1>
        <p data-v-60e7013d="">We provide safe vehicles and professional experts, which means you can expect a first class, reliable service.Call Tazzer Clean today</p>
    </div><iframe data-v-60e7013d="" height="380" src="https://www.youtube.com/embed/cF9BeGtxXGk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="videoTag"></iframe>
</div>

<div data-v-60e7013d="" class="review-block">
    <div data-v-60e7013d="" class="per-block-header">
        <h3 data-v-60e7013d="" class="text-uppercase white--text">Client’s Testimonials</h3>
        <h1 data-v-60e7013d="" class="font40-upper white--text">We are very happy for client’s reviews.</h1>
        <p data-v-60e7013d="" class="white--text">We provide safe vehicles and professional experts, which means you can expect a first class, reliable service.Call Tazzer Clean today</p>
    </div>
    <div data-v-60e7013d="" class="row contact-div">
        <div data-v-60e7013d="" class="review-col col col-4">
            <div data-v-60e7013d="" class="box2 review-box">
                <div data-v-60e7013d="" class="review-box-header"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/NeilRonald.740dc298.jpg" transition="scale-transition">
                    <div data-v-60e7013d="" class="review-title">
                        <h3 data-v-60e7013d="">Neil Ronald</h3>
                        <p data-v-60e7013d=""></p>
                    </div>
                </div>
                <p data-v-60e7013d="">Timothy was very helpful, he provided top notch cleaning service. I was able to relax and recover from my injury because he took care of the place bringing it to a perfect in all sense spick and span.</p>
                <div data-v-60e7013d="" class="v-rating" style="text-align: right;"><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button></div>
            </div>
        </div>
        <div data-v-60e7013d="" class="review-col col col-4">
            <div data-v-60e7013d="" class="box2 review-box">
                <div data-v-60e7013d="" class="review-box-header"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/WendyCrooks.2012cc3c.jpg" transition="scale-transition">
                    <div data-v-60e7013d="" class="review-title">
                        <h3 data-v-60e7013d="">Wendy Crooks</h3>
                        <p data-v-60e7013d=""></p>
                    </div>
                </div>
                <p data-v-60e7013d="">I used Tazzerclean for my car's cleanup and disinfecting after a gory incident. It was so well done that it looked like it never happened. I recommend because you'll get the worth of your money.</p>
                <div data-v-60e7013d="" class="v-rating" style="text-align: right;"><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button></div>
            </div>
        </div>
        <div data-v-60e7013d="" class="review-col col col-4">
            <div data-v-60e7013d="" class="box2 review-box">
                <div data-v-60e7013d="" class="review-box-header"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/AidanWright.21c6571b.jpg" transition="scale-transition">
                    <div data-v-60e7013d="" class="review-title">
                        <h3 data-v-60e7013d="">Aidan Wright</h3>
                        <p data-v-60e7013d=""></p>
                    </div>
                </div>
                <p data-v-60e7013d="">Tazzerclean is my goto for my family's storage cleanup... We are hoarders. Jonas and team has helped us keep a clean and healthy store area that we would be less ashamed of.</p>
                <div data-v-60e7013d="" class="v-rating" style="text-align: right;"><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button><button type="button" tabindex="-1" class="v-icon notranslate v-icon--link  fa fa-star theme--light orange--text"></button></div>
            </div>
        </div>
    </div>
</div>

<div data-v-60e7013d="" class="pt90-mb50">
    <div data-v-60e7013d="" class="per-block-header">
        <h3 data-v-60e7013d="" class="text-uppercase">Fetaured Blog</h3>
        <h1 data-v-60e7013d="" class="font40-upper">Learn about our latest news from blog.</h1>
        <p data-v-60e7013d=""><!-- We provide safe vehicles and professional experts, which means you can expect a first class, reliable service.Call Tazzer Clean today --></p>
    </div>
    <div data-v-60e7013d="" class="blog-block">
        <div data-v-60e7013d="" class="blog-block-item"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/clean-shower-heads.688de294.jpg" transition="scale-transition">
            <div data-v-60e7013d="" class="blog-block-item-content">
                <div data-v-60e7013d="" class="item-title"><span data-v-60e7013d=""><i data-v-60e7013d="" aria-hidden="true" class="v-icon notranslate title-icon fa fa-user theme--light"></i> ADMIN</span><span data-v-60e7013d=""><i data-v-60e7013d="" aria-hidden="true" class="v-icon notranslate title-icon fa fa-folder theme--light"></i> OFFICE</span></div>
                <h2 data-v-60e7013d="">How To Clean Shower Heads?</h2>
                <p data-v-60e7013d="">Ever wonder when cleaning our homes, we meticulously did all the necessary stuff to keep our homes from looking dirty? Yes, we do, and we continuously make sure it remains in that way. </p>
                <button data-v-60e7013d="" type="button" class="v-btn v-btn--contained theme--light v-size--default">
                    <span class="v-btn__content"> READ MORE <i data-v-60e7013d="" aria-hidden="true" class="v-icon notranslate readmore-icon fa fa-arrow-right theme--light"></i></span>
                </button>
            </div>
        </div>
        <div data-v-60e7013d="" class="blog-block-item"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/Rectangle 40.564701ad.png" transition="scale-transition">
            <div data-v-60e7013d="" class="blog-block-item-content">
                <div data-v-60e7013d="" class="item-title"><span data-v-60e7013d=""><i data-v-60e7013d="" aria-hidden="true" class="v-icon notranslate title-icon fa fa-user theme--light"></i> ADMIN</span><span data-v-60e7013d=""><i data-v-60e7013d="" aria-hidden="true" class="v-icon notranslate title-icon fa fa-folder theme--light"></i> OFFICE</span></div>
                <h2 data-v-60e7013d="">How To Clean Stainless Steel?</h2>
                <p data-v-60e7013d="">Stainless steel is an excellent material for kitchen and bathroom use. The name "Stainless steel "is just a name because this material is prone to water stains, chemical stains, and other stains.</p><button data-v-60e7013d="" type="button" class="v-btn v-btn--contained theme--light v-size--default"><span class="v-btn__content"> READ MORE <i data-v-60e7013d="" aria-hidden="true" class="v-icon notranslate readmore-icon fa fa-arrow-right theme--light"></i></span></button>
            </div>
        </div>
    </div>
</div>

<div data-v-60e7013d="" class="row app-block">
    <div data-v-60e7013d="" class="app-block-left col col-8">
        <h3 data-v-60e7013d="">OUR APPS</h3>
        <h1 data-v-60e7013d="">Get the tazzerclean app</h1>
        <p data-v-60e7013d="">With TazzerClean app you are connected to the biggest marketplace in the industry. The app allows you to check out millions of cleaning @ handyman services that are worth the cost with our app, It is user friendly and easy to navigate.</p>
        <div data-v-60e7013d=""><a data-v-60e7013d="" target="_blank" href="https://apps.apple.com/bg/app/tazzerclean"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/image 6.327ce261.png" transition="scale-transition"></a><a data-v-60e7013d="" target="_blank" href="https://play.google.com/store/apps/details?id=tazzerclean.co.uk"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/image 4.0b4367ec.png" transition="scale-transition"></a></div>
    </div>
    <div data-v-60e7013d="" class="app-block-right col col-4"><img data-v-60e7013d="" alt="" src="<?php echo base_url();?>assets/img/tazzer_old/phone.0095c6fb.png" transition="scale-transition"></div>
</div>

<div data-v-60e7013d="" class="pt-15">
    <div data-v-60e7013d="" class="per-block-header">
        <h3 data-v-60e7013d="" class="text-uppercase">Get in touch</h3>
        <h1 data-v-60e7013d="" class="font40-upper">We want to share our location</h1>
        <p data-v-60e7013d="" class="font40-upper">to find us easily</p>
    </div>
    <div data-v-60e7013d="" class="row contact-div">
        <div data-v-60e7013d="" class="contact-col col col-4">
            <div data-v-60e7013d="" class="contact-btn"><img data-v-60e7013d="" alt="" src="data:image/png;base64,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" transition="scale-transition">
                <div data-v-60e7013d="" class="contact-btn-title">
                    <h3 data-v-60e7013d="">Office Address</h3>
                    <p data-v-60e7013d="">35 high stress, Briathwell Rotherham, S66 7AW</p>
                </div>
            </div>
        </div>
        <div data-v-60e7013d="" class="contact-col col col-4">
            <div data-v-60e7013d="" class="contact-btn">
                <img data-v-60e7013d="" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE4AAABOCAYAAACOqiAdAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAmHSURBVHgB3Vxvctu2El9QkufNq9KnnODReQeIcoLIJ4hzgiozL85k+qHNCaycoPaHTiZOZyKfIOkJrJyg7gVq9gT2NOqf0R+guyApiyBAAiBpSf19SUwSEPjjYnexuwCDHUD4/XWfdToX+N8eMJgIgEvg/BPw5WX08n4EGwCDHcD+2e9XACLU3mRwKTicA59/vEsSd4S4qbB6kKRRwHl01B1Dw9gJ4sKzzycM2Df2LVjEGIz5YnbelBQ6Exe+v+7BX61DCFgYXxGXsLecRM/u30CDCN/+dgiMDRhjD0GIPg69V94qJvCX51+8hpphTVz45jqEVucYGww1t2/whU54e3baNIG34/k8gBYcoiQ+oT+Ln2aRAPG6zilsRVzGqhV3F4nl7OCuLV34/bQPbf4tfrwnRZKILzvmy/nrOsZXSpw9aasuN0IeQc4K6AxYC47BKIU4PrF8Fb348iNUQCFx7qTB7eA2RF6K8O3nEUogGRTt2PHeqIruC0w3zKSJG/QNnonO/P7VUZeh+X+Vby1C1tq7iCVgM4he3BuJ5fyREPxcd18IMXpwNn0vjZ0HtBJXIGkoSfOcJJGOYR3QPL95ySOEb6bDgul7ie/01HWMOeJcSbttt+3kXeMs6HzA//bzd93HmCHOl7Tb9ttNHiHRfcf5OzjGzuyRrTu1Ii75Ij+BJ2mrfnaaPJy2HXxXC/JWxBkW0k6krQb25jfUKcF7zc95kffg3e/HqMyHONpIcIFREZhEL+9NoALCt1P0++A79Tr5er8cdZ+VtWdrAxsp97xIWw2sJvJMLyiXUyAmfA6n0dfdS/CAaYw2rop0R9ClGKo3qpBGiF5+ORZLrvlyrq4K7+uvixDdoiGqhZ/2300v5BLMZ4xC5AgiISrrL5CLZ2WKUmd16KJi8jrvrTrhwaT0GQG4WmAX0i9z9B2lvwfiVL1Okljk4wXAgie5q3wxhppgJg8G4dl0WN6+i+3R4UZHVmDQsuhZKYFo4Gh6g8sYj+7R8xOltzCY7Rk/boD6I8w8zkjx1mv5TOShgv3Krn13jGvLYfS8+whVyD4RSUFLw+M90okP3k2/AwdgvzS+jDUVTByapizDr37F1jxqEtvkC9QOVAtjxoIMWbR08w1FyZcKxFDtcw3W7kUyvkPs60P2qt6/C5jqbwloMp6Wi0iwZe8/4AlySUgSpQTin5pH+mzeubBdj1LEhAmmjBH1/6ydE6QA7hI88FpQlyHWg/MDw4LeiTzOZxS0yAgPRVnU9oFQHkLd0cjL0Q+j5VO99ejq/+xXqAGkl6X0adwLRD9YdI5t+8E+VCvbU6WOjEOWOF4WhnaHJG2+d6G6PQyMCt4b0r3Q+mbwrbW13VucQInUBYLznzMPBMFDqBFrpCmOrLihMDY0ABN5KCTHNn4eGQK91LUG6R+o4wLFNxKhb3BPhZk0kgD2uskFP5GXV/Toqtg63lqpC1YpygC4yDuVa8z6opg0XJm86J5Aw+B7M521Hdgsz6TUgTjPtU2EKoB/LfLEYf4SKqCctHsjuAPIl1+KvOPdYlaGApZ59wlmnSH9EySO3STTMTArj14HGdfbAtJSJOGniXLZTuritsp0BblETaMjPyptej7RBtlxm3TIdpC2+u2lxkXBZDZYwDRdYwd4bz727XgdkmyMVOR+fIOkEXRSZz2rtNO1NZDEmaZrHdYVRftkk6Sl8J5VsQ1QFglsEBR1rFujWfxIBthvH7YBfJ6XnICVjk0KFctaZhSqh7dr1Xi6qn6Lk5HQSS5YKuKmIZdSqmsixMCmLaqaT8ql/oo4vbeMzrDjS+sUcVk09c4geIYAFrD/2rUTE+VKlI2OxN5yBtY+T9ojKmJdaMZ2kd0olDA8WsxPNs0o3JSG1ykKTZn/fCZfF2xcigOXdJwpR+vaTxOgcoigxR5zwX+tYrTyxOHUpMSH8lh0dfTFPrgMUJv0dcuWbzNygUzTVHNOgMRfMxdAwKDiB/gHQBsBTqKgGciQjKOCJ10AkAvFDygBDjsOLXGx6c7Ho1wVfBxNBX3C11GCtw3mnENnMQI1XUZRVEf3hMJH2oQvpvD+98Of3sGETaO4lFVbt+Gn4PfPpmRwBsrlGzGHA9/aj02iMMuVBBsn2at+PhnmN0nfRcrlHpWEyarxHUN51XmNPlnSF0leqNyqXfKkIfujE2JWpUdr6LpdILt9DqYp61HrVkie4M+qltFLP7SN/qMa3iKPX8BpXZtErIgjGHTU5OqoewCOKCCPDNAr33wE1YuQASt6Rm4S6cxfVZVA60y+rigFPH0y6aZg5h00ZQtxwYx7n1TiVUYaQVY0OWT2TbCWOIK+KIWkhD/1mWJFkoeY0McqLdguSAyVwKkgR4VT7ch6lGAdSKZzQZ/sr0DyEANZuSkLH/UozKbJvav8KRmxOmpKVDhJXAq9vvOvKo8JkGvYge4+hd/5Yn663rdrCrKOSvN1eFUrJfouUq7KDRg+X5AGTUbGUDAjVyxS+pIKTp+8raksAjwlz0viCOb9DH6WdtVv8fYhIMkGaaT8UpB1SZ43cXIQpnJ3y70C5n6v0+LqgW0blxRkrRtEfGEaRFXyZN+l0hfDJ29blbzKxBUNoh7y0FoHrZEp41Yl2V2FvFqIKxoERZOpaqiqp54nUNzIUrGKVU++5NVGXOkgPPaEan8jXbz/ex7VtXD3mTG1Elc0iCp+3l3ANG5TFKj2qnOzv5Ts4drS2Jux/NWQV65d4lIUTNvKBwk0Cd2qSLeJpbF9DvEX1B10sHaQwAYPOzAB17W5tbjUqQoa3SAiEzVzeASaRXy8YW2zJ0VowVne4FAUWb0EDYPC4eYIiFzfXm1VnrWlKTjUlK81puNUSDdi3h6ZT+XavNWldCXny/H6Nbmb8nl+7X1ne7lIudKuxETvafyvRPo2pPt0pMXDAl0s7+4kbh0lkV9o4vStIphIM0kbYSPEpShyWWI0T6BR0koOc9gocYTiE2hSNEOgL2lyRLAlsAsh1Uegvg5QwurYkK0hjhBHQNrD4ulLqHbmSEIaSbnqn1mftbJVxKUoi8FlgVLIxEdYiB/LSjLkjpjF3jeaw2kITgfUbCVxKdwITMDgEmOAERe0DzddBYgeC9hjiPdc6JIyzqf6bDVxKdYIfAwlYXQPeB2FtBPErUMakTZ8pdsz5gry02BRXi2gw84RlyKWws4hC+CJO4nVw+47S9w64kOd231cQA4CFjzkDJdvgg5OSI+2RaIY5mNpa9ESPtax1+Jv7JpiIyCe50YAAAAASUVORK5CYII=" transition="scale-transition">
                <div data-v-60e7013d="" class="contact-btn-title">
                    <h3 data-v-60e7013d="">Mobile Number</h3>
                    <p data-v-60e7013d="">(+44) 79 6124 2587</p>
                </div>
            </div>
        </div>
        <div data-v-60e7013d="" class="contact-col col col-4">
            <a data-v-60e7013d="" href="mailto:info@<?php echo base_uri();?>" style="text-decoration: none;">
                <div data-v-60e7013d="" class="contact-btn"><img data-v-60e7013d="" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE4AAABOCAYAAACOqiAdAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAT4SURBVHgB7ZxhbtNIFMffmCRCol21N3CzB1h6ApwTtJyAzQdaIT4AJ9j0BOx+QChlpfYG9AYNJ2hOAMMJGtF0F9WNh/fGcSj2jD1JPGmczE8CJXYyqf/5+/2fx9MCOBwOh8PhcDgcDofDsVyw9Ab//VUANbbnCeYLJrZgzREAfYiiT/zwt7O72yfC+e8uH7N64wRf+hgcChgXo5sWf7HN5TP6Lxatfo4P195hBQxECC3+cqPP/PeXPnvQQNGEDw4D0Hn1m90aQD3IEw3PcQ5rCJ6KvnoPanVTe11jNXhF6ujwGDv9/PzREawRzQ/XfwkhOrr9jLEnbOd4KIoGYoKdRY2bNm9vD2CF8U8ut7yw/hYF+bPgpQMPDMC2ZJ+FjQuqh7CiyFofNs4NRCO2MsKhRT+Bsq4JGSL+u+HKtSuyq4gDUnVsHE+5XnpjRjiPeV/EKGzhw152DBSvDhd+d/gaVoTf//3/WdyKZQNSMOiJergrIvE1vU95qlKT9+Vgo4XuU4YCY/CWCihUHDqGKBqdgqJ/FSD+4c83Wrq6nlvj+OFmRycepU6ze/2RCipUDPqZm8fDE11yCgFv+MFm7llVGA5SvJGgU5dnPqCCoZEfAmJAx8oPN/4uGscoVfmLzd647nHFh1UmNIpCQIxud+lYDYYyE06OinWvyqHRPP7vFYbARV4IJBfwJhgLR1Q1NOSVAETK068oBHRMJVxCVUIjDoGrj/OEgI6ZhCOWPTTGIXAhgO1n95qHgI6ZhSOWNTTuhICv2D1VCOiYSzj5UyxZaJQdAjrmFo5YltCwEQI6ShEu4b5Cw2YI6ChVOGLRoWE7BHSULhyxqNBYRAjosCIcYTs0FhUCOqwJR9gKjUWGgA6rwiWUFRr3EQI6FiKcLOAee6LbbxIa+SEQgw7eW9TVinXhZC16gLVIQJD/Sn1o0HoWw5vmAX3WIhruGlhCOqRWx1nWKDB/VxwazePrsyi+aQTMg71Y9MK7mAlbVDvxtucehlPbVkBYcVyRy2TqjcIdbd0DPHXx4OmfdgwMARoDlKktseq+Uh1X7DJsSAU74geThrTjd6/ozvhUySpD4HAzGaNF4qDINEY6YKy5rzTHmbkMG9JUFy8TN4RdMFujwlVXAvQchaExepr3le6+uYUjl+18GJ6P+ypFS0EuQ4dQb6X5xmnZFPZ7O2IEbRS4nxmBRMfTOm5q1VcCP3tGeINPVT1c4r7zMpI3s3aEATv9fPCobfJmchkK1gHNujo6YLid/hSRPd33h/GYD78Ppm1m46Vr9RN8GGheQl/mkek1rN/9dsqY9+zutplq3Ay1bCrGQs3c+Y+/KKu1b+pTddZadh/YrH3GjrPtMlvYcp+R46rkMh1luy/XcVV1mY4y3ad13Cq4TEcZ7lMtZe3JRfzai/KxyyoomIoc9yWgHoKcEtzdaLQGOGHWvmzZMej7MhgKt1ou02HgvgmFqVrlWjYtBrVvQo7j1sNlOorcp3TcOrlMR5H7yHGX8KuqPZplAMcEmlGBVHCQ49LTOMEqLcefF1rOD9m07TOcge1oZmDnmqFYIfz0BgyFNqO5LxbSHXHdb8s5UsgVCh7NfeHU9VNw7jIAO40wfEoXADJVaep6nCAcHDr6Irxt8ZfbMhOyf8yg+20fbzsFWPf+gDWHCTaIIPoKIzizterJ4XA4HA6Hw+FwOByOsvgBqNjfm4V5pZoAAAAASUVORK5CYII=" transition="scale-transition">
                    <div data-v-60e7013d="" class="contact-btn-title">
                        <h3 data-v-60e7013d="">Mail Address</h3>
                        <p data-v-60e7013d="">info@<?php echo base_uri();?></p>
                    </div>
                </div>
            </a></div>
    </div>
</div>

<script>
      $(".multirow-slider").slick({
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoPlay: true,
        rows: 3,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }

          ]

      });

      /* Slideshow Function Call */

    if(jQuery('#ttr_slideshow_inner').length){
        jQuery('#ttr_slideshow_inner').TTSlider({
            slideShowSpeed:4000, begintime:3000,cssPrefix: 'ttr_'
        });
    }

    $(".go-service-list").on("click", function() {
        window.location.href = "<?=base_url()?>services";
    });
</script>
