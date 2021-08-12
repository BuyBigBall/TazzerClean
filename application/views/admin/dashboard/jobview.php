<?php
$job_view = $this->db->get('post_jobs_form')->result_array();
  //echo "<pre>";print_r($job_view);exit;
	?>
	<style>
	.job_des{
	
	}
	</style>
	<div class="page-wrapper">
		<div class="content container-fluid">
			
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Job View</h3>
					</div>
					
				</div>
			</div>
			<!-- /Page Header -->
			
			<!-- Search Filter -->
			<form action="<?php echo base_url()?>admin/dashboard/adminusers_list" method="post" id="filter_inputs">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				    
			</div>
		</form>
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						                    <div class="table-responsive">
							                            <table class="custom-table table table-hover table-center mb-0 w-100" id="myTable">
								                                <thead>
									                                    <tr>
										                                        <th>#</th>
										                                        <th>Job Title</th>
										                                        <th>Job Description</th>
										<th>Job Types</th>
										                                        <th>Skills</th>
										                                        <th>Amount</th>
									                                    </tr>
								                                </thead>
								                                <tbody>
									<?php
									if(!empty($job_view)) {
									$i=1;
									foreach ($job_view as $rows) {
									?>
									<tr>
										<td><?= $i++;?></td>
										<td><?= $rows['job_tittle'];?></td>
										<td class="job_des" style="width: 150px;">
											<?php
											 $in = $rows['job_description'];
											echo wordwrap($in,50,"<br>\n");
											?>
											
										</td>
										<td><?php
											 $job = $rows['job_type'];
											 if($job == 1){
											 echo "One-off";
											 }
											 else if($job == 2){
											 echo "Weekly";
											 }
											 else if($job == 3){
											 echo "2 Weekly";
											 }
											 else if($job == 4){
											 echo "Monthly";
											 }
										?></td>
										<td><?php
											// $skill = explode(",",$rows['skills']);
											$query = $this->db->query('SELECT * FROM subcategories');
											           $result = $query->result(); 
											          $skills = explode(",",$rows['skills']);
											           foreach($skills as $value1){
											foreach ($result as $value2) { ?>
											<?php if ($value2->id==$value1) {
											                $inn1 = $value2->subcategory_name." , ";
											                //echo $inn1;
											                echo wordwrap($inn1,20,"<br>\n");
											} ?>
											<?php }  }
										?></td>
										<td><?= $rows['amount'];?></td>
									</tr>
									<?php
									}
									                                    }
									                                    else {
									echo '<tr><td colspan="6"><div class="text-center text-muted">No records found</div></td></tr>';
									                                    }
									?>
								                                </tbody>
							                            </table>
						                        </div>
					</div>
				</div>
			</div>
			             <?php
                   // echo $this->ajax_pagination->create_links();
                    ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('.custom-table').DataTable();
} );
</script>