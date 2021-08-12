<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class SubcategoryModel extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "subcategories";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function List($params = array()) {
        $this->db->select('*')->from($this->name);
        if (array_key_exists('category',$params) && !empty($params['category'])) {
            # code...
            $this->db->where('category', $params['category']);
        }
        if (array_key_exists('status',$params) && !empty($params['status'])) {
            $this->db->where('status', $params['status']);
        }
        if (array_key_exists('limit',$params) && !empty($params['limit'])) {
            $this->db->limit($params['limit']);
        }
        $this->db->order_by('created_at','ASC');
        return $this->db->get()->result_array();
    }

    public function add($params = array()) {
        $params['created_at'] = date("Y-m-d H:i:s");
        return $this->db->insert($this->name, $params);
    }

    public function get($id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $params = array()) {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->name, $params);
    }

    public function delete($id) {
        return $this->db->delete($this->name, array(
            'id' => $id
        ));
    }
    
}