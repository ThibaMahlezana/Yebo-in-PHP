<?php
    if(!empty($_POST)){

        $message_validation_type = $_POST['message_validation_type'];

        if($message_validation_type == 'compose_message'){

            $message_from = $_POST['message_from'];
            $message_from_type = $_POST['message_from_type'];
            $message_to = $_POST['message_to'];
            $message_text = $_POST['message_text'];

            if(empty($message_to)){
                $validation_message[] = 'Sorry! message to is empty.';
                $validation_message_type = 'warning';
            }

            elseif(strlen($message_to) < 4 ){
                $validation_message[] = 'Sorry! message to is too short.';
                $validation_message_type = 'warning';
            }

            if(empty($message_text)){
                $validation_message[] = 'You have not written anything in the message content.';
                $validation_message_type = 'warning';
            }

            elseif(strlen($message_text) <= 50 ){
                $validation_message[] = 'Your message content is too short, why not chat with <strong>@'.$message_to.'</strong>';
                $validation_message_type = 'warning';
            }

            elseif(strlen($message_text) >= 150 ){
                $validation_message[] = 'Your message content is too large';
                $validation_message_type = 'warning';
            }

            if((!empty($message_to) &&
                (strlen($message_to) > 4 )) &&
                (!empty($message_text)) && 
                (strlen($message_text) >= 50) &&
                (strlen($message_text) <= 150)){

                    $user_id = $user_identity->getLoggedUserId();
                    $user_type = $user_identity->getLoggedUserType();
                    $recipient_info = $messages->getRecipientInfo($message_to);

                    $recipient_id = $recipient_info->user_id;
                    $recipient_type = $recipient_info->user_type;

                    $is_user_exist = $messages->getIsUserExist($message_to);

                    if($is_user_exist == 0){
                        $validation_message[] = 'sorry, <strong>@'.$message_to.'</strong> does not exist.';
                        $validation_message_type = 'warning';
                    }

                    if($is_user_exist == 1){

                        if(($user_id == $recipient_id) && ($user_type == $recipient_type)){
                            $validation_message[] = 'you cannot send a message to yourself.';
                            $validation_message_type = 'warning';
                        }

                        else{
                            $message_feature_logged_user = $messages->get_messages_feature_privacy_status_logged_user($user_id, $user_type);
                            if($message_feature_logged_user == 1){
                                $message_feature_recipient = $messages->get_messages_feature_privacy_status_recipient($recipient_id, $recipient_type);
                                if($message_feature_recipient == 1){
                                    $recipient_relation = $messages->getRecipientRelation($recipient_id, $recipient_type, $user_id, $user_type);

                                    $messages_follower_logged_user = $messages->get_messages_followers_privacy_status_logged_user($user_id, $user_type);
                                    $messages_follower_recipient = $messages->get_messages_followers_privacy_status_logged_user($recipient_id, $recipient_type);

                                    $messages_following_logged_user = $messages->get_messages_following_privacy_status_logged_user($user_id, $user_type);
                                    $messages_following_recipient = $messages->get_messages_following_privacy_status_recipient($recipient_id, $recipient_type);

                                    $messages_everyone_logged_user = $messages->get_messages_everyone_privacy_status_logged_user($user_id, $user_type);
                                    $messages_everyone_recipient = $messages->get_messages_everyone_privacy_status_recipient($recipient_id, $recipient_type);

                                    $num_messages_validation = $messages->get_validateNumberOfMessages($user_id, $user_type, $recipient_id, $recipient_type);

                                    $latest_message = $num_messages_validation[0];
                                    $recent_message = $num_messages_validation[1];

                                    $latest_message_id = $latest_message->user_id;
                                    $latest_message_type = $latest_message->user_type;

                                    $recent_message_id = $recent_message->user_id;
                                    $recent_message_type = $recent_message->user_type;
                                
                                    if($recipient_relation == 'follower'){
                                        if($messages_follower_logged_user == 1){                                        
                                            if($messages_following_recipient == 1){
                                                if(empty($latest_message) || empty($recent_message)){
                                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                    $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                    $validation_message_type = 'information';
                                                }
                                                if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                    $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                    $validation_message_type = 'information';
                                                }
                                                elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                                    if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                        $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$message_to.'</strong> to respond first.';
                                                        $validation_message_type = 'warning';
                                                    }
                                                    else{
                                                        $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                        $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                        $validation_message_type = 'information';
                                                    }
                                                }
                                            }
                                            if($messages_following_recipient == 0){
                                                $validation_message[] = '<strong>'.$message_to.'</strong> does not like to recieve messages from this kind of relation.';
                                                $validation_message_type = 'warning';
                                            }
                                        }
                                        if($messages_follower_logged_user == 0){
                                            $validation_message[] = 'you cannot send or recieve messages from followers, check your <a href="settings.php">settings</a>.';
                                            $validation_message_type = 'warning';
                                        }
                                    }

                                    if($recipient_relation == 'following'){
                                        if($messages_following_logged_user == 1){
                                            if($messages_follower_recipient == 1){
                                                if(empty($latest_message) || empty($recent_message)){
                                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                    $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                    $validation_message_type = 'information';
                                                }
                                                if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                    $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                    $validation_message_type = 'information';
                                                }
                                                elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                                    if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                        $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$message_to.'</strong> to respond first.';
                                                        $validation_message_type = 'warning';
                                                    }
                                                    else{
                                                        $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                        $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                        $validation_message_type = 'information';
                                                    }
                                                }
                                            }
                                            if($messages_follower_recipient == 0){
                                                $validation_message[] = '<strong>'.$message_to.'</strong> does not like to recieve messages from this kind of relation.';
                                                $validation_message_type = 'warning';
                                            }
                                        }
                                        if($messages_following_logged_user == 0){
                                            $validation_message[] = 'you cannot send or recieve messages from people or companies you are following, check your settings.';
                                            $validation_message_type = 'warning';
                                        }
                                    }

                                    if($recipient_relation == 'following_each_other'){
                                        if(empty($latest_message) || empty($recent_message)){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                            $validation_message_type = 'information';
                                        }
                                        if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                            $validation_message_type = 'information';
                                        }
                                        elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                            if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$message_to.'</strong> to respond first.';
                                                $validation_message_type = 'warning';
                                            }
                                            else{
                                                $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                $validation_message_type = 'information';
                                            }
                                        }

                                    }

                                    if($recipient_relation == 'everyone'){
                                        if($messages_everyone_logged_user == 1){
                                            if($messages_everyone_recipient == 1){
                                                if(empty($latest_message) || empty($recent_message)){
                                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                    $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                    $validation_message_type = 'information';
                                                }
                                                if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                    $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                    $validation_message_type = 'information';
                                                }
                                                elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                                    if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                        $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$message_to.'</strong> to respond first.';
                                                        $validation_message_type = 'warning';
                                                    }
                                                    else{
                                                        $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                        $validation_message[] = 'a message was successfuly sent to <strong>'.$message_to.'</strong>';
                                                        $validation_message_type = 'information';
                                                    }
                                                }
                                            }
                                            if($messages_everyone_recipient == 0){
                                                $validation_message[] = '<strong>'.$message_to.'</strong> does not like to recieve messages from this kind of relation.';
                                                $validation_message_type = 'warning';
                                            }
                                        }
                                        if($messages_everyone_logged_user == 0){
                                            $validation_message[] = 'you cannot send or recieve messages from people or companies you are not connected with, check your settings.';
                                            $validation_message_type = 'warning';
                                        }
                                    }

                                }
                                if($message_feature_recipient == 0){
                                    $validation_message[] = '<strong>'.$message_to.'</strong> did not activate messages feature.';
                                    $validation_message_type = 'warning';
                                }
                            }

                            if($message_feature_logged_user == 0){
                                $validation_message[] = 'your messages feature is not activated.';
                                $validation_message_type = 'warning';
                            }
                        }

                    }
                }
        }

        if($message_validation_type == 'message_conversation_reply'){
            
            session_start();
            include "module_user.php";
            $user_identity = new moduleUser;

            $recipient_username = $_POST['recipient_username'];
            $logged_username = $_POST['logged_username'];
            $logged_photo = $_POST['logged_photo'];
            $logged_user_id = $user_identity->getLoggedUserId();
            $logged_user_type = $user_identity->getLoggedUserType();
            $recipient_id = $_POST['recipient_id'];
            $recipient_type = $_POST['recipient_type'];
            $message_text = $_POST['message_text'];
            $message_time = 'Just now';

            if(empty($message_text)){
                $validation_message[] = 'You have not written anything in the message content.';
            }

            elseif(strlen($message_text) <= 50 ){
                $validation_message[] = 'Your message content is too short, why not chat with <strong>@'.$recipient_username.'</strong>';
            }

            elseif(strlen($message_text) >= 150 ){
                $validation_message[] = 'Your message content is too large';
            }

            if(!empty($message_text) &&
               strlen($message_text) >= 51 &&
               strlen($message_text) <= 149){

                    include 'class_database.php';
                    include "module_messages.php";

                    $db = new database;
                    $messages = new messages;

                    $user_id = $logged_user_id;
                    $user_type = $logged_user_type;

                    $message_feature_logged_user = $messages->get_messages_feature_privacy_status_logged_user($user_id, $user_type);

                    if($message_feature_logged_user == 1){
                        $message_feature_recipient = $messages->get_messages_feature_privacy_status_recipient($recipient_id, $recipient_type);
                        if($message_feature_recipient == 1){
                            $recipient_relation = $messages->getRecipientRelation($recipient_id, $recipient_type, $user_id, $user_type);
                            $messages_follower_logged_user = $messages->get_messages_followers_privacy_status_logged_user($user_id, $user_type);
                            $messages_follower_recipient = $messages->get_messages_followers_privacy_status_logged_user($recipient_id, $recipient_type);

                            $messages_following_logged_user = $messages->get_messages_following_privacy_status_logged_user($user_id, $user_type);
                            $messages_following_recipient = $messages->get_messages_following_privacy_status_recipient($recipient_id, $recipient_type);

                            $messages_everyone_logged_user = $messages->get_messages_everyone_privacy_status_logged_user($user_id, $user_type);
                            $messages_everyone_recipient = $messages->get_messages_everyone_privacy_status_recipient($recipient_id, $recipient_type);
                           
                            $num_messages_validation = $messages->get_validateNumberOfMessages($user_id, $user_type, $recipient_id, $recipient_type);
                            $latest_message = $num_messages_validation[0];
                            $recent_message = $num_messages_validation[1];

                            $latest_message_id = $latest_message->user_id;
                            $latest_message_type = $latest_message->user_type;

                            $recent_message_id = $recent_message->user_id;
                            $recent_message_type = $recent_message->user_type;


                            if($recipient_relation == 'follower'){
                                if($messages_follower_logged_user == 1){
                                    if($messages_following_recipient == 1){
                                        if(empty($latest_message) || empty($recent_message)){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            echo '
                                                <div class="message_chat_box">
                                                    <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                    <span>@'.$logged_username.'</span>
                                                    <span>'.$message_text.'</span>
                                                    <a class="pull-right">'.$message_time.'</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            ';
                                        }
                                        if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            echo '
                                                <div class="message_chat_box">
                                                    <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                    <span>@'.$logged_username.'</span>
                                                    <span>'.$message_text.'</span>
                                                    <a class="pull-right">'.$message_time.'</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            ';
                                        }
                                        elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                            if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$recipient_username.'</strong> to respond first.';
                                            }
                                            else{
                                                $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                echo '
                                                    <div class="message_chat_box">
                                                        <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                        <span>@'.$logged_username.'</span>
                                                        <span>'.$message_text.'</span>
                                                        <a class="pull-right">'.$message_time.'</a>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                ';
                                            }
                                        }
                                    }
                                    if($messages_following_recipient == 0){
                                        $validation_message[] = '<strong>'.$recipient_username.'</strong> does not like to recieve messages from this kind of relation.';
                                    }
                                }
                                if($messages_follower_logged_user == 0){
                                    $validation_message[] = 'you cannot send or recieve messages from followers, check your settings.';
                                }
                            }

                            if($recipient_relation == 'following'){
                                if($messages_following_logged_user == 1){
                                    if($messages_follower_recipient == 1){
                                        if(empty($latest_message) || empty($recent_message)){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            echo '
                                                <div class="message_chat_box">
                                                    <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                    <span>@'.$logged_username.'</span>
                                                    <span>'.$message_text.'</span>
                                                    <a class="pull-right">'.$message_time.'</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            ';
                                        }
                                        if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            echo '
                                                <div class="message_chat_box">
                                                    <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                    <span>@'.$logged_username.'</span>
                                                    <span>'.$message_text.'</span>
                                                    <a class="pull-right">'.$message_time.'</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            ';
                                        }
                                        elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                            if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$recipient_username.'</strong> to respond first.';
                                            }
                                            else{
                                                $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                echo '
                                                    <div class="message_chat_box">
                                                        <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                        <span>@'.$logged_username.'</span>
                                                        <span>'.$message_text.'</span>
                                                        <a class="pull-right">'.$message_time.'</a>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                ';
                                            }
                                        }
                                    }
                                    if($messages_follower_recipient == 0){
                                        $validation_message[] = '<strong>'.$recipient_username.'</strong> does not like to recieve messages from this kind of relation.';
                                    }
                                }
                                if($messages_following_logged_user == 0){
                                    $validation_message[] = 'you cannot send or recieve messages from people or companies you are following, check your <a href="settings.php">settings</a>.';
                                }
                            }

                            if($recipient_relation == 'following_each_other'){
                                if(empty($latest_message) || empty($recent_message)){
                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                    echo '
                                        <div class="message_chat_box">
                                            <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                            <span>@'.$logged_username.'</span>
                                            <span>'.$message_text.'</span>
                                            <a class="pull-right">'.$message_time.'</a>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="clear"></div>
                                    ';
                                }
                                if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                    $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                    echo '
                                        <div class="message_chat_box">
                                            <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                            <span>@'.$logged_username.'</span>
                                            <span>'.$message_text.'</span>
                                            <a class="pull-right">'.$message_time.'</a>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="clear"></div>
                                    ';
                                }
                                elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                    if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                        $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$recipient_username.'</strong> to respond first.';
                                    }
                                    else{
                                        $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                        echo '
                                            <div class="message_chat_box">
                                                <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                <span>@'.$logged_username.'</span>
                                                <span>'.$message_text.'</span>
                                                <a class="pull-right">'.$message_time.'</a>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="clear"></div>
                                        ';
                                    }
                                }
                            }

                            if($recipient_relation == 'everyone'){
                                if($messages_everyone_logged_user == 1){
                                    if($messages_everyone_recipient == 1){
                                        if(empty($latest_message) || empty($recent_message)){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            echo '
                                                <div class="message_chat_box">
                                                    <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                    <span>@'.$logged_username.'</span>
                                                    <span>'.$message_text.'</span>
                                                    <a class="pull-right">'.$message_time.'</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            ';
                                        }
                                        if($latest_message_id == $recipient_id && $latest_message_type == $recipient_type){
                                            $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                            echo '
                                                <div class="message_chat_box">
                                                    <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                    <span>@'.$logged_username.'</span>
                                                    <span>'.$message_text.'</span>
                                                    <a class="pull-right">'.$message_time.'</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                            ';
                                        }
                                        elseif($latest_message_id == $user_id && $latest_message_type == $user_type){
                                            if($recent_message_id == $user_id && $recent_message_type == $user_type){
                                                $validation_message[] = 'a message cannot be delivered please wait for <strong>'.$recipient_username.'</strong> to respond first.';
                                            }
                                            else{
                                                $messages->sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
                                                echo '
                                                    <div class="message_chat_box">
                                                        <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$logged_photo.'"/></div>
                                                        <span>@'.$logged_username.'</span>
                                                        <span>'.$message_text.'</span>
                                                        <a class="pull-right">'.$message_time.'</a>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                ';
                                            }
                                        }
                                    }
                                    if($messages_everyone_recipient ==0){
                                        $validation_message[] = '<strong>'.$recipient_username.'</strong> does not like to recieve messages from this kind of relation.';
                                    }
                                }
                                if($messages_everyone_logged_user == 0){
                                    $validation_message[] = 'you cannot send or recieve messages from people or companies you are not connected with, check your settings.';
                                }
                            }
                        }

                        if($message_feature_recipient == 0){
                            $validation_message[] = '<strong>'.$recipient_username.'</strong> did not activate messages feature.';
                        }
                    }

                    if($message_feature_logged_user == 0){
                        $validation_message[] = 'your messages feature is not activated, check <a href="settings.php">settings</a>.';
                    }
                }

            if(!empty($validation_message)){
                foreach($validation_message as $alert_message){
                    echo '
                        <div class="alert alert-danger compose_message_box_alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="flaticon-warning18"></i> '.$alert_message.'
                        </div>
                    ';
                }
            }
        }

    }
    
?>