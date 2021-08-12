<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

 public $data;

 public function __construct() {

  parent::__construct();
  $this->load->model('service_model','service');
  $this->load->model('common_model','common_model');
  $this->currency = settings('currency');
  $default_language_select = default_language();
  $this->data['theme'] = 'admin';
  $this->data['model'] = 'service';
  $this->data['base_url'] = base_url();
  $this->session->keep_flashdata('error_message');
  $this->session->keep_flashdata('success_message');
  $this->load->helper('user_timezone_helper');
  $this->data['user_role']=$this->session->userdata('role');
}

public function index()
{
  redirect(base_url('subscriptions'));
}
public function subscriptions()
{
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $this->data['page'] = 'subscriptions';
    $this->data['model'] = 'service';
    $this->data['list'] = $this->service->subscription_list();
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }
  else {
   redirect(base_url()."admin");
 }
}

public function add_subscription()
{
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $this->data['page'] = 'add_subscription';
    $this->data['model'] = 'service';
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }
  else {
   redirect(base_url()."admin");
 }

}

public function check_subscription_name()
{
  $subscription_name = $this->input->post('subscription_name');
  $id = $this->input->post('subscription_id');
  if(!empty($id))
  {
    $this->db->select('*');
    $this->db->where('subscription_name', $subscription_name);
    $this->db->where('id !=', $id);
    $this->db->from('subscription_fee');
    $result = $this->db->get()->num_rows();
  }
  else
  {
    $this->db->select('*');
    $this->db->where('subscription_name', $subscription_name);
    $this->db->from('subscription_fee');
    $result = $this->db->get()->num_rows();
  }
  if ($result > 0) {
    $isAvailable = FALSE;
  } else {
    $isAvailable = TRUE;
  }
  echo json_encode(
    array(
      'valid' => $isAvailable
    ));
}

public function save_subscription()
{
$this->common_model->checkAdminUserPermission(9);
  removeTag($this->input->post());
  $data['subscription_name'] = $this->input->post('subscription_name');
  $data['fee'] = $this->input->post('subscription_amount');
  $data['currency_code'] = settings('currency');
  $data['duration'] = $this->input->post('subscription_duration');
  $data['fee_description'] = $this->input->post('fee_description');
  $data['limit'] = $this->input->post('subscription_limit');
  $data['status'] = $this->input->post('status');
  $result = $this->db->insert('subscription_fee', $data);
  if(!empty($result))
  {
   $this->session->set_flashdata('success_message','Subscription added successfully');
   echo 1;
 }
 else
 {
  $this->session->set_flashdata('error_message','Something wrong, Please try again');
  echo 2;
}
}

public function edit_subscription($id)
{
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $this->data['page'] = 'edit_subscription';
    $this->data['model'] = 'service';
    $this->data['subscription'] = $this->service->subscription_details($id);
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }
  else {
   redirect(base_url()."admin");
 }

}

 public function employee_form()
{
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $this->data['page'] = 'employee_form';
    $this->data['model'] = 'service';
    $this->data['list'] = $this->service->subscription_list();
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }
  else {
   redirect(base_url()."admin");
 }
}
public function employee_form_view()
{
  //echo "hello sushil"; die;
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $this->data['page'] = 'employee_form_view';
    $this->data['model'] = 'service';
    $this->data['list'] = $this->service->subscription_list();
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }
  else {
   redirect(base_url()."admin");
 }
}
 
public function employee_form_delete()
{
  //echo "hello sushil"; die;
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $id = $_GET['id'];
    $this->db->where('id', $id);
    // $this->db->where_not_in('ID', $ids);
    $this->db->delete('tbl_yourself');

    redirect(base_url()."employee_form");
  }
  else {
   redirect(base_url()."admin");
 }
}
public function employee_form_status()
{
  //echo "hello sushil"; die;
  $this->common_model->checkAdminUserPermission(9);
  if($this->session->userdata('admin_id'))
  {
    $id = $_GET['id'];
    $status = $_GET['status'];


    $updateData = [
   'status' => $status
    ];

    $this->db->where('id', $id);
    $this->db->update('tbl_yourself', $updateData);
    

    redirect(base_url()."employee_form");
  }
  else {
   redirect(base_url()."admin");
 }
}

