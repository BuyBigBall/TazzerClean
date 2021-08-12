<?php 
	$id = $datalist['id'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Edit Blog</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="edit_blog" action="<?php echo base_url('admin/blog/edit/'.$id); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Author</label>
								<div class="col-10">
									<input type="text" class="form-control" name="author" id="author" value="<?=$datalist['author']?>"> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Title</label>
								<div class="col-10">
									<input type="text" class="form-control" name="title" id="title" value="<?=$datalist['title']?>"> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Blog Image</label>
								<div class="col-10">
									<input class="form-control" type="file" name="image" id="image"> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Content</label>
								<div class="col-12">
									<textarea class="form-control" name="content" id="ck_editor_textarea_id">
										<?=$datalist['content']?>
									</textarea>
									<?php echo display_ckeditor($ckeditor_editor1);  ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Status</label>
								<div class="col-10">
									<div class="radio radio-primary radio-inline">
										<input type="radio" id="academy_status1" value="1" name="status" <?=$datalist['status']==1?"checked=\"checked\"":""?>>
										<label for="academy_status1">Active</label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" id="academy_status2" value="0" name="status" <?=$datalist['status']==0?"checked=\"checked\"":""?>>
										<label for="academy_status2">Inactive</label>
									</div>
								</div>
							</div>
							<div class="m-t-30 text-center">
								<button name="form_submit" type="submit" class="btn btn-primary center-block" value="true">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>