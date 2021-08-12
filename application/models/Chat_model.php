<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

       /*get information base on token*/
    public function get_token_info($token){
        
        $user_table=$this->db->select('*')->
                        from('users')->
                        where('token',$token)->
                        get()->row();
        $provider_table=$this->db->select('*')->
                        from('providers')->
                        where('token',$token)->
                        get()->row();
        if(!empty($user_table)){
            return $user_table;
        }else{
            return $provider_table;
        }                
        
    }

      public function get_book_info($book_service_id){


    $ret=$this->db->select('tab_1.provider_id,tab_1.user_id,tab_1.status,tab_2.service_title')->
                    from('book_service as tab_1')->
                    join('services as tab_2','tab_2.id=tab_1.service_id','LEFT')->
                    where('tab_1.id',$book_service_id)->limit(1)->
                    order_by('tab_1.id','DESC')->
                    get()->row_array();
    return $ret;

  } 
      public function get_job_info($book_service_id){


    $ret=$this->db->select('tab_1.provider_id,tab_1.user_id,tab_2.job_tittle')->
                    from('send_proposal as tab_1')->
                    join('post_jobs_form as tab_2','tab_2.id=tab_1.job_post_id','LEFT')->
                    where('tab_1.id',$book_service_id)->limit(1)->
                    order_by('tab_1.id','DESC')->
                    get()->row_array();
    return $ret;

  }  

      public function get_user_info($user_id,$user_type){

    if($user_type ==2){
      $val=$this->db->select('*')->from('users')->where('id',$user_id)->where('type',$user_type)->get()->row_array();
    }else{
      $val=$this->db->select('*')->from('providers')->where('id',$user_id)->where('type',$user_type)->get()->row_array();
    }
        
    return $val;
  }

       /*get last msg*/
    public function get_last_msg($token){
      $val=$this->db->select('message,created_at')->
                      from('chat_table')->
                      where('sender_token',$token)->
                      or_where('receiver_token',$token)->
                      order_by('chat_id','DESC')->
                      limit(1)->get()->row();
      return $val;                

    }

    public function isExistUnread($where, $table) {
        $this->db->where($where)->where('read_status',0);
        $data = $this->db->get($table)->row_array();
        if (is_null($data)) {
            return false;
        }
        return true;
    } 

       /*change to read status*/

    public function changeToRead($where,$data,$table){
         $this->db->where($where);
        $ret=$this->db->update($table,$data);
        return $ret;               

    }

       /*get badge count*/
    
    public function get_badge_count($send_token,$token){
      $val=$this->db->select('count(chat_id) as counts')->
                      from('chat_table')->
                      where('sender_token',$send_token)->
                      where('receiver_token',$token)->
                      where('status',1)->
                      where('read_status',0)->
                      get()->row();
      return $val;                

    }

    /**
     * Get badge count with chatroom id and self token
     * @param chatroom id, self token
     */
    public function get_badge_count_by_chat_room($chat_room_id, $token){
      $val = $this->db->select('count(chat_id) as counts')
                        ->from('chat_table')
                        ->where('receiver_token', $token)
                        ->where('chat_room', $chat_room_id)
                        ->where('read_status', 0)
                        ->get()->row()
                        ;
      return $val;
    }

    /**
     * get_last_msg_by_chatroom
     */
    public function get_last_msg_by_chatroom($chat_room_id){
      $val=$this->db->select('message,created_at')->
                      from('chat_table')->
                      where('chat_room',$chat_room_id)->
                      order_by('chat_id','DESC')->
                      limit(1)->get()->row();
      return $val;  
    }

     /*get chat list*/
  public function get_chat_list($token){

    $sent=[];
    $receive=[];
    $sent=$this->db->select('receiver_token as token')->
                    from('chat_table')->
                    where('sender_token',$token)->
                    get()->result_array();
    $receive=$this->db->select('sender_token as token')->
                    from('chat_table')->
                    where('receiver_token',$token)->
                    get()->result_array();

    $chat_tokens=(array_merge($sent,$receive));
    $test=[];
    foreach ($chat_tokens as $key => $value) {
       $test[]=$value['token'];
    }

    $token_detail=[];
    foreach (array_unique($test) as $key => $value) {

        $token_detail[]=$this->get_token_info($value);
        
    }
    return $token_detail;

  }

  /**
   * get inviteable providers
   * @param chat_room_id
   */
  public function get_inviteable($chat_room_id){
    $chat_room_info = $this->get_chat_room_by_id($chat_room_id);
    $proposal_id = $chat_room_info->proposal_id;
    if($proposal_id == ""){
      return false;
    }

    $self_info=$this->get_token_info($this->session->userdata('chat_token'));
    $proposal = $this->db->select()
                        ->from('send_proposal')
                        ->where('id', $proposal_id)
                        ->get()->row();
    if($proposal->provider_id != $self_info->id){
      return false;
    }

    $job_post_row = $this->db->select()
                            ->from('post_jobs_form')
                            ->where('id', $proposal->job_post_id)
                            ->get()->row();
    $skills = explode(',', $job_post_row->skills);

    $lack_skills_categories = $this->db->select('category')
                            ->from('subcategories')
                            ->where_in('id', $skills)
                            ->where('category !=', $self_info->category)
                            ->group_by('category')
                            ->get()->result_array();
    
    if(sizeof($lack_skills_categories) == 0){
      return false;
    }
    
    $lack_cat = [];
    foreach($lack_skills_categories as $lack_skills_categorie){
      array_push($lack_cat, $lack_skills_categorie['category']);
    }

    $inviteables = $this->db->select()
                            ->from('providers')
                            ->where_in('category', $lack_cat)
                            ->get()->result();
    return $inviteables;
  }



  /** Create chat room using given data   */
