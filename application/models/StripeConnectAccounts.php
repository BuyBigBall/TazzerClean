<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class StripeConnectAccounts extends CI_Model{ 
    
    private $primaryKey = "id";
    private $uniqueKey = "user_token";
    private $name = "stripe_connect_accounts";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAccount($token) {
        $this->db->select()->from($this->name);
        $this->db->where($this->uniqueKey, $token);
        return $this->db->get()->row_array();
    }

    public function insertAccount($data) {
        return $this->db->insert($this->name, $data);
    }

    public function updateAccount($token,$data) {
        $this->db->where($this->uniqueKey,$token);                
        return $this->db->update($this->name, $data);
    }
    
}