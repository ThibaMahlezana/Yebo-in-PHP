$(document).ready(function(){
    
    var $recent_chats_box = $('.recent-chats-messages');
    var $active_users_body = $('.active-users-body');
    var $active_users_box = $('.active-users-box');

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
            cache: false
            //success: function (html) {$($recent_chats_box).html(html).show();}
        });
    }

    function updateActiveChats(){
        $($active_users_body).load("include/function_update_chats.php", {update_type: "online_users"});
    }

    setInterval(function(){updateChatsUsersOnlineStatus();},3000);
    setInterval(function(){updateActiveChats();},3000);
    setInterval(function(){updateRecentChats();},5000);
    
});