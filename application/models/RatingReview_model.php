<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 2021-07-26
 * Time: 12:35 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class RatingReview_model extends CI_Model{

    public function getReviews($userId){

        $this->db->select("*");
        $this->db->from('rating_review');
        $this->db->where("user_id",$userId);
        $this->db->where("status",1);
        $this->db->order_by('id','DESC');
        return $this->db->get()->result_array();
    }

}