<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $data;

   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'categories';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->helper('user_timezone_helper');
        $this->load->model('service_model','service');
        
    }

	
	public function index()
	{
		 $this->data['page'] = 'index';
	   $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/template');
	}

	
  
  public function featured_categories()
  {
     $this->data['page'] = 'featured_categories';
     $this->data['featured_category'] = $this->service->featured_category();
     $this->load->vars($this->data);
     $this->load->view($this->data['theme'].'/template');
  }

   
 public function user_dashboard()
  {
     $this->data['page'] = 'user_dashboard';
     $this->load->vars($this->data);
     $this->load->view($this->data['theme'].'/template');
  }

  

}
