$(document).ready(function() {
    var csrf_token=$('#admin_csrf').val();
    $(".type_msg").on('keyup',function(key) {
        switch(key.keyCode) {
            case 13:
                var text=$(this).val();
                if(text.trim() != ''){
                    $(".btn_send").click();
                }
            break;
        }
    });
    $('.empty_check').on('keyup',function(){
        empty_check();
    }); 
    $('.btn_send').on('click',function(){
        btn_send();
    });  
});
function empty_check(){
    var text=$(".type_msg").val();
    if(text.trim()==''){
        $('#submit').attr('disabled',true);
    }else{
        $('#submit').attr('disabled',false);
    }
}
function btn_send(){
    var csrf_token=$('#admin_csrf').val();
    var messageJSON = {
    'to_token': $('input[name="user_token"]').val(),
    'content': $('.type_msg').val(),
    'csrf_token_name': csrf_token
    };

    $.post(base_url+'admin/Dashboard/send_notification_message', messageJSON, function(response){
        var res=JSON.parse(response);
        if(res.success){ 
            $('.type_message').val('');
            $('#submit').prop('disabled',false);
        }
        else {
            if (res.show_msg) {
            
            }
        }
        window.location.reload();
    });

    /*disabled submit*/
    $('#submit').attr('disabled',true);
}