public function update_subscription()
{ 
$this->common_model->checkAdminUserPermission(9);
removeTag($this->input->post());
  $where['id'] = $this->input->post('subscription_id');
  $data['subscription_name'] = $this->input->post('subscription_name');
  $data['fee'] = $this->input->post('subscription_amount');
  $data['currency_code'] = settings('currency');
  $data['duration'] = $this->input->post('subscription_duration');
  $data['fee_description'] = $this->input->post('fee_description');
  $data['limit'] = $this->input->post('subscription_limit');
  $data['status'] = $this->input->post('status');
  $result = $this->db->update('subscription_fee', $data, $where);
  if(!empty($result))
  {
   $this->session->set_flashdata('success_message','Subscription updated successfully');
   echo 1;
 }
 else
 {
  $this->session->set_flashdata('error_message','Something wrong, Please try again');
  echo 2;
}
}

public function service_providers()
{
  $this->common_model->checkAdminUserPermission(12);
  $this->data['page'] = 'service_providers';
  $this->data['subcategory']=$this->service->get_subcategory();
  $this->load->vars($this->data);
  $this->load->view($this->data['theme'].'/template');
}

public function edit_service() {
  // if (empty($this->session->userdata('id'))) {
  //     redirect(base_url());
  // }

  $service_id = $this->uri->segment('4');
  $category = $this->service->get_category();
  $subcategory = $this->service->get_subcategory();
  $subcategoryList = [];
  foreach($subcategory as $key=>$value) {
      $cateKey = "cate_".$value['category'];
      if(!array_key_exists($cateKey, $subcategoryList)) {
          $subcategoryList[$cateKey] = [];
      }
      array_push($subcategoryList[$cateKey], $value);
  }
  $this->data['category'] = $category;
  $this->data['subcategory'] = $subcategoryList;
  
  $this->data['page'] = 'edit_service';
  $this->data['model'] = 'service';
  $this->data['services'] = $services = $this->service->get_service_id($service_id);
  $this->data['serv_offered'] = $this->db->from('service_offered')->where('service_id', $services['id'])->get()->result_array();
  $this->load->vars($this->data);
  $this->load->view($this->data['theme'] . '/template');
}

