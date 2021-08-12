<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class SubscriptionFee extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "subscription_fee";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getData($id) {
        $this->db->select()->from($this->name);
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function update($id, $data) {
        $this->db->where($this->primaryKey,$id);                
        return $this->db->update($this->name, $data);
    } 
    
}