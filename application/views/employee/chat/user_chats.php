<?php
    // print_r($chat_list); exit;
?>
<style type="text/css">
    .left_message>.history_append_fun {
        margin: 5px 0;
    }
    .history_append_fun.active {
        background-color: #d052c4;
        color: #fff;
    }
    .history_append_fun.active .user-name {
        color: #ffffff;
    }
    .history_append_fun .badge {
        right: 0px;
        bottom: 0px;
        border: 1px solid #ddd;
        border-radius: 50%;
        background-color: #ff3377;
        width: 20px;
        height: 20px;
        font-size: 13px;
        color: white;
    }

    .modal-body .user-list{
        max-height: 230px;
        overflow: auto;
    }

</style>
<script type="text/javascript">
    var opponent = <?php echo json_encode($opponent); ?>;
</script>

<div class="content chat-history-blk"> 
  <div class="container">
     <div class="row justify-content-center">
        <div class="col-lg-12">
           <!-- <div class="dashboradsec">
              <h3 class="mb-4"><?php echo (!empty($user_language[$user_selected]['lg_chats'])) ? $user_language[$user_selected]['lg_chats'] : $default_langouage['en']['lg_chats']; ?></h3>
           </div> -->

            <div class="pbox">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-xl-4 chat d-flex">
        				<div class="card mb-sm-3 mb-md-0 contacts_card flex-fill chat-scroll">
                            <div class="card-header chat-search">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="search_btn"><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="text" placeholder="Search" name="search_chat_list" id="search_chat_list" class="form-control search-chat ">
                                </div>
                            </div>
                            <div class="card-body contacts_body">
                                <ul role="tablist" class="left_message contacts">
                                    <?php 
                                    foreach ($chat_list as $key => $value) {
                                        if(!empty($value['profile_img'])){
                                            $path=base_url().$value['profile_img'];
                                        }else{
                                            $path=base_url().'assets/img/user.jpg';
                                        }
                                        $class_names='badge_count'.$value['token'];
                                        if($value['badge']!=0){
                                            $badge="<span  class='position-absolute badge badge-theme '>".$value['badge']."</span>";
                                        }else{
                                            $badge="<span  class='position-absolute badge badge-theme '></span>";
                                        }
                                     ?>

                                    <li class="history_append_fun" data-token="<?=$value['token'];?>" chat-room="<?=$value['chat_room'];?>" coworkers="<?=sizeof($value['profile_imgs']);?>"> 
                                        <a href="javascript:void(0);">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont"><?=$badge;?>
                                               <img src="<?=$path;?>" class="rounded-circle user_img">
                                            </div>
                                            <!-- Members of group chatroom.  -->
                                            <div class="d-flex img_cont1">
                                            <?php
                                            foreach($value['profile_imgs'] as $member_img){
                                                $path1 = base_url() . (empty($member_img) ? 'assets/img/user.jpg' : $member_img);
                                            ?>
                                            <img src="<?=$path1;?>" class="rounded-circle user_img">
                                            <?php
                                            }
                                            ?>
                                            </div>
                                            
                                            <div class="user_info">
                                                <span class="user-name"><?=$value['name'];?></span><span class="float-right text-muted"></span>
                                            </div>
                                        </div>
                                        </a>
                                    </li>

                                <?php } ?>
                    
                                </ul>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                           
                    <div class="col-md-8 col-xl-8 chat d-flex chat-scroll">
                        <div class="card flex-fill mb-0 justify-content-center align-items-center" id="home_page">
    						<div class="no-messages">
    							<i class="fa fa-comments"></i>
    						</div>
                        </div>
                    
                <!-- chat history -->
                        <div class="card w-100 mb-0" id="history_page">
                            <div class="card-header msg_head">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img id="receiver_image" src="" class="rounded-circle user_img">
                                    </div>
                                    <div class="img_cont1 d-flex">
                                    </div>
                                    <div class="user_info">
                                        <span><strong id="receiver_name"></strong></span>
                                        <p class="mb-0"><?php echo (!empty($user_language[$user_selected]['lg_messages'])) ? $user_language[$user_selected]['lg_messages'] : $default_language['en']['lg_messages']; ?></p>
                                    </div>
                                    <div class="input-group-append">
                                        <button id="btn_invite"  class="btn btn-success btn_invite"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body msg_card_body" id="chat_box"> 
                              <div id="load_div" class="text-center"></div>         
                            </div>

                            <div class="card-footer"> 
                                <input type="hidden" name="chat-seft" id="fromToken" placeholder="" value="" class=""  />
                                <input type="hidden" name="toToken" value="" id="toToken" placeholder="" class=""  />
                                <input type="hidden" name="from_name" value="" id="from_name">
                                <input type="hidden" name="to_name" value="" id="to_name">
                                <input type="hidden" name="chat_room" value="" id="chat_room">

                                <div class="input-group">
                                    <input name="" class="form-control type_msg mh-auto empty_check" id="chat-message" placeholder="Type your message..." maxlength="1000"/>
                                    <div class="input-group-append">
                                        <button id="submit"  class="btn btn-primary btn_send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
     </div>
  </div>
</div>
<input type="hidden" name="user_address">
<input type="hidden" id="self_token" value="<?php echo $this->session->userdata('chat_token');?>">
<input type="hidden" id="server_name" value="<?php echo $server_name.':'.$port_no;?>">
<input type="hidden" id="img" value="<?= base_url('assets/img/loader.gif');?>">



<!-- Modal -->
<div class="modal fade" id="user_chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Invite a provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul class="user-list">
              <li class="d-flex bd-highlight" data-token="12msdf">
                  <div class="img_cont"><img src="https://activate.navicat.com/uploads/profile_img/1625318795.png" class="rounded-circle user_img">
                  </div>
                  <div class="user_info">
                      <span class="user-name">Alexey</span><span class="float-right text-muted"></span>
                  </div>
                  <div class="input-group-append">
                      <button class="btn btn-success btn_invite m-1"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                  </div>
              </li>
          </ul>
          <hr>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" rows="3" placeholder="..."></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>