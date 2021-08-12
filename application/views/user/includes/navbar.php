<?php
    $type = $this->session->userdata('usertype');
    $userId = $this->session->userdata('id');
?>

<?php
    if ($this->session->userdata('user_select_language') == '') {
        if ($default_language_select['tag'] == 'ltr' || $default_language_select['tag'] == '') {

        } elseif ($default_language_select['tag'] == 'rtl') {
            echo'<link href="' . base_url() . 'assets/css/bootstrap-rtl.min.css" media="screen" rel="stylesheet" type="text/css" />';
            echo'<link href="' . base_url() . 'assets/css/app-rtl.css" rel="stylesheet" />';
        }
    } else {
        if ($this->session->userdata('tag') == 'ltr' || $this->session->userdata('tag') == '') {
            
        } elseif ($this->session->userdata('tag') == 'rtl') {

            echo'<link href="' . base_url() . 'assets/css/bootstrap-rtl.min.css" media="screen" rel="stylesheet" type="text/css" />';
            echo'<link href="' . base_url() . 'assets/css/app-rtl.css" rel="stylesheet" />';
        }
    }

    $headerClass = "";
    if ($module == "home" && $page == "index") {
        $headerClass = "home";    
    } 
    else {
        $headerClass = "page";
    }
?>

<div class="main-wrapper">
    <header class="header sticktop">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="<?php echo base_url(); ?>" class="navbar-brand logo">
                    <img src="<?php echo base_url(); ?>assets/img/logo-icon-old.png" class="img-fluid" alt="Logo">
                </a>
                <a href="<?php echo base_url(); ?>" class="navbar-brand logo-small">
                    <img src="<?php echo base_url(); ?>assets/img/logo-icon-old.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="<?php echo base_url(); ?>" class="menu-logo">
                        <img src="<?php echo base_url() . $this->website_logo_front; ?>" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="has-submenu">
                        <?php  
                            $this->db->select('*');
                            $this->db->from('categories');
                            $this->db->where('status', 1);
                            $this->db->order_by('category_name', 'asc');
                            $result = $this->db->get()->result_array();
                        ?>
                        <a href="<?php echo base_url(); ?>all-categories"><?php echo (!empty($user_language[$user_selected]['lg_category_name'])) ? $user_language[$user_selected]['lg_category_name'] : $default_language['en']['lg_category_name']; ?> <i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <?php foreach ($result as $res) { ?>
                                <li><a href="<?php echo base_url(); ?>search/<?php echo str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], strtolower($res['category_name'])); ?>"><?php echo ucfirst($res['category_name']); ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li><a href="<?php echo base_url(); ?>about-us"><?php echo (!empty($user_language[$user_selected]['lg_about'])) ? $user_language[$user_selected]['lg_about'] : $default_language['en']['lg_about']; ?></a></li>
                    <li><a href="<?php echo base_url(); ?>latest-job">LATEST JOB</a></li>
                    <?php
                    $usertype = $this->session->userdata('usertype');
                    if ($usertype != 'provider') {
                        ?>    
                        <li><a href="<?php echo base_url(); ?>contact"><?php echo (!empty($user_language[$user_selected]['lg_contact'])) ? $user_language[$user_selected]['lg_contact'] : $default_language['en']['lg_contact']; ?></a></li>
                    <?php } ?>

                    <?php if ($this->session->userdata('id') == '') { ?>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="javascript:void(0);" data-toggle="modal" data-target="#tab_login_modal"><?php echo (!empty($user_language[$user_selected]['lg_login'])) ? $user_language[$user_selected]['lg_login'] : $default_language['en']['lg_login']; ?></a>
                        </li>
                    <?php } ?> 

                    <?php
                    if ($userId != '') {
                        $get_currency = get_currency();
                        $user_currency = get_user_currency();
                        $user_currency_code = $user_currency['user_currency_code'];
                        ?>

                    <?php } ?>

                </ul>        
            </div>       
            <ul class="nav header-navbar-rht">
            <?php 
                if ($this->session->userdata('id') == '') { ?>
                                              
                    <li><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modal-wizard1">Join Us</a></li>

                    <!-- <li>
                        <a class="btn btn-primary" href="javascript:void(0);"  data-toggle="modal" data-target="#myModal">
                            <?php // echo (!empty($user_language[$user_selected]['lg_become_user'])) ? $user_language[$user_selected]['lg_become_user'] : $default_language['en']['lg_become_user']; ?>
                            </a>
                    </li> -->

                    <?php
                }
                $wallet = 0;
                $token = '';
                if ($this->session->userdata('id') != '') {
                    if (!empty($token = $this->session->userdata('chat_token'))) {
                        $wallet_sql = $this->db->select('*')->from('wallet_table')->where('token', $this->session->userdata('chat_token'))->get()->row();
                        if (!empty($wallet_sql)) {
                            $wallet = $wallet_sql->wallet_amt;
                            $user_currency_code = '';
                            If (!empty($userId)) {
                           
                                $wallet = $wallet_sql->wallet_amt;
                                if ($type == 'user') {
                                    $user_currency = get_user_currency();
                                } else if ($type == 'provider') {
                                    $user_currency = get_provider_currency();
                                }
                                $user_currency_code = $user_currency['user_currency_code'];

                                $wallet = get_gigs_currency($wallet_sql->wallet_amt, $wallet_sql->currency_code, $user_currency_code);
                            } else {
                                $user_currency_code = settings('currency');
                                $wallet = $wallet_sql->wallet_amt;
                            }
                        }
                    }

                    if ($this->session->userdata('usertype') == 'provider') {
                        ?>
                        <li class="nav-item desc-list wallet-menu">
                            <a href="<?= base_url() . 'provider-wallet' ?>" class="nav-link header-login">
                                <img src="<?php echo $base_url ?>assets/img/wallet.png" alt="" class="mr-2 wallet-img"><span><?php echo (!empty($user_language[$user_selected]['lg_wallet'])) ? $user_language[$user_selected]['lg_wallet'] : $default_language['en']['lg_wallet']; ?>:</span> <?php echo currency_conversion($user_currency_code) . $wallet; ?>
                            </a>
                        </li>
                        <?php   
                    } 
                    else {
                        ?>
                        <li class="nav-item desc-list wallet-menu">
                            <a href="<?= base_url() . 'user-wallet' ?>" class="nav-link header-login">
                                <img src="<?php echo $base_url ?>assets/img/wallet.png" alt="" class="mr-2 wallet-img"><span><?php echo (!empty($user_language[$user_selected]['lg_wallet'])) ? $user_language[$user_selected]['lg_wallet'] : $default_language['en']['lg_wallet']; ?>:</span> <?php echo currency_conversion($user_currency_code) . $wallet; ?>
                            </a>
                        </li>
                        <?php
                    }
                }
            ?>

            <?php
                if (($this->session->userdata('id') != '') && ($this->session->userdata('usertype') == 'provider')) {   ?>
                        <!-- @Leo: never cancel it! -->
                       <li class="nav-item desc-list">
                            <a href="javascript:;" class="nav-link header-login post-service" id="post-service"><i class="fa fa-plus-circle mr-1"></i> <span><?php echo (!empty($user_language[$user_selected]['lg_post_service'])) ? $user_language[$user_selected]['lg_post_service'] : $default_language['en']['lg_post_service']; ?></span></a>
                        </li>
                    <?php
                }  ?>
            <?php

                if (($this->session->userdata('id') != '') && ($this->session->userdata('usertype') == 'user')) {   ?>
                        <!-- @Leo: never cancel it! -->
                       <li class="nav-item desc-list">
                            <a href="<?php echo base_url(); ?>post-a-jobs" class="nav-link header-login post-jobs" id="post-jobs"><i class="fa fa-plus-circle mr-1"></i> <span>Post A Jobs </span></a>
                        </li>
                        <?php
                }  ?>

                <?php   
                if ($this->session->userdata('id')) {
                    if ($this->session->userdata('usertype') == 'user') {
                        $user_details = $this->db->where('id', $this->session->userdata('id'))->get('users')->row_array();
                    } elseif ($this->session->userdata('usertype') == 'provider') {
                        $user_details = $this->db->where('id', $this->session->userdata('id'))->get('providers')->row_array();
                    }
                    ?>
                    <?php if ($this->session->userdata('usertype') == 'provider') { ?>
                        <!-- Notifications -->
                        <li class="nav-item dropdown logged-item" id="notification-nav">

                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                            </a>
                            <div class="dropdown-menu notify-blk dropdown-menu-right notifications">
                                <div class="topnav-dropdown-header">
                                    <span class="notification-title">Notifications</span>
                                    <a href="javascript:void(0)" class="clear-noti noty_clear" data-token="<?php echo $this->session->userdata('chat_token'); ?>"><?php echo (!empty($user_language[$user_selected]['lg_clear_all'])) ? $user_language[$user_selected]['lg_clear_all'] : $default_language['en']['lg_clear_all']; ?>  </a>
                                </div>
                                <div class="noti-content">
                                    <ul class="notification-list">
                                        
                                    </ul>
                                </div>
                                <div class="topnav-dropdown-footer">
                                    <a href="<?= base_url(); ?>notification-list"><?php echo (!empty($user_language[$user_selected]['lg_view_notification'])) ? $user_language[$user_selected]['lg_view_notification'] : $default_language['en']['lg_view_notification']; ?></a>
                                </div>
                            </div>
                        </li>
                        <!-- /Notifications -->

                        <?php if (!empty($this->session->userdata('id'))) { ?>
                            <!-- chat -->
                            <li class="nav-item dropdown logged-item" id="chat-nav">

                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu comments-blk dropdown-menu-right notifications">
                                    <div class="topnav-dropdown-header">
                                        <span class="notification-title"><?php echo (!empty($user_language[$user_selected]['lg_chats'])) ? $user_language[$user_selected]['lg_chats'] : $default_language['en']['lg_chats']; ?></span>
                                        <a href="javascript:void(0)" class="clear-noti chat_clear_all" data-token="<?php echo $this->session->userdata('chat_token'); ?>" > <?php echo (!empty($user_language[$user_selected]['lg_clear_all'])) ? $user_language[$user_selected]['lg_clear_all'] : $default_language['en']['lg_clear_all']; ?> </a>
                                    </div>

                                    <div class="noti-content">
                                        <ul class="chat-list notification-list">
                                            
                                        </ul>
                                    </div>
                                    <div class="topnav-dropdown-footer">
                                        <a href="<?= base_url(); ?>user-chat">View all Chat</a>
                                    </div>
                                </div>
                            </li>
                            <!-- /chat -->
                        <?php } ?>
                        <!-- User Menu -->
                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <?php if ($user_details['profile_img'] != '') { ?>
                                        <img class="rounded-circle" src="<?php echo $base_url . $user_details['profile_img'] ?>" width="31" alt="">
                                    <?php } else { ?>
                                        <img class="rounded-circle" src="<?php echo $base_url ?>assets/img/user.jpg" alt="">
                                    <?php } ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <?php if ($user_details['profile_img'] != '') { ?>
                                            <img class="avatar-img rounded-circle" src="<?php echo $base_url . $user_details['profile_img'] ?>" alt="">
                                        <?php } else { ?>
                                            <img class="avatar-img rounded-circle" src="<?php echo $base_url ?>assets/img/user.jpg" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="user-text">
                                        <h6><?php echo $user_details['name']; ?></h6>
                                        <p class="text-muted mb-0">Provider</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>provider-dashboard">Dashboard</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>my-services">My Services</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>provider-bookings">Booking List</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>provider-settings">Profile Settings</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>provider-wallet">Wallet</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>provider-subscription">Subscription</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>verify-payment-method">Payment Verify</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>provider-availability">Availability</a>
                                <?php 
                                $query = $this->db->query("select * from system_settings WHERE status = 1");
                                $result = $query->result_array();
                                
                                $login_type='';
                                foreach ($result as $res) {
                                    
                                    if($res['key'] == 'login_type'){
                                        $login_type = $res['value'];
                                    }
                                    
                                    if($res['key'] == 'login_type'){
                                        $login_type = $res['value'];
                                    }

                                }
                                    if($login_type=='email'){
                                    ?>
                                <a class="dropdown-item" href="<?php echo base_url() ?>provider-change-password">Change Password</a>
                                
                                    <?php } ?>
                                <a class="dropdown-item" href="<?php echo base_url() ?>user-chat">Chat</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a>
                            </div>
                        </li>
                        <!-- /User Menu -->

                    <?php } elseif ($this->session->userdata('usertype') == 'user') { ?>
                        <!-- Notifications -->
                        <li class="nav-item dropdown logged-item" id="notification-nav">

                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right notifications">
                                <div class="topnav-dropdown-header">
                                    <span class="notification-title">Notifications</span>
                                    <a href="javascript:void(0)" class="clear-noti noty_clear" data-token="<?php echo $this->session->userdata('chat_token'); ?>" > Clear All </a>
                                </div>
                                <div class="noti-content">
                                    <ul class="notification-list">
                                        
                                    </ul>
                                </div>
                                <div class="topnav-dropdown-footer">
                                    <a href="<?= base_url(); ?>notification-list">View all Notifications</a>
                                </div>
                            </div>
                        </li>
                        <!-- /Notifications -->

                        <?php if (!empty($this->session->userdata('id'))) { ?>
                            <!-- chat -->
                            <li class="nav-item dropdown logged-item" id="chat-nav">

                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </a>

                                <div class="dropdown-menu comments-blk dropdown-menu-right notifications">
                                    <div class="topnav-dropdown-header">
                                        <span class="notification-title">Chats</span>
                                        <a href="javascript:void(0)" class="clear-noti chat_clear_all" data-token="<?php echo $this->session->userdata('chat_token'); ?>" > Clear All </a>
                                    </div>

                                    <div class="noti-content">
                                        <ul class="chat-list notification-list">
                                            
                                        </ul>
                                    </div>
                                    <div class="topnav-dropdown-footer">
                                        <a href="<?= base_url(); ?>user-chat">View all Chat</a>
                                    </div>
                                </div>
                            </li>
                            <!-- /chat -->
                        <?php } ?>
                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <?php if ($user_details['profile_img'] != '') { ?>
                                        <img class="rounded-circle" src="<?php echo $base_url . $user_details['profile_img'] ?>" alt="">
                                    <?php } else { ?>
                                        <img class="rounded-circle" src="<?php echo $base_url ?>assets/img/user.jpg" alt="">
                                    <?php } ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <?php if ($user_details['profile_img'] != '') { ?>
                                            <img class="avatar-img rounded-circle" src="<?php echo $base_url . $user_details['profile_img'] ?>" alt="">
                                        <?php } else { ?>
                                            <img class="avatar-img rounded-circle" src="<?php echo $base_url ?>assets/img/user.jpg" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="user-text">
                                        <h6><?php echo $user_details['name']; ?></h6>
                                        <p class="text-muted mb-0">User</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>user-dashboard">Dashboard</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>user-bookings">My Bookings</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>user-settings">Profile Settings</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>all-services">Book Services</a>
                                
                                <?php 
                                $query = $this->db->query("select * from system_settings WHERE status = 1");
                                $result = $query->result_array();
                                
                                $login_type='';
                                foreach ($result as $res) {
                                    
                                    if($res['key'] == 'login_type'){
                                        $login_type = $res['value'];
                                    }
                                    
                                    if($res['key'] == 'login_type'){
                                        $login_type = $res['value'];
                                    }

                                }
                                    if($login_type=='email'){
                                    ?>
                                <a class="dropdown-item" href="<?php echo base_url() ?>change-password">Change Password</a>
                                
                                    <?php } ?>
                                <a class="dropdown-item" href="<?php echo base_url() ?>verify-payment-method">Payment Verify</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>user-chat">Chat</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </header>
</div>
