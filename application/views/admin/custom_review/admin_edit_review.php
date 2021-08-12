
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Review</h3>
				</div>
				<div class="col-auto text-right">
					<a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
						<i class="fa fa-filter"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Search Filter -->
		
		<!-- /Search Filter -->
		<?php		$id = $review["id"]  ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form id="update_user" action="<?php echo base_url().'review_submit_edit/'.$id?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                		
              <div class="col-xl-6 mt-2">
                <h5 class="form-title font-weight-bold">Display Name</h5>
                <input type="text" name="revierwer_name" value="<?=$review['reviewer_name']?>" placeholder="Enter Reviewer Name" class="form-control border-dark" required>
              </div>	
              <div class="col-xl-6 mt-2">
                <h5 class="form-title font-weight-bold">Review</h5>
                <!-- <input type="text" name="review" value="" placeholder="Enter Review" class="form-control border-dark" required> -->
                <textarea name="review" placeholder="Enter Review" class="form-control border-dark" required><?=$review['review']?></textarea>
              </div> 
              <div class="col-xl-3 mt-2">
                <h5 class="form-title font-weight-bold">Rating <small>(1 To 5)</small></h5>
                <input type="number" name="rating" value="<?=$review['rating']?>" placeholder="Enter Rating" class="form-control border-dark" min="1" max="5" required>
              </div>  

              <div class="col-xl-3 mt-2">
                <h5 class="form-title font-weight-bold">Date And Time</h5>
                <input type="datetime-local" name="date_time" value="<?= date("m/d/Y H:i",strtotime($review['created'])) ?>" placeholder="Enter Date And Time" class="form-control border-dark" required>
              </div> 

              <div class="col-xl-12">
                <input type="submit" name="savesubmit" class="btn btn-primary mt-3">
              </div> 
   					</form>
					</div> 
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<?php

						 		$this->db->select('*');
						    $this->db->from('rating_review');
						    $this->db->where('service_id', $review['service_id']);
						    $query = $this->db->get();
						    $result = $query->result_array();

						   ?> 
						   <?php if ($result=='') {
									echo ''; ?>
							<?php
									}else{ ?>
							<table class="table table-hover table-center">
                <thead>
                    <tr>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Reviewer Name</th>
                        <th>Created</th>
                  
                        <th>Action</th>
                    </tr>
                </thead>
               	<tbody>
                 	<?php 
                 		foreach ($result as $value) { 
                 	?>
									<tr>
                    <td><?php echo $value['rating']; ?></td>
                    <td><?php echo $value['review']; ?></td>
                    <td><?php echo $value['reviewer_name']; ?></td>
                    <td><?php echo $value['created']; ?></td>
                    <td>
                    	<a class="btn btn-info text-light"
												href="<?php echo base_url().'review_submit_edit/'.$value['id']?>"
												onclick="">Edit</a>

									  	<a class="btn btn-danger text-light"
												href="<?php echo base_url().'review_submit_delete/'.$value['id']?>"
												onclick="return confirm('Are you sure?')">Delete</a>
										</td>               
									</tr>
									<?php } ?>
                </tbody>
              </table>
              <?php } ?>
						</div> 
					</div> 
				</div>
			</div>
		</div> -->
	</div>
</div>