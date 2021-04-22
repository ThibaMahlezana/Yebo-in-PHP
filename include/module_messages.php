<?php
    
   class messages{
       
       // VARIABLES
       private $messages_feature_privacy_status_logged_user;
       private $messages_followers_privacy_status_logged_user;
       private $messages_following_privacy_status_logged_user;
       private $messages_everyone_privacy_status_logged_user;  

       private $messages_feature_privacy_status_recipient;
       private $messages_followers_privacy_status_recipient;
       private $messages_following_privacy_status_recipient;
       private $messages_everyone_privacy_status_recipient;  

       private $logged_user_messages_allowed;
       private $logged_user_followers_privacy_status;
       private $logged_user_following_privacy_status;
       private $logged_user_everyone_privacy_status;

       private $recipient_messages_allowed;
       private $recipient_followers_privacy_status;
       private $recipient_following_privacy_status;
       private $recipient_everyone_privacy_status;

       // METHODS
       private function isUserExist($message_to){
           global $db;

           $query = "SELECT username
                     FROM login
                     WHERE BINARY username = '$message_to'";
           $result = $db->query($query);

           $is_user_exist = $result->num_rows;

           if($is_user_exist == 1){
               $is_user_exist = 1;
           }
           if($is_user_exist == 0){
               $is_user_exist = 0;
           }

           return $is_user_exist;
       }

       private function loadRecipientInfo($message_to){
           global $db;

           $query = "SELECT user_id, user_type
                     FROM login
                     WHERE BINARY username = '$message_to'";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
       }

       private function checkMessageFeaturePrivacy($user_id, $user_type){
           global $db;

           $query = "SELECT allow_messages
                     FROM privacy_messages
                     WHERE user_id = '$user_id'
                     AND user_type = '$user_type'";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
       }

       private function checkMessagesFollowersPrivacy($user_id, $user_type){
           global $db;

           $query = "SELECT allow_messages_followers
                     FROM privacy_messages
                     WHERE user_id = '$user_id'
                     AND user_type = '$user_type'";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
       }

       private function checkMessagesFollowingPrivacy($user_id, $user_type){
           global $db;

           $query = "SELECT allow_messages_following
                     FROM privacy_messages
                     WHERE user_id = '$user_id'
                     AND user_type = '$user_type'";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
       }

       private function checkMessagesEveryonePrivacy($user_id, $user_type){
           global $db;

           $query = "SELECT allow_messages_everyone
                     FROM privacy_messages
                     WHERE user_id = '$user_id'
                     AND user_type = '$user_type'";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
       }

       private function checkPrivacyForLoggedUser($user_id, $user_type){
           error_reporting(0);

           $messages_feature_privacy = $this->checkMessageFeaturePrivacy($user_id, $user_type);
           $messages_followers_privacy = $this->checkMessagesFollowersPrivacy($user_id, $user_type);
           $messages_following_privacy = $this->checkMessagesFollowingPrivacy($user_id, $user_type);
           $messages_everyone_privacy = $this->checkMessagesEveryonePrivacy($user_id, $user_type);

           if($messages_feature_privacy->allow_messages == 1){
               $this->messages_feature_privacy_status_logged_user = 1;
           }
           elseif($messages_feature_privacy->allow_messages == 0){
               $this->messages_feature_privacy_status_logged_user = 0;
           }

           if($messages_followers_privacy->allow_messages_followers == 1){
              $this->messages_followers_privacy_status_logged_user = 1; 
           }

           elseif($messages_followers_privacy->allow_messages_followers == 0){
              $this->messages_followers_privacy_status_logged_user = 0; 
           }

           if($messages_following_privacy->allow_messages_following == 1){
               $this->messages_following_privacy_status_logged_user = 1;
           }

           elseif($messages_following_privacy->allow_messages_following == 0){
               $this->messages_following_privacy_status_logged_user = 0;
           }

           if($messages_everyone_privacy->allow_messages_everyone == 1){
               $this->messages_everyone_privacy_status_logged_user = 1;
           }

           elseif($messages_everyone_privacy->allow_messages_everyone == 0){
               $this->messages_everyone_privacy_status_logged_user = 0;
           }

       }

       private function checkPrivacyForRecipient($recipient_id, $recipient_type){

           $messages_feature_privacy = $this->checkMessageFeaturePrivacy($recipient_id, $recipient_type);
           $messages_followers_privacy = $this->checkMessagesFollowersPrivacy($recipient_id, $recipient_type);
           $messages_following_privacy = $this->checkMessagesFollowingPrivacy($recipient_id, $recipient_type);
           $messages_everyone_privacy = $this->checkMessagesEveryonePrivacy($recipient_id, $recipient_type);

           if($messages_feature_privacy->allow_messages == 1){
               $this->messages_feature_privacy_status_recipient = 1;
           }

           if($messages_feature_privacy->allow_messages == 0){
               $this->messages_feature_privacy_status_recipient = 0;
           }

           if($messages_followers_privacy->allow_messages_followers == 1){
              $this->messages_followers_privacy_status_recipient = 1; 
           }

           if($messages_followers_privacy->allow_messages_followers == 0){
              $this->messages_followers_privacy_status_recipient = 0; 
           }

           if($messages_following_privacy->allow_messages_following == 1){
               $this->messages_following_privacy_status_recipient = 1;
           }

           if($messages_following_privacy->allow_messages_following == 0){
               $this->messages_following_privacy_status_recipient = 0;
           }

           if($messages_everyone_privacy->allow_messages_everyone == 1){
               $this->messages_everyone_privacy_status_recipient = 1;
           }

           if($messages_everyone_privacy->allow_messages_everyone == 0){
               $this->messages_everyone_privacy_status_recipient = 0;
           }

       }

       private function checkRecipientRelationship($recipient_id, $recipient_type, $user_id, $user_type){
           global $db;

           $recipient_relation = '';

           $query_follower = "SELECT followed_id, followed_type, following_id, following_type 
                              FROM follows
                              WHERE followed_id = '$user_id'
                              AND followed_type = '$user_type'
                              AND following_id = '$recipient_id'
                              AND following_type = '$recipient_type'";
           $result_follower = $db->query($query_follower);

           $query_following = "SELECT followed_id, followed_type, following_id, following_type
                               FROM follows
                               WHERE following_id = '$user_id'
                               AND following_type = '$user_type'
                               AND followed_id = '$recipient_id'
                               AND followed_type = '$recipient_type'";
            $result_following = $db->query($query_following);

            $result_follower_info = $result_follower->num_rows; 
            $result_following_info = $result_following->num_rows;

            if($result_follower_info == 1){
                $recipient_relation = 'follower';
            }
            
            if($result_following_info == 1){
                $recipient_relation = 'following';
            }

            if(($result_follower_info == 1) && ($result_following_info == 1)){
                $recipient_relation = 'following_each_other';
            }

            if(($result_follower_info == 0) && ($result_following_info == 0)){
                $recipient_relation = 'everyone';
            }

            return $recipient_relation;
       }

       private function messagesToRecipient($user_id, $user_type, $recipient_id, $recipient_type){
           global $db;

           $query = "SELECT user_id, user_type, message_time
                     FROM messages 
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

       private function messagesFromRecipient($user_id, $user_type, $recipient_id, $recipient_type){
           global $db;

           $query = "SELECT user_id, user_type, message_time
                     FROM messages
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

       private function validateNumberOfMessages($user_id, $user_type, $recipient_id, $recipient_type){

           $messages_to_recipient = $this->messagesToRecipient($user_id, $user_type, $recipient_id, $recipient_type);
           $messages_from_recipient = $this->messagesFromRecipient($user_id, $user_type, $recipient_id, $recipient_type);

           $all_num_messages = '';
           $all_num_messages = json_decode(json_encode($all_num_messages), TRUE);

           $all_num_messages = array_merge($messages_from_recipient, $messages_to_recipient); 

           foreach($all_num_messages as $value){
               $sort_array[] = $value->message_time;
           }
           array_multisort($sort_array, SORT_DESC, $all_num_messages);

           return $all_num_messages;
       }

       private function saveMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text){
           global $db;

           $message_status = 0;
           $message_time = time();

           $query = "INSERT INTO messages(user_id,
                                          user_type,
                                          recipient_id,
                                          recipient_type,
                                          message_text,
                                          message_time,
                                          message_status)
                                 VALUES('$user_id',
                                         '$user_type',
                                         '$recipient_id',
                                         '$recipient_type',
                                         '$message_text',
                                         '$message_time',
                                         '$message_status')";
            $db->query($query);
       }

       private function messagesToLoggedUser(){
           global $user_identity;
           global $db;
           
           $user_id = $user_identity->getLoggedUserId();
           $user_type = $user_identity->getLoggedUserType();

           $query = "SELECT * 
                     FROM messages
                     WHERE recipient_id = $user_id
                     AND recipient_type = $user_type";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }
           return $results;
       }

       private function numberOfAllMessages(){
           $messages_to_logged_user = $this->messagesToLoggedUser();
           $messages_to_logged_user = count($messages_to_logged_user);

           return $messages_to_logged_user;
       }

       private function numberOfNewMessages(){
           global $db;
           global $user_identity;

           $user_id = $user_identity->getLoggedUserId();
           $user_type = $user_identity->getLoggedUserType();

           $query = "SELECT message_id
                     FROM messages
                     WHERE recipient_id = $user_id
                     AND recipient_type = $user_type
                     AND message_status = 0";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
       }

       private function recentMessages(){
           $recent_messages = $this->messagesToLoggedUser();

           foreach($recent_messages as $value){
               $sort_recent_messages[] = $value->message_time;
           }
           array_multisort($sort_recent_messages, SORT_DESC, $recent_messages);
           $recent_messages_arr = array_slice($recent_messages, 0, 6);
           return $recent_messages_arr;
       }

       private function loadMessageInfo($message_id){
           global $db;

           $query = "SELECT * 
                     FROM messages
                     WHERE message_id = $message_id";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
       }

       private function loadUserInfo($user_id, $user_type){
           global $db;

           if($user_type == 1){
               $query = "SELECT username, avatar
                         FROM members
                         WHERE user_id = $user_id";
               $result = $db->query($query);
           }
           if($user_type == 2){
               $query = "SELECT username, logo
                         FROM companies
                         WHERE company_id = $user_id";
               $result = $db->query($query);
           }

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results[0];
       }

       private function loadUserInfoByUsername($username){
           global $db;

           $query = "SELECT user_id, user_type
                     FROM login
                     WHERE BINARY username = '$username'";
           $result = $db->query($query);
           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }
           return $results[0];
       }

       public function getNumberOfAllMessages(){
           $messages_to_logged_user = $this->numberOfAllMessages();
           return $messages_to_logged_user;
       }

       public function getNumberOfNewMessages(){
           $new_messages_to_loggeg_user = $this->numberOfNewMessages();
           $new_messages_to_loggeg_user = count($new_messages_to_loggeg_user);
           return $new_messages_to_loggeg_user;
       }

       private function messagesNotificationsTimeAgo($time_ago){
          
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

       private function getMessagesNotifications($recipient_id, $recipient_type){
           global $db;

           $query = "SELECT message_id, user_id, user_type
                     FROM messages
                     WHERE recipient_id = $recipient_id
                     AND recipient_type = $recipient_type
                     AND message_status = 0
                     ORDER BY message_time DESC
                     LIMIT 5";
           $result = $db->query($query);

           while($obj = $result->fetch_object()){
               $results[] = $obj;
           }

           return $results;
       }

       public function displayMessageNotifications(){
           global $user_identity;

           $recipient_id = $user_identity->getLoggedUserId();
           $recipient_type = $user_identity->getLoggedUserType();

           $messages_notifications = $this->getMessagesNotifications($recipient_id, $recipient_type);

           if(!empty($messages_notifications)){
               foreach($messages_notifications as $value){
                   
                   $message_sender = $value->user_id;
                   $message_sender_type = $value->user_type;
                   $message_id = $value->message_id;

                   $user_info = $this->loadUserInfo($message_sender, $message_sender_type);
                   $message_info = $this->loadMessageInfo($message_id);
                   $profile_photo = $user_info->avatar.$user_info->logo;

                   $message_time_stamp = $message_info->message_time;;
                   $message_time = $this->messagesNotificationsTimeAgo($message_time_stamp);

                   echo '
                        <li><a><div class="messages-dropdown-avatar"><img alt="avatar" src="'.$profile_photo.'"/></div> 
                               <div class="messages-dropdown-username111">@'.$user_info->username.'<span class="pull-right">'.$message_time.'</span></div>
                               <div class="messages-dropdown-content">'.$message_info->message_text.'</div>
                               <div class="clear"></div>
                            </a>
                        </li>
                   ';
               }
           }

           if(empty($messages_notifications)){
               echo '
                    <li>Sorry, there are no messages to display.</li>
               ';
           }
       }

       public  function displayRecentMessages(){
           $recent_messages = $this->recentMessages();

           if(!empty($recent_messages)){
               foreach($recent_messages as $recent_messages_arr){
                   $message_id = $recent_messages_arr->message_id;
                   $message_sender = $recent_messages_arr->user_id;
                   $message_sender_type = $recent_messages_arr->user_type;

                   $message_info = $this->loadMessageInfo($message_id);
                   $user_info = $this->loadUserInfo($message_sender, $message_sender_type);
                   $message_time = $this->messagesNotificationsTimeAgo($message_info->message_time);

                   echo '
                        <div class="recent_message_box">
                            <div class="recent_message_box_photo">
                                <img alt="profile_photo" src="'.$user_info->avatar.$user_info->logo.'"/>
                            </div>
                            <div class="recent_message_box_body">
                                <span id="display_username">@'.$user_info->username.'</span>
                                <span>'.$message_info->message_text.'</span>
                            </div>
                            <span>'.$message_time.'</span>
                            <div class="clear"></div>
                        </div>
                   ';
               }
           }

           if(empty($recent_messages)){
               echo '
                   <p><strong>Currently there are no messages for you.</strong></p>
               ';
           }

       }

       public function sendMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text){
           $send_message_status = $this->saveMessage($user_id, $user_type, $recipient_id, $recipient_type, $message_text);
       }

       public function getIsUserExist($message_to){
           $is_user_exist = $this->isUserExist($message_to);
           return $is_user_exist;
       }

       private function searchIndividuals($searchword){
            global $db;

            $query = "SELECT * 
                      FROM members
                      WHERE first_name LIKE '%$searchword%'
                      OR last_name LIKE '%$searchword%'
                      ORDER BY user_id
                      LIMIT 5";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
       }

       private function searchCompanies($searchword){
           global $db;

           $query = "SELECT * 
                     FROM companies
                     WHERE name LIKE '%$searchword%'
                     ORDER BY company_id
                     LIMIT 5";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
       }

       private function latestMessageConversation(){
           $all_num_messages = $this->recentMessages();
           $latest_message = $all_num_messages[0];
           return $latest_message;
       }

       private function loadMessageConversation(){
           $latest_message = $this->latestMessageConversation();
           
           $latest_message_sender = $latest_message->user_id;
           $latest_message_sender_type = $latest_message->user_type;
           
           $messages_from_logged_user = $this->messagesToLoggedConversation($latest_message_sender, $latest_message_sender_type);
           $messages_to_logged_user = $this->messagesFromLoggedConversation($latest_message_sender, $latest_message_sender_type);

           if(!empty($messages_from_logged_user) && !empty($messages_to_logged_user)){
               $messages_conversation = '';
               $messages_conversation = json_decode(json_encode($messages_conversation), TRUE);

               $messages_conversation = array_merge($messages_from_logged_user, $messages_to_logged_user);

               foreach($messages_conversation as $value){
                   $sort_array[] = $value->message_time;
               }
               array_multisort($sort_array, SORT_ASC, $messages_conversation);
           }

           if(empty($messages_from_logged_user) &&  !empty($messages_to_logged_user)){
               $messages_conversation = $messages_to_logged_user;
           }

           if(empty($messages_to_logged_user) && !empty($messages_from_logged_user)){
               $messages_conversation = $messages_from_logged_user;
           }

           return $messages_conversation;
       }

       private function loadMessageConversationClicked($recipient_username){
           $recipient_username_info = $this->loadUserInfoByUsername($recipient_username);
           $recipient_id = $recipient_username_info->user_id;
           $recipient_type = $recipient_username_info->user_type;
           
           $messages_from_logged_user = $this->messagesToLoggedConversation($recipient_id, $recipient_type);
           $messages_to_logged_user = $this->messagesFromLoggedConversation($recipient_id, $recipient_type);

           if(!empty($messages_from_logged_user) && !empty($messages_to_logged_user)){
               $messages_conversation = json_decode(json_encode($messages_conversation), TRUE);

               $messages_conversation = array_merge($messages_from_logged_user, $messages_to_logged_user);

               foreach($messages_conversation as $value){
                   $sort_array[] = $value->message_time;
               }
               array_multisort($sort_array, SORT_ASC, $messages_conversation);
           }

           if(empty($messages_from_logged_user) && !empty($messages_to_logged_user)){
               $messages_conversation = $messages_to_logged_user;
           }

           if(empty($messages_to_logged_user) && !empty($messages_from_logged_user)){
               $messages_conversation = $messages_from_logged_user;
           }

           return $messages_conversation;
       }

       private function messagesToLoggedConversation($latest_message_sender, $latest_message_sender_type){
           global $db;
           global $user_identity;
           
           if(!empty($latest_message_sender && $latest_message_sender_type)){
               $user_id = $user_identity->getLoggedUserId();
               $user_type = $user_identity->getLoggedUserType();

               $query = "SELECT user_id, user_type, message_time, message_id 
                         FROM messages
                         WHERE user_id = $latest_message_sender
                         AND user_type = $latest_message_sender_type
                         AND recipient_id = $user_id
                         AND recipient_type = $user_type";
               $result = $db->query($query);

               while($obj = $result->fetch_object()){
                   $results[] = $obj;
               }
           }

           else{
               $results = '';
           }

           return $results;
       }

       private function messagesFromLoggedConversation($latest_message_sender, $latest_message_sender_type){
           global $db;
           global $user_identity;

           if(!empty($latest_message_sender && $latest_message_sender_type)){
               $user_id = $user_identity->getLoggedUserId();
               $user_type = $user_identity->getLoggedUserType();
               
               $query = "SELECT user_id, user_type, message_time, message_id 
                         FROM messages
                         WHERE user_id = $user_id
                         AND user_type = $user_type
                         AND recipient_id = $latest_message_sender
                         AND recipient_type = $latest_message_sender_type";
                $result = $db->query($query);

                while($obj = $result->fetch_object()){
                    $results[] = $obj;
                }
           }
           else{
               $results = '';
           }
            
            return $results;
       }

       public function displayStatus(){
           $messages_conversation = $this->loadMessageConversation();

           if(!empty($messages_conversation)){
               $display_status = 1;
           }
           if(empty($messages_conversation)){
               $display_status = 0;
           }
           return $display_status;
       }

       private function messageConversationTimeAgo($time_ago){
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

       public function displayMessageConversation(){
           global $user_identity;

           $user_id = $user_identity->getLoggedUserId();
           $user_type = $user_identity->getLoggedUserType();
           
           $messages_conversation = $this->loadMessageConversation();

           if(!empty($messages_conversation)){
               foreach($messages_conversation as $value){
                   $message_id = $value->message_id;
                   $message_sender = $value->user_id;
                   $message_sender_type = $value->user_type;

                   $user_info = $this->loadUserInfo($message_sender, $message_sender_type);
                   $message_info = $this->loadMessageInfo($message_id);
                   $message_time = $this->messageConversationTimeAgo($message_info->message_time);

                   if($message_sender == $user_id && $message_sender_type == $user_type){
                        echo '
                            <div class="message_chat_box">
                                <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$user_info->avatar.$user_info->logo.'"/></div>
                                <span>@'.$user_info->username.'</span>
                                <span>'.$message_info->message_text.'</span>
                                <a class="pull-right">'.$message_time.'</a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        ';
                   }
                   else{
                       echo '
                            <div class="message_chat_box-reply">
                                <div class="message_chat_box_photo_reply"><img alt="profile_photo" src="'.$user_info->avatar.$user_info->logo.'"/></div>
                                <span>@'.$user_info->username.'</span>
                                <span>'.$message_info->message_text.'</span>
                                <a class="pull-left">'.$message_time.'</a>

                                <input id="username" value="'.$user_info->username.'" type="hidden"/>
                                <input id="recipient_id" value="'.$message_sender.'" type="hidden"/>
                                <input id="recipient_type" value="'.$message_sender_type.'" type="hidden"/>
                            </div>
                            <div class="clear"></div>
                       ';
                   }
               }
           }
       }

       public function displayMessageConversationClicked($recipient_username){
           global $user_identity;

           error_reporting(0);

           $user_id = $user_identity->getLoggedUserId();
           $user_type = $user_identity->getLoggedUserType();

           $messages_conversation = $this->loadMessageConversationClicked($recipient_username);

           if(!empty($messages_conversation)){
               foreach($messages_conversation as $value){
                   $message_id = $value->message_id;
                   $message_sender = $value->user_id;
                   $message_sender_type = $value->user_type;

                   $user_info = $this->loadUserInfo($message_sender, $message_sender_type);
                   $message_info = $this->loadMessageInfo($message_id);
                   $message_time = $this->messageConversationTimeAgo($message_info->message_time);

                   if(!empty($user_info->avatar)){
                       $profile_photo = $user_info->avatar;
                   }
                   else{
                       $profile_photo = $user_info->logo;
                   }

                   if($message_sender == $user_id && $message_sender_type == $user_type){
                        echo '
                            <div class="message_chat_box">
                                <div class="message_chat_box_photo"><img alt="profile_photo" src="'.$profile_photo.'"/></div>
                                <span>@'.$user_info->username.'</span>
                                <span>'.$message_info->message_text.'</span>
                                <a class="pull-right">'.$message_time.'</a>

                                <input id="logged_username" value="'.$user_info->username.'" type="hidden"/>
                                <input id="user_id" value="'.$message_sender.'" type="hidden"/>
                                <input id="user_type" value="'.$message_sender_type.'" type="hidden"/>
                                <input id="user_photo" value="'.$user_info->avatar.$user_info->logo.'" type="hidden"/>

                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        ';
                   }
                   else{
                       echo '
                            <div class="message_chat_box-reply">
                                <div class="message_chat_box_photo_reply"><img alt="profile_photo" src="'.$user_info->avatar.$user_info->logo.'"/></div>
                                <span>@'.$user_info->username.'</span>
                                <span>'.$message_info->message_text.'</span>
                                <a class="pull-left">'.$message_time.'</a>

                                <input id="username" value="'.$user_info->username.'" type="hidden"/>
                                <input id="recipient_id" value="'.$message_sender.'" type="hidden"/>
                                <input id="recipient_type" value="'.$message_sender_type.'" type="hidden"/>
                            </div>
                            <div class="clear"></div>
                       ';
                   }
               }
           }
           elseif(empty($messages_conversation)){
               echo '
                   <p>Sorry, currently there are no messages.</p>
               ';
           }

       }

       public function searchMessageRecipient($searchword){

           error_reporting(0);

           $search_individuals = $this->searchIndividuals($searchword);
           $search_companies = $this->searchCompanies($searchword);

           $search_results = (object)array_merge((array)$search_individuals, $search_companies);

           return $search_results;
       }

       public function get_messages_feature_privacy_status_logged_user($user_id, $user_type){
           $this->checkPrivacyForLoggedUser($user_id, $user_type);
           return $this->messages_feature_privacy_status_logged_user;
       }

       public function get_messages_feature_privacy_status_recipient($recipient_id, $recipient_type){
           $this->checkPrivacyForRecipient($recipient_id, $recipient_type);
           return $this->messages_feature_privacy_status_recipient;
       }

       public function getRecipientRelation($recipient_id, $recipient_type, $user_id, $user_type){
           $recipient_relation = $this->checkRecipientRelationship($recipient_id, $recipient_type, $user_id, $user_type);
           return $recipient_relation;
       }

       public function getRecipientInfo($message_to){
           $recipient_info = $this->loadRecipientInfo($message_to);
           return $recipient_info;
       }

       public function get_messages_followers_privacy_status_logged_user($user_id, $user_type){
           $this->checkPrivacyForLoggedUser($user_id, $user_type);
           return $this->messages_followers_privacy_status_logged_user;
       }

       public function get_messages_followers_privacy_status_recipient($recipient_id, $recipient_type){
           $this->checkPrivacyForRecipient($recipient_id, $recipient_type);
           return $this->messages_followers_privacy_status_recipient;
       }

       public function get_messages_following_privacy_status_logged_user($user_id, $user_type){
           $this->checkPrivacyForLoggedUser($user_id, $user_type);
           return $this->messages_following_privacy_status_logged_user;
       }

       public function get_messages_following_privacy_status_recipient($recipient_id, $recipient_type){
           $this->checkPrivacyForRecipient($recipient_id, $recipient_type);
           return $this->messages_following_privacy_status_recipient;
       }

       public function get_messages_everyone_privacy_status_logged_user($user_id, $user_type){
           $this->checkPrivacyForLoggedUser($user_id, $user_type);
           return $this->messages_everyone_privacy_status_logged_user;
       }

       public function get_messages_everyone_privacy_status_recipient($recipient_id, $recipient_type){
           $this->checkPrivacyForRecipient($recipient_id, $recipient_type);
           return $this->messages_everyone_privacy_status_recipient;
       }

       public function get_validateNumberOfMessages($user_id, $user_type, $recipient_id, $recipient_type){
           $num_messages_validation = $this->validateNumberOfMessages($user_id, $user_type, $recipient_id, $recipient_type);
           return $num_messages_validation;
       }

   }
    
?>