public function create_chat_room($data){
  $this->db->insert('chat_room', $data);
  return $this->db->insert_id();
}

/**
 * add invited roommate (wating accept)
 */
public function add_roommate_away($room_id, $token){
  $members = $this->db->select('roommates_away')
                      ->from('chat_room')
                      ->where('id', $room_id)
                      ->get()->row_array();
  $members = explode(',', $members['roommates_away']);
  if(in_array($token, $members) === false){
    array_push($members, $token);
    $data = array('roommates_away' => implode(',', $members));
    $this->db->where('id', $room_id);
    $this->db->update('chat_room', $data);
  }
}

public function remove_roommate_away($room_id, $token){
  $members = $this->db->select('roommates_away')
                      ->from('chat_room')
                      ->where('id', $room_id)
                      ->get()->row_array();
  $members = explode(',', $members['roommates_away']);
  if(($key=array_search($token, $members)) === false){
    return false;
  }
  unset($members[$key]);
  $data = array('roommates_away' => implode(',', $members));
  $this->db->where('id', $room_id);
  $this->db->update('chat_room', $data);
  return true;
}

public function add_roommates($room_id, $str_roommates){
  $members = explode(',', $str_roommates);
  $data = $this->get_roommates($room_id);
  $current_roommates = ($data['roommates'] == "") ? [] : explode(',', $data['roommates']);

  foreach($members as $member){
    if (in_array($member, $current_roommates) === false && $member != ""){
      array_push($current_roommates, $member);
    }
  }

  $data = array('roommates'=>implode(',', $current_roommates));
  $this->db->where('id', $room_id);
  $this->db->update('chat_room', $data);
  return true;
}

public function remove_roommates($room_id, $str_roommates){
  $members = explode(',', $str_roommates);
  $data = $this->get_roommates($room_id);
  $roommates = explode(',', $data['roommates']);
  
  foreach($members as $member){
    if(($key=array_search($member, $roommates)) !== false){
      unset($roommates[$key]);
    }
  }

  $data = array('roommates'=>implode(',', $roommates));
  $this->db->where('id', $room_id);
  $this->db->update('chat_room', $data);
  return true;
}

public function get_roommates($room_id){
  $data = $this->db->select('roommates')
                    ->from('chat_room')
                    ->where('id', $room_id)
                    ->get()->row_array();
  return $data;
}


/**
 * add collaborator
 */
public function add_remove_collaborator($room_id, $provider_id, $add=true){
  $proposal_id_row = $this->db->select('proposal_id')
                            ->from('chat_room')
                            ->where('id', $room_id)
                            ->get()->row_array();
  $data = array(
    'proposal_id' => $proposal_id_row['proposal_id'],
    'provider_id' => $provider_id,
  );

  if($add == true){
    $this->db->insert('send_proposal_coworkers', $data);
  } else {
    $this->db->delete('send_proposal_coworkers', $data);
  }
}

public function decline_collaborator($id){
  return $this->db->where('id', $id)
             ->update('send_proposal_coworkers', array('status' => 2));
}

/**
 * Get chat room information by booking information
 */
