<div class="content">
  <div class="container">
    <div class="row">
      <?php $this->load->view('user/home/user_sidemenu'); ?>
      <div class="col-xl-9 col-md-8">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h4 class="widget-title mb-0">Write A Review</h4>
          </div>
        </div>
        <?php
        $id = $_GET['proposal_id'];
        $query = $this->db->query('SELECT * FROM send_proposal WHERE id='.$id);
        $result = $query->result();
        $row = $result['0'];
        // echo $row->reviews."<br>";
        // echo $row->title_of_review."<br>";
        // echo $row->review_comment."<br>";
        ?>
        <div class="col-xl-8 col-md-8 booking-widget">
          <?php
          $query = $this->db->query("select * from post_jobs_form WHERE id=".$row->job_post_id);
          $result = $query->result_array();
          $value = $result['0'];
          ?>
          <!-- <a href="#" class="booking-img">
            <img src="http://localhost/tazzer1/new-tazzerclean-gireesh/uploads/services/se_full_1620850547Screen+Shot+2017-06-13+at+2.50.22+PM.png">
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
              <?php   echo $Description; ?>
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
          $skills = explode(",",$Skills);
          foreach($skills as $value1){
          foreach ($result as $value2) { ?>
          <?php if ($value2->id==$value1) {
          echo $value2->subcategory_name." , ";
          } ?>
          <?php } }
          ?>
        </li>
        <?php
        $job_tittle=$value['job_tittle'];
        $this->db->where('service_title',$job_tittle);
        $query=$this->db->get('services');
        $result=$query->result();
        $roww = $result['0'];
        ?>
        <li><span>Service Amount Type</span><?php echo $roww->serviceamounttype; ?></li>
        <li><span>Amount</span> <?php echo currency_conversion($roww->currency_code) . $value['amount']; ?></li>
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

            <?php
  if (($this->session->userdata('id') != '') && ($this->session->userdata('usertype') == 'user')) { 

            $review_sender_id = $this->session->userdata('id');
            
            $query = $this->db->query('SELECT * FROM job_reviews where job_post_id='.$value['id']. ' and user_id='.$review_sender_id);
            $resultt = $query->result();
            //print_r($resultt);
            $rowww = $resultt['0'];
            ?>
            <?php
            $review_sender_id = $this->session->userdata('id');
            $query = $this->db->query('SELECT * FROM users where id='.$review_sender_id);
            $resulttt = $query->result();
            //print_r($resulttt);
            $rowwww = $resulttt['0'];
            if (!empty($rowww)) { 
              ?>
        <li>
          <div class="review-list">
            <div class="review-img">
              <img class="rounded-circle" src="<?php echo base_url().$rowwww->profile_img; ?>" alt="">
            </div>
            <div class="review-info">
            <h5>
              <?php echo $rowwww->name; ?>
            </h5>
              <div class="review-date"><?php echo $rowww->date_time; ?></div>
              <p class="mb-0">
<?php if ($rowww->title_of_review==1) { ?>
  Good
<?php } ?>
<?php if ($rowww->title_of_review==2) { ?>
  Excellent
<?php } ?>
<?php if ($rowww->title_of_review==3) { ?>
  Normal
<?php } ?>
<?php if ($rowww->title_of_review==4) { ?>
  High
<?php } ?>
            </p>
            </div>
            <div class="review-count">
              <div class="rating">
<i class="fa fa-star <?php if ($rowww->reviews>=1) { echo "filled"; }?> "></i>
<i class="fa fa-star <?php if ($rowww->reviews>=2) { echo "filled"; }?> "></i>
  <i class="fa fa-star <?php if ($rowww->reviews>=3) { echo "filled"; }?> "></i>
    <i class="fa fa-star <?php if ($rowww->reviews>=4) { echo "filled"; }?> "></i>
      <i class="fa fa-star <?php if ($rowww->reviews>=5) { echo "filled"; }?> "></i>
<span class="d-inline-block average-rating">(<?php echo $rowww->reviews; ?>)</span>
              </div>
            </div>
          </li>
 
<?php }
if (empty($_GET['provider_id'])) {

}else{
            $review_sender_id = $_GET['provider_id'];
            
            $query = $this->db->query('SELECT * FROM job_reviews where job_post_id='.$value['id']. ' and provider_id='.$review_sender_id);
            $resultt = $query->result();
            //print_r($resultt);
            $rowww = $resultt['0'];
            ?>
            <?php
            $review_sender_id = $this->session->userdata('id');
            $query = $this->db->query('SELECT * FROM providers where id='.$review_sender_id);
            $resulttt = $query->result();
            //print_r($resulttt);
            $rowwww = $resulttt['0'];
 if (!empty($rowww)) { 
              ?>
        <li>
          <div class="review-list">
            <div class="review-img">
              <img class="rounded-circle" src="<?php echo base_url().$rowwww->profile_img; ?>" alt="">
            </div>
            <div class="review-info">
            <h5>
              <?php echo $rowwww->name; ?>
            </h5>
              <div class="review-date"><?php echo $rowww->date_time; ?></div>
              <p class="mb-0">
<?php if ($rowww->title_of_review==1) { ?>
  Good
<?php } ?>
<?php if ($rowww->title_of_review==2) { ?>
  Excellent
<?php } ?>
<?php if ($rowww->title_of_review==3) { ?>
  Normal
<?php } ?>
<?php if ($rowww->title_of_review==4) { ?>
  High
<?php } ?>
            </p>
            </div>
            <div class="review-count">
              <div class="rating">
<i class="fa fa-star <?php if ($rowww->reviews>=1) { echo "filled"; }?> "></i>
<i class="fa fa-star <?php if ($rowww->reviews>=2) { echo "filled"; }?> "></i>
  <i class="fa fa-star <?php if ($rowww->reviews>=3) { echo "filled"; }?> "></i>
    <i class="fa fa-star <?php if ($rowww->reviews>=4) { echo "filled"; }?> "></i>
      <i class="fa fa-star <?php if ($rowww->reviews>=5) { echo "filled"; }?> "></i>
<span class="d-inline-block average-rating">(<?php echo $rowww->reviews; ?>)</span>
              </div>
            </div>
          </li>
 
<?php } }

 } ?>

            <?php
  if (($this->session->userdata('id') != '') && ($this->session->userdata('usertype') == 'provider')) { 

            $review_sender_id = $this->session->userdata('id');
            
            $query = $this->db->query('SELECT * FROM job_reviews where job_post_id='.$value['id']. ' and provider_id='.$review_sender_id);
            $resultt = $query->result();
            //print_r($resultt);
            $rowww = $resultt['0'];
            ?>
            <?php
            $review_sender_id = $this->session->userdata('id');
            $query = $this->db->query('SELECT * FROM providers where id='.$review_sender_id);
            $resulttt = $query->result();
            //print_r($resulttt);
            $rowwww = $resulttt['0'];
            if (!empty($rowww)) { 
              ?>
        <li>
          <div class="review-list">
            <div class="review-img">
              <img class="rounded-circle" src="<?php echo base_url().$rowwww->profile_img; ?>" alt="">
            </div>
            <div class="review-info">
            <h5>
              <?php echo $rowwww->name; ?>
            </h5>
              <div class="review-date"><?php echo $rowww->date_time; ?></div>
              <p class="mb-0">
<?php if ($rowww->title_of_review==1) { ?>
  Good
<?php } ?>
<?php if ($rowww->title_of_review==2) { ?>
  Excellent
<?php } ?>
<?php if ($rowww->title_of_review==3) { ?>
  Normal
<?php } ?>
<?php if ($rowww->title_of_review==4) { ?>
  High
<?php } ?>
            </p>
            </div>
            <div class="review-count">
              <div class="rating">
<i class="fa fa-star <?php if ($rowww->reviews>=1) { echo "filled"; }?> "></i>
<i class="fa fa-star <?php if ($rowww->reviews>=2) { echo "filled"; }?> "></i>
  <i class="fa fa-star <?php if ($rowww->reviews>=3) { echo "filled"; }?> "></i>
    <i class="fa fa-star <?php if ($rowww->reviews>=4) { echo "filled"; }?> "></i>
      <i class="fa fa-star <?php if ($rowww->reviews>=5) { echo "filled"; }?> "></i>
<span class="d-inline-block average-rating">(<?php echo $rowww->reviews; ?>)</span>
              </div>
            </div>
          </li>
 
<?php }
            $review_sender_id = $_GET['user_id'];
            
            $query = $this->db->query('SELECT * FROM job_reviews where job_post_id='.$value['id']. ' and user_id='.$review_sender_id);
            $resultt = $query->result();
            //print_r($resultt);
            $rowww = $resultt['0'];
            ?>
            <?php
            $review_sender_id = $this->session->userdata('id');
            $query = $this->db->query('SELECT * FROM users where id='.$review_sender_id);
            $resulttt = $query->result();
            //print_r($resulttt);
            $rowwww = $resulttt['0'];
 if (!empty($rowww)) { 
              ?>
        <li>
          <div class="review-list">
            <div class="review-img">
              <img class="rounded-circle" src="<?php echo base_url().$rowwww->profile_img; ?>" alt="">
            </div>
            <div class="review-info">
            <h5>
              <?php echo $rowwww->name; ?>
            </h5>
              <div class="review-date"><?php echo $rowww->date_time; ?></div>
              <p class="mb-0">
<?php if ($rowww->title_of_review==1) { ?>
  Good
<?php } ?>
<?php if ($rowww->title_of_review==2) { ?>
  Excellent
<?php } ?>
<?php if ($rowww->title_of_review==3) { ?>
  Normal
<?php } ?>
<?php if ($rowww->title_of_review==4) { ?>
  High
<?php } ?>
            </p>
            </div>
            <div class="review-count">
              <div class="rating">
<i class="fa fa-star <?php if ($rowww->reviews>=1) { echo "filled"; }?> "></i>
<i class="fa fa-star <?php if ($rowww->reviews>=2) { echo "filled"; }?> "></i>
  <i class="fa fa-star <?php if ($rowww->reviews>=3) { echo "filled"; }?> "></i>
    <i class="fa fa-star <?php if ($rowww->reviews>=4) { echo "filled"; }?> "></i>
      <i class="fa fa-star <?php if ($rowww->reviews>=5) { echo "filled"; }?> "></i>
<span class="d-inline-block average-rating">(<?php echo $rowww->reviews; ?>)</span>
              </div>
            </div>
          </li>
 
<?php }

 } ?>

        </ul>
      </div>
    </div>
  </div>
</div>
</div>