public function update_service() {
  // print_r($this->input->post());exit;
  // if (empty($this->session->userdata('id'))) {
  //     redirect(base_url());
  // }
  // print_r($this->input->post());exit;
  removeTag($this->input->post());
  $service = implode(',', $this->input->post('service_offered'));
  $service_offered = json_encode(array($service));

  $inputs = array();

  $config["upload_path"] = './uploads/services/';
  $config["allowed_types"] = '*';
  $this->load->library('upload', $config);
  $this->upload->initialize($config);

  $service_image = array();
  $thumb_image = array();
  $mobile_image = array();
  $service_details_image = array();
  if (isset($_FILES["images"]) && !empty($_FILES["images"]['name'][0])) {
      $count = count($_FILES["images"]);

      for ($count = 0; $count < count($_FILES["images"]["name"]); $count++) {
          $profile_count = $this->db->where('service_id', $this->input->post('service_id'))->from('services_image')->count_all_results();
          if ($profile_count < 10) {
              $_FILES["file"]["name"] = 'full_' . time() . $_FILES["images"]["name"][$count];
              $_FILES["file"]["type"] = $_FILES["images"]["type"][$count];
              $_FILES["file"]["tmp_name"] = $_FILES["images"]["tmp_name"][$count];
              $_FILES["file"]["error"] = $_FILES["images"]["error"][$count];
              $_FILES["file"]["size"] = $_FILES["images"]["size"][$count];
              if ($this->upload->do_upload('file')) {
                  $data = $this->upload->data();
                  $image_url = 'uploads/services/' . $data["file_name"];
                  $upload_url = 'uploads/services/';
                  $service_image[] = $this->image_resize(360, 220, $image_url, 'se_' . $data["file_name"], $upload_url);
                  $service_details_image[] = $this->image_resize(820, 440, $image_url, 'de_' . $data["file_name"], $upload_url);
                  $thumb_image[] = $this->image_resize(60, 60, $image_url, 'th_' . $data["file_name"], $upload_url);
                  $mobile_image[] = $this->image_resize(280, 160, $image_url, 'mo_' . $data["file_name"], $upload_url);
              }
          }
      }
  }
  $inputs['service_image'] = implode(',', $service_image);
  $inputs['service_details_image'] = implode(',', $service_details_image);
  // print_r($inputs['service_details_image']);exit;
  $inputs['thumb_image'] = implode(',', $thumb_image);
  $inputs['mobile_image'] = implode(',', $mobile_image);

  $inputs['service_title'] = $this->input->post('service_title');
  $inputs['service_sub_title'] = $this->input->post('service_sub_title');
  $inputs['category'] = $this->input->post('category');
  $inputs['subcategory'] = $this->input->post('subcategory');
  $inputs['service_location'] = $this->input->post('service_location');
  $inputs['service_latitude'] = $this->input->post('service_latitude');
  $inputs['service_longitude'] = $this->input->post('service_longitude');
  $inputs['service_amount'] = $this->input->post('service_amount');

  $inputs['about'] = $this->input->post('about');
  $inputs['currency_code'] = $this->input->post('currency_code');

  $inputs['serviceamounttype'] = $this->input->post('serviceamounttype');
  $inputs['metatagdetails'] = $this->input->post('metatagdetails');


  $inputs['updated_at'] = date('Y-m-d H:i:s');
  $service_image = implode(',', $service_image);
  $service_details_image = implode(',', $service_details_image);
  $thumb_image = implode(',', $thumb_image);
  $mobile_image = implode(',', $mobile_image);

  $sql = "update services set service_image='" . $service_image . "',service_details_image='" . $service_details_image . "',thumb_image='" . $thumb_image . "',mobile_image='" . $mobile_image . "', service_title='" . $this->input->post('service_title') . "',service_sub_title='" . $this->input->post('service_sub_title') . "',currency_code='".$this->input->post('currency_code')."',category='" . $this->input->post('category') . "',subcategory='" . $this->input->post('subcategory') . "',service_location='" . $this->input->post('service_location') . "',service_latitude='" . $this->input->post('service_latitude') . "',service_longitude='" . $this->input->post('service_longitude') . "',service_amount='" . $this->input->post('service_amount') . "',service_offered= '" . $service_offered . "',about='" . $this->input->post('about') . "',updated_at='" . date('Y-m-d H:i:s') . "' where id='" . $_POST['service_id'] . "'";
  // print_r($sql);exit;
  $result = $this->db->query($sql);
  // print_r($result);exit;
  if (count($_POST['service_offered']) > 0) {
      $this->db->where('service_id', $this->input->post('service_id'))->delete('service_offered');
      foreach ($_POST['service_offered'] as $key => $value) {
          $service_data = array(
              'service_id' => $this->input->post('service_id'),
              'service_offered' => $value);
          $this->db->insert('service_offered', $service_data);
      }
  }

  if (!empty($service_image)) {
      $temp = count(explode(',', $service_image));
      $service_image = explode(',', $service_image);
      $service_details_image = explode(',', $service_details_image);
      $thumb_image = explode(',', $thumb_image);
      $mobile_image = explode(',', $mobile_image);
      $service_id = $this->input->post('service_id');



      for ($i = 0; $i < $temp; $i++) {
          $image = array(
              'service_id' => $service_id,
              'service_image' => $service_image[$i],
              'service_details_image' => $service_details_image[$i],
              'thumb_image' => $thumb_image[$i],
              'mobile_image' => $mobile_image[$i]
          );
          $serviceimage = $this->service->insert_serviceimage($image);
      }
  }

  if ($result) {
      $this->session->set_flashdata('success_message', 'Service Updated successfully');
      redirect(base_url() . 'service-details/' . $this->input->post('service_id'));
  } else {
      $this->session->set_flashdata('error_message', 'Something Wents to Wrong...!');
      redirect(base_url() . 'service-details' . $this->input->post('service_id'));
  }
}

