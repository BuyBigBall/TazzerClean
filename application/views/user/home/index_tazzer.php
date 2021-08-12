<?php
$services_count = countServices();
$popular = getPopularServices();

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
        <!-- <div class="home-banner"></div>	 -->
        <div class="ttr_banner_slideshow"></div>
        <div class="ttr_slideshow">
           <div id="ttr_slideshow_inner">
              <ul>
                 <li id="Slide0" class="ttr_slide" data-slideEffect="Wipe">
                    <a href="#"></a>
                    <div class="ttr_slideshow_last">
                       <div class="ttr_slideshowshape01" data-effect="None" data-begintime="0" data-duration="1" data-easing="linear" data-slide="bottom">
                          <div class="html_content"><p style="margin:0em 0em 0em 0em;text-align:Center;font-size:1.333em;"><span style="font-family:'Roboto Slab','Arial';font-weight:700;font-size:3.929em;color:rgba(255,255,255,1);">OUR AIM IS GROWING AFFLUENCE OF YOUR BUSINESS</span></p></div>
                       </div>
                    </div>
                 </li>
                 <li id="Slide1" class="ttr_slide" data-slideEffect="Wipe">
                    <a href="#"></a>
                    <div class="ttr_slideshow_last">
                       <div class="ttr_slideshowshape11" data-effect="None" data-begintime="0" data-duration="1" data-easing="linear" data-slide="bottom">
                          <div class="html_content"><p style="text-align:Center;"><span style="font-family:'Roboto Slab','Arial';font-weight:700;font-size:3.929em;color:rgba(255,255,255,1);">WE GIVE BEST FOR VITALIZING YOUR BUSINESS</span></p></div>
                       </div>
                    </div>
                 </li>
                 <li id="Slide2" class="ttr_slide" data-slideEffect="Wipe">
                    <a href="#"></a>
                    <div class="ttr_slideshow_last">
                       <div class="ttr_slideshowshape21" data-effect="Fade" data-begintime="0" data-duration="1" data-easing="linear" data-slide="bottom">
                          <div class="html_content"><p style="text-align:Center;"><span style="font-family:'Roboto Slab','Arial';font-weight:700;font-size:3.929em;color:rgba(255,255,255,1);">We have tradis ready to help you</span></p><p style="text-align: center;"><span class="small-title"> Tazzer is a marketplace that connects professionals <br> to small and large organisations. <br>We turn your ideas into reality on this platform.</span></p></div>
                       </div>
                    </div>
                 </li>
              </ul>
           </div>
           <div class="ttr_slideshow_in">
              <div class="ttr_slideshow_last">
                 <div id="nav"></div>
              </div>
           </div>
        </div>
        <div class="ttr_banner_slideshow"></div>
        <div class="container" id="top-container">
            <div class="row">
                <div class="col-lg-9 con">
                    <!-- <div class="first-image-title">
                        The <span>one-stop-shop platform</span> for <br>services & products near you.
                    </div>
                    <div class="first-image-small-title">
                        You can buy or sell on our platform. Choose a service, book a time and pay online. <br>Our services could be accessible across the globe
                    </div> -->
                    <div class="book-section">
                        <a href="<?php echo base_url(); ?>all-services" class="tazzer-button first-image-button">BOOK A SERVICE</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 con">
                    <div class="section-search">
                        <div class="search-box">
                            <form action="<?php echo base_url(); ?>search" id="search_service" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                <div class="search-input first">
                                    <i class="fa fa-tv bficon"></i>
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control common_search" name="common_search" id="search-blk" placeholder="Start typing services e.g Scaffolding">
                                    </div>
                                </div>
                                 <div class="search-input">
                                    <i class="fa fa-location-arrow bficon"></i>
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" value="" name="user_address" id="user_address" placeholder="Enter Postcode or Zipcode">
                                        <input type="hidden" value="" name="user_latitude" id="user_latitude">
                                        <input type="hidden" value="" name="user_longitude" id="user_longitude">
                                        <a class="current-loc-icon current_location" data-id="1" href="javascript:void(0);"><i class="fa fa-crosshairs"></i></a>
                                    </div>
                                </div>
                                <div class="search-btn">
                                    <button class="btn search_service" name="search" value="search"  type="button">Get a quote</button>
                                </div>
                            </form>
                        </div>
                        <div class="search-cat">
                            <i class="fa fa-circle"></i>
                            <span><?php echo (!empty($user_language[$user_selected]['lg_popular_search'])) ? $user_language[$user_selected]['lg_popular_search'] : $default_language['en']['lg_popular_search']; ?></span>
                            <?php foreach ($popular as $popular_services) { ?>
                                <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $popular_services['service_title']) . '?sid=' . md5($popular_services['id']); ?>">
                                    <?php echo $popular_services['service_title'] ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="how-work">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="howitworks">
                    <div class="heading">
                        <h2><?php echo (!empty($user_language[$user_selected]['lg_How_Works'])) ? $user_language[$user_selected]['lg_How_Works'] : $default_language['en']['lg_How_Works']; ?></h2>
                    </div>
                    <span>You can buy or sell on our platform. Choose a service, book a time and pay<br> online. Our services could be accessible across the globe</span>
                </div>
                <div class="howworksec">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="howwork">
                                <div class="iconround">
                                    <img src="<?php echo base_url(); ?>assets/img/icon-1.png">
                                </div>
                                <h3><?php echo (!empty($user_language[$user_selected]['lg_choose_what'])) ? $user_language[$user_selected]['lg_choose_what'] : $default_language['en']['lg_choose_what']; ?></h3>
                                <p><?php echo (!empty($user_language[$user_selected]['lg_dapibus'])) ? $user_language[$user_selected]['lg_dapibus'] : $default_language['en']['lg_dapibus']; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="howwork">
                                <div class="iconround">
                                    <img src="<?php echo base_url(); ?>assets/img/icon-2.png">
                                </div>
                                <h3><?php echo (!empty($user_language[$user_selected]['lg_find_what'])) ? $user_language[$user_selected]['lg_find_what'] : $default_language['en']['lg_find_what']; ?></h3>
                                <p><?php echo (!empty($user_language[$user_selected]['lg_dapibus'])) ? $user_language[$user_selected]['lg_dapibus'] : $default_language['en']['lg_dapibus']; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="howwork">
                                <div class="iconround">
                                    <img src="<?php echo base_url(); ?>assets/img/icon-3.png">
                                </div>
                                <h3><?php echo (!empty($user_language[$user_selected]['lg_Amazing_Places'])) ? $user_language[$user_selected]['lg_Amazing_Places'] : $default_language['en']['lg_Amazing_Places']; ?></h3>
                                <p><?php echo (!empty($user_language[$user_selected]['lg_amesing_3'])) ? $user_language[$user_selected]['lg_amesing_3'] : $default_language['en']['lg_amesing_3']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="category-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading main">
                            <h2><?php echo (!empty($user_language[$user_selected]['lg_Featured_Categories'])) ? $user_language[$user_selected]['lg_Featured_Categories'] : $default_language['en']['lg_Featured_Categories']; ?></h2>
                            <span><?php echo (!empty($user_language[$user_selected]['lg_What_do_you'])) ? $user_language[$user_selected]['lg_What_do_you'] : $default_language['en']['lg_What_do_you']; ?></span>
                        </div>
                    </div>
                </div>						
                <section class="multirow-slider slider">
                        <?php
                        if (!empty($category)) {
                            foreach ($category as $crows) {
                                ?>
                                <div>
                                    <a href="<?php echo base_url(); ?>search/<?php echo str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], strtolower($crows['category_name'])); ?>">
                                        <div class="cate-widget">
                                            <img src="<?php echo base_url() . $crows['category_image']; ?>" alt="">
                                            <div class="cate-title">
                                                <h3><span><i class="fa fa-circle"></i> <?php echo ucfirst($crows['category_name']); ?></span></h3>
                                            </div>
                                            <div class="cate-count">
                                                <i class="fa fa-clone"></i> <?php echo $crows['category_count']; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }

                        } else {
                            echo '<div class="col-lg-12">
								<div class="category">
									No Categories Found
								</div>
							</div>';
                        }
                        ?>
                </section>
            </div>
        </div>
    </div>
