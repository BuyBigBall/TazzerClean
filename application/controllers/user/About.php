<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public $data;
 
   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'about';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('home_model','home');

         $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
         $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

         $this->currency= settings('currency');

         $this->load->library('ajax_pagination'); 
         $this->perPage = 12; 
         
    }

    
    public function index()
    {
        
         $this->data['page'] = 'index';
         $this->data['category']=$this->home->get_category();
         $this->data['services']=$this->home->get_service();
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/template');
    }
    
     public function about_us()
     {    
          $this->data['page'] = 'about-us';
          if (TEMPLATE_THEME == 'tazzer') 
            $this->data['page'] = 'about-us-tazzer';
          else if (TEMPLATE_THEME == 'old_tazzer') {
            $this->data['page'] = 'about-us-old-tazzer';
          }
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
     }   
    public function latest_job()
    {
    
         $this->data['page'] = 'latest-job';
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/template');
    }  
     
    public function search_by_category()
    {
    
         $this->data['page'] = 'search_by_category';
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/template');
    }
   
}
