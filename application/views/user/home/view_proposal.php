<div class="content">
    <div class="container">
        

                                    <div class="row">
            <?php // $this->load->view('user/home/user_sidemenu'); ?>

            <div class="col-xl-9 col-md-8">
                <div class="align-items-center mb-4">
                    <div class="col-auto">
                       <div class="sort-by">
<form action="<?php echo base_url(); ?>send_proposal_edit" method="post" class="row">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

 
 <div class="col-12">
<div class="col-xl-8 col-md-8 booking-widget">
    <?php

 $query = $this->db->query("select * from post_jobs_form WHERE id=".$_GET['id']);
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
                                            </ul>
                                        </div>
                                    </div>
<?php

 $query = $this->db->query("select * from send_proposal WHERE id=".$_GET['pid']);
 $result1 = $query->result_array();
$value1 = $result1['0'];

?>
    <label class="form-label widget-title mb-2 mt-5 h3 font-weight-bold">Send Proposal</label>
      
     <textarea class='form-control content-textarea border-dark' id='ck_editor_textarea_id252' rows='6' name='send_proposal_description'><?php echo $value1['send_proposal_description'] ?></textarea>
  </div>
  <div class="col-md-12">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Amount</label>
    <input type="number" value="<?php echo $value1['amount'] ?>" name="amount" class="form-control border-dark">
    <input type="hidden" name="job_post_id" value="<?php echo $_GET['id']; ?>">
    <input type="hidden" name="proposal_post_id" value="<?php echo $_GET['pid']; ?>">
  </div> 

<!-- //////////////////////////////////////////////////////////// -->

</div>
<div id="items">
<div class="row">
              <div class="col-md-6">
                <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Milestone</label>
                <textarea class="form-control content-textarea border-dark" id="" name="m_comment[]"><?php echo $value1['m_comment'] ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Amount</label>
                <input type="number" value="<?php echo $value1['m_amount'] ?>" name="m_amount[]" class="form-control border-dark">
            </div>

</div>
</div>
<div class="col-md- mt-3">
  <a id="add" class="btn btn-success add-more button-yellow uppercase text-light" type="button">+ Add another</a>
   <a class="delete btn button-white uppercase btn-danger text-light">- Remove</a>
</div>

<!-- //////////////////////////////////////////////////////////// -->


  <?php // || ($this->session->userdata('usertype') == 'user') provider
 if (($this->session->userdata('id') != '') &&  ($this->session->userdata('usertype') == 'provider') || ($this->session->userdata('usertype') == 'user')) { ?>
<input type="hidden" name="provider_id" value="<?php echo $this->session->userdata('id'); ?>">
<?php }else{ 

   $user_id = $this->session->userdata('email');
// $query = $this->db->query('SELECT * FROM providers where email='.$user_id);
//            $result = $query->result(); 
          // print_r($result); die;
           // $roww = $result['0'];
           // echo $roww->id;
    $this->db->where('email',$user_id);
        $query=$this->db->get('providers');
        $result = $query->result();
        $roww = $result['0']; ?>
        <input type="hidden" name="provider_id" value="<?php echo $roww->id; ?>">
<?php   }   ?>
  <div class="col-12  mt-3">
    <input type="submit" class="btn btn-primary" name="" value="Send Proposal">

  </div>
</form>

<script type="text/javascript">
      $(document).ready(function() {
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#add").click(function(e) {
    $(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items").append(
      '<div class="next-referral row"><div class="col-md-6"><label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Milestone</label><textarea class="form-control content-textarea border-dark" id="" name="m_comment[]">Your Comment</textarea></div><div class="col-md-6"><label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Amount</label><input type="number" name="m_amount[]" class="form-control border-dark"></div></div>'
    );
  });
  $("body").on("click", ".delete", function(e) {
    $(".next-referral").last().remove();
  });
});

  </script>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>