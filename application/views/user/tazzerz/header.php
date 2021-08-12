<!DOCTYPE html>
<html>
    <?php
    $this->website_name = '';
    $this->website_logo_front = 'assets/img/logo.png';
    $fav = base_url() . 'assets/img/favicon.png';

    if (array_key_exists('website_name', $settings)) {
        $this->website_name = $settings['website_name'];
    }
    if (array_key_exists('favicon', $settings)) {
        $favicon = $settings['favicon'];
    }
    if (array_key_exists("logo_front", $settings)) {
        $this->website_logo_front = $settings['logo_front'];
    }
    if(array_key_exists('meta_title', $settings)){
        $this->meta_title =  $settings['meta_title'];
    }
    if(array_key_exists('meta_description', $settings)){
        $this->meta_description =  $settings['meta_description'];
    }
    if(array_key_exists('meta_keywords', $settings)){
        $this->meta_keywords =  $settings['meta_keywords'];
    }

    if (!empty($favicon)) {
        $fav = base_url() . 'uploads/logo/' . $favicon;
    }
    $lang = (!empty($this->session->userdata('lang'))) ? $this->session->userdata('lang') : 'en';

    $this->stripeKeys = stripeKeys();
    ?>

    <head>
<script type="text/javascript">
(function() {
window.__insp = window.__insp || [];
__insp.push(['wid', 1819856247]);
var ldinsp = function(){
if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=1819856247&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
setTimeout(ldinsp, 0);
})();
</script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $this->meta_title;?></title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $this->meta_description; ?>">
        <meta name="keywords" content="<?php echo $this->meta_keywords; ?>">
        
        <meta name="robots" content="<?php echo $this->meta_robots; ?>" />
        <meta name="googlebot" content="<?php echo $this->meta_googlebot; ?>" />
        <meta http-equiv="content-language" content="<?php echo $this->meta_language; ?>">
        
        <META NAME="geo.position" CONTENT="<?php echo $this->meta_geo_position; ?>">
        <META NAME="geo.placename" CONTENT="<?php echo $this->meta_geo_placename; ?>">
        <META NAME="geo.region" CONTENT="<?php echo $this->meta_geo_region; ?>">
        
        <!--for fb-->
        <meta property="og:url" content="<?php echo $this->fb_og_url; ?>" />
        <meta property="og:type" content="<?php echo $this->fb_og_type; ?>" />
        <meta property="og:title" content="<?php echo $this->fb_og_title; ?>" />
        <meta property="og:description" content="<?php echo $this->fb_og_description; ?>" />
        <meta property="og:image" content="<?php echo $this->fb_og_img; ?>" />
        
        <!--for Google + -->
        <meta property="og:url" content="<?php echo $this->google_og_url; ?>" />
        <meta property="og:type" content="<?php echo $this->google_og_type; ?>" />
        <meta property="og:title" content="<?php echo $this->google_og_title; ?>" />
        <meta property="og:description" content="<?php echo $this->google_og_description; ?>" />
        <meta property="og:image" content="<?php echo $this->google_og_img; ?>" />
        
        <!--for Twitter -->
        <meta property="og:url" content="<?php echo $this->twitter_og_url; ?>" />
        <meta property="og:type" content="<?php echo $this->twitter_og_type; ?>" />
        <meta property="og:title" content="<?php echo $this->twitter_og_title; ?>" />
        <meta property="og:description" content="<?php echo $this->twitter_og_description; ?>" />
        <meta property="og:image" content="<?php echo $this->twitter_og_img; ?>" />

        <meta name="author" content="Tazzer">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $fav; ?>">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/datatables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cropper.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/avatar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owlcarousel/owl.theme.default.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/common.css">

        <?php if ($module == 'home' || $module == 'services') { ?>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css">
        <?php } ?>

        <?php if ($module == 'service') { ?>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tagsinput.css">
        <?php } ?>    

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toaster/toastr.min.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/css/<?=TEMPLATE_THEME?>/style.css">

        <?php if ($this->uri->segment(1) == "book-service") { ?>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css">
        <?php } ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick/css/slick.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/slick/css/slick-theme.css?v1.4">
        <script src="<?php echo $base_url; ?>assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/js/tt_slideshow.js?v1.0"></script>
        <script src="<?php echo $base_url; ?>assets/plugins/slick/js/slick.min.js"></script>

        <script src="<?php echo $base_url; ?>assets/js/ckeditor/ckeditor.js"></script>
        
        <!-- <script src="https://checkout.stripe.com/checkout.js"></script> -->
        <script src="https://js.stripe.com/v3/"></script>
    </head>
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
    var stripe = Stripe("<?php echo $this->stripeKeys['pub_key']; ?>");
</script>
<script src="<?php echo $base_url; ?>assets/js/embed.tawk.js?v1.0"></script>

<body>
    <div id="coverScreen"  class="LockOn"></div>