public function image_resize($width = 0, $height = 0, $image_url, $filename, $upload_url) {

    // $source_path = base_url() . $image_url;
    $source_path = realpath($image_url);
    list($source_width, $source_height, $source_type) = getimagesize($source_path);
    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }

    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $width / $height;

    if ($source_aspect_ratio > $desired_aspect_ratio) {
           /*
         * Triggered when source image is wider
         */
        $temp_height = $height;
        $temp_width = (int) ($height * $source_aspect_ratio);
    } else {
           /*
         * Triggered otherwise (i.e. source image is similar or taller)
         */
        $temp_width = $width;
        $temp_height = (int) ($width / $source_aspect_ratio);
    }

       /*
     * Resize the image into a temporary GD image
     */

    $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
    imagecopyresampled(
            $temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height
    );

       /*
     * Copy cropped region from temporary image into the desired GD image
     */

    $x0 = ($temp_width - $width) / 2;
    $y0 = ($temp_height - $height) / 2;
    $desired_gdim = imagecreatetruecolor($width, $height);
    imagecopy(
            $desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $width, $height
    );

       /*
     * Render the image
     * Alternatively, you can save the image in file-system or database
     */

    $image_url = $upload_url . $filename;

    imagepng($desired_gdim, $image_url);

    return $image_url;

       /*
     * Add clean-up code here
     */
}

public function delete_image() {
  $id=$this->input->get('id');
  $conn = array('id' => $id );
  $provider_details = $this->service->delete_row('services_image',$conn);
}
public function provider_details($value='')
{
   $this->common_model->checkAdminUserPermission(12);
  $this->data['page'] = 'provider_details';
  $this->load->vars($this->data);
  $this->load->view($this->data['theme'].'/template');
}

public function provider_list()
{
   $this->common_model->checkAdminUserPermission(12);
  extract($_POST);
  if($this->input->post('form_submit'))
  {

    $this->data['page'] = 'service_providers';
    $username = $this->input->post('username');
    $email = $this->input->post('email'); 
    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $subcategory=$this->input->post('subcategory');
    $this->data['lists'] = $this->service->provider_filter($username,$email,$from,$to,$subcategory);
    $this->data['subcategory']=$this->service->get_subcategory();
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }
  else
  {
   $lists = $this->service->provider_list();

   $data = array();
   $no = $_POST['start'];
   foreach ($lists as $template) {

     $no++;
     $row    = array();
     $row[]  = $no;
     $profile_img = $template->profile_img;
     if(empty($profile_img)){
      $profile_img = 'assets/img/user.jpg';
    }
    $row[]  = '<h2 class="table-avatar"><a href="#" class="avatar avatar-sm mr-2"> <img class="avatar-img rounded-circle" alt="" src="'.$profile_img.'"></a><a href="'.base_url().'provider-details/'.$template->id.'">'.$template->name.'</a></h2>';
    $row[]  = $template->mobileno;
    $row[]  = $template->email;
    $created_at='-';
    if (isset($template->created_at)) {
     if (!empty($template->created_at) && $template->created_at != "0000-00-00 00:00:00") {
      $date_time = $template->created_at;
      $date_time = utc_date_conversion($date_time);
      $created_at = date("d M Y", strtotime($date_time));
    }
  }
  $row[]    = $created_at;
  $row[]    = $template->subscription_name;
  
  
  $documents    = '';
  if($template->id_proof!='')
  {
    $documents .='<a href="'.$template->id_proof.'" target="_blank"><strong>ID Proof</strong></a><br/>';
  }
  if($template->qualification_document!='')
  {
    $documents .='<a href="'.$template->qualification_document.'" target="_blank"><strong>Qualification Document</strong></a><br/>';
  }
  if($template->address_proof!='')
  {
    $documents .='<a href="'.$template->address_proof.'" target="_blank"><strong>Proof Of Address</strong></a><br/>';
  }
  if($template->mot_certificate!='')
  {
    $documents .='<a href="'.$template->mot_certificate.'" target="_blank"><strong>MOT Certificate</strong></a><br/>';
  }
  if($template->driving_license!='')
  {
    $documents .='<a href="'.$template->driving_license.'" target="_blank"><strong>Driving License</strong></a><br/>';
  }
  if($template->car_insurance!='')
  {
    $documents .='<a href="'.$template->car_insurance.'" target="_blank"><strong>Car Insurance</strong></a><br/>';
  }
  if($template->business_insurance!='')
  {
    $documents .='<a href="'.$template->business_insurance.'" target="_blank"><strong>Business Insurance</strong></a><br/>';
  }
  
  $row[]    = $documents;
  $val    = '';
  
  $status = $template->status;
  $delete_status = $template->status;
  if($status == 2)
  {
    $val = '';
  }
  elseif($status == 1)
  {
    $val = 'checked';
  }
  $row[] ='<div class="status-toggle"><input id="status_'.$template->id.'" class="check change_Status_provider1" data-id="'.$template->id.'" type="checkbox" '.$val.'><label for="status_'.$template->id.'" class="checktoggle">checkbox</label></div>';
  
  $row[] =' <a href="'.base_url().'send-notification/'.$template->token.'" class="btn btn-sm bg-success-light mr-2">
            <i class="fa fa-edit mr-1"></i> Send Message
          </a>';

  $data[] = $row;
}

$output = array(
  "draw" => $_POST['draw'],
  "recordsTotal" => $this->service->provider_list_all(),
  "recordsFiltered" => $this->service->provider_list_filtered(),
  "data" => $data,
);
echo json_encode($output);
}


}

