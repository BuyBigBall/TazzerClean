<?php
    $result = settingValue();
    $this->website_name = '';
    $this->website_logo_front ='assets/img/logo.png';
    $fav=base_url().'assets/img/favicon.png';
    if (isset($result['website_name'])) {
        $this->website_name = $result['website_name'];
    }
    if (isset($result['website_name'])) {
        $this->website_name = $result['website_name'];
    }
    if (isset($result['favicon'])) {
        $favicon = $result['favicon'];
    }
    if (isset($result['logo_front'])) {
        $this->website_logo_front = $result['logo_front'];
    }
    if (isset($result['meta_title'])) {
        $this->meta_title = $result['meta_title'];
    }
    if (isset($result['meta_description'])) {
        $this->meta_description = $result['meta_description'];
    }
    if (isset($result['meta_keywords'])) {
        $this->meta_keywords = $result['meta_keywords'];
    }
    if(!empty($favicon)) {
        $fav = base_url().'uploads/logo/'.$favicon;
    }
?>
<!DOCTYPE html>
<html>
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
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="<?php echo $this->meta_description; ?>">
    <meta name="keywords" content="<?php echo $this->meta_keywords; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $fav;?>">
    <title><?php echo $this->meta_title;?></title>
    <?php
    $base_url = base_url();
    $page = $this->uri->segment(1); ?>
    
    <?php if($page == 'admin-profile'){ ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cropper.min.css">
    <?php } ?>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css">
    <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css">-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css?v1.31">
    <script src="<?php echo $base_url; ?>assets/js/ckeditor/ckeditor.js"></script>
   
</head>
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
</script>
<body>
    <div class="main-wrapper">