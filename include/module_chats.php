<?php
    /*  MODULE CHATS  */
    class chats {
        
        private function TimeAgoShort($time_ago){
            
            $cur_time = time();
            $time_elapsed = $cur_time - $time_ago;
            $seconds = $time_elapsed ;
            $minutes = round($time_elapsed / 60 );
            $hours = round($time_elapsed / 3600);
            $days = round($time_elapsed / 86400 );
            $weeks = round($time_elapsed / 604800);
            $months = round($time_elapsed / 2600640 );
            $years = round($time_elapsed / 31207680 );
            
            if($seconds <= 60){
                $seconds = "$seconds Sec";
                return $seconds;
            }
            
            else if($minutes <=60){
                if($minutes==1){
                    $minutes = "1 Min";
                }
                else{
                    $minutes = "$minutes Min";
                }
                return $minutes;
                }
                
            else if($hours <=24){
                if($hours==1){
                    $hours = "1 Hr";
                }else{
                    $hours = "$hours Hr";
                }
                return $hours;
                }
                
            else if($days <= 7){
                    if($days==1){
                        $days = "1 Y";
                    }else{
                        $days = "$days D";
                    }
                    return $days;
                }
                
            else if($weeks <= 4.3){
                    if($weeks==1){
                        $weeks = "1 W";
                    }else{
                        $weeks = "$weeks W";
                    }
                    return $weeks;
                }
                
            else if($months <=12){
                    if($months==1){
                        $months = "1 Mon";
                    }else{
                        $months = "$months Mon";
                    }
                    return $months;
                }
                
            else{
                    if($years==1){
                        $years = "1 Yr";
                    }else{
                        $years = "$years Yrs";
                    }
                    return $years;
                }
        }
        
        private function TimeAgoLong($time_ago){
            $cur_time = time();
            $time_elapsed = $cur_time - $time_ago;
            $seconds = $time_elapsed ;
            $minutes = round($time_elapsed / 60 );
            $hours = round($time_elapsed / 3600);
            $days = round($time_elapsed / 86400 );
            $weeks = round($time_elapsed / 604800);
            $months = round($time_elapsed / 2600640 );
            $years = round($time_elapsed / 31207680 );
            
            if($seconds <= 60){
                $seconds = "$seconds Sec Ago";
                return $seconds;
            }
            
            else if($minutes <=60){
                if($minutes==1){
                    $minutes = "1 Min Ago";
                }
                else{
                    $minutes = "$minutes Mins Ago";
                }
                return $minutes;
                }
                
            else if($hours <=24){
                if($hours==1){
                    $hours = "1 Hr Ago";
                }else{
                    $hours = "$hours Hrs Ago";
                }
                return $hours;
                }
                
            else if($days <= 7){
                    if($days==1){
                        $days = "1 Day Ago";
                    }else{
                        $days = "$days Days Ago";
                    }
                    return $days;
                }
                
            else if($weeks <= 4.3){
                    if($weeks==1){
                        $weeks = "1 Week Ago";
                    }else{
                        $weeks = "$weeks Weeks Ago";
                    }
                    return $weeks;
                }
                
            else if($months <=12){
                    if($months==1){
                        $months = "1 Mon Ago";
                    }else{
                        $months = "$months Mon Ago";
                    }
                    return $months;
                }
                
            else{
                    if($years==1){
                        $years = "1 Yr Ago";
                    }else{
                        $years = "$years Yrs Ago";
                    }
                    return $years;
                }
        }   

        private function loadUSerInformation($user_id, $user_type){
           global $db;

           if($user_type == 1){
               $query = "SELECT username, avatar, first_name
                         FROM members
                         WHERE user_id = $user_id";
               $result = $db->query($query);
           }
           if($user_type == 2){
               $query = "SELECT username, logo, name
                         FROM companies
                         WHERE company_id = $user_id";
               $result = $db->query($query);
           }

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
        }

        private function loadPrivateChatMessageInfo($chat_message_id){ 
            global $db;

            $query = "SELECT *
                      FROM chats_private
                      WHERE chat_id = $chat_message_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }

        private function chatMessageTimeFunction($time_ago){
           $cur_time = time();
           $time_elapsed = $cur_time - $time_ago;
           $seconds = $time_elapsed ;
           $minutes = round($time_elapsed / 60 );
           $hours = round($time_elapsed / 3600);
           $days = round($time_elapsed / 86400 );
           $weeks = round($time_elapsed / 604800);
           $months = round($time_elapsed / 2600640 );
           $years = round($time_elapsed / 31207680 );
           
           if($seconds <= 60){
	           $seconds = "$seconds Sec";
               return $seconds;
           }
           
           else if($minutes <=60){
	           if($minutes==1){
		           $minutes = "1 Min";
	           }
	           else{
		           $minutes = "$minutes Min";
	           }
               return $minutes;
            }
            
           else if($hours <=24){
	           if($hours==1){
		           $hours = "1 Hr";
	           }else{
		           $hours = "$hours Hr";
	           }
               return $hours;
            }
            
           else if($days <= 7){
	            if($days==1){
		            $days = "1 Y";
	            }else{
		            $days = "$days D";
	            }
                return $days;
            }
            
           else if($weeks <= 4.3){
	            if($weeks==1){
		            $weeks = "1 W";
	            }else{
		            $weeks = "$weeks W";
	            }
                return $weeks;
            }
            
           else if($months <=12){
	            if($months==1){
		            $months = "1 Mon";
	            }else{
		            $months = "$months Mon";
	            }
                return $months;
            }
            
           else{
	            if($years==1){
		            $years = "1 Yr";
	            }else{
		            $years = "$years Yrs";
	            }
                return $years;
            }
        }

        private function saveChatsOnlineStatus($user_id, $user_type, $time){
            global $db;
            $query = "UPDATE chats_online_status
                      SET last_time = '$time'
                      WHERE user_id = '$user_id'
                      AND user_type = '$user_type'";
            $db->query($query);
        }

        public function updateChatsOnlineStatus($user_id, $user_type){
            $time = time();            
            $this->saveChatsOnlineStatus($user_id, $user_type, $time);
        }

        private function  chatsOnlineLastTime($user_id, $user_type){
            global $db;

            $query = "SELECT last_time
                      FROM chats_online_status
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }

        private function chatsOnlineLastTimeText($user_id, $user_type){
            $last_time = $this->chatsOnlineLastTime($user_id, $user_type);
            $last_time_ago = $this->chatsOnlineStatusTimeAgo($last_time);
            return $last_time_ago;
        }

        private function chatsOnlineStatus($user_id, $user_type){
            error_reporting(0);
            $time_info = $this->chatsOnlineLastTime($user_id, $user_type);
            $last_time = $time_info->last_time;

            $cur_time = time();
            $time_elapsed = $cur_time - $last_time;

            if($time_elapsed <= 5){
                $online_status = 1;
            }
            if($time_elapsed > 5){
                $online_status = 0;
            }
            return $online_status;
        }

        private function chatsOnlineStatusTimeAgo($last_time){
           $cur_time = time();
           $last_time_ago = $last_time->last_time;
           $time_elapsed = $cur_time - $last_time_ago;
           $seconds = $time_elapsed ;
           $minutes = round($time_elapsed / 60 );
           $hours = round($time_elapsed / 3600);
           $days = round($time_elapsed / 86400 );
           $weeks = round($time_elapsed / 604800);
           $months = round($time_elapsed / 2600640 );
           $years = round($time_elapsed / 31207680 );
           
           if($seconds <= 60){
	           $seconds = "$seconds Sec";
               return $seconds;
           }
           else if($minutes <=60){
	           if($minutes==1){
		           $minutes = "1 min ago";
	           }
	           else{
		           $minutes = "$minutes min ago";
	           }
               return $minutes;
            }
            
           else if($hours <=24){
	           if($hours==1){
		           $hours = "1 hr ago";
	           }else{
		           $hours = "$hours hrs ago";
	           }
               return $hours;
            }
            
           else if($days <= 7){
	            if($days==1){
		            $days = "1 day ago";
	            }else{
		            $days = "$days days ago";
	            }
                return $days;
            }
            
           else if($weeks <= 4.3){
	            if($weeks==1){
		            $weeks = "1 week ago";
	            }else{
		            $weeks = "$weeks weeks ago";
	            }
                return $weeks;
            }
            
           else if($months <=12){
	            if($months==1){
		            $months = "1 mon ago";
	            }else{
		            $months = "$months mon ago";
	            }
                return $months;
            }
            
           else{
	            if($years==1){
		            $years = "1 yr ago";
	            }else{
		            $years = "$years yrs ago";
	            }
                return $years;
            }
        }

        private function chatsToLoggedUser($user_id, $user_type){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT user_id, user_type
                      FROM chats_private
                      WHERE recipient_id = '$user_id'
                      AND recipient_type = '$user_type'";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loadRecentChats($user_id, $user_type){
            $recent_chats = $this->chatsToLoggedUser($user_id, $user_type);
            $recent_chats_array = array();

            foreach($recent_chats as $value){
                $user_id = $value->user_id;
                $user_type = $value->user_type;

                $recent_chats_array[] = array('user_id' => $user_id, 'user_type' => $user_type,);
            }

            $recent_chats_array = array_map("unserialize", array_unique(array_map("serialize", $recent_chats_array)));
            $recent_chats_array = array_slice($recent_chats_array, 0, 6);

            return $recent_chats_array;
        }

        public function displayRecentChats(){
            $recent_chats = $this->loadRecentChats();

            if(!empty($recent_chats)){
                foreach($recent_chats as $recent_chats_arr){
                    $chat_message_sender = $recent_chats_arr['user_id'];
                    $chat_message_sender_type = $recent_chats_arr['user_type'];

                    $user_info = $this->loadUSerInformation($chat_message_sender, $chat_message_sender_type);
                    $online_status = $this->chatsOnlineStatus($chat_message_sender, $chat_message_sender_type);
                    $last_time_ago = $this->chatsOnlineLastTimeText($chat_message_sender, $chat_message_sender_type);

                    if($chat_message_sender_type == 1){
                        $user_photo = $user_info->avatar;
                        $name = $user_info->first_name;
                        $recent_chat_user_type = 'flaticon-user77';
                        $user_id = $user_info->user_id;
                    }
                    if($chat_message_sender_type == 2){
                        $user_photo = $user_info->logo;
                        $name = $user_info->name;
                        $recent_chat_user_type = 'flaticon-building8';
                        $user_id = $user_info->company_id;
                    }

                    if($online_status == 1){
                        $status_color = '#62bf6e';
                        $status_text = 'Online';
                    }
                    if($online_status == 0){
                        $status_color = '#e28282';
                        $status_text = 'Last seen '.$last_time_ago;
                    }

                    echo '
                        <div class="recent-chat">
                            <div class="recent-chat-avatar">
                                <span><img width="50" alt="avatar" src="'.$user_photo.'"/></span>
                            </div>
                            <div class="recent-chat-status"><div style="background: '.$status_color.'"></div></div>
                            <div class="recent-chat-content">
                                <input id="user_id" type="hidden" value="'.$chat_message_sender.'"/>
                                <input id="user_type" type="hidden" value="'.$chat_message_sender_type.'"/>
                                <p><span>'.$name.'</span> <span id="recent_chat_username">@'.$user_info->username.'</span></p>
                                <p><span>'.$status_text.'</span></p>
                            </div>
                            <span><i class="'.$recent_chat_user_type.'"></i></span>
                        </div>
                    ';
                }
            }
            if(empty($recent_chats)){
                echo '
                    <p><strong>Currently there are no Chats for you.</strong></p>
                ';
            }
        }

        public function displayRecentChatsUpdate($user_id, $user_type){
            error_reporting(0);
            $recent_chats = $this->loadRecentChats($user_id, $user_type);

            if(!empty($recent_chats)){
                foreach($recent_chats as $recent_chats_arr){
                    $chat_message_sender = $recent_chats_arr['user_id'];
                    $chat_message_sender_type = $recent_chats_arr['user_type'];

                    $user_info = $this->loadUSerInformation($chat_message_sender, $chat_message_sender_type);
                    $online_status = $this->chatsOnlineStatus($chat_message_sender, $chat_message_sender_type);
                    $last_time_ago = $this->chatsOnlineLastTimeText($chat_message_sender, $chat_message_sender_type);

                    if($chat_message_sender_type == 1){
                        $user_photo = $user_info->avatar;
                        $name = $user_info->first_name;
                        $recent_chat_user_type = 'flaticon-user77';
                    }
                    if($chat_message_sender_type == 2){
                        $user_photo = $user_info->logo;
                        $name = $user_info->name;
                        $recent_chat_user_type = 'flaticon-building8';
                    }

                    if($online_status == 1){
                        $status_color = '#62bf6e';
                        $status_text = 'Online';
                    }
                    if($online_status == 0){
                        $status_color = '#e28282';
                        $status_text = 'Last seen '.$last_time_ago;
                    }

                    echo '
                        <div class="recent-chat">
                            <div class="recent-chat-avatar">
                                <span><img width="50" alt="avatar" src="'.$user_photo.'"/></span>
                            </div>
                            <div class="recent-chat-status"><div style="background: '.$status_color.'"></div></div>
                            <div class="recent-chat-content">
                                <input id="user_id" type="hidden" value="'.$chat_message_sender.'"/>
                                <input id="user_type" type="hidden" value="'.$chat_message_sender_type.'"/>
                                <p><span>'.$name.'</span> <span id="recent_chat_username">@'.$user_info->username.'</span></p>
                                <p><span>'.$status_text.'</span></p>
                            </div>
                            <span><i class="'.$recent_chat_user_type.'"></i></span>
                        </div>
                    ';
                }
            }
            if(empty($recent_chats)){
                echo '
                    <p><strong>Currently there are no Chats for you.</strong></p>
                ';
            }
        }

        public function displayRecentChatsConversation($recipient_id, $recipient_type){
            error_reporting(0);
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $recent_chats_conversation = $this->loadRecentChatsConversation($user_id, $user_type, $recipient_id, $recipient_type);
            $user_info = $this->loadUSerInformation($user_id, $user_type);
            $recipient_info = $this->loadUSerInformation($recipient_id, $recipient_type);
            $num_chat_messages = count((array)$recent_chats_conversation);

            if($user_type == 1 || $recipient_type == 1){
                $display_icon = 'flaticon-user77';
            }

            if($user_type == 2 || $recipient_type == 2){
                $display_icon = 'flaticon-building8';
            }

            echo '<div class="chat-box">
                    <div class="chat-box-title">
                        <div>
                            <div class="chat-box-title-avatar"><img alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div> 
                            <span>@'.$user_info->username.'</span>
                            <div><i class="'.$display_icon.'"></i></div>
                        </div>
                        <div>
                            <div class="chat-box-title-avatar"><img alt="avatar" src="'.$recipient_info->logo.$recipient_info->avatar.'"/></div> 
                            <span>@'.$recipient_info->username.'</span>
                            <div><i class="'.$display_icon.'"></i></div>
                    </div>
                    <span><i class="flaticon-comment32"></i>'.$num_chat_messages.'</span>
                </div>
            <div class="chat-box-body">';
            foreach($recent_chats_conversation as $recent_chats){
                $recent_chats_id = $recent_chats['user_id'];
                $recent_chats_type = $recent_chats['user_type'];
                $chat_message_id = $recent_chats['chat_id'];

                $user_info = $this->loadUSerInformation($recent_chats_id, $recent_chats_type);
                $message_info = $this->loadPrivateChatMessageInfo($chat_message_id);
                $message_time = $this->TimeAgoShort($message_info->chat_time);

                if($user_id == $recent_chats_id && $user_type == $recent_chats_type){
                    echo '
                        <input type="hidden" id="logged_username" value="'.$user_info->username.'"/>
                        <input type="hidden" id="user_photo" value="'.$user_info->logo.$user_info->avatar.'"/>
                        <div class="chat-box-message">
                            <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div>
                            <div class="chat-box-message-body">
                                <span>@'.$user_info->username.'</span>
                                <span>'.$message_info->chat_text.'.</span>
                                <span>'.$message_time.'</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    ';
                }
                else{
                    echo '
                        <div class="chat-box-message-reply">
                            <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div>
                            <div class="chat-box-message-body">
                                <div>@'.$user_info->username.'</div>
                                <span>'.$message_time.'</span>
                                <span>'.$message_info->chat_text.'</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    ';
                }
            }
            echo '
                </div>
                <div class="chat-box-reply">
                    <textarea id="chats_conversation_text" rows="1" placeholder="reply..."></textarea>
                    <button id="reply_btn" type="submit" class="btn">send</button>
                </div>
                </div>
            ';
        }

        private function loggedFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT followed_id, followed_type
                      FROM follows
                      WHERE following_id = $user_id
                      AND following_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loggedFollowers(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT following_id, following_type
                      FROM follows
                      WHERE followed_id = $user_id
                      AND followed_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loadActiveUsers(){
            $logged_following = $this->loggedFollowing();
            $logged_followers = $this->loggedFollowers();
            $active_users = array();
            $logged_relation_arr = array();

            $logged_following_followers = (object)array_merge((array)$logged_following, $logged_followers);

            if(!empty($logged_following_followers)){
                foreach($logged_following_followers as $logged_relation){
                    $recipient_id = $logged_relation->followed_id.$logged_relation->following_id;
                    $recipient_type = $logged_relation->followed_type.$logged_relation->following_type;

                    $last_time = $this->chatsOnlineLastTime($recipient_id, $recipient_type);
                    $last_seen = $last_time->last_time;
                    $current_time = time();
                    $time_elapsed = $current_time - $last_seen;

                    if($time_elapsed <= 5){
                        $active_users[] = array('user_id' => $recipient_id, 'user_type' => $recipient_type);
                    }
                }
                $active_users = array_map("unserialize", array_unique(array_map("serialize", $active_users)));
            }
            if(empty($logged_following_followers)){
                $active_users = '';
            }

            return $active_users;
        }

        private function activeUsersDisplayStatus(){
            $active_users = $this->loadActiveUsers();

            if(!empty($active_users)){
                $active_users_diplay_status = 1;
            }
            if(empty($active_users)){
                $active_users_diplay_status = 0;
            }

            return $active_users_diplay_status;
        }

        public function displayActiveUsers(){
            $active_users = $this->loadActiveUsers();
            $display_status = $this->activeUsersDisplayStatus();

            if($display_status == '1'){
                echo '
                <div class="active-users-box">
                    <p><span>Online Users</span></p>
                    <div class="active-users-body">
                    ';
                        foreach($active_users as $online_users){
                            $user_id = $online_users['user_id'];
                            $user_type = $online_users['user_type'];

                            $user_info = $this->loadUSerInformation($user_id, $user_type);
                            $username = $user_info->username;

                            if($user_type == 1){
                                $user_photo = $user_info->avatar;
                                $name = $user_info->first_name.' '.$user_info->last_name;
                            }
                            if($user_type == 2){
                                $user_photo = $user_info->logo;
                                $name = $user_info->name;
                            }
                            echo '
                                <div>
                                    <div title="@'.$username.' '.$name.'" class="active-users-avatars"><img width="50" alt="avatar" src="'.$user_photo.'"/></div>
                                    <div class="active-users-status"><div style="background: #62bf6e"></div></div>
                                </div>
                            ';
                        }
                    echo'
                    </div>
                </div>
                ';
            }
        }

        private function firstRecentChatsFromLoggedUser($user_id, $user_type, $chat_recipient_id, $chat_recipient_type){
            global $db;
            
            $query = "SELECT chat_id, user_id, user_type, recipient_id, recipient_type, chat_text, chat_time
                      FROM chats_private
                      WHERE user_id = '$chat_recipient_id'
                      AND user_type = '$chat_recipient_type'
                      AND recipient_id = '$user_id'
                      AND recipient_type = '$user_type'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        private function firstRecentChatsToLoggedUser($user_id, $user_type, $chat_recipient_id, $chat_recipient_type){
            global $db;

            $query = "SELECT chat_id, user_id, user_type, recipient_id, recipient_type, chat_text, chat_time
                      FROM chats_private
                      WHERE user_id = '$user_id'
                      AND user_type = '$user_type'
                      AND recipient_id = '$chat_recipient_id'
                      AND recipient_type = '$chat_recipient_type'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        private function loadRecentChatsConversation($user_id, $user_type, $chat_recipient_id, $chat_recipient_type){
            $first_recent_chat_from_logged = $this->firstRecentChatsFromLoggedUser($user_id, $user_type, $chat_recipient_id, $chat_recipient_type);
            $first_recent_chat_to_logged = $this->firstRecentChatsToLoggedUser($user_id, $user_type, $chat_recipient_id, $chat_recipient_type);

            $all_first_recent_chats = '';
            $all_first_recent_chats = json_decode(json_encode($all_first_recent_chats), TRUE);

            $all_first_recent_chats = (object)array_merge((array)$first_recent_chat_from_logged, (array)$first_recent_chat_to_logged);
            $all_first_recent_chats_arr = array();

            foreach($all_first_recent_chats as $value){
                $chat_id = $value->chat_id;
                $user_id = $value->user_id;
                $user_type = $value->user_type;
                $recipient_id = $value->recipient_id;
                $recipient_type = $value->recipient_type;
                $chat_text = $value->chat_text;
                $chat_time = $value->chat_time;

                $all_first_recent_chats_arr[] = array('chat_id' => $chat_id,
                                                      'user_id' => $user_id,
                                                      'user_type' => $user_type,
                                                      'recipient_id' => $recipient_id,
                                                      'recipient_type' => $recipient_type,
                                                      'chat_text' => $chat_text,
                                                      'chat_time' => $chat_time);
            }

            foreach($all_first_recent_chats_arr as $value){
                $sort_by_time[] = $value['chat_time'];
            }
            array_multisort($sort_by_time, SORT_DESC, $all_first_recent_chats_arr);
            return $all_first_recent_chats_arr;
        }

        public function firstRecentChatDisplayStatus(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $recent_chats = $this->chatsToLoggedUser($user_id, $user_type);

            if(!empty($recent_chats)){
                $display_status = '1';
            }
            if(empty($recent_chats)){
                $display_status = '2';
            }

            return $display_status;
        }

        public function displayFirstRecentChatsConversation(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $recent_chats = $this->chatsToLoggedUser($user_id, $user_type);
            $first_recent_chat = $recent_chats[0];

            $chat_id = $first_recent_chat->chat_id;
            $chat_recipient_id = $first_recent_chat->user_id;
            $chat_recipient_type = $first_recent_chat->user_type;

            $first_recent_chats_messages = $this->loadRecentChatsConversation($user_id, $user_type, $chat_recipient_id, $chat_recipient_type);
            
            $user_info = $this->loadUSerInformation($user_id, $user_type);
            $recipient_info = $this->loadUSerInformation($chat_recipient_id, $chat_recipient_type);
            $num_chat_messages = count((array)$first_recent_chats_messages);

            if($user_type == '1' || $chat_recipient_type == '1'){
                $display_icon = 'flaticon-user77';
            }

            if($user_type == '2' || $chat_recipient_type == '2'){
                $display_icon = 'flaticon-building8';
            }

            echo '<div class="chat-box">
                    <div class="chat-box-title">
                        <div>
                            <div class="chat-box-title-avatar"><img alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div> 
                            <span>@'.$user_info->username.'</span>
                            <div><i class="'.$display_icon.'"></i></div>
                        </div>
                        <div>
                            <input type="hidden" id="recipient_id" value="'.$chat_recipient_id.'"/>
                            <input type="hidden" id="recipient_type" value="'.$chat_recipient_type.'"/>
                            <div class="chat-box-title-avatar"><img alt="avatar" src="'.$recipient_info->logo.$recipient_info->avatar.'"/></div> 
                            <span>@'.$recipient_info->username.'</span>
                            <div><i class="'.$display_icon.'"></i></div>
                    </div>
                    <span><i class="flaticon-comment32"></i>'.$num_chat_messages.'</span>
                </div>
            <div class="chat-box-body">
            ';
            foreach($first_recent_chats_messages as $first_recent_chats){
                $first_recent_chats_id = $first_recent_chats['user_id'];
                $first_recent_chats_type = $first_recent_chats['user_type'];
                $chat_message_id = $first_recent_chats['chat_id'];

                $user_info = $this->loadUSerInformation($first_recent_chats_id, $first_recent_chats_type);
                $message_info = $this->loadPrivateChatMessageInfo($chat_message_id);
                $message_time = $this->TimeAgoShort($message_info->chat_time);

                
                if($user_id == $first_recent_chats_id && $user_type == $first_recent_chats_type){
                    echo '
                        <input type="hidden" id="logged_username" value="'.$user_info->username.'"/>
                        <input type="hidden" id="user_photo" value="'.$user_info->logo.$user_info->avatar.'"/>
                        <div class="chat-box-message">
                            <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div>
                            <div class="chat-box-message-body">
                                <span>@'.$user_info->username.'</span>
                                <span>'.$message_info->chat_text.'.</span>
                                <span>'.$message_time.'</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    ';
                }
                else{
                    echo '
                        <div class="chat-box-message-reply">
                            <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div>
                            <div class="chat-box-message-body">
                                <div>@'.$user_info->username.'</div>
                                <span>'.$message_time.'</span>
                                <span>'.$message_info->chat_text.'</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    ';
                }
            }
            echo '
                </div>
                <div class="chat-box-reply">
                    <textarea id="chats_conversation_text" rows="1" placeholder="reply..."></textarea>
                    <button id="reply_btn" type="submit" class="btn">send</button>
                </div>
                </div>
            ';
        }

        private function loadChatMessages($post_id, $post_type){
            global $db;

            $query = "SELECT * 
                      FROM chats_public
                      WHERE post_id = $post_id
                      AND post_type = $post_type";
            $results = $db->query($query);
            return $results;
        }
        private function loadChatContributors($post_id, $post_type){
            global $db;

            $query = "SELECT user_id, user_type 
                      FROM chats_public
                      WHERE post_id = $post_id
                      AND post_type = $post_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){$results[] = $obj;}
            return $results;
        }

        private function numChatMessages($post_id, $post_type){
            global $db;

            $chat_messages = $this->loadChatMessages($post_id, $post_type);
            $num_chat_messages = $db->num_rows($chat_messages);

            return $num_chat_messages;
        }
        private function numChatContributors($post_id, $post_type){
            global $db;

            $chat_messages = $this->loadChatContributors($post_id, $post_type);
            //$chat_contributors = array_unique($chat_messages);
            $chat_messages = array_map("unserialize", array_unique(array_map("serialize", $chat_messages)));
            $num_chat_contributors = count($chat_messages);

            return $num_chat_contributors;
        }

        private function loadQuotePostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_quotes
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }
        private function loadThoughtPostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_thoughts
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }
        private function loadImagePostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_images
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }
        private function loadVideoPostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_videos
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }
        private function loadLinkPostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_links
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }
        private function loadCustomPostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_normal
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }
        private function loadTopicPostInfo($post_id){
            global $db;

            $query = "SELECT *
                      FROM post_topic
                      WHERE post_id = $post_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }

        private function numPostChats($post_id, $post_type){
            global $db;

            $query = "SELECT chat_id
                      FROM chats_public
                      WHERE post_id = $post_id
                      AND post_type = $post_type";
            $result = $db->query($query);
            $num_chat_messages = $db->num_rows($result);

            return $num_chat_messages;
        }

        private function loadPostsQuoteWithFollowing($followed_id, $followed_type){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_quotes
                      WHERE user_id = '$followed_id'
                      AND user_type = '$followed_type'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function loadPostsThoughtWithFollowing($followed_id, $followed_type){ 
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_thoughts
                      WHERE user_id = $followed_id
                      AND user_type = $followed_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function loadPostsImageWithFollowing($followed_id, $followed_type){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_images
                      WHERE user_id = $followed_id
                      AND user_type = $followed_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function loadPostsVideoWithFollowing($followed_id, $followed_type){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_videos
                      WHERE user_id = $followed_id
                      AND user_type = $followed_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function loadPostsLinkWithFollowing($followed_id, $followed_type){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_links
                      WHERE user_id = $followed_id
                      AND user_type = $followed_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function loadPostsCustomWithFollowing($followed_id, $followed_type){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_normal
                      WHERE user_id = $followed_id
                      AND user_type = $followed_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function loadPostsTopicWithFollowing($followed_id, $followed_type){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_topic
                      WHERE user_id = $followed_id
                      AND user_type = $followed_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        private function allQuotePosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_quotes
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function allThoughtPosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_thoughts
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function allImagePosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_images
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function allVideoPosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_videos
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function allLinkPosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_links
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function allCustomPosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_normal
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
        private function allTopicPosts(){
            global $db;

            $query = "SELECT post_id, post_type, post_time
                      FROM post_topic
                      WHERE privacy_status = '1'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        private function postsQuotePopularChats(){
            $all_quote_posts = $this->allQuotePosts();
            $posts_quotes_popular = array();

            foreach($all_quote_posts as $quotes){
                $post_id = $quotes->post_id;
                $post_type = $quotes->post_type;
                $post_time = $quotes->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);

                $posts_quotes_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_quotes_popular;
        }
        private function postsThoughtPopularChats(){
            $all_thought_posts = $this->allThoughtPosts();
            $posts_thoughts_popular = array();

            foreach($all_thought_posts as $thoughts){
                $post_id = $thoughts->post_id;
                $post_type = $thoughts->post_type;
                $post_time = $thoughts->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);
                
                $posts_thoughts_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_thoughts_popular;
        }
        private function postsImagePopularChats(){
            $all_image_posts = $this->allImagePosts();
            $posts_images_popular = array();

            foreach($all_image_posts as $images){
                $post_id = $images->post_id;
                $post_type = $images->post_type;
                $post_time = $images->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);
                
                $posts_images_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_images_popular;
        }
        private function postsVideoPopularChats(){
            $all_video_posts = $this->allVideoPosts();
            $posts_videos_popular = array();

            foreach($all_video_posts as $videos){
                $post_id = $videos->post_id;
                $post_type = $videos->post_type;
                $post_time = $images->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);
                
                $posts_videos_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_videos_popular;
        }
        private function postsLinkPopularChats(){
            $all_link_posts = $this->allLinkPosts();
            $posts_link_popular = array();

            foreach($all_link_posts as $links){
                $post_id = $links->post_id;
                $post_type = $links->post_type;
                $post_time = $links->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);

                $posts_link_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_link_popular;
        }
        private function postsCustomPopularChats(){
            $all_custom_posts = $this->allCustomPosts();
            $posts_custom_popular = array();

            foreach($all_custom_posts as $custom){
                $post_id = $custom->post_id;
                $post_type = $custom->post_type;
                $post_time = $custom->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);

                $posts_custom_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_custom_popular;
        }
        private function postsTopicPopularChats(){
            $all_topic_posts = $this->allTopicPosts();
            $posts_topic_popular = array();

            foreach($all_topic_posts as $topics){
                $post_id = $topics->post_id;
                $post_type = $topics->post_type;
                $post_time = $topics->post_time;

                $num_chats = $this->numPostChats($post_id, $post_type);
                $num_contributors = $this->numChatContributors($post_id, $post_type);
                
                $posts_topic_popular[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type);
            }
            return $posts_topic_popular;
        }

        private function postsQuoteWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_quotes_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;
                
                $following_posts = $this->loadPostsQuoteWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_quotes_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);
                    }
                }
            }
            return $posts_quotes_with_following; 
        }
        private function postsThoughtWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_thought_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;

                $following_posts = $this->loadPostsThoughtWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_thought_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);
                    }
                }
            }
            return $posts_thought_with_following;
        }
        private function postsImageWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_image_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;

                $following_posts = $this->loadPostsImageWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_image_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);                        
                    }
                }
            }
            return $posts_image_with_following;
        }
        private function postsVideoWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_video_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;

                $following_posts = $this->loadPostsVideoWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_video_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);                        
                    }
                }
            }
            return $posts_video_with_following;
        }
        private function postsLinkWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_link_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;

                $following_posts = $this->loadPostsLinkWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_link_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);                        
                    }
                }
            }
            return $posts_link_with_following;
        }
        private function postsCustomWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_custom_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;

                $following_posts = $this->loadPostsCustomWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_custom_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);                        
                    }
                }
            }
            return $posts_custom_with_following;
        }
        private function postsTopicWithFollowing(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $user_following = $this->loggedFollowing();
            $posts_topic_with_following = array();

            foreach($user_following as $following){
                $followed_id = $following->followed_id;
                $followed_type = $following->followed_type;

                $following_posts = $this->loadPostsTopicWithFollowing($followed_id, $followed_type);

                if(!empty($following_posts)){
                    foreach($following_posts as $following_posts_copy){
                        $post_id = $following_posts_copy->post_id;
                        $post_type = $following_posts_copy->post_type;
                        $post_time = $following_posts_copy->post_time;

                        $num_chats = $this->numPostChats($post_id, $post_type);
                        $num_contributors = $this->numChatContributors($post_id, $post_type);

                        $posts_topic_with_following[] = array('num_chats' => $num_chats, 'num_contributors' => $num_contributors, 'post_id' => $post_id, 'post_type' => $post_type, 'post_time' => $post_time);                        
                    }
                }
            }
            return $posts_topic_with_following;
        }

        private function sortActiveChatsPostsWithFollowingByChats($all_post_with_following){
            $sort_by_chats = array();
            foreach($all_post_with_following as $key => $value){
                $sort_by_chats['num_chats'][$key] = $value['num_chats'];
                $sort_by_chats['num_contributors'][$key] = $value['num_contributors'];
            }
            array_multisort($sort_by_chats['num_chats'], SORT_DESC, $sort_by_chats['num_contributors'], SORT_DESC, $all_post_with_following);
            
            return $all_post_with_following;
        }

        private function sortPopularChatsByChats($all_popular_chats){
            $sort_by_chats = array();
            foreach($all_popular_chats as $key => $value){
                $sort_by_chats['num_chats'][$key] = $value['num_chats'];
                $sort_by_chats['num_contributors'][$key] = $value['num_contributors'];
            }
            array_multisort($sort_by_chats['num_chats'], SORT_DESC, $sort_by_chats['num_contributors'], SORT_DESC, $all_popular_chats);

            return $all_popular_chats;
        }

        private function activeChatsPostsWithFollowing(){
            $posts_quotes_with_following = $this->postsQuoteWithFollowing();
            $posts_thought_with_following = $this->postsThoughtWithFollowing();
            $posts_image_with_following = $this->postsImageWithFollowing();
            $posts_video_with_following = $this->postsVideoWithFollowing();
            $posts_link_with_following = $this->postsLinkWithFollowing();
            $posts_custom_with_following = $this->postsCustomWithFollowing();
            $posts_topic_with_following = $this->postsTopicWithFollowing();

            $sort_all_post_with_following = array();
            
            $all_post_with_following = json_decode(json_encode($all_post_with_following), TRUE);

            $all_post_with_following = array_merge($posts_quotes_with_following,
                                                   $posts_thought_with_following,
                                                   $posts_image_with_following,
                                                   $posts_video_with_following,
                                                   $posts_link_with_following,
                                                   $posts_custom_with_following,
                                                   $posts_topic_with_following);

            $all_post_with_following = $this->sortActiveChatsPostsWithFollowingByChats($all_post_with_following);
            $all_post_with_following = array_slice($all_post_with_following, 0, 6);
            return $all_post_with_following;
        }

        private function popularChatsPosts(){
            $all_quote_posts = $this->postsQuotePopularChats();
            $all_thought_posts = $this->postsThoughtPopularChats();
            $all_image_posts = $this->postsImagePopularChats();
            $all_video_posts = $this->postsVideoPopularChats();
            $all_link_posts = $this->postsLinkPopularChats();
            $all_custom_posts = $this->postsCustomPopularChats();
            $all_topic_posts = $this->postsTopicPopularChats();

            $all_popular_chats = array_merge($all_quote_posts,
                                             $all_thought_posts,
                                             $all_image_posts,
                                             $all_video_posts,
                                             $all_link_posts,
                                             $all_custom_posts,
                                             $all_topic_posts);
            $all_popular_chats = $this->sortPopularChatsByChats($all_popular_chats);
            $all_popular_chats = array_slice($all_popular_chats, 0, 6);
            return $all_popular_chats;
        }

        private function displayQuoteActiveChat($post_id, $post_type){
            $post_info = $this->loadQuotePostInfo($post_id);
            $quote_content = $post_info->quote_content;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($quote_content) > 30){
                $quote_content = substr($quote_content,0, 30).'...';
            }
            echo '
                <!------- quote active chat ------->
                <div class="quote-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="1"/>
                    <a><i class="flaticon-quote2"></i></a>
                    <a>"'.$quote_content.'"</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayThoughtActiveChat($post_id, $post_type){
            $post_info = $this->loadThoughtPostInfo($post_id);
            $thought_content = $post_info->thought_content;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($quote_content) > 50){
                $quote_content = substr($thought_content,0, 30).'...';
            }
            echo '
                <!------- thought active chat ------->
                <div class="thought-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="2"/>
                    <a><i class="flaticon-light45"></i></a>
                    <a>'.$thought_content.'</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayImageActiveChat($post_id, $post_type){
            $post_info = $this->loadImagePostInfo($post_id);
            $image_caption = $post_info->image_caption;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($image_caption) > 50){
                $image_caption = substr($image_caption,0, 30).'...';
            }
            echo '
                <!------- image active chat ------->
                <div class="image-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="3"/>
                    <a><i class="flaticon-picture13"></i></a>
                    <a>'.$image_caption.'</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayVideoActiveChat($post_id, $post_type){
            $post_info = $this->loadVideoPostInfo($post_id);
            $video_caption = $post_info->video_caption;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($video_caption) > 30){
                $video_caption = substr($video_caption,0, 30).'...';
            }
            echo '
                <!------- video active chat ------->
                <div class="video-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="4"/>
                    <a><i class="flaticon-video91"></i></a>
                    <a>'.$video_caption.'</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayLinkActiveChat($post_id, $post_type){
            $post_info = $this->loadLinkPostInfo($post_id);
            $link_url = $post_info->link_url;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($link_url) > 30){
                $link_url = substr($link_url,0, 30).'...';
            }
            echo '
                <!------- link active chat ------->
                <div class="link-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="5"/>
                    <a><i class="flaticon-link15"></i></a>
                    <a href="'.$link_url.'">'.$link_url.'</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayCustomActiveChat($post_id, $post_type){
            $post_info = $this->loadCustomPostInfo($post_id);
            $custom_content = $post_info->post_description;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($custom_content) > 30){
                $custom_content = substr($custom_content,0, 30).'...';
            }
            echo '
                <!------- custom active chat ------->
                <div class="custom-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="6"/>
                    <a><i class="flaticon-font2"></i></a>
                    <a>'.$custom_content.'</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
            ';
        }
        private function displayTopicActiveChat($post_id, $post_type){
            $post_info = $this->loadTopicPostInfo($post_id);
            $topic_content = $post_info->topic_content;
            $num_chats = $this->numChatMessages($post_id, $post_type);
            $num_contributors = $this->numChatContributors($post_id, $post_type);
            if(strlen($topic_content) > 30){
                $topic_content = substr($topic_content,0, 30).'...';
            }
            echo '
                <!------- topic active chat ------->
                <div class="topic-active-chat">
                    <input id="active_chat_post_id" name="post_id" type="hidden" value="'.$post_id.'"/>
                    <input id="active_chat_post_type" name="post_type" type="hidden" value="7"/>
                    <a><i class="flaticon-comments16"></i></a>
                    <a>'.$topic_content.'</a>
                    <a href="chat.php?post_id=1&post_type=7"><i class="flaticon-speech59"></i>'.$num_chats.'</a>
                    <a><i class="flaticon-group41"></i>'.$num_contributors.'</a>
                </div>
            ';
        }

        public function displayActiveChats(){
            $popular_chats = $this->activeChatsPostsWithFollowing();
            
            if(!empty($popular_chats)){
                foreach($popular_chats as $popular_chats_arr){
                    $post_id = $popular_chats_arr['post_id'];
                    $post_type = $popular_chats_arr['post_type'];

                    if($post_type == '1'){
                        $this->displayQuoteActiveChat($post_id,$post_type);
                    }

                    if($post_type == '2'){
                        $this->displayThoughtActiveChat($post_id, $post_type);
                    }

                    if($post_type == '3'){
                        $this->displayImageActiveChat($post_id, $post_type);
                    }

                    if($post_type == '4'){
                        $this->displayVideoActiveChat($post_id, $post_type);
                    }

                    if($post_type == '5'){
                        $this->displayLinkActiveChat($post_id, $post_type);
                    }

                    if($post_type == '6'){
                        $this->displayCustomActiveChat($post_id, $post_type);
                    }

                    if($post_type == "7"){
                        $this->displayTopicActiveChat($post_id, $post_type);
                    }
                }
            }
            if(empty($popular_chats)){
                echo '
                <div>Currently there are Active chats available for you. </div>
                ';
            }
        }

        public function displayPopularChats(){
            $all_popular_chats = $this->popularChatsPosts();

            foreach($all_popular_chats as $popular_chats_arr){
                $post_id = $popular_chats_arr['post_id'];
                $post_type = $popular_chats_arr['post_type'];

                if($post_type == '1'){
                    $this->displayQuoteActiveChat($post_id,$post_type);
                }

                if($post_type == '2'){
                    $this->displayThoughtActiveChat($post_id, $post_type);
                }

                if($post_type == '3'){
                    $this->displayImageActiveChat($post_id, $post_type);
                }

                if($post_type == '4'){
                    $this->displayVideoActiveChat($post_id, $post_type);
                }

                if($post_type == '5'){
                    $this->displayLinkActiveChat($post_id, $post_type);
                }

                if($post_type == '6'){
                    $this->displayCustomActiveChat($post_id, $post_type);
                }

                if($post_type == "7"){
                    $this->displayTopicActiveChat($post_id, $post_type);
                }
            }
        }

        private function loadActiveChats($post_id, $post_type){
            global $db;

            $query = "SELECT *
                      FROM chats_public
                      WHERE post_id = $post_id
                      AND post_type = $post_type";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }
            
        public function displayActiveChatConversationClicked($post_id, $post_type){
            error_reporting(0);
            global $user_identity;

            $moderator_id = $user_identity->getLoggedUserId();
            $moderator_type = $user_identity->getLoggedUserType();

            $active_chats = $this->loadActiveChats($post_id, $post_type);
            $num_chat_messages = count((array)$active_chats);
            
            if(!empty($active_chats)){
                echo '<div class="chat-box"><div class="chat-box-title">';
                foreach($active_chats as $chats_arr){
                    $user_id = $chats_arr->user_id;
                    $user_type = $chats_arr->user_type;
                    $user_info = $this->loadUSerInformation($user_id, $user_type);
                    echo '
                        <div>
                            <div class="chat-box-title-avatar"><img alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div> 
                        </div>
                    ';
                }
                echo '<span><i class="flaticon-comment32"></i>'.$num_chat_messages.'</span></div><div class="chat-box-body">';
                foreach($active_chats as $chats){
                    $post_id = $chats->post_id;
                    $post_type = $chats->post_type;
                    $user_id = $chats->user_id;
                    $user_type = $chats->user_type;
                    $chat_text = $chats->chat_text;
                    $chat_time = $this->TimeAgoShort($chats->chat_time);

                    $user_info = $this->loadUSerInformation($user_id, $user_type);

                    if($user_id == $moderator_id && $user_type == $moderator_type){
                        echo '
                            <input type="hidden" id="post_id" value="'.$post_id.'"/>
                            <input type="hidden" id="post_type" value="'.$post_type.'"/>
                            <input type="hidden" id="logged_username" value="'.$user_info->username.'"/>
                            <input type="hidden" id="user_photo" value="'.$user_info->logo.$user_info->avatar.'"/>
                            <div class="chat-box-message">
                                <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div>
                                <div class="chat-box-message-body">
                                    <span>@'.$user_info->username.'</span>
                                    <span>'.$chat_text.'.</span>
                                    <span>'.$chat_time.'</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        ';
                    }
                    else{
                        echo '
                            <div class="chat-box-message-reply">
                                <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->logo.$user_info->avatar.'"/></div>
                                <div class="chat-box-message-body">
                                    <div>@'.$user_info->username.'</div>
                                    <span>'.$chat_time.'</span>
                                    <span>'.$chat_text.'</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        ';
                    }
                }
                echo '
                    </div>
                    <div class="chat-box-reply">
                        <textarea id="chats_conversation_text" rows="1" placeholder="reply..."></textarea>
                        <button id="reply_btn_public" type="submit" class="btn">send</button>
                    </div>
                    </div>
                ';              
            }
            if(empty($active_chats)){
                echo 'current there are no chats for this post.';
            }
        }

        private function chatMessagesToRecipient($user_id, $user_type, $recipient_id, $recipient_type){
           global $db;

           $query = "SELECT user_id, user_type, chat_time
                     FROM chats_private 
                     WHERE  user_id = $user_id 
                     AND user_type = $user_type
                     AND recipient_id = $recipient_id
                     AND recipient_type = $recipient_type";
           $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

           return $results;
        }

        private function chatMessagesFromRecipient($user_id, $user_type, $recipient_id, $recipient_type){
           global $db;

           $query = "SELECT user_id, user_type, message_time
                     FROM chats_private
                     WHERE user_id = $recipient_id
                     AND user_type = $recipient_type
                     AND recipient_id = $user_id
                     AND recipient_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        private function validateNumChatMessages($user_id, $user_type, $recipient_id, $recipient_type){
           $messages_to_recipient = $this->chatMessagesToRecipient($user_id, $user_type, $recipient_id, $recipient_type);
           $messages_from_recipient = $this->chatMessagesFromRecipient($user_id, $user_type, $recipient_id, $recipient_type);

           $all_num_messages = '';
           $all_num_messages = json_decode(json_encode($all_num_messages), TRUE);

           $all_num_messages = array_merge($messages_from_recipient, $messages_to_recipient); 

           foreach($all_num_messages as $value){
               $sort_array[] = $value->message_time;
           }
           array_multisort($sort_array, SORT_DESC, $all_num_messages);

           return $all_num_messages;
        }

        public function get_validateNumChatMessages($user_id, $user_type, $recipient_id, $recipient_type){
            $val_num_chat_messages = $this->validateNumChatMessages($user_id, $user_type, $recipient_id, $recipient_type);
            return $val_num_chat_messages;
        }

    }
?>
