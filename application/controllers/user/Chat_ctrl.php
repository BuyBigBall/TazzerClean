<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_ctrl extends CI_Controller {

   public $data;
   public $chat_token;

  public function __construct() {

    parent::__construct();
    error_reporting(0);
    $this->data['theme'] = 'user';
    $this->data['module'] = 'chat';
    $this->data['base_url'] = base_url();

	  $this->load->helper('custom_language');

    $this->load->model('booking_model','booking');
    $this->load->model('Chat_model');
    $this->load->helper('user_timezone_helper');
    
    $user_id = $this->session->userdata('id');
    $this->chat_token=$this->session->userdata('chat_token');
    $this->data['user_id'] = $user_id;
		$this->load->helper('subscription_helper');
     
    $this->data['secret_key'] = '';
    $this->data['publishable_key'] = '';
    $this->data['website_logo_front'] ='assets/img/logo.png';

    $publishable_key='';
    $secret_key='';
    $live_publishable_key='';
    $live_secret_key='';
    $stripe_option='';


    $query = $this->db->query("select * from system_settings WHERE status = 1");
    $result = $query->result_array();
    if(!empty($result))
    {
      foreach($result as $data){

        if($data['key'] == 'website_name'){
        $this->website_name = $data['value'];
        }
        if($data['key'] == 'secret_key'){
          $secret_key = $data['value'];
        }

        if($data['key'] == 'publishable_key'){
          $publishable_key = $data['value'];
        }

        if($data['key'] == 'live_secret_key'){
          $live_secret_key = $data['value'];
        }

        if($data['key'] == 'live_publishable_key'){
          $live_publishable_key = $data['value'];
        }

        if($data['key'] == 'stripe_option'){
          $stripe_option = $data['value'];
        } 
        
        if($data['key'] == 'logo_front'){
            $this->data['website_logo_front'] =  $data['value'];
        }
      }
    }

    if(@$stripe_option == 1){
      $this->data['publishable_key'] = $publishable_key;
      $this->data['secret_key']      = $secret_key;
    }

    if(@$stripe_option == 2){
      $this->data['publishable_key'] = $live_publishable_key;
      $this->data['secret_key']      = $live_secret_key;
    }

    $config['publishable_key'] =  $this->data['publishable_key'];

    $config['secret_key'] = $this->data['secret_key'];

    $this->load->library('stripe',$config);
    

    if(!$this->session->userdata('id'))
    {
      redirect(base_url());
    }
  }

  public function index()
	{
    $this->data['page'] = 'user_chats';

    $chat_rooms = $this->Chat_model->get_chat_rooms($this->chat_token);

    $chat_room_data = [];
    foreach($chat_rooms as $room_key=>$chat_room) {
      $chat_room_data[$room_key] = $this->get_chatroom_info($chat_room->id);
    }

    $this->data['chat_list']=$chat_room_data;
    $this->data['server_name']=settingValue('server_name');
    $this->data['port_no']=settingValue('port_no');

    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

    return;





    // $chat_lists=$this->Chat_model->get_chat_list($this->chat_token);
    // $final=[];
    // foreach ($chat_lists as $key => $value) {
    //   if(!empty($value->name)){
    //     $final[$key]['profile_img']=$value->profile_img;
    //     $final[$key]['token']=$value->token;
    //     $final[$key]['name']=$value->name;
    //     $final[$key]['last_msg']=$this->Chat_model->get_last_msg($value->token)->message;
    //     $final[$key]['badge']=$this->Chat_model->get_badge_count($value->token,$this->chat_token)->counts;
    //   }
    // }

    // $this->data['chat_list']=$final;
    // $this->data['server_name']=settingValue('server_name');
    // $this->data['port_no']=settingValue('port_no');

    // $this->load->vars($this->data);
    // $this->load->view($this->data['theme'].'/template');
	}

  public function get_user_chat_lists(){
    $chat_rooms = $this->Chat_model->get_chat_rooms($this->chat_token);

    $chat_room_data = [];
    foreach($chat_rooms as $room_key=>$chat_room) {
      $chat_room_data[$room_key] = $this->get_chatroom_info($chat_room->id);
    }

    $this->data['chat_list']=$chat_room_data;
    // $chat_lists=$this->Chat_model->get_chat_list($this->chat_token);
    // $final=[];
    // foreach ($chat_lists as $key => $value) {
    //   $final[$key]['profile_img']=$value->profile_img;
    //   $final[$key]['token']=$value->token;
    //   $final[$key]['name']=$value->name;
    //   $final[$key]['last_msg']=$this->Chat_model->get_last_msg($value->token)->message;
    //   $final[$key]['badge']=$this->Chat_model->get_badge_count($value->token,$this->chat_token)->counts;
    // }

    // $this->data['chat_list']=$final;
    echo json_encode($this->data);
    exit;
  }
     /*new Chat App*/

  public function booking_new_chat()
  {     
    extract($_GET);
     
    $data=$this->Chat_model->get_book_info($book_id);

    if(!empty($data)){
      $self_info=$this->Chat_model->get_token_info($this->session->userdata('chat_token'));
      if($self_info->type==2){
        $user_token=$this->Chat_model->get_user_info($data['provider_id'],1);
      } else{
        $user_token=$this->Chat_model->get_user_info($data['user_id'],2);
      }
     
    }
    
    $this->data['page'] = 'user_chats';
    $opponent = $this->Chat_model->get_token_info($user_token['token']);
    $this->data['opponent'] = $opponent;

    // $final['profile_img']=$chat_lists->profile_img;
    // $final['token']=$chat_lists->token;
    // $final['name']=$chat_lists->name;
    // $final['last_msg']='';
    // $final['badge']=$this->Chat_model->get_badge_count($chat_lists->token,$this->chat_token)->counts;
    // $this->data['chat_list']=array($final);

    $this->data['server_name']=settingValue('server_name');
    $this->data['port_no']=settingValue('port_no');
    
    // $chat_lists=$this->Chat_model->get_chat_list($this->chat_token);
    
    $chat_room = $this->Chat_model->get_chat_room_booking($book_id);

    
    $chat_room_data = [];
    $chat_room_data[0] = $this->get_chatroom_info($chat_room->id);

    $this->data['chat_list']=$chat_room_data;

    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');

    return;




    // $final=[];
    // foreach ($chat_lists as $key => $value) {
    //   $final[$key]['profile_img']=$value->profile_img;
    //   $final[$key]['token']=$value->token;
    //   $final[$key]['name']=$value->name;
    //   $final[$key]['last_msg']=$this->Chat_model->get_last_msg($value->token)->message;
    //   $final[$key]['badge']=$this->Chat_model->get_badge_count($value->token,$this->chat_token)->counts;
    //   $final[$key]['chat_room'] = $chat_room->id;
    // }

    // $this->data['chat_list']=$final;

    // $this->load->vars($this->data);
    // $this->load->view($this->data['theme'].'/template');
  }
  
  public function job_new_chat()
  {     
    extract($_GET);
     
    $data=$this->Chat_model->get_job_info($book_id);

    $chat_rooms = $this->Chat_model->get_chat_room_job($book_id);

    $chat_room_data = [];
    foreach($chat_rooms as $room_key=>$chat_room) {
      $chat_room_data[$room_key] = $this->get_chatroom_info($chat_room->id);
    }

    
    if(!empty($data)){
      $self_info=$this->Chat_model->get_token_info($this->session->userdata('chat_token'));
      if($self_info->type==2){
        $user_token=$this->Chat_model->get_user_info($data['provider_id'],1);
      } else{
        $user_token=$this->Chat_model->get_user_info($data['user_id'],2);
      }     
    }

    $this->data['page'] = 'user_chats';
    $opponent = $this->Chat_model->get_token_info($user_token['token']);
    $this->data['opponent'] = $opponent;
 
    // $final['profile_img']=$chat_lists->profile_img;
    // $final['token']=$chat_lists->token;
    // $final['name']=$chat_lists->name;
    // $final['last_msg']='';
    // $final['badge']=$this->Chat_model->get_badge_count($chat_lists->token,$this->chat_token)->counts;
    // $this->data['chat_list']=array($final);

    $this->data['server_name']=settingValue('server_name');
    $this->data['port_no']=settingValue('port_no');

    
    // $chat_lists=$this->Chat_model->get_chat_list($this->chat_token);
    // $final=[];
    // foreach ($chat_lists as $key => $value) {
    //   $final[$key]['profile_img']=$value->profile_img;
    //   $final[$key]['token']=$value->token;
    //   $final[$key]['name']=$value->name;
    //   $final[$key]['last_msg']=$this->Chat_model->get_last_msg($value->token)->message;
    //   $final[$key]['badge']=$this->Chat_model->get_badge_count($value->token,$this->chat_token)->counts;
    // }

    // $this->data['chat_list']=$final;

    $this->data['chat_list'] = $chat_room_data;

    $this->load->vars($this->data);
    $this->load->view($this->data['theme'].'/template');
  }


  /**
   * Get chatroom information
   * @author Alexey
   * @param chat_room_id, self_token
   */
  public function get_chatroom_info($chat_room_id){
    $chat_room = $this->Chat_model->get_chat_room_by_id($chat_room_id);
    
    $members = explode(',', $chat_room->roommates);
    $member_names = "";
    $profile_imgs = [];


    foreach($members as $key=>$member_token){
      if($member_token == "" || $member_token == $this->chat_token) continue;

      $member_data = $this->Chat_model->get_token_info($member_token);

      // $members_detail[$key]['profile_img'] = $member_data->profile_img;
      array_push($profile_imgs, $member_data->profile_img);
      $member_names .= ($member_names == "" ? "" : ", ") . $member_data->name;
    }

    $chat_room_data = [];
    $chat_room_data['badge'] = $this->Chat_model->get_badge_count_by_chat_room($chat_room_id, $this->chat_token)->counts;
    $chat_room_data['name'] = substr($member_names, 0, 20) . (strlen($member_names) > 20 ? " ..." : "");
    $chat_room_data['member_names'] = $member_names;
    $chat_room_data['profile_img'] = $profile_imgs[0];
    unset($profile_imgs[0]);
    $chat_room_data['profile_imgs'] = $profile_imgs;
    $chat_room_data['last_msg'] = $this->Chat_model->get_last_msg_by_chatroom($chat_room->id);
    $chat_room_data['chat_room'] = $chat_room->id;
    $chat_room_data['token'] = $chat_room->id;

    return $chat_room_data;
  }


  /*appnd chat history*/

  public function get_chat_history(){
    extract($_POST);
    $self_token= $this->session->userdata('chat_token');
    $data['chat_history']=$this->Chat_model->get_conversation_info($self_token,$partner_token);
    $data['partner_info']=$this->Chat_model->get_token_info($partner_token);
    $data['self_info']=$this->Chat_model->get_token_info($self_token);
    $this->load->view('user/chat/ajax_page/chat_history',$data);
  }
	
  /*get token info*/
  public function get_token_informations(){
    extract($_POST);
    $self_token= $this->session->userdata('chat_token');
    // $data['partner_info']=$this->Chat_model->get_token_info($partner_token);

    //$partner_token  is chatroom_id
    $chat_room_data = $this->get_chatroom_info($partner_token);
    $data['partner_info'] = array(
      'name' => $chat_room_data['name'],
      'token' => $partner_token,
      'profile_img' => $chat_room_data['profile_img'],
      'profile_imgs' => $chat_room_data['profile_imgs']
    );


    $data['self_info']=$this->Chat_model->get_token_info($self_token); 
    echo json_encode($data);
  }
     
  /*insert_message*/
  public function insert_message(){
    extract($_POST);

    $roommates = $this->Chat_model->get_roommates($toToken);
    $roommates = explode(',', $roommates['roommates']);
    if(in_array($fromToken, $roommates) == false){
      echo json_encode(['success'=>false,'msg'=>"not insert"]);exit;
    }

    $result = $this->checkMessageWord($content);
    if (!$result['status']) {
      if($result['word'] == 'word') {
        $wordList = [];
        foreach($result["matches"] as $match) {
          array_push($wordList, $match[0]);
        }
        $message = "You are trying to violate our policy. Do not use \"".implode(', ', $wordList)."\" over chat !";
        echo json_encode(['success'=>false,'msg'=>$message, 'matches'=>$result['matches'], 'show_msg'=>true]);exit;
      }
      if($result['word'] == 'email') {
        $wordList = [];
        foreach($result["matches"] as $match) {
          array_push($wordList, $match[0]);
        }
        $message = "You are trying to violate our policy. Do not use the email address \"".implode(', ', $wordList)."\" over chat !";
        echo json_encode(['success'=>false,'msg'=>$message, 'matches'=>$result['matches'], 'show_msg'=>true]);exit;
      }
    }
    date_default_timezone_set('UTC');
    $date_time = date('Y-m-d H:i:s');
    date_default_timezone_set('Asia/Kolkata');
    $data=array(
      "sender_token"=>$fromToken,
      "receiver_token"=>$toToken,
      "message"=>$content,
      "status"=>1,
      "read_status"=>0,
      "utc_date_time"=>$date_time,
      "created_at"=>date('Y-m-d H:i:s'),
      "chat_room"=>$chat_room,
    ); 
    $val=$this->Chat_model->insert_msg($data);
    
    $roommates = $this->Chat_model->get_roommates($toToken);
    $roommates = explode(',', $roommates['roommates']);
    foreach($roommates as $roommate){
      if($roommate == "" || $roommate == $fromToken)
        continue;
      $data['sender_token'] = $toToken;
      $data['receiver_token'] = $roommate;
      $this->Chat_model->insert_msg($data);
    }

    if($val){
      echo json_encode(['success'=>true,'msg'=>"success"]);exit;
    }else{
      echo json_encode(['success'=>false,'msg'=>"not insert"]);exit;
    }
  }

  public function checkMessageWord($text) {
    $wordPattern = "/email|phone|skype|CV|slack/";
    preg_match_all($wordPattern, $text, $matches, PREG_OFFSET_CAPTURE);
    if(count($matches[0]) > 0) {
      return ['status'=>false, 'word'=>'word', 'matches'=>$matches[0]];
    }

    $emailPattern = "/[a-zA-Z0-9_.+-]+\s*@\s*[a-zA-Z0-9-]+\s*\.\s*[a-zA-Z0-9-.]+/";
    preg_match_all($emailPattern, $text, $matches, PREG_OFFSET_CAPTURE);
    if(count($matches[0]) > 0) {
      return ['status'=>false, 'word'=>'email', 'matches'=>$matches[0]];
    }

    return ['status'=>true];
  }

  
  /**
   * check valid member of chat room
   * @author Alexey
   */
  public function check_room_member($chat_room_id, $token){
    $roommates = $this->Chat_model->get_roommates($chat_room_id);
    $roommates = explode(',', $roommates['roommates']);

    return array_search($token, $roommates);
  }




  /*clear screen*/
  public function clear_history(){

    extract($_POST);

    $data=$this->Chat_model->get_conversation_info($self_token,$partner_token);
    $where=[];
    foreach ($data as $key => $value) {
      $where[]=$value->chat_id;
    }
    $data=array('status'=>0);
    $table='chat_table';
   
    $ret=$this->Chat_model->update_info($where,$data,$table);
    if($ret){
      $ret=1;
    }else{
      $ret=2;
    }
    echo $ret;
  }

  /*change to read staus*/
  public function changeToRead_ctrl(){

    extract($_POST);
    $table='chat_table';
    $where=array('receiver_token'=>$self_token,'sender_token'=>$partner_token);
    if (!$this->Chat_model->isExistUnread($where,$table)) {
      echo 0;
      exit;
    }
    $data=array('read_status'=>1);
    $ret=$this->Chat_model->changeToRead($where,$data,$table);
    if($ret){
      echo 1;
    } else{
      echo 2;
    }
    exit;
  }

  /**
   * @author: Alexey
   * Get inviteable providers
   * @param: chat_room
   */
  public function load_inviteable(){
    extract($_POST);
    
    $inviteables = $this->Chat_model->get_inviteable($chat_room);
    
    $user_list = [];

    foreach($inviteables as $key=>$value){
      $user_list[$key]['id'] = $value->id;
      $user_list[$key]['name'] = $value->name;
      $user_list[$key]['profile_img'] = $value->profile_img;
      $user_list[$key]['token'] = $value->token;
    }

    $data['user_list'] = $user_list;

    echo json_encode($data);
    
  }

  /**
   * accept invite
   */
  public function accept_invite(){
    extract($_POST);
   
    $val = $this->Chat_model->remove_roommate_away($chat_room, $this->chat_token);

    if($val == true){
      $this->Chat_model->add_roommates($chat_room, $this->chat_token);

      $self_info = $this->Chat_model->get_token_info($this->chat_token);
      $_POST['content'] = "Invite accepted by {" . $self_info->name . "}";
      $_POST['fromToken'] = $this->chat_token;
      $_POST['toToken'] = $chat_room;
      
      $this->insert_message();

      $this->Chat_model->add_remove_collaborator($chat_room, $self_info->id, true);

    }

    
    echo json_encode(['success'=>true]); exit;
  }

  /**
   * decline coworker of proposal
   * @param id: co_worker id of send_proposal_coworkers table
   *        book_id: proposal_id
   */
  public function decline_coworker(){
    extract($_GET);
    $this->Chat_model->decline_collaborator($id);

    redirect(base_url().'manage-proposal?id='.$book_id);
  }

  /** 
   * save invited provider.
   * @param chat_room, token
   */
  public function save_invite(){
    extract($_POST);

    // $this->Chat_model->add_roommates($chat_room, $token);


    $data = $this->check_room_member($chat_room, $token);
    
    if(!$data){
      date_default_timezone_set('UTC');
      $date_time = date('Y-m-d H:i:s');
      date_default_timezone_set('Asia/Kolkata');

      $self_info = $this->Chat_model->get_token_info($this->chat_token);
      $content = "You are invited from {" . $self_info->name . "}";
      $content .= "<br><a href='#' id='accept_invite'>Accept</a>";

      $data=array(
        "sender_token"=>$chat_room,
        "receiver_token"=>$token,
        "message"=>$content,
        "status"=>1,
        "read_status"=>0,
        "utc_date_time"=>$date_time,
        "created_at"=>date('Y-m-d H:i:s'),
        "chat_room"=>$chat_room,
      ); 
      $val=$this->Chat_model->insert_msg($data);

      $user_info = $this->Chat_model->get_token_info($token);
      $content = "Invite request sent to {" . $user_info->name . "}";

      $data['sender_token'] = $this->chat_token;
      $data['receiver_token'] = $chat_room;
      $data['message'] = $content;

      $val = $this->Chat_model->insert_msg($data);

      $this->Chat_model->add_roommate_away($chat_room, $token);
    }


    $data['room_data'] = $this->get_chatroom_info($chat_room);

    echo json_encode($data);

  }
}