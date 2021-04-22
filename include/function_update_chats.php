<?php 
    session_start();
    
    include 'class_database.php';
    include 'module_chats.php';
    include 'module_user.php';

    $db = new database;
    $chats = new chats;
    $user_identity = new moduleUser;

    $user_id = $user_identity->getLoggedUserId();
    $user_type = $user_identity->getLoggedUserType();

    if(!empty($_POST)){
        $update_type = $_POST['update_type'];
        
        if($update_type === 'recent_chats'){
            echo $chats->displayRecentChatsUpdate($user_id, $user_type);
        }

        if($update_type === 'online_status'){
            $chats->updateChatsOnlineStatus($user_id, $user_type);
        }

        if($update_type === 'online_users'){
            error_reporting(0);
            $chats->displayActiveUsers();
        }

        if($update_type === 'recent_chats_conversation'){
            $user_id = $_POST['user_id'];
            $user_type = $_POST['user_type'];

            $chats->displayRecentChatsConversation($user_id, $user_type);
        }
        
        if($update_type === 'active_chats'){
            $post_id = $_POST['post_id'];
            $post_type = $_POST['post_type'];
            $chats->displayActiveChatConversationClicked($post_id, $post_type);
        }

        if($update_type == 'private_chats_conversation'){
            $logged_username = $_POST['logged_username'];
            $logged_user_photo = $_POST['logged_user_photo'];
            $recipient_id = $_POST['recipient_id'];
            $recipient_type = $_POST['recipient_type'];
            $chat_text = $_POST['chat_text'];

            if(empty($chat_text)){
                echo '
                    <div class="alert alert-danger compose_message_box_alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="flaticon-warning18"></i> sorry, you didnot write anything.
                    </div>
                ';
            }
            if(!empty($chat_text)){
                if(strlen($chat_text) <= 100){
                    echo '
                        <div class="chat-box-message">
                            <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$logged_user_photo.'"/></div>
                            <div class="chat-box-message-body">
                                <span>@'.$logged_username.'</span>
                                <span>'.$chat_text.'.</span>
                                <span>now</span>
                            </div>
                        </div>
                        <div class="clear"></div>                
                    ';
                }
                if(strlen($chat_text) > 100){
                    echo '
                        <div class="alert alert-danger compose_message_box_alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="flaticon-warning18"></i> sorry, your message is too large.
                        </div>
                    ';
                }
            }
        }

        if($update_type == 'public_chats_conversation'){
            $logged_username = $_POST['logged_username'];
            $logged_user_photo = $_POST['logged_user_photo'];
            $post_id = $_POST['post_id'];
            $post_type = $_POST['post_type'];
            $chat_text = $_POST['chat_text'];

            if(empty($chat_text)){
                echo '
                    <div class="alert alert-danger compose_message_box_alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="flaticon-warning18"></i> sorry, you didnot write anything.
                    </div>
                ';
            }
            if(!empty($chat_text)){
                if(strlen($chat_text) <= 50){
                    echo '
                        <div class="chat-box-message">
                            <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$logged_user_photo.'"/></div>
                            <div class="chat-box-message-body">
                                <span>@'.$logged_username.'</span>
                                <span>'.$chat_text.'.</span>
                                <span>now</span>
                            </div>
                        </div>
                        <div class="clear"></div>                
                    ';                    
                }
                if(strlen($chat_text) > 50){
                    echo '
                        <div class="alert alert-danger compose_message_box_alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="flaticon-warning18"></i> sorry, your message is too large.
                        </div>
                    ';                }
            }
        }

        /*if($update_type !== 'recent_chats' &&
           $update_type !== 'online_status' &&
           $update_type !== 'online_users' &&
           $update_type !== 'recent_chats_conversation' &&
           $update_type !== 'active_chats'){
               echo 'sorry something went wrong!';
        }*/
    }

?>