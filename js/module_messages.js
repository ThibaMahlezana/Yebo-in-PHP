$(document).ready(function () {

    // searching users 
    $(".compose_message_box_recipient > input").keyup(function () {
        var $searchbox = $(this).val();
        var $dataString = 'searchword=' + $searchbox;

        if ($searchbox == '') {
        }

        if ($searchbox !== '') {
            $.ajax({
                type: "POST",
                url: "include/function_messages_search.php",
                data: $dataString,
                cache: false,
                success: function (html) {
                    $("#display").html(html).show();
                }
            });
            return false;
        }
    });

    // displaying search results as a name and username
    $("body").on('click', 'div.display_box', function () {
        var $display_grid = $('#display');
        var $display_box = $(this);

        var $search_box = $(".compose_message_box_recipient > input");
        var $username = $(this).find('#display_username').val();

        $($search_box).val($username).val();
        $display_grid.hide();
    });

    // showing up a hidden compose message form
    var $compose_message_btn = $('#compose_message_btn');
    var $compose_message_view = $('#compose_message_view');

    $($compose_message_btn).click(function () {
        $($compose_message_view).fadeIn();
    });

    // click recent message and displaying a message conversation
    var $recent_message = $('.recent_message_box');
    var $conversation_box = $('.message_chat_box-grid > form > .message_chat_area');

    $('body').on('click', 'div.recent_message_box', function () {
        var $recent_message = $(this);
        var $recent_message_username = $($recent_message).find('.recent_message_box_body > #display_username').text();
        $($conversation_box).load("include/function_update_messages.php", { update_type: "conversation_box", username: $recent_message_username });
    });

    // click event for reply button on messages conversation box
    var $reply_button = $('div.message_chat_box-grid > button');
    $($reply_button).click(function () {
        //alert('reply button');
    });

    // word counter for compose message
    $(".compose_message_box_content > textarea").keyup(function () {
        var $compose_message_box = $(this).val();
        var $compose_message_count = 125 - $compose_message_box.length;

        if ($compose_message_box.length <= 125) {
            $("#message_words_counter").html('<strong>' + $compose_message_count + '</strong>');
        }
    });

    // word counter for message conversation reply
    $(".message_chat_reply_area > textarea").keyup(function () {
        var $message_chat_box = $(this).val();
        var $message_chat_count = 125 - $message_chat_box.length;

        if ($message_chat_box.length <= 125) {
            $("#message_words_counter-reply").html($message_chat_count);
        }
    });

    // scrolling and resing messages conversation box
    function clear_resize_scroll(){
        $('.message_chat_area').getNiceScroll()[0].resize();
        return $('.message_chat_area').getNiceScroll()[0].doScrollTop(999999,999);
    }

    function insert_scroll(){
        clear_resize_scroll();
    }

    // message conversation reply
    var $message_conversation_reply_btn = $('#message_conversation_reply_btn');
    $($message_conversation_reply_btn).click(function () {

        var $message_conversation_recipient_username = $('.message_chat_box-reply > #username').val();
        var $message_conversation_logged_username = $('#logged_username').val();
        var $message_conversation_recipient_id = $('.message_chat_box-reply > #recipient_id').val();
        var $message_conversation_recipient_type = $('.message_chat_box-reply > #recipient_type').val();
        var $message_conversation_message_text = $('.message_chat_reply_area > #message_text').val();
        var $message_conversation_user_photo = $('#user_photo').val();

        var $message_conversation_window = $('.message_chat_area');
        var $message_conversation_buble = $('.message_chat_box');
        var $message_conversation_window_height = $message_conversation_window.height();

        var $message_validation_type = 'message_conversation_reply';

        var $message_conversation_data_string = 'recipient_username=' + $message_conversation_recipient_username +
                                                '&logged_username=' + $message_conversation_logged_username +
                                                '&recipient_id=' + $message_conversation_recipient_id +
                                                '&recipient_type=' + $message_conversation_recipient_type +
                                                '&message_validation_type=' + $message_validation_type +
                                                '&message_text=' + $message_conversation_message_text +
                                                '&logged_photo=' + $message_conversation_user_photo;

        $.ajax({
            type: 'POST',
            url: 'include/function_messages_validation.php',
            data: $message_conversation_data_string,
            cache: false,
            success: function (html) {
                $('.message_chat_area').append(html);
            }
        });
        $('#message_text').val('');
        insert_scroll();
    });

});
