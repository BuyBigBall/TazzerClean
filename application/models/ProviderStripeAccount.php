<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class ProviderStripeAccount extends CI_Model{ 
    
    private $primaryKey = "provider_id";
    private $name = "providers_stripe_account";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAccount($provider_id) {
        $this->db->select()->from($this->name);
        $this->db->where($this->primaryKey, $provider_id);
        return $this->db->get()->row_array();
    }

    public function insertAccount($data) {
        return $this->db->insert($this->name, $data);
    }

    public function updateAccount($provider_id,$data) {
        $this->db->where($this->primaryKey,$provider_id);                
        return $this->db->update($this->name, $data);
    }
    
}