</section> -->

<section class="popular-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2><?php echo (!empty($user_language[$user_selected]['lg_Most_Popular_Services'])) ? $user_language[$user_selected]['lg_Most_Popular_Services'] : $default_language['en']['lg_Most_Popular_Services']; ?></h2>
                            <span><?php echo (!empty($user_language[$user_selected]['lg_exlore_greates'])) ? $user_language[$user_selected]['lg_exlore_greates'] : $default_language['en']['lg_exlore_greates']; ?></span>
                        </div>
                        <div class="viewall">
                            <h4><a href="<?php echo base_url(); ?>all-services"><?php echo (!empty($user_language[$user_selected]['lg_View_All'])) ? $user_language[$user_selected]['lg_View_All'] : $default_language['en']['lg_View_All']; ?> <i class="fa fa-angle-right"></i></a></h4>
                            <!-- <span><?php echo (!empty($user_language[$user_selected]['lg_Most_Popular'])) ? $user_language[$user_selected]['lg_Most_Popular'] : $default_language['en']['lg_Most_Popular']; ?></span> -->
                        </div>
                    </div>
                </div>
                <div class="service-carousel">
                    <div class="service-slider owl-carousel owl-theme">

                        <?php
                        if (!empty($services)) {
                            foreach ($services as $srows) {
                                $this->db->select("service_image");
                                $this->db->from('services_image');
                                $this->db->where("service_id", $srows['id']);
                                $this->db->where("status", 1);
                                $image = $this->db->get()->row_array();

                                $provider_details = $this->db->where('id', $srows['user_id'])->get('providers')->row_array();

                                $this->db->select('AVG(rating)');
                                $this->db->where(array('service_id' => $srows['id'], 'status' => 1));
                                $this->db->from('rating_review');
                                $rating = $this->db->get()->row_array();
                                $avg_rating = round($rating['AVG(rating)'], 1);

                                $user_currency_code = '';
                                $userId = $this->session->userdata('id');
                                If (!empty($userId)) {
                                    $service_amount = $srows['service_amount'];

                                    $type = $this->session->userdata('usertype');
                                    if ($type == 'user') {
                                        $user_currency = get_user_currency();
                                    } else if ($type == 'provider') {
                                        $user_currency = get_provider_currency();
                                    } $user_currency_code = $user_currency['user_currency_code'];

                                    $service_amount = get_gigs_currency($srows['service_amount'], $srows['currency_code'], $user_currency_code);
                                } else {
                                    $user_currency_code = settings('currency');
                                    $service_currency_code = $srows['currency_code'];
                                    $service_amount = get_gigs_currency($srows['service_amount'], $srows['currency_code'], $user_currency_code);
                                }                              
                                ?>
                                <div class="service-widget">
                                    <div class="service-img">
                                        <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $srows['service_title']) . '?sid=' . md5($srows['id']); ?>">
                                            <img class="img-fluid serv-img" alt="Service Image" src="<?php echo base_url() . $image['service_image']; ?>">
                                        </a>
                                        <div class="item-info">
                                            <div class="service-user">
                                                <a href="#">
                                                    <?php if ($provider_details['profile_img'] == '') { ?>
                                                        <img src="<?php echo base_url(); ?>assets/img/user.jpg">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url() . $provider_details['profile_img'] ?>">
                                                    <?php } ?>
                                                </a>
                                                <span class="service-price"><?php echo currency_conversion($user_currency_code) . $service_amount; ?></span>
                                            </div>
                                            <div class="cate-list">
                                                <a class="bg-yellow" href="<?php echo base_url() . 'search/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], strtolower($srows['category_name'])); ?>"><?php echo ucfirst($srows['category_name']); ?></a></div>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h3 class="title">
                                            <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $srows['service_title']) . '?sid=' . md5($srows['id']); ?>"><?php echo ucfirst($srows['service_title']); ?></a>
                                        </h3>
                                        <div class="rating">
                                            <?php
                                            for ($x = 1; $x <= $avg_rating; $x++) {
                                                echo '<i class="fa fa-star filled"></i>';
                                            }
                                            if (strpos($avg_rating, '.')) {
                                                echo '<i class="fa fa-star"></i>';
                                                $x++;
                                            }
                                            while ($x <= 5) {
                                                echo '<i class="fa fa-star"></i>';
                                                $x++;
                                            }
                                            ?>
                                            <span class="d-inline-block average-rating">(<?php echo $avg_rating ?>)</span>
                                        </div>
                                        <div class="user-info">

                                            <div class="row">
                                                <?php if ($this->session->userdata('id') != '') {
                                                    ?>
                                                    <span class="col ser-contact"><i class="fa fa-phone mr-1"></i> <span>xxxxxxxx<?= rand(00, 99) ?></span></span>
                                                <?php } else { ?>
                                                    <span class="col ser-contact"><i class="fa fa-phone mr-1"></i> <span>xxxxxxxx<?= rand(00, 99) ?></span></span>
                                                <?php } ?>
                                                <span class="col ser-location"><span><?php echo ucfirst($srows['service_location']); ?></span> <i class="fa fa-map-marker-alt ml-1"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {

                            echo '<div>	
									<p class="mb-0">
										No Services Found
									</p>
								</div>';
                        }
                        ?>
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
                    <h2>CLIENT’S TESTIMONIALS</h2>
                    <span>We provide safe vehicles and professional experts, which means you can expect a first class, reliable service.</span>
                </div>
                
                <div class="heading howitworks">
                     <!-- <iframe data-v-60e7013d="" height="500" width="80%" src="https://www.youtube.com/embed/cF9BeGtxXGk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen" class="videoTag"></iframe> -->
                </div>
               
               
                </div>
                
                </div>
                    
                </div>
</section>

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
</script>