public function get_chat_room_booking($book_id){
  $query = $this->db->select('id')
            ->from('chat_room')
            ->where('book_id', $book_id)
            ->get();
  
  if($query->num_rows()==0){
    $book_data = $this->db->select('t2.token as provider_token, t3.token as user_token')
                  ->from('book_service as t1')
                  ->join('providers as t2', "t1.provider_id=t2.id", "LEFT")
                  ->join('users as t3', 't1.user_id=t3.id', "LEFT")
                  ->where('t1.id', $book_id)
                  ->get()->row_array();
    $roommates = $book_data['provider_token'] . "," . $book_data['user_token'];
    $data = array(
      'book_id' => $book_id,
      'roommates' => $roommates
    );
    $this->create_chat_room($data);
  }

  $chat_room = $this->db->get_where('chat_room', array('book_id'=>$book_id))->row();
  return $chat_room;
}

/**
 * Get chat room by proposal information
 * @param proposal_id, job_post_id, is_group (=1: group chat, =0: private chat)
 * @author Alexey
 */
public function get_chat_room_job($proposal_id=0, $job_post_id=0, $is_group=0){
  $query = $this->db->select()
            ->from('chat_room');
  
  if($proposal_id && !$is_group){

    $chatrooms = $query->where('proposal_id', $proposal_id)->get()->result();

    $data = array(
      'proposal_id'=>$proposal_id,
      'job_post_id'=>'',
    );

  } else {

    $chatrooms = $query->where('is_group', 1)
                  ->where('job_post_id', $job_post_id)
                  ->where('proposal_id', $proposal_id)
                  ->get()->result();
    $data = array(
      'proposal_id'=>$proposal_id,
      'job_post_id'=>$job_post_id,
    );

  }

  if(sizeof($chatrooms)==0){ 
    $book_data = $this->db->select("t2.token as provider_token, t3.token as user_token")
                        ->from("send_proposal as t1")
                        ->join("providers as t2", "t1.provider_id=t2.id", "left")
                        ->join("users as t3", "t1.user_id=t3.id", "left")
                        ->where("t1.id", $proposal_id)
                        ->get()->row_array();

    $roommates = $book_data['provider_token'] . "," . $book_data['user_token'];
    $room_id = $this->create_chat_room($data);
    $this->add_roommates($room_id, $roommates);
    $chatrooms = $this->db->select()
                          ->from('chat_room')
                          ->where('id', $room_id)
                          ->get()->result();
  }

  return $chatrooms;

}

/**
 * Get chat rooms by user
 */
public function get_chat_rooms($token){
  $chat_rooms = $this->db->select('chat_room as id')
                        ->from('chat_table')
                        ->where('sender_token', $token)
                        ->or_where('receiver_token', $token)
                        ->group_by('chat_room')
                        ->get()->result();
  return $chat_rooms;
}

/**
 * Get chat room by room number
 */
public function get_chat_room_by_id($room_id){
  $chat_room = $this->db->get_where('chat_room', array('id'=>$room_id))->row();
  return $chat_room;
}


     /*get chat history*/

  public function get_conversation_info($self_token,$partner_token){
        $return=$this->db->select('*')->
                from('chat_table')->
                where("(`sender_token` = '".$self_token."' AND `receiver_token` = '".$partner_token."') OR (`sender_token` = '".$partner_token."' AND `receiver_token` = '".$self_token."')")->
                where('status',1)->
                group_by('chat_id')->
                order_by('chat_id','ASC')->
                get()->result();
        return $return;
    }
       /*insert msg*/
	
    public function insert_msg($data){
      $val=$this->db->insert("chat_table",$data);
    if($val){
      return true;
    }else{
      return false;
    }
    }

       /*update*/

    public function update_info($where,$data,$table){
         $this->db->where_in('chat_id',$where);
        $ret=$this->db->update($table,$data);
        return $ret;
    }
	/**
	 * This function used in Employee / Veiw Orders
	 * Get chat room information by employee order information
	 */
	# added by maxim_u : For get employee's chatting room
	public function get_chat_room_employee_order($book_id){
	  $query = $this->db->select('id')
	            ->from('chat_room')
	            ->where('book_id', $book_id)
	            ->get();
  
	  if($query->num_rows()==0){
	    $book_data = $this->db->select('t3.token as employee_token, t4.token as user_token')
	                  ->from('book_service as t1')
	                  ->join('services as t2', "t1.service_id=t2.id", "LEFT")
	                  ->join('users as t3', 't2.user_id=t3.id', "LEFT")
	                  ->join('users as t4', 't1.user_id=t4.id', "LEFT")                  
	                  ->where('t1.id', $book_id)
	                  ->get()->row_array();
	    $roommates = $book_data['employee_token'] . "," . $book_data['user_token'];
	    $data = array(
	      'book_id' => $book_id,
	      'roommates' => $roommates
	    );
	    $this->create_chat_room($data);
	  }

	  $chat_room = $this->db->get_where('chat_room', array('book_id'=>$book_id))->row();
	  return $chat_room;
	} 
   #end
}