public function service_list()
{
  $this->common_model->checkAdminUserPermission(4);
 extract($_POST);
 
 $this->data['page'] = 'service_list';

 if ($this->input->post('form_submit')) 
 {  
   $service_title = $this->input->post('service_title');
   $category = $this->input->post('category');
   $subcategory = $this->input->post('subcategory');
   $from = $this->input->post('from');
   $to = $this->input->post('to');
   $this->data['list'] =$this->service->service_filter($service_title,$category,$subcategory,$from,$to);
 }
 else
 {
  $this->data['list'] = $this->service->service_list();
}
$this->load->vars($this->data);
$this->load->view($this->data['theme'].'/template');

}

public function service_details($value='')
{
  //die("=====");
  $this->common_model->checkAdminUserPermission(4);
  $this->data['page'] = 'service_details';
  $this->load->vars($this->data);
  $this->load->view($this->data['theme'].'/template');
}
public function service_details_delete($value='')
{
  // echo $value;
  // die("=====");

$this->db->where('id', $value);
$this->db->delete('services');

$this->common_model->checkAdminUserPermission(4);
 extract($_POST);
 
 $this->data['page'] = 'service_list';

 if ($this->input->post('form_submit')) 
 {  
   $service_title = $this->input->post('service_title');
   $category = $this->input->post('category');
   $subcategory = $this->input->post('subcategory');
   $from = $this->input->post('from');
   $to = $this->input->post('to');
   $this->data['list'] =$this->service->service_filter($service_title,$category,$subcategory,$from,$to);
 }
 else
 {
  $this->data['list'] = $this->service->service_list();
}
$this->load->vars($this->data);
$this->load->view($this->data['theme'].'/template');


//   public function delete_row($user_id) {   
//     $this->load->model("Service_model");
//     $this->Service_model->delete_row($user_id);
// }
  // $this->common_model->checkAdminUserPermission(4);
  // $this->data['page'] = 'service_details';
  // $this->load->vars($this->data);
  // $this->load->view($this->data['theme'].'/template');

}
public function service_details_delete_del($value='')
{

$this->db->where('id', $value);
$this->db->delete('services');

redirect('my-services');
        
     // $this->data['page'] = 'my_service_new'; 
     // $this->load->vars($this->data);
     // $this->load->view($this->data['theme'].'/template');


}

/*change service list */
public function change_Status_service_list(){
  $id=$this->input->post('id');
  $status=$this->input->post('status');

  if($status==0){
    $avail=$this->service->check_booking_list($id);
    if($avail==0){
      $this->db->where('id',$id);
      if($this->db->update('services',array('status' =>$status))){
        echo "success";
      }else{
        echo "error";
      }
    }else{
      echo "1";
    }
  }else{
    $this->db->where('id',$id);
    if($this->db->update('services',array('status' =>$status))){
      echo "success";
    }else{
      echo "error";
    }
  }



}
public function change_Status()
{
  $id=$this->input->post('id');
  $status=$this->input->post('status');

  $this->db->where('id',$id);
  $this->db->update('providers',array('status' =>$status));
}
public function delete_provider()
{
  $id=$this->input->post('id');
  $data=array('delete_status'=>1);
  $this->db->where('id',$id);
  
  if($this->db->update('providers',$data))
  {
    echo 1;
  }
}
public function service_requests()
{
  if($this->session->userdata('admin_id'))
  {
    $this->data['page'] = 'service_requests';
    $this->data['model'] = 'service';
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');    
  }
  else {
   redirect(base_url()."admin");
 }
}

public function request_list()
{
 $lists = $this->service->request_list();
 $data = array();
 $no = $_POST['start'];
 foreach ($lists as $template) {
   $no++;
   $row    = array();
   $row[]  = $no;
   $profile_img = $template['profile_img'];
   if(empty($profile_img)){
    $profile_img = 'assets/img/user.jpg';
  }
  $row[]  = '<a href="#" class="avatar"> <img alt="" src="'.$profile_img.'"></a><h2><a href="#">'.$template['username'].'</a></h2>';
  $row[]  = $template['contact_number'];
  $row[]  = $template['title'];
  $row[]  = '<p class="price-sup"><sup>RM</sup>'.$template['proposed_fee'].'</p>';
  $row[]  = '<span class="service-date">'.date("d M Y", strtotime($template['request_date'])).'<span class="service-time">'.date("H.i A", strtotime($template['request_time'])).'</span></span>';
  $row[]  = date("d M Y", strtotime($template['created']));
  $val = '';
  $status = $template['status'];
  if($status == -1)
  {
    $val = '<span class="label label-danger-border">Expired</span>';
  }
  if($status == 0)
  {
    $val = '<span class="label label-warning-border">Pending</span>';
  }
  elseif($status == 1)
  {
    $val = '<span class="label label-info-border">Accepted</span>';
  }
  elseif($status == 2)
  {
    $val = '<span class="label label-success-border">Completed</span>';
  }
  elseif($status == 3)
  {
    $val = '<span class="label label-danger-border">Declined</span>';
  }
  elseif($status == 4)
  {
    $val = '<span class="label label-danger-border">Deleted</span>';
  }
  $row[]  = $val;
  $data[] = $row;
}

$output = array(
  "draw" => $_POST['draw'],
  "recordsTotal" => $this->service->request_list_all(),
  "recordsFiltered" => $this->service->request_list_filtered(),
  "data" => $data,
);

        //output to json format
echo json_encode($output);

}

public function delete_service()
{
  $id=$this->input->post('service_id');

  $inputs['status']= '0';
  $WHERE =array('id' => $id);
  $result=$this->service->update_service($inputs,$WHERE);


  if($result)
  {
   $this->session->set_flashdata('success_message','Service deleted successfully');    
   redirect(base_url()."service-list");   
 }
 else
 {
  $this->session->set_flashdata('error_message','Something wrong, Please try again');
  redirect(base_url()."service-list");   

} 
}

public function emp_job_book1()
{
 // die("==========");
  $bookings_id = $_GET['bookings_id'];
  $start_time = $this->input->post('datetime');

    $updateData = [
   'start_time' => $start_time,
    ];

    $this->db->where('booking_id', $bookings_id);
    $this->db->update('employee_job', $updateData);

    $this->db->where('id', $bookings_id);
    $this->db->update('book_service', $updateData);
   
   // print_r($this->db->last_query()); die;

  redirect(base_url()."employee-jobs"); 
}
public function emp_job_book2()
{
  $bookings_id = $_GET['bookings_id'];
 
  $start_time = $this->input->post('datetime');


    $updateData = [
   'start_time' => $start_time,
    ];

    $this->db->where('id', $bookings_id);
    $this->db->update('book_service', $updateData);
   
   // print_r($this->db->last_query()); die;

  redirect(base_url()."provider_bookings"); 
}




}
