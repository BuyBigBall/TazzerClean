<?php

/**
 * Created by PhpStorm.
 * User: sun
 * Date: 2021-07-26
 * Time: 12:49 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Notificaiton_model  extends CI_Model
{
    public function getNotification($ses_token){
        $ret=$this->db->select('*')->
            from('notification_table')->
            where('receiver',$ses_token)->
            where('status',1)->
            order_by('notification_id','DESC')->
            get()->result_array();
        return $ret;
    }

}