(function($) {
	"use strict";
	
	var base_url=$('#base_url').val();
	var BASE_URL=$('#base_url').val();
	var csrf_token=$('#csrf_token').val();
	var csrfName=$('#csrfName').val();
	var csrfHash=$('#csrfHash').val();

	$( document ).ready(function() {
		$('#history_page').hide();
		$('#home_page').show();
		// $('.history_append_fun').on('click',function(){
    $(document).on('click', '.history_append_fun', function(){
			var id=$(this).attr('data-token');
      $("#chat_room").val($(this).attr('chat-room'));
      //--active--
      $(".history_append_fun.active").removeClass('active');
      $(".history_append_fun[data-token='"+id+"']").addClass('active');
      //----------
			loadMessageBox(id);
		});  
		$('.btn_send').on('click',function(){
			btn_send();
		});  
    $("#chat-message").on('keyup',function(key) {
      switch(key.keyCode) {
        case 13:
          var text=$("#chat-message").val();
          if(text.trim() != ''){
            $(".btn_send").click();
          }
          break;
      }
    });
		$('.empty_check').on('keyup',function(){
			empty_check();
		}); 
		$('.search-chat').on('keyup',function(){
			filter(this);
		}); 

    if (opponent) {
      $('.history_append_fun[data-token="'+opponent.token+'"]').click();
    }
    else {
      $('.history_append_fun:first-child').click();
    }

    $('#btn_invite').on('click', function() {
      loadInviteable();
    });

    
	});

  $(document).on('click', ".btn_invite_user", function(e) {
    var token = $(this).attr('data-token');
    submitInvite(token);
  });

  $(document).on('click', "#accept_invite", function(e) {
    acceptInvite();
  });
	
	var self_token = $('#self_token').val();
	var server_name=$('#server_name').val();
	var img=$('#img').val();

	window.filter = function(element) {
		var value = $(element).val().toUpperCase();
		$(".left_message > li").each(function() {
			if ($(this).text().toUpperCase().search(value) > -1){
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
	}

  function loadInviteable(){
    var chat_room = $('#chat_room').val();
    $.ajax({
      url:base_url+"user/Chat_ctrl/load_inviteable",
      type:"post",
      data:{'chat_room':chat_room, 'csrf_token_name':csrf_token},
      async:false,
      success:function(data){
        var res = JSON.parse(data);
        if(res.user_list.length>0){

          var $user_list = $('#user_chat_modal ul.user-list');
          $user_list.empty();
          var path = "";

          for(var i in res.user_list){
            var item = res.user_list[i];

            if(item.profile_img == ""){
              path = base_url+'assets/img/user.jpg';
            }else{
              path = base_url + item.profile_img;
            }
            $user_list.append(
              `<li class="d-flex bd-highlight" data-token="`+ item.token +`">
                <div class="img_cont"><img src="` + path + `" class="rounded-circle user_img">
                </div>
                <div class="user_info">
                    <span class="user-name">`+item.name+`</span><span class="float-right text-muted"></span>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-success btn_invite_user m-1" data-token="`+ item.token +`" data-id="` + item.id + `"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                </div>
              </li>`
            );
            
          }
          $('#user_chat_modal').modal({
            show:true
          });
        }
      }
    });
  }

  function submitInvite(token){
    var chat_room = $('#chat_room').val();

    $.ajax({
      url: base_url+"user/Chat_ctrl/save_invite",
      type:"post",
      data:{'token':token, 'chat_room':chat_room,'csrf_token_name':csrf_token},
      async:false,
      success(data){
        console.log('ok');
        $("#user_chat_modal").modal('hide');
        loadMessageBox($('#toToken').val());
      }
    });


  }

  function acceptInvite(){
    var chat_room = $('#chat_room').val();

    $.ajax({
      url: base_url+"user/Chat_ctrl/accept_invite",
      type:"post",
      data:{'chat_room':chat_room, 'csrf_token_name':csrf_token},
      async:false,
      success(data){
        loadMessageBox($('#toToken').val());
      }
    });
  }

	function empty_check(){
		var text=$("#chat-message").val();
		if(text.trim()==''){
			$('#submit').attr('disabled',true);
		}else{
			$('#submit').attr('disabled',false);
		}
	}
  
  function chat_clear(){
    var fromToken=$("#fromToken").val();     
    var toToken=$("#toToken").val(); 
   
    $.ajax({

      url:base_url+"user/Chat_ctrl/clear_history",
      type:"post",
      data:{'partner_token':toToken,'self_token':fromToken,'csrf_token_name':csrf_token},
      async:false,
      success:function(data){
        console.log(data);  
        return false;
        if(data==1){
          history_append_fun(toToken);
        }else{
          alert("Please Try Some TIme....");
          console.log(data);  
        }
      }
    });
  }

  function get_user_chat_lists(){
    $.ajax({
      url:base_url+"user/Chat_ctrl/get_user_chat_lists",
      type:"post",
      data:{'csrf_token_name':csrf_token},
      async:false,
      success:function(data){
        if(data!=''){
          var res=JSON.parse(data);
          
          $(res.chat_list).each(function(index, value) {
            if(!isExistToken(value.token)) {
              var path = "";
              if(value.profile_img!=''){
                path=base_url+value.profile_img;
              }else{
                path=base_url+'assets/img/user.jpg';
              }
              var badge = "";
              if(value.badge!=0){
                badge="<span class='position-absolute badge badge-theme '>"+value.badge+"</span>";
              }else{
                badge="<span class='position-absolute badge badge-theme '></span>";
              }
              var appendHtml = "";
              // appendHtml +='<li class="active history_append_fun" data-token="'+ value.token+'"> <a href="javascript:void(0);"><div class="d-flex bd-highlight">';
              // appendHtml +='<div class="img_cont">'+badge+'<img src="'+path+'" class="rounded-circle user_img"></div>';
              // appendHtml +='<div class="user_info"><span class="user-name">'+value.name+'</span><span class="float-right text-muted"></span></div></div></a></li>';

              appendHtml += '<li class="history_append_fun" data-token="'+value.token+'" chat-room="'+value.chat_room+'" coworkers="'+value.profile_imgs.length+'"> ';
              appendHtml += '<a href="javascript:void(0);"><div class="d-flex bd-highlight"><div class="img_cont">'+badge+'<img src="'+path+'" class="rounded-circle user_img"></div>';
              appendHtml += '<div class="d-flex img_cont1">';

              for (var i in value.profile_imgs){
                var member_img = value.profile_imgs[i];
                if(value.profile_img!=''){
                  path=base_url+member_img;
                }else{
                  path=base_url+'assets/img/user.jpg';
                }
                
                appendHtml += '<img src="'+path+'" class="rounded-circle user_img">';
              }
              appendHtml += '</div><div class="user_info"><span class="user-name">'+value.name+'</span><span class="float-right text-muted"></span></div></div></a></li>';

              $('.left_message').append(appendHtml);

            }
            else {
              if (value.badge != 0) {
                $(".history_append_fun[data-token='"+value.token+"']").find(".badge").html(value.badge);
              }
              else {
                $(".history_append_fun[data-token='"+value.token+"']").find(".badge").html("");
              }
            }
          });
        }
      }
    });
  }

  function isExistToken(token) {
    if($(".history_append_fun[data-token='"+token+"']").length == 0)
      return false;
    return true;
  }

  function history_append_fun(token){
  
    var self_token = $('#self_token').val();

    /*change to read status*/
    $.ajax({
      url:base_url+"user/Chat_ctrl/changeToRead_ctrl",
      type:"post",
      data:{'partner_token':token,'self_token':self_token,'csrf_token_name':csrf_token},
      async:false,
      success:function(data){
        switch(Number(data)) {
          case 0: 
            break;
          case 1: 
            // console.log('updated');
            loadMessageBox(token);
            break;
          case 2: 
            console.log('update not updated');
            break;
          default: break;
        }
      }
    });

  }

  function loadMessageBox(token) {

    $('#home_page').hide();
    $('.badge_count'+token).hide();
    var img=$('#img').val();
    $('#history_page').show();
    $('#load_div').html('<img src='+img+' alt="" />');
    $('#load_div').show();
    var self_token = $('#self_token').val();
    $.ajax({
      url:base_url+"user/Chat_ctrl/get_chat_history",
      type:"post",
      data:{'partner_token':token,'self_token':self_token,'csrf_token_name':csrf_token},
      async:false,
      success:function(data){
        $.ajax({
          url:base_url+"user/Chat_ctrl/get_token_informations",
          type:"post",
          data:{'partner_token':token,'self_token':self_token,'csrf_token_name':csrf_token},
          async:false,
          success:function(fetch){
            var Data = JSON.parse(fetch);

            $('#from_name').val(Data.self_info.name);
            $('#fromToken').val(Data.self_info.token);
            $('#to_name').val(Data.partner_info.name);
            $('#toToken').val(Data.partner_info.token);
          
            $('#receiver_name').text(Data.partner_info.name);


            $("#receiver_image").removeAttr("src");
          
            if(Data.partner_info.profile_img.length>0){
              var img=("src", base_url+Data.partner_info.profile_img);
            }else{
              var img=("src", base_url+'assets/img/user.jpg');
            }

            $("#receiver_image").attr("src", img);
            


            var $history_page_img = $('#history_page .img_cont1');
            $history_page_img.empty();

            var profile_imgs = Data.partner_info.profile_imgs;
            for(var i in profile_imgs){
              var profile_img = profile_imgs[i];
              if(profile_img.length>0){
                var img_src = base_url+profile_img;
              }else{
                var img_src = base_url+'assets/img/user.jpg';
              }

              $history_page_img.append("<img class='rounded-circle user_img' src='" + img_src + "'>");
            }
                        
          }
        });
        var $chatBox = $("#chat_box");
        var chatBox = $chatBox.get(0);
        $chatBox.empty().append(data);
        $chatBox.scrollTop(chatBox.scrollHeight - $chatBox.height());
      },
      complete: function(){
        $('#load_div').show();
      }
    });
  }

  function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
  }

  function showMessage(messageHTML) {

    $('#chat_box').append(messageHTML);
    // console.log(messageHTML);
  }

  function btn_send(){
    var messageJSON = {
      'toToken': $('#toToken').val(),
      'fromToken': $('#fromToken').val(),
      'content': $('#chat-message').val(),
      'fromName': $('#from_name').val(),
      'toName': $('#to_name').val(),
    };

    $.post(base_url+'user-chat/insert_chat',{fromToken: $('#fromToken').val(),toToken:$('#toToken').val(), chat_room:$('#chat_room').val(), content:$('#chat-message').val(),csrf_token_name:csrf_token}, function(response){
      var res=JSON.parse(response);
      if(res.success){ 
         loadMessageBox($('#toToken').val());
         $('#chat-message').val('');
         $('#submit').prop('disabled',false);
      }
      else {
        if (res.show_msg) {
          function createSelection(field, start, end) {
            if( field.createTextRange ) {
              var selRange = field.createTextRange();
              selRange.collapse(true);
              selRange.moveStart('character', start);
              selRange.moveEnd('character', end);
              selRange.select();
              field.focus();
            } else if( field.setSelectionRange ) {
              field.focus();
              field.setSelectionRange(start, end);
            } else if( typeof field.selectionStart != 'undefined' ) {
              field.selectionStart = start;
              field.selectionEnd = end;
              field.focus();
            }
          }
          for(var i in res.matches) {
            createSelection($("#chat-message").get(0), res.matches[i][1], res.matches[i][1]+res.matches[i][0].length);
            break;
          }
          setTimeout(function () {
            Command: toastr['error'](res.msg);
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-center",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "3000",
              "hideDuration": "5000",
              "timeOut": "6000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }   
          }, 300);
        }
      }
    });

    /*disabled submit*/
    $('#submit').attr('disabled',true);
  }


const chatAppTarget = $('.pbox');
setInterval(function(){
  var token = $(".history_append_fun.active").attr("data-token"); 
  history_append_fun(token);
  get_user_chat_lists();
}, 5000);

if ($(window).width() > 991)
  chatAppTarget.removeClass('chat-slide');

$(document).on("click",".pbox .left-message li",function () {
  if ($(window).width() <= 991) {
    chatAppTarget.addClass('chat-slide');
  }
  return false;
});
$(document).on("click","#back_user_list",function () {
  if ($(window).width() <= 991) {
    chatAppTarget.removeClass('chat-slide');
  } 
  return false;
});

})(jQuery);