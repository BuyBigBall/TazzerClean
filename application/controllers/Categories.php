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
        $this->load->model('categories_model','categories');

        $this->load->library('ajax_pagination'); 
        $this->perPage = 12; 
        
    }

	
	public function index()
	{
		$conditions['returnType'] = 'count'; 
        $totalRec = $this->categories->get_category($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['link_func']      = 'getData';
        $config['loading']='<img src="'.base_url().'assets/img/loader.gif" alt="" />';
        $config['base_url']    = base_url('categories/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        );

         $this->data['page'] = 'index';
         $cate_datas = $this->categories->get_category($conditions);
         foreach($cate_datas as $k=>$data) {
            if(!file_exists($_SERVER['DOCUMENT_ROOT'] . '/' .$data['category_image']))
                $cate_datas[$k]['category_image'] = 'uploads/category_images/no_image.jpg';
        }
	     $this->data['category'] = $cate_datas;
	     $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/template');
	}

	function ajaxPaginationData(){ 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->categories->get_category($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList';
        $config['link_func']      = 'getData'; 
        $config['loading']='<img src="'.base_url().'assets/img/loader.gif" alt="" />';
        $config['base_url']    = base_url('categories/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'start' => $offset, 
            'limit' => $this->perPage 
        ); 
         
        // Load the data list view 
         $this->data['page'] = 'ajax_category';
	     $this->data['category']=$this->categories->get_category($conditions);
         
	     $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/'.$this->data['module'].'/'.$this->data['page']);
    } 

	
}
