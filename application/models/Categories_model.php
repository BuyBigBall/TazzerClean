<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categories_model extends CI_Model
{

	 function __construct() { 
        // Set table name 
        $this->table = 'categories'; 
    } 
     
    
    function get_category($params = array()){ 
        $this->db->select('c.id,c.category_name,c.category_image, (SELECT COUNT(s.id) FROM services AS s WHERE s.category=c.id AND s.status=1 ) AS category_count');
               $this->db->from('categories c');
               $this->db->where('c.status',1);
               $this->db->order_by('category_count','DESC');
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
               
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 

    public function getPopularCategories($limit = 3) {
        $this->db
            ->select("sum(total_views) as total_views, category")
            ->from('services')
            ->group_by('category');
        // print_r($this->db->get()->result_array()); exit;
        $subquery = $this->db->get_compiled_select();
        $this->db->reset_query(); 
        
        $this->db->select('c.*, s.total_views');
        $this->db->from('categories c');
        $this->db->join("($subquery) s","s.category = c.id", "LEFT");
        $this->db->order_by('total_views', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }

}
