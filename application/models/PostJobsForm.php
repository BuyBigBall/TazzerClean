<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PostJobsForm extends CI_Model
{

	private $primaryKey = "id";
    private $name = "post_jobs_form";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function addJob($data) {
        $data['created_at'] = date("Y-m-d H:i:s");
        return $this->db->insert($this->name, $data);
    }

}
