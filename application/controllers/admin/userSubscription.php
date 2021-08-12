<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userSubscription extends CI_Controller {

   public $data;

   public function __construct() {

        parent::__construct();
		    $this->site_name ='Tazzer';
        $this->data['theme'] = 'admin';
        $this->load->model('UsersSubscription','userSubscription');
        $this->data['model'] = 'users_subscription';
        $this->load->library('email');
        $this->data['base_url'] = base_url();
        $this->session->keep_flashdata('error_message');
        $this->session->keep_flashdata('success_message');
        $this->load->helper('user_timezone_helper');
        $this->data['user_role']=$this->session->userdata('role');

    }

  	public function index()
  	{
        $this->data['page'] = 'index';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function userSubscriptionLists($value='')
    {
        $lists = $this->userSubscription->usersSubscriptionList();
        $data = array();
        $no = $_POST['start'];
        foreach ($lists as $template) {
              $no++;
              $row    = array();
              $row[]  = $no;
              $row[]  = $template->email;
              $row[]  = $template->created_at;
              $row[]  = $template->updated_at;
              $row[]  = '<td class="text-right">
                  <button id="modal-open" data-id="'.$template->email.'" class="btn btn-sm modal-open bg-success-light mr-2">
                    <i class="fa fa-send mr-1"></i> Send Promo Code
                  </button>
                </td>';
              $data[] = $row; 
        }
        $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->userSubscription->usersSubscriptionCount(),
                "recordsFiltered" => $this->userSubscription->usersSubscriptionFiltered(),
                "data" => $data,
        );
        echo json_encode($output);
      }

      public function promoNotification() {
          $postData = $this->input->post();
          $this->data['postData'] = $postData;
          $config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                   );
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");
          $from_email = "info@tazzerclean.co.uk";
          $to_email = $postData['email'];
          $body = $this->load->view('admin/email/promo-notification', $this->data, true);
          $mail = $this->email->from($from_email)->to($to_email)->subject('Provider Registration')->message($body)->send();
          echo json_encode(array('status' => true));
      }

}
?>
