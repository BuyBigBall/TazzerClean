<?php

$service_image = $this->service->service_image($services['id']);
$service_id = $services['id'];

$user_currency_code = '';
$userId = $this->session->userdata('id');
If (!empty($userId)) {
    $service_amount = $services['service_amount'];
    $type = $this->session->userdata('usertype');
    if ($type == 'user') {
        $user_currency = get_user_currency();
    } else if ($type == 'provider') {
        $user_currency = get_provider_currency();
    }
    $user_currency_code = $user_currency['user_currency_code'];

    $service_amount = get_gigs_currency($services['service_amount'], $services['currency_code'], $user_currency_code);
} else {
    $user_currency_code = settings('currency');
    $service_amount = $services['service_amount'];
}
?>
<div class="content">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <h2>Edit Service</h2>
                </div>

                <form method="post" enctype="multipart/form-data" autocomplete="off" id="update_service" action="<?php echo base_url() ?>user/service/update_service">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input class="form-control" type="hidden" name="currency_code" value="<?php echo $user_currency_code; ?>">
                    <div class="service-fields mb-3">
                        <h3 class="heading-2">Service Information</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Service Title <span class="text-danger">*</span></label>
                                    <input type="hidden" name="service_id" id="service_id" value="<?php echo $services['id']; ?>">
                                    <input class="form-control" type="text" name="service_title" id="service_title" value="<?php echo $services['service_title']; ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Service Amount Type <span class="text-danger">*</span></label>
                                      <select class="form-control serviceamounttype" title="Select Service Amount Type" name="serviceamounttype" id="serviceamounttype" selected="<?php echo $services['serviceamounttype']; ?>" required>
                                            <option value="Fixed">Fixed</option>
                                            <option value="Hourly">Hourly</option>
                                            <option value="Per sqft">Per sqft</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Service Amount <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="service_amount" id="service_amount" value="<?php echo $service_amount; ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Service Location <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="service_location" id="service_location" value="<?php echo $services['service_location'] ?>" required> 
                                    <input type="hidden" name="service_latitude" id="service_latitude" value="<?php echo $services['service_latitude'] ?>">
                                    <input type="hidden" name="service_longitude" id="service_longitude" value="<?php echo $services['service_longitude'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <h3 class="heading-2">Service Category</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" required> 
                                        <?php foreach ($category as $cat) { ?>
                                            <option value="<?= $cat['id'] ?>"  <?php if ($cat['id'] == $services['category']) { ?> selected = "selected" <?php } ?>><?php echo $cat['category_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="subcategory"> 
                                        <?php foreach ($subcategory["cate_".$services['category']] as $sub_category) { ?>
                                            <option value="<?= $sub_category['id'] ?>"  <?php if ($sub_category['id'] == $services['subcategory']) { ?> selected = "selected" <?php } ?>><?php echo $sub_category['subcategory_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <h3 class="heading-2">Service Offer</h3>

                        <div class="membership-info">
                            <?php
                            if (!empty($serv_offered) && $serv_offered != 'null') {
                                foreach ($serv_offered as $key => $value) {
                                    ?>

                                    <div class="row form-row membership-cont">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Service Offered <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="service_offered[]"  value="<?php echo $value['service_offered'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2 col-lg-2">
                                            <label>&nbsp;</label>
                                            <a href="#" class="btn btn-danger trash"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="row form-row membership-cont">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="service_offered[]"  value="" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                        <a href="#" class="btn btn-danger trash"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </div>
                                <?php 
                            }
                            ?>
                        </div>
                        <div class="add-more form-group">
                            <a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <h3 class="heading-2">Details Information</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Descriptions <span class="text-danger">*</span></label>
                                    <textarea id="about" class="form-control service-desc" name="about"><?php echo $services['about'] ?></textarea>
                                   <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'about' );
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-fields mb-3">
                        <h3 class="heading-2">Meta Tag </h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Meta Tag Details <span class="text-danger">*</span></label>
                                    <textarea id="metatagdetails" class="form-control metatagdetails" name="metatagdetails">
                                        <?php echo $services['metatagdetails'] ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <h3 class="heading-2">Service Gallery </h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="service-upload" id="remove-after">
                                    <i class="fa fa-cloud-upload-alt"></i>
                                    <span>Upload Service Images *</span>
                                    <style type="text/css">
  input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
/*span.remove {
    margin-top: -85px;
}*/
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <input type="file" name="images[]" id="files" multiple accept="image/jpeg, image/png, image/gif,">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript">
    var serviceAmountType = <?php echo json_encode($services["serviceamounttype"]); ?>;
  $(document).ready(function() {
    // $("#serviceamounttype option[value=\""+serviceAmountType+"\"]").attr('selected', 'selected');
    $("#serviceamounttype").val(serviceAmountType);
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\" style=\"color:red\">Delete</span>" +
            "</span>").insertAfter("#remove-after");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>

                                </div>  
                                <div id="uploadPreview">
                                    <ul class="upload-wrap">
<?php
$service_img = array();
for ($i = 0; $i < count($service_image); $i++) {

    ?>
                                            <li>
                                                <div class=" upload-images" id="<?php echo $service_image[$i]['id']; ?>">

                                                    <img alt="Service Image"  src="<?php echo base_url() . $service_image[$i]['service_image']; ?>">
                         <br><a herf="#"  onclick="myFunction(<?php echo $service_image[$i]['id']; ?>)" class="btn btn-danger">Delete</a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
 $('document').ready(function()
{
    $('#metatagdetails').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});   

</script>

<script type="text/javascript">
function myFunction(id) {

document.getElementById(id).style.visibility='hidden';


        $.ajax({
    url: '<?php echo base_url(); ?>user/service/delete_image',
  data: {'id': id},
  success: function(html){
    //$("#results").append(html);
    //    $(id).css("display", "none");

  }
});

 // document.getElementById("demo").innerHTML = "Hello World";
}
var category = <?php echo json_encode($category); ?>;
var subcategory = <?php echo json_encode($subcategory); ?>;
// console.log(category, subcategory);
$(document).ready(function() {
    $("select[name='category']").on('change', function() {
        var newCateId = $(this).val();
        var subcategories = subcategory["cate_"+newCateId];
        $("select[name='subcategory']").empty();
        for(var i in subcategories) {
            var value = subcategories[i];
            var optionObj = "<option value=\""+value['id']+"\">"+value['subcategory_name']+"</option>";
            $("select[name='subcategory']").append(optionObj);
        }
    });
});
</script>                       