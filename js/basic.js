$(document).ready(function(){
    
    $('body').on('click', 'div.topic-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.topic-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.topic-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });

    $('body').on('click', 'div.custom-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.custom-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.custom-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });
 
    $('body').on('click', 'div.image-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.image-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.image-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });

    $('body').on('click', 'div.video-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.video-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.video-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });

    $('body').on('click', 'div.link-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.link-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.link-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });

    $('body').on('click', 'div.thought-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.thought-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.thought-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });

    $('body').on('click', 'div.quote-active-chat', function(){
        var $chats_conversation_box = $('.chat-box');
        var $active_chat_post_id = $('.quote-active-chat #active_chat_post_id').val();
        var $active_chat_post_type = $('.quote-active-chat #active_chat_post_type').val();
        $($chats_conversation_box).load("include/function_update_chats.php", { update_type: "active_chats", post_id: $active_chat_post_id, post_type: $active_chat_post_type });
    });
    
});