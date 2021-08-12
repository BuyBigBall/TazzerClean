<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class LoginHistory extends CI_Model{ 
    
    private $primaryKey = "id";
    private $name = "login_history";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {
        $data['client_ip'] = get_client_ip_address();
        $data['login_time'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->name, $data);
    }

    public function historyList($params = array()) {
        $this->db->select('L.*,U.profile_img as user_profile_img,P.profile_img as provider_profile_img')->from($this->name." as L");
        $this->db->join('users as U','L.user_token = U.token','left');
        $this->db->join('providers as P','L.user_token = P.token','left');
        if (isset($params['user_token']) && !empty($params['user_token'])) {
            $this->db->where('user_token', $params['user_token']);
        }
        if (isset($params['user_id']) && !empty($params['user_id'])) {
            $this->db->where('user_id', $params['user_id']);
        }
        if (isset($params['user_type']) && !empty($params['user_type'])) {
            $this->db->where('user_type', $params['user_type']);
        }
        if (array_key_exists('from',$params) && !empty($params['from'])) {
            $this->db->where('DATE(login_time) >= ',$params['from']);
        }
        if (array_key_exists('to',$params) && !empty($params['to'])) {
            $this->db->where('DATE(login_time) <= ',$params['to']);
        }
        if (array_key_exists('search_name',$params) && !empty($params['search_name'])) {
            $this->db->like('user_name',$params['search_name'],'both');
        }
        if (array_key_exists('limit',$params) && !empty($params['limit'])) {
            $this->db->limit($params['limit']);
        }

        $this->db->order_by('login_time','DESC');

        return $this->db->get()->result_array();
    }
    
}