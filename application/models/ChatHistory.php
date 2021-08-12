<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class ChatHistory extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "chat_table";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function historyList($params = array()) {
        $this->db->select('C.*, IF(ISNULL(US.id), 1, 2) AS sender_type, IF(ISNULL(UR.id), 1, 2) AS receiver_type, IFNULL(US.name,PS.name) AS sender_name, IFNULL(UR.name,PR.name) AS receiver_name, IFNULL(US.profile_img,PS.profile_img) AS sender_profile_img, IFNULL(UR.profile_img,PR.profile_img) AS receiver_profile_img')->from($this->name." as C");
        $this->db->join('users as US','US.token = C.sender_token','left');
        $this->db->join('providers as PS','PS.token = C.sender_token','left');
        $this->db->join('users as UR','UR.token = C.receiver_token','left');
        $this->db->join('providers as PR','PR.token = C.receiver_token','left');
        if (isset($params['sender_token']) && !empty($params['sender_token'])) {
            $this->db->where('sender_token', $params['sender_token']);
        }
        if (isset($params['receiver_token']) && !empty($params['receiver_token'])) {
            $this->db->where('receiver_token', $params['receiver_token']);
        }
        if (array_key_exists('from',$params) && !empty($params['from'])) {
            $this->db->where('DATE(created_at) >= ',$params['from']);
        }
        if (array_key_exists('to',$params) && !empty($params['to'])) {
            $this->db->where('DATE(created_at) <= ',$params['to']);
        }
        if (array_key_exists('search_name',$params) && !empty($params['search_name'])) {
            $this->db->like('US.name',$params['search_name'],'both');
            $this->db->or_like('PS.name',$params['search_name'],'both');
            $this->db->or_like('UR.name',$params['search_name'],'both');
            $this->db->or_like('PR.name',$params['search_name'],'both');
        }
        if (array_key_exists('limit',$params) && !empty($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        $this->db->order_by('created_at','DESC');

        return $this->db->get()->result_array();
    }
    
}