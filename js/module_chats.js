$(document).ready(function(){
    
    var $recent_chats_box = $('.recent-chats-messages');
    var $active_users_box = $('#online-users-box');
    var $reply_btn = $('.chat-box-reply #reply_btn');

    function updateRecentChats(){
        $($recent_chats_box).load("include/function_update_chats.php", {update_type: "recent_chats"});
    }
    
    function updateChatsUsersOnlineStatus(){
        var $data_action = 'online_status';
        var $data_string = 'update_type=' + $data_action;

        $.ajax({
            type: 'POST',
            url: "include/function_update_chats.php",
            data: $data_string,
            cache: false,
        });
    }

    function updateActiveChats(){
        $($active_users_box).load("include/function_update_chats.php", {update_type: "online_users"});
    }
    
    $('body').on('click', 'div.recent-chats-messages div.recent-chat', function (){
        var $recent_chats_message_info = $(this);
        var $recent_chats_message_username = $($recent_chats_message_info).find('.recent-chat-content #recent_chat_username').text();
        var $recent_chats_message_user_id = $($recent_chats_message_info).find('.recent-chat-content #user_id').val();
        var $recent_chats_message_user_type = $($recent_chats_message_info).find('.recent-chat-content #user_type').val();
        var $chats_conversation_box = $('#chat-box');

        $($chats_conversation_box).load("include/function_update_chats.php", {update_type: "recent_chats_conversation", 
                                                                              username: $recent_chats_message_username, 
                                                                              user_id: $recent_chats_message_user_id,
                                                                              user_type: $recent_chats_message_user_type });
    });

    $('body').on('click', 'div.chat-box-reply #reply_btn', function(){
        var $chats_conversation_username = $('#logged_username').val();
        var $chats_conversation_photo = $('#user_photo').val();
        var $chats_conversation_recipient_id = $('#recipient_id').val();
        var $chats_conversation_recipient_type = $('#recipient_type').val();
        var $chats_conversation_text = $('#chats_conversation_text').val();
        var $chats_update_type = 'private_chats_conversation';

        var $chats_conversation_data_string = 'logged_username=' + $chats_conversation_username +
                                              '&logged_user_photo=' + $chats_conversation_photo +
                                              '&recipient_id=' + $chats_conversation_recipient_id +
                                              '&recipient_type=' + $chats_conversation_recipient_type +
                                              '&chat_text=' + $chats_conversation_text +
                                              '&update_type=' + $chats_update_type;
        $.ajax({
            type: 'POST',
            url: 'include/function_update_chats.php',
            data: $chats_conversation_data_string,
            cache: false,
            success: function (html) {
                $('.chat-box-body').append(html);
            }
        });
        $('#chats_conversation_text').val('');
    });

    $('body').on('click', 'div.chat-box-reply #reply_btn_public', function(){
        var $chats_conversation_username = $('#logged_username').val();
        var $chats_conversation_photo = $('#user_photo').val();
        var $chats_conversation_text = $('#chats_conversation_text').val();
        var $chats_update_type = 'public_chats_conversation';
        var $chats_conversation_post_id = $('#post_id').val();
        var $chats_conversation_post_type = $('#post_type').val();

        var $chats_conversation_data_string = 'logged_username=' + $chats_conversation_username +
                                              '&logged_user_photo=' + $chats_conversation_photo +
                                              '&post_id=' + $chats_conversation_post_id +
                                              '&post_type=' + $chats_conversation_post_type +
                                              '&chat_text=' + $chats_conversation_text +
                                              '&update_type=' + $chats_update_type;
        $.ajax({
            type: 'POST',
            url: 'include/function_update_chats.php',
            data: $chats_conversation_data_string,
            cache: false,
            success: function (html) {
                $('.chat-box-body').append(html);
            }
        });
        $('#chats_conversation_text').val('');
    });

    setInterval(function(){updateChatsUsersOnlineStatus();},3000);
    setInterval(function(){updateActiveChats();},5000);
    setInterval(function(){updateRecentChats();},5000);
    
});