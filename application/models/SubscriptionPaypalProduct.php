<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class SubscriptionPaypalProduct extends CI_Model{ 
    
    private $primaryKey = "id";
    private $key1 = "subscription_id";
    private $name = "subscription_paypal_product";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($subscription_id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->key1, $subscription_id);
        return $this->db->get()->row_array();
    }

    public function insert($data) {
        return $this->db->insert($this->name, $data);
    }

    public function update($subscription_id,$data) {
        $this->db->where($this->key1,$subscription_id);                
        return $this->db->update($this->name, $data);
    }

    public function isExist($subscription_id) {
        $data = $this->get($subscription_id);
        if (is_null($data) || !isset($data)) {
            return false;
        }
        return true;
    }
}