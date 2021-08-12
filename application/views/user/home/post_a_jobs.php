<div class="breadcrumb-bar">
	 <div class="container">
		 <div class="row">
			 <div class="col">
				 <div class="breadcrumb-title">
					<h2>Post A Job</h2>
				</div>
			</div>
			 <div class="col-auto float-right ml-auto breadcrumb-menu"> 
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href=" <?php echo base_url();?>"> <?php echo (!empty($user_language[$user_selected]['lg_home'])) ? $user_language[$user_selected]['lg_home'] : $default_language['en']['lg_home']; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page">Post A Job</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="content">
  <div class="container">
    <div class="row">

      <?php // $this->load->view('user/home/user_sidemenu'); ?>

      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row align-items-center mb-4">
          <div class="col-auto">
            <div class="sort-by">
              <form action="<?php echo base_url(); ?>post_jobs_form" id="post_job_form" method="post" class="row g-3">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                <div class="form-group col-md-6">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Job Tittle</label>
                  <input type="text" name="job_tittle" class="form-control border-dark" placeholder="Enter Job Tittle" required>
                </div>
                <div class="form-group col-12">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Job Description</label>

                  <textarea class='form-control content-textarea border-dark' id='ck_editor_textarea_id252' rows='6' name='job_description' required></textarea>
                  <?php echo display_ckeditor($ckeditor_editor252); ?>
                  
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Job Type</label>
                  <select name="job_type" value="0" class="form-select form-control" required>
                    <option value="" selected>Select</option>
                    <?php 
                      foreach(C_JOB_TYPES as $key=>$job_type){
                        echo '<option value="' . $key . '">' . $job_type . "</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="form-group col-md-12">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Skills</label>
                  <div class="row ml-3">
                    <?php
                      $c=1; 
                      foreach ($subcategories as $value) { ?>

                    <div class="form-check col-md-6">
                      <input name="skills[]" value="<?php  echo $value['id']; ?>" class="form-check-input border-dark" type="checkbox" id="gridCheck1<?php echo $c; ?>">
                      <label class="form-check-label" for="gridCheck1<?php echo $c; ?>">
                        <?php  echo $value['subcategory_name']; ?>
                      </label>
                    </div>
                    <?php $c++; } ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Amount</label>
                  <input type="number" name="amount" class="form-control border-dark" required>
                </div>
                <div class="form-group col-md-7">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Service Amount Type</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="serviceamounttype" id="flexRadioDefault1" value="Fixed" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Fixed
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="serviceamounttype" id="flexRadioDefault2" value="Hourly">
                    <label class="form-check-label" for="flexRadioDefault2">
                      Hourly
                    </label>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label widget-title mb-2 mt-2 h3 font-weight-bold">Currency Code</label>
                  <select name="currency_code" class="form-select form-control">
                    <option value="" selected>Select</option>
                    <?php  
                      $query = $this->db->query("select * from currency");
                      $result = $query->result_array();

                      foreach ($result as $value) { ?>
                    <option value="<?php echo $value['currency_code'] ?>"><?php echo $value['currency_code'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-12  mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/home/post_job.css">
<script type="text/javascript">
    
</script>
<script src="<?php echo base_url(); ?>assets/js/home/post_job.js"></script>