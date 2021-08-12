<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class SubscriptionPaypalLog extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "subscription_paypal_log";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {
        $data['create_time'] = date("Y-m-d H:i:s");
        return $this->db->insert($this->name, $data);
    }
}