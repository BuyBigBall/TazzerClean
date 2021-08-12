<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class UsersSubscription extends CI_Model{ 
     
   
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = 'user_subscription_promo_offer'; 
        date_default_timezone_set('Asia/Kolkata');
    }
     
       /* 
+     * Fetch records from the database 
+     * @param array filter data based on the passed parameters 
+     */ 
    function usersSubscriptionCount($params = array()){ 
        $this->db->select("*"); 
        $this->db->from($this->table); 
        $query = $this->db->get(); 
        $result = $query->num_rows(); 
        // Return fetched data 
        return $result; 
    } 
    public function usersSubscriptionList(){
        $this->p_get_datatables_query();
        if($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get();
          return $query->result();
    }

    public function usersSubscriptionFiltered(){
          $this->p_get_datatables_query();
          $query = $this->db->get();
          return $query->num_rows();
    }

    private function p_get_datatables_query()
    {
      $this->db->select('id,email,created_at,updated_at');
      $this->db->from($this->table);
      $i = 0;
      $this->column_search = array(
        'id','email','created_at','updated_at'
      );
      $this->column_order = array(
        'id','email','created_at','updated_at'
      );
      $this->order = array('id' => 'asc'); // default order
      if($this->column_search) {
      foreach ($this->column_search as $item) // loop column
        {

            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                      $search_val = $_POST['search']['value'];
                      $this->db->or_like($item, $search_val);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
      }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
}