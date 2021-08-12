<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Leo
 * @description Chat history track
 * @created 
*/

class Userchathistory extends CI_Controller {

  public $data;

  public function __construct() {

    parent::__construct();
    $this->load->model('admin_model','admin');
    $this->load->model('common_model','common_model');
    if(!$this->session->userdata('admin_id'))
    {
      redirect(base_url()."admin");
    }
    $admin_id=$this->session->userdata('admin_id');
    if ($admin_id != 1) {
      header('Location: '.base_url());
      http_response_code(404);
      exit();
    }
    $this->data['theme'] = 'admin';
    $this->data['model'] = 'chathistory';
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
    $this->load->model("ChatHistory");
    $params = array();
    if ($this->input->post('form_submit')) {
        extract($_POST);
        // $from_date = $this->input->post('from');
        // $to_date = $this->input->post('to');
        $params['from'] = !empty($from)?date("Y-m-d",strtotime($from)):"";
        $params['to'] = !empty($to)?date("Y-m-d",strtotime($to)):"";
        $params['search_name'] = $name;
        $params['limit'] = $limit;
    }
    $historyList = $this->ChatHistory->historyList($params);
    // print_r($historyList); exit;
    if (count($historyList) > 0) {
      foreach($historyList as &$data) {
        if (is_null($data['sender_profile_img']) || empty($data['sender_profile_img'])) {
          $data['sender_profile_img'] = 'assets/img/user.jpg';
        }
        if (is_null($data['receiver_profile_img']) || empty($data['receiver_profile_img'])) {
          $data['receiver_profile_img'] = 'assets/img/user.jpg';
        }
      }
    }
    $this->data['params'] = $params;
    $this->data['list'] = $historyList;
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'] . '/template');
  }


}
