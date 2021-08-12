<?php 
    
?>

<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-title">
                    <h2>Service Browse by Category</h2>
                </div>
            </div>
            <div class="col-auto float-right ml-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Service Browse by Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="search-by-filter row">
    <div class="col-lg-12">
        <div class="filter-search-link">
            <a href="<?php echo base_url(); ?>search">
                <span>Search by Filter</span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<section class="search-box-section">
    <div class="box">
        <div class="search-input line">
            <i class="fa fa-search" aria-hidden="true"></i>
            <div class="form-group mb-0">
                <input type="text" class="form-control common_search" name="common_search" id="search-blk" placeholder="Search for a Category" >
            </div>
        </div>
    </div>
</section>

<section class="search-list-section">
    <div class="container">
        <ul class="PageService-browse-list Grid">
            <!-- <li class="Grid-col Grid-col--6 Grid-col--tablet-4 Grid-col--desktopSmall-4">
                <a class="PageService-category-link" title="<?=$data['service_title']?>" href="#?>">
                    ageasdgasdg&nbsp;
                </a>
            </li>
            <li class="Grid-col Grid-col--6 Grid-col--tablet-4 Grid-col--desktopSmall-4">
                <a class="PageService-category-link" title="<?=$data['service_title']?>" href="#?>">
                    ageasdgasdg&nbsp;
                </a>
            </li>
            <li class="Grid-col Grid-col--6 Grid-col--tablet-4 Grid-col--desktopSmall-4">
                <a class="PageService-category-link" title="<?=$data['service_title']?>" href="#?>">
                    ageasdgasdg&nbsp;
                </a>
            </li> -->
        </ul>
    </div>
</section>

<section class="service-list-section">
    <div class="service-block row">
        <?php 
        foreach($category as $cate) {
            $categoryName = $cate['category_name'];
            $categoryImage = $cate['category_image'];
            $icon = $cate['icon'];
            $description = $cate['description'];
            $id = $cate['id'];
            ?>
            <div link="<?php echo base_url().'search/'.str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], strtolower($categoryName));?>" data-id="<?=$id?>" class="service-box">
                <div>
                    <img class="service-img" alt="<?=$categoryName?>" src="<?php echo base_url().$icon;?>" transition="scale-transition">
                </div>
                <div class="service-title">
                    <h3><?=$categoryName?></h3>
                </div>
                <div class="service-description">
                    <span><?=$description?></span>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img light-blue" alt="Cleaning Services" src="<?php echo base_url();?>assets/img/services/1.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Cleaning Services</h3>
            </div>
            <div class="service-description">
                <span>The objective of cleaning is not just to clean, but to feel happiness living within that environment.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img purple" alt="Clearance And Rubbish Removal Services" src="<?php echo base_url();?>assets/img/services/2.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Clearance And Rubbish Removal Services</h3>
            </div>
            <div class="service-description">
                <span>Put your office, home, and garage clearance in your hands. We also do removal of rubbish & goods as well as transfers of all types.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img light-green" alt="Domestic Helpers Services" src="<?php echo base_url();?>assets/img/services/3.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Domestic Helpers Services</h3>
            </div>
            <div class="service-description">
                <span>This service would support you with lots of things around your home such as shopping, completing paperwork & many others.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img blue" alt="Property And Facilities Management Services" src="<?php echo base_url();?>assets/img/services/4.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Property And Facilities Management Services</h3>
            </div>
            <div class="service-description">
                <span>Every Day we help many different people with many different things.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img pink" alt="Gardening And Landscaping Services" src="<?php echo base_url();?>assets/img/services/5.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Gardening And Landscaping Services</h3>
            </div>
            <div class="service-description">
                <span>Maintenance comes with the job of gardening.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img light-blue" alt="Handyman Services" src="<?php echo base_url();?>assets/img/services/6.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Handyman Services</h3>
            </div>
            <div class="service-description">
                <span>Anything broke we can fix it, No job is too big.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img purple" alt="Dog Walking And Pet Services" src="<?php echo base_url();?>assets/img/services/7.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Dog Walking And Pet Services</h3>
            </div>
            <div class="service-description">
                <span>You don’t need to strain or worry about your pets anymore just get to our platform & look for someone to help you with it.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img light-green" alt="Scaffolding And Netting Services" src="<?php echo base_url();?>assets/img/services/8.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Scaffolding And Netting Services</h3>
            </div>
            <div class="service-description">
                <span>We offer both commercial & Private services therefore do not hesitate to give us a call or book through our platform.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img blue" alt="Security Services" src="<?php echo base_url();?>assets/img/services/9.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Security Services</h3>
            </div>
            <div class="service-description">
                <span>Our security men and women are well trained & know our customer expectations as well. we also cover Locksmith & Fire Safety.</span>
            </div>
        </div>
        <div link="<?php echo base_url();?>" class="service-box">
            <div>
                <img class="service-img pink" alt="Construction And Builders Services" src="<?php echo base_url();?>assets/img/services/10.png" transition="scale-transition">
            </div>
            <div class="service-title">
                <h3>Construction And Builders Services</h3>
            </div>
            <div class="service-description">
                <span>Put any of your construction work into the hand of our tradesmen and women and you won't be disappointed.</span>
            </div>
        </div> -->
    </div>
</section>

<section class="all-categories-section">
    <div class="container">
        <h2 class="page-title">Browse all Categories</h2>

        <?php 
        foreach($category as $cate) {
            $categoryId = $cate['id'];
            $categoryName = $cate['category_name'];
            $categoryImage = $cate['category_image'];
            $categoryCount = $cate['category_count'];
            ?>
            <div class="page-category" data-id='category-<?=$categoryId?>'>
                <header class="page-category-heading">
                    <h3 class="page-category-title">
                       <?=$categoryName?>&nbsp;(<?=$categoryCount?>)
                    </h3>
                </header>
                <?php
                $cateId = 'cate_'.$categoryId;
                if (isset($serviceList[$cateId]) && is_array($serviceList[$cateId])) {
                    ?>
                <ul class="PageService-browse-list Grid">
                    <?php 
                    $services = $serviceList[$cateId];
                    foreach($services as $data) {
                        ?>
                        <li class="Grid-col Grid-col--6 Grid-col--tablet-4 Grid-col--desktopSmall-4">
                            <a class="PageService-category-link" title="<?=$data['service_title']?>" href="<?=base_url().'service-preview/'.str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $data['service_title']).'?sid='.md5($data['id'])?>">
                                <?=$data['service_title']?>&nbsp;(<?=$data['total_views']?>)
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                    <?php
                }
                ?>
                
            </div>
            <?php
        } ?>
        
    </div>
</section>

<script type="text/javascript">
    var services = <?=json_encode($service)?>;
</script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/service_categories/search.css?v1.0">
<!-- <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/service_categories/search.js?v1.01"></script>