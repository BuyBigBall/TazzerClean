<div class="content">
    <div class="container">
        <div class="row">

            <?php $this->load->view('user/home/user_sidemenu'); ?>

            <div class="col-xl-9 col-md-8">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h4 class="widget-title mb-0">Edit Job</h4>
                    </div>
                    <?php
                    $id = $_GET['id'];
  $query = $this->db->query('SELECT * FROM post_jobs_form WHERE id='.$id);
  $result = $query->result(); 
  $row = $result['0'];
?>
                    <div class="col-auto">
                       <div class="sort-by">
<form action="<?php echo base_url(); ?>manage-jobs-edit" method="post" class="row g-3">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>">
  <div class="col-md-6">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Job Tittle</label>
    <input type="text" name="job_tittle" class="form-control border-dark" placeholder="Enter Job Tittle" value="<?php echo $row->job_tittle; ?>">
  </div>
  <div class="col-12">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Job Description</label>
      
     <textarea class='form-control content-textarea' id='ck_editor_textarea_id252' rows='6' name='job_description'><?php echo $row->job_description; ?></textarea>
  </div>
  <div class="col-md-6">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Job Type</label>
    <select name="job_type" value="0" class="form-select form-control">
      <option>Select</option>
      <option <?php if ($row->job_type==1) { echo "selected"; } ?> value="1">One-off</option>
      <option <?php if ($row->job_type==2) { echo "selected"; } ?> value="2">Weekly</option>
      <option <?php if ($row->job_type==3) { echo "selected"; } ?> value="3">2 Weekly</option>
      <option <?php if ($row->job_type==4) { echo "selected"; } ?> value="4">Monthly</option>
      <option <?php if ($row->job_type==5) { echo "selected"; } ?> value="5">Hourly</option>
    </select>
  </div>


  <div class="col-md-12">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Skills</label>
    <div class="row ml-3">
      
<?php      $query = $this->db->query('SELECT * FROM subcategories');
           $result = $query->result();
           $c=1; 
           foreach ($result as $value1) { ?>
            
      <div class="form-check col-md-6">

        <input <?php $skills = explode(",",$row->skills);
      foreach ($skills as $skills_value) {
      if ($skills_value==$value1->id) {
        echo "checked";
      }
      }
       ?> name="skills[]" value="<?php  echo $value1->id; ?>" class="form-check-input border-dark" type="checkbox" id="gridCheck1<?php echo $c; ?>"><?php echo display_ckeditor($ckeditor_editor252); ?>
        <label class="form-check-label" for="gridCheck1<?php echo $c; ?>">
          <?php  echo $value1->subcategory_name; ?>
        </label>
      </div>
<?php $c++; } ?>
  </div>
</div>
  <div class="col-md-6">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Amount</label>
    <input type="number" name="amount" class="form-control border-dark" value="<?php echo $row->amount; ?>">
  </div>
    <div class="col-md-7">
      <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Service Amount Type</label>
        <div class="form-check">
      <input <?php if ($row->serviceamounttype=='Fixed') {
       echo 'checked="checked"';
      } ?> class="form-check-input" type="radio" name="serviceamounttype" id="flexRadioDefault1" value="Fixed">
      <label class="form-check-label" for="flexRadioDefault1">
        Fixed
      </label>
    </div>
    <div class="form-check">
      <input <?php if ($row->serviceamounttype=='Hourly') {
       echo 'checked="checked"';
      } ?> class="form-check-input" type="radio" name="serviceamounttype" id="flexRadioDefault2" value="Hourly">
      <label class="form-check-label" for="flexRadioDefault2">
        Hourly
      </label>
    </div>
  </div>


  <div class="col-md-6">
    <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Currency Code</label>
    <select name="currency_code" class="form-select form-control">
      <option>Select</option>
      <?php  $query = $this->db->query("select * from currency");
 $result = $query->result_array();

 foreach ($result as $value) { ?>
    <option <?php if ($row->currency_code==$value['currency_code']) {
      echo 'selected';
    } ?> value="<?php echo $value['currency_code'] ?>"><?php echo $value['currency_code'] ?></option>   
          <?php } ?>
    </select>
  </div>
  <div class="col-12  mt-3">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>