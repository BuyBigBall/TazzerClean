<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Leo
 * @description Login history track
 * @created 
*/

class Userloginhistory extends CI_Controller {

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
    $this->data['model'] = 'loginhistory';
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
    $this->load->model("LoginHistory");
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
    $historyList = $this->LoginHistory->historyList($params);
    if (count($historyList) > 0) {
      foreach($historyList as &$data) {
        if ($data['user_type'] == 1) {
          $data['profile_img'] = $data['provider_profile_img'];
        }
        else {
          $data['profile_img'] = $data['user_profile_img'];
        }
        if (is_null($data['profile_img']) || empty($data['profile_img'])) {
          $data['profile_img'] = 'assets/img/user.jpg';
        }
        unset($data['user_profile_img']);
        unset($data['provider_profile_img']);
      }
    }
    $this->data['params'] = $params;
    $this->data['list'] = $historyList;
    $this->load->vars($this->data);
    $this->load->view($this->data['theme'] . '/template');
  }


}
