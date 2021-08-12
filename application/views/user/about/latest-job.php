 <div class="breadcrumb-bar">
     <div class="">
         <div class="row">
             <div class="">
                 <div class="breadcrumb-title ml-5">
                    <h2>LATEST JOB</h2>
                </div>
            </div>
             <div class="col-auto float-right ml-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" <?php echo base_url();?>"> <?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"> LATEST JOB</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<section class="">
        <div class="container">
            <div class="row">

<div class="col-xl-8">
<form class="mt-4" action="<?php echo base_url(); ?>latest-job?search=" method="get">
<input class="form-control" type="text" name="search" placeholder="Search Here.."> 
   
</div>

<div class="col-xl-2 mt-4">

<input class="btn btn-primary" type="submit" value="Search">

</div>

</form>
<div class="col-xl-2 mt-4"> <a class="btn btn-success" href="<?php echo base_url(); ?>search-by-category" target="_blank">Search By Category</a></div>


<?php
 if (isset($_GET['search'])) { 
$query = $this->db->query("select * from post_jobs_form WHERE job_tittle LIKE '%".$_GET['search']."%'");
   $result = $query->result_array();
 foreach ($result as $value) { ?>


<div class="">
                <div id="dataList">
                            <div class="bookings">

                                <div class="booking-list">
                                    <div class="col-xl-12 col-md-8 booking-widget">
                                        <!-- <a href="#" class="booking-img">
                                            <img src="https://localhost/tazzer1/new-tazzerclean-gireesh/uploads/services/se_full_1620850547Screen+Shot+2017-06-13+at+2.50.22+PM.png">
                                        </a> -->
                                        <div class="booking-det-info">

                                            <h3>
                                                <a href="">
                                           <?php echo $value['job_tittle']; ?>
                                                </a>
                                            </h3>
                                            <ul class="booking-details">
                                                <li><span>Job Description</span> 
<?php $Description = $value['job_description']; ?>
<?php   echo substr($Description, 0, 100)."..."; ?>
                                             </li>
                                                <li><span>Job Type</span>   <?php 

                if ($value['job_type']==1) {
                    echo "One-off - this means just once";
                 }
                if ($value['job_type']==2) {
                    echo "Weekly";
                 }
                if ($value['job_type']==3) {
                    echo "2 Weekly";
                 }
                if ($value['job_type']==4) {
                    echo "Monthly";
                 }
                if ($value['job_type']==5) {
                    echo "Hourly";
                 } 


             ?></li>
<?php
    // $this->db->where('id',$bookings['service_id']);
    // $query=$this->db->get('services');
    // $result=$query->result();
    // $row=$result['0'];
?>
                                                <li><span>Skills</span> <?php $Skills = $value['skills']; 
 
           $query = $this->db->query('SELECT * FROM subcategories');
           $result = $query->result(); 
$cbz=1;
          $skills = explode(",",$Skills);
           foreach($skills as $value1){

           foreach ($result as $value2) { ?>
            <?php if ($value2->id==$value1 && $cbz<=4) {
                echo $value2->subcategory_name." , ";
            } ?>


      <?php } $cbz++; } 
                                                ?>

                                             </li>
<?php
// $job_tittle=$value['job_tittle'];
//     $this->db->where('service_title',$job_tittle);
//     $query=$this->db->get('services');
//     $result=$query->result();
//     $roww = $result['0'];
    //echo $this->db->last_query();
?>
                                                <li><span>Service Amount Type</span><?php echo $value['serviceamounttype']; ?></li>
                                                <li><span>Amount</span> <?php echo currency_conversion($value['currency_code']) . $value['amount']; ?></li>
                                              <li>
                                                     <span>Job Sender</span>
                                                    <div class="avatar avatar-xs mr-1">
<?php
$query = $this->db->query('SELECT * FROM users where id='.$value['user_id']);
           $result = $query->result(); 
           $roww = $result['0'];
?>
                                                        <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() . $roww->profile_img; ?>">
                                                    </div><?php echo $roww->name; ?>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 booking-action">
                                            <!-- <a href="" class="btn btn-sm bg-info-light">
                                                <i class="far fa-eye"></i> Chat
                                            </a> -->
<?php


  if (($this->session->userdata('id') != '') &&  ($this->session->userdata('usertype') == 'provider') || ($this->session->userdata('usertype') == 'user')) { 
$user_id = $this->session->userdata('id');

$query = $this->db->query("SELECT * FROM send_proposal where provider_id='".$user_id."' AND job_post_id='".$value['id']."'");
//echo $this->db->last_query();
           $result25 = $query->result();
           $roww = $result25['0'];
if(empty($result25)){ 
    ?>
                      <a href="<?php echo base_url(); ?>send-proposal?id=<?php echo $value['id']; ?>" class="btn btn-sm bg-success-light">
                                                <i class="fas fa-comment-dollar"></i> Send Proposal
                                            </a>
<?php }else{ 
if ($roww->status==0) { ?>
  <p class="btn btn-sm bg-info-light"><i class="fas fa-check"></i>Compete Request Send</p>
<?php } ?>
<?php 
if ($roww->status==1) { ?>
  <p class="btn btn-sm bg-success-light"><i class="fas fa-check"></i>Accsept Request</p>
<?php } ?>
<?php  
if ($roww->status==2) { ?>
  <p class="btn btn-sm bg-danger-light"><i class="fas fa-check"></i>Reject Request</p>
<?php } ?>
<?php 
if ($roww->status==3) { ?>
  
  <?php $user_id = $this->session->userdata('id');

$query = $this->db->query('SELECT * FROM  job_reviews WHERE job_post_id='.$value['id']. ' and provider_id='.$user_id);
$result1 = $query->result();
if (empty($result1)) { ?>
            <td>
                <a class="btn btn-sm btn-info text-light" href="<?php echo base_url(); ?>send-reviews?proposal_id=<?php echo $row->job_post_id; ?>&id=<?php echo $row->id; ?>&provider_id=<?php echo $row->provider_id; ?>"> <i class="fa fa-plus"></i> review
            </td>

<?php }else{ ?>
            <td>
<a class="btn btn-sm btn-info text-light" 
href="<?php echo base_url(); ?>view-reviews?proposal_id=<?php echo $roww->id; ?>&user_id=<?php echo $user_id; ?>"> 
<i class="fa fa-eye"></i> View Review
            </td>
<?php } ?>

<a href="<?php echo base_url();?>view-proposal?id=<?php echo $value['id']; ?>&pid=<?php echo $roww->id; ?>" class="btn btn-sm bg-warning-light"><i class="fas fa-check"></i>View Proposal</a>

<?php } ?>





    <?php  }                      


 }else{ ?>

  
  <a  class="btn btn-sm bg-success-light" href="javascript:void(0);" data-toggle="modal" data-target="#tab_login_modal">
                                                <i class="fas fa-comment-dollar"></i> Send Proposal
                                            </a>  

<?php } ?>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        </div>


<?php } }else{ ?>

























 <?php if (isset($_GET['id'])) { 
   $query = $this->db->query("select * from post_jobs_form");
   $result = $query->result_array();
 foreach ($result as $value) {
      $Skills = $value['skills']; 
           $skills1 = explode(",",$Skills);
           foreach($skills1 as $value1){
            if ($value1==$_GET['id']) { ?>
              <div class="">
                <div id="dataList">
                            <div class="bookings">

                                <div class="booking-list">
                                    <div class="col-xl-12 col-md-8 booking-widget">
                                        <!-- <a href="#" class="booking-img">
                                            <img src="https://localhost/tazzer1/new-tazzerclean-gireesh/uploads/services/se_full_1620850547Screen+Shot+2017-06-13+at+2.50.22+PM.png">
                                        </a> -->
                                        <div class="booking-det-info">

                                            <h3>
                                                <a href="">
                                           <?php echo $value['job_tittle']; ?>
                                                </a>
                                            </h3>
                                            <ul class="booking-details">
                                                <li><span>Job Description</span> 
<?php $Description = $value['job_description']; ?>
<?php   echo substr($Description, 0, 100)."..."; ?>
                                             </li>
                                                <li><span>Job Type</span>   <?php 

                if ($value['job_type']==1) {
                    echo "One-off - this means just once";
                 }
                if ($value['job_type']==2) {
                    echo "Weekly";
                 }
                if ($value['job_type']==3) {
                    echo "2 Weekly";
                 }
                if ($value['job_type']==4) {
                    echo "Monthly";
                 }
                if ($value['job_type']==5) {
                    echo "Hourly";
                 } 


             ?></li>
<?php
    // $this->db->where('id',$bookings['service_id']);
    // $query=$this->db->get('services');
    // $result=$query->result();
    // $row=$result['0'];
?>
                                                <li><span>Skills</span> <?php $Skills = $value['skills']; 
 
           $query = $this->db->query('SELECT * FROM subcategories');
           $result = $query->result(); 
$cbz=1;
          $skills = explode(",",$Skills);
           foreach($skills as $value1){

           foreach ($result as $value2) { ?>
            <?php if ($value2->id==$value1 && $cbz<=4) {
                echo $value2->subcategory_name." , ";
            } ?>


      <?php } $cbz++; } 
                                                ?>

                                             </li>
<?php
// $job_tittle=$value['job_tittle'];
//     $this->db->where('service_title',$job_tittle);
//     $query=$this->db->get('services');
//     $result=$query->result();
//     $roww = $result['0'];
    //echo $this->db->last_query();
?>
                                                <li><span>Service Amount Type</span><?php echo $value['serviceamounttype']; ?></li>
                                                <li><span>Amount</span> <?php echo currency_conversion($value['currency_code']) . $value['amount']; ?></li>
                                              <li>
                                                     <span>Job Sender</span>
                                                    <div class="avatar avatar-xs mr-1">
<?php
$query = $this->db->query('SELECT * FROM users where id='.$value['user_id']);
           $result = $query->result(); 
           $roww = $result['0'];
?>
                                                        <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() . $roww->profile_img; ?>">
                                                    </div><?php echo $roww->name; ?>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 booking-action">
                                            <!-- <a href="" class="btn btn-sm bg-info-light">
                                                <i class="far fa-eye"></i> Chat
                                            </a> -->
<?php


  if (($this->session->userdata('id') != '') &&  ($this->session->userdata('usertype') == 'provider') || ($this->session->userdata('usertype') == 'user')) { 
$user_id = $this->session->userdata('id');

$query = $this->db->query("SELECT * FROM send_proposal where provider_id='".$user_id."' AND job_post_id='".$value['id']."'");
//echo $this->db->last_query();
           $result25 = $query->result();
           $roww = $result25['0'];
if(empty($result25)){ 
    ?>
                      <a href="<?php echo base_url(); ?>send-proposal?id=<?php echo $value['id']; ?>" class="btn btn-sm bg-success-light">
                                                <i class="fas fa-comment-dollar"></i> Send Proposal
                                            </a>
<?php }else{ 
if ($roww->status==0) { ?>
  <p class="btn btn-sm bg-info-light"><i class="fas fa-check"></i>Compete Request Send</p>
<?php } ?>
<?php 
if ($roww->status==1) { ?>
  <p class="btn btn-sm bg-success-light"><i class="fas fa-check"></i>Accsept Request</p>
<?php } ?>
<?php  
if ($roww->status==2) { ?>
  <p class="btn btn-sm bg-danger-light"><i class="fas fa-check"></i>Reject Request</p>
<?php } ?>
<?php 
if ($roww->status==3) { ?>
  
  <?php $user_id = $this->session->userdata('id');

$query = $this->db->query('SELECT * FROM  job_reviews WHERE job_post_id='.$value['id']. ' and provider_id='.$user_id);
$result1 = $query->result();
if (empty($result1)) { ?>
            <td>
                <a class="btn btn-sm btn-info text-light" href="<?php echo base_url(); ?>send-reviews?proposal_id=<?php echo $row->job_post_id; ?>&id=<?php echo $row->id; ?>&provider_id=<?php echo $row->provider_id; ?>"> <i class="fa fa-plus"></i> review
            </td>
<?php }else{ ?>
             <td>
<a class="btn btn-sm btn-info text-light" 
href="<?php echo base_url(); ?>view-reviews?proposal_id=<?php echo $roww->id; ?>&user_id=<?php echo $user_id; ?>"> 
<i class="fa fa-eye"></i> View Review
            </td>
<?php } ?>

<p class="btn btn-sm bg-primary-light"><i class="fas fa-check"></i>Compete Job</p>

<?php } ?>


<a href="<?php echo base_url();?>view-proposal?id=<?php echo $value['id']; ?>&pid=<?php echo $roww->id; ?>" class="btn btn-sm bg-warning-light"><i class="fas fa-check"></i>View Proposal</a>
    <?php  }                      


 }else{ ?>

  
  <a  class="btn btn-sm bg-success-light" href="javascript:void(0);" data-toggle="modal" data-target="#tab_login_modal">
                                                <i class="fas fa-comment-dollar"></i> Send Proposal
                                            </a>  

<?php } ?>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        </div>
                         <?php }else{
                            // $x=1;
                            // $abc = $x;
                            // if ($abc==1) {
                            //        echo "job not found";
                            //        $x++;
                            //      } 
                         } 
           
       }

}

}else{
   $query = $this->db->query("select * from post_jobs_form");
   $result = $query->result_array();  

 foreach ($result as $value) {
?>
            <div class="">
                <div id="dataList">
                            <div class="bookings">

                                <div class="booking-list">
                                    <div class="col-xl-12 col-md-8 booking-widget">
                                        <!-- <a href="#" class="booking-img">
                                            <img src="https://localhost/tazzer1/new-tazzerclean-gireesh/uploads/services/se_full_1620850547Screen+Shot+2017-06-13+at+2.50.22+PM.png">
                                        </a> -->
                                        <div class="booking-det-info">

                                            <h3>
                                                <a href="">
                                           <?php echo $value['job_tittle']; ?>
                                                </a>
                                            </h3>
                                            <ul class="booking-details">
                                                <li><span>Job Description</span> 
<?php $Description = $value['job_description']; ?>
<?php   echo substr($Description, 0, 100)."..."; ?>
                                             </li>
                                                <li><span>Job Type</span>   <?php 

                if ($value['job_type']==1) {
                    echo "One-off - this means just once";
                 }
                if ($value['job_type']==2) {
                    echo "Weekly";
                 }
                if ($value['job_type']==3) {
                    echo "2 Weekly";
                 }
                if ($value['job_type']==4) {
                    echo "Monthly";
                 }
                if ($value['job_type']==5) {
                    echo "Hourly";
                 } 


             ?></li>
<?php
    // $this->db->where('id',$bookings['service_id']);
    // $query=$this->db->get('services');
    // $result=$query->result();
    // $row=$result['0'];
?>
                                                <li><span>Skills</span> <?php $Skills = $value['skills']; 
 
           $query = $this->db->query('SELECT * FROM subcategories');
           $result = $query->result(); 
$cbz=1;
          $skills = explode(",",$Skills);
           foreach($skills as $value1){

           foreach ($result as $value2) { ?>
            <?php if ($value2->id==$value1 && $cbz<=4) {
                echo $value2->subcategory_name." , ";
            } ?>


      <?php } $cbz++; } 
                                                ?>

                                             </li>
<?php
// $job_tittle=$value['job_tittle'];
//     $this->db->where('service_title',$job_tittle);
//     $query=$this->db->get('services');
//     $result=$query->result();
//     $roww = $result['0'];
    //echo $this->db->last_query();
?>
                                                <li><span>Service Amount Type</span><?php echo $value['serviceamounttype']; ?></li>
                                                <li><span>Amount</span> <?php echo currency_conversion($value['currency_code']) . $value['amount']; ?></li>
                                              <li>
                                                     <span>Job Sender</span>
                                                    <div class="avatar avatar-xs mr-1">
<?php
$query = $this->db->query('SELECT * FROM users where id='.$value['user_id']);
           $result = $query->result(); 
           $roww = $result['0'];
?>
                                                        <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo base_url() . $roww->profile_img; ?>">
                                                    </div><?php echo $roww->name; ?>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 booking-action">
                                            <!-- <a href="" class="btn btn-sm bg-info-light">
                                                <i class="far fa-eye"></i> Chat
                                            </a> -->
<?php


  if (($this->session->userdata('id') != '') &&  ($this->session->userdata('usertype') == 'provider') || ($this->session->userdata('usertype') == 'user')) { 
$user_id = $this->session->userdata('id');

$query = $this->db->query("SELECT * FROM send_proposal where provider_id='".$user_id."' AND job_post_id='".$value['id']."'");
//echo $this->db->last_query();
           $result25 = $query->result();
           $roww = $result25['0'];
if(empty($result25)){ 
    ?>
                      <a href="<?php echo base_url(); ?>send-proposal?id=<?php echo $value['id']; ?>" class="btn btn-sm bg-success-light">
                                                <i class="fas fa-comment-dollar"></i> Send Proposal
                                            </a>
<?php }else{ 
if ($roww->status==0) { ?>
  <p class="btn btn-sm bg-info-light"><i class="fas fa-check"></i>Compete Request Send</p>
<?php } ?>
<?php 
if ($roww->status==1) { ?>
  <p class="btn btn-sm bg-success-light"><i class="fas fa-check"></i>Accsept Request</p>
<?php } ?>
<?php  
if ($roww->status==2) { ?>
  <p class="btn btn-sm bg-danger-light"><i class="fas fa-check"></i>Reject Request</p>
<?php } ?>
<?php 
if ($roww->status==3) { ?>
  <p class="btn btn-sm bg-primary-light"><i class="fas fa-check"></i>Compete Job</p>

<?php $user_id = $this->session->userdata('id');

$query = $this->db->query('SELECT * FROM  job_reviews WHERE job_post_id='.$value['id']. ' and provider_id='.$user_id);
$result1 = $query->result();
if (empty($result1)) { ?>
            <td>
                <p><a class="btn btn-sm btn-info text-light" href="<?php echo base_url(); ?>send-reviews?proposal_id=<?php echo $roww->job_post_id; ?>&id=<?php echo $roww->id; ?>"> <i class="fa fa-plus"></i> review</a></p>
            </td>
<?php }else{ ?>
          
<a class="btn btn-sm btn-info text-light" 
href="<?php echo base_url(); ?>view-reviews?proposal_id=<?php echo $roww->id; ?>&user_id=<?php echo $user_id; ?>"> 
<i class="fa fa-eye"></i> View Review
           
<?php } } ?>


<a href="<?php echo base_url();?>view-proposal?id=<?php echo $value['id']; ?>&pid=<?php echo $roww->id; ?>" class="btn btn-sm bg-warning-light"><i class="fas fa-check"></i>View Proposal</a>
<?php  } }else{ ?>

  
  <a  class="btn btn-sm bg-success-light" href="javascript:void(0);" data-toggle="modal" data-target="#tab_login_modal">
                                                <i class="fas fa-comment-dollar"></i> Send Proposal
                                            </a>  

<?php } ?>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        </div>
                         <?php } } } ?>
                   <?php
                    echo $this->ajax_pagination->create_links();
                    ?>
                
            </div>
        </div>
        </div>
    </section>