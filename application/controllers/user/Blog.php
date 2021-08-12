<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

     public $data;
     
     public function __construct() {

     parent::__construct();
          error_reporting(0);
          $this->data['theme']     = 'user';
          $this->data['module']    = 'blog';
          $this->data['page']     = '';
          $this->data['base_url'] = base_url();

          $this->load->model('home_model','home');
          $this->load->model('BlogModel');

          $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
          $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

          $this->currency= settings('currency');

          $this->load->library('ajax_pagination'); 
          $this->perPage = 12; 
     }
     
     public function index()
     {
          $this->data['page'] = 'index';
          $condition = [
               'status' => 1
          ];
          $blogList = $this->BlogModel->blogList($condition);
          for ($i=0; $i < count($blogList); $i++) { 
               # code...
               if($blogList[$i]['image'] == "" || !file_exists(realpath($blogList[$i]['image']))) {
               $blogList[$i]['image'] = 'uploads/blog_images/no_image.jpg';
               }
          }
          $this->data['blogList'] = $blogList;
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
     }

     public function blog_detail($id) {
          $this->data['page'] = 'blog_detail';
          $blogData = $this->BlogModel->getBlog($id);
          $this->data['blogData'] = $blogData;
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
     }

}
