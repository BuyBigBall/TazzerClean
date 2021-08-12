<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Employee extends CI_Model{ 
     
    function __construct() { 
        // Set table name 
        $this->table = 'users'; 
    } 
    
    function getDetail($employeeId){
        $this->db->select("users.*");
        $this->db->from('users');
        $this->db->where('id', $employeeId);
        $this->db->where('status', 1);
        $this->db->where('you_are_appling_as', 8);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $userdata =  $query->row_array();
            $employeeData = $this->getEmployeeData($employeeId);
            return array_merge($userdata, $employeeData);
        }else{
            return false;
        }
        
    }

    function getEmployeeData($employeeId){
        $this->db->select('recognition_img, work_time, work_day, work_start, work_end');
        $this->db->from('employee');
        $this->db->where('user_id', $employeeId);
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->row_array():array(); 
        if(isset($result['work_day']) && !empty($result['work_day'])){
            $result['work_day'] = json_decode($result['work_day']);
        }
        return $result;
    }

    function updateEmployee($employeeId, $data){
        $user_count = $this->db->where('user_id', $employeeId)->count_all_results('employee');
        if (count($data) > 0) {
            if ($user_count == 1)
            {
                $this->db->where('user_id', $employeeId);
                $this->db->update('employee', $data);
            }
            else
            {
                $data['user_id'] = $employeeId;
                $this->db->insert('employee', $data);
            }

            return true;

        }else{
            return false;
        }
    }
}