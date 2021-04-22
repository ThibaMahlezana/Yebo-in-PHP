<?php
    
    class moduleAdmin {

        private function saveAnnouncement($user_id, $user_type, $subject, $content){
            global $db;

            $query = "INSERT INTO notifications(subject,
                                                content,
                                                user_id,
                                                user_type)
                                   VALUES('$subject',
                                          '$content',
                                          '$user_id',
                                          '$user_type')";
            $db->query($query);
        }

        private function loadAllAccounts(){
            $individual_accounts = $this->loadIndividualAccounts();
            $company_accounts = $this->loadCompanyAccounts();

            $all_accounts = (object)array_merge((array)$individual_accounts, $company_accounts);
            return $all_accounts;
        }

        private function loadIndividualAccounts(){
            global $db;

            $query = "SELECT user_id, type FROM members";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loadCompanyAccounts(){
            global $db;

            $query = "SELECT company_id, type FROM companies";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loadIndividualTrialAccounts(){
            global $db;

            $query = "SELECT user_id, type
                      FROM members
                      WHERE level = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loadCompanyTrialAccounts(){
            global $db;

            $query = "SELECT company_id, type
                      FROM companies
                      WHERE level = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function loadAllTrialAccounts(){
            $individual_trial_accounts = $this->loadIndividualTrialAccounts();
            $company_trial_accounts = $this->loadCompanyTrialAccounts();

            $all_trial_accounts = (object)array_merge((array)$individual_trial_accounts, $company_trial_accounts);
            return $all_trial_accounts;
        }

        public function announceAllAccounts($subject, $content){

            $all_accounts = $this->loadAllAccounts();
            
            foreach($all_accounts as $value){
                $user_id = $value->user_id .$value->company_id;
                $user_type = $value->type;

                $this->saveAnnouncement($user_id, $user_type, $subject, $content);
            }
        }

        public function announceIndivividualAccounts($subject, $content){
            
            $individual_accounts = $this->loadIndividualAccounts();

            foreach($individual_accounts as $value){
                $user_id = $value->user_id;
                $user_type = $value->type;

                $this->saveAnnouncement($user_id, $user_type, $subject, $content);
            }

        }

        public function announceCompanyAccounts($subject, $content){
            
            $company_accounts = $this->loadCompanyAccounts();

            foreach($company_accounts as $value){
                $user_id = $value->company_id;
                $user_type = $value->type;

                $this->saveAnnouncement($user_id, $user_type, $subject, $content);
            }
        }

        public function announceTrialAccounts($subject, $content){
            
            $all_trial_accounts = $this->loadAllTrialAccounts();

            foreach($all_trial_accounts as $value){
                $user_id = $value->user_id .$value->company_id;
                $user_type = $value->type;

                $this->saveAnnouncement($user_id, $user_type, $subject, $content);
            }
        }

        private function loadAdminInfo($admin_id){
            global $db;

            $query = "SELECT * FROM admin WHERE admin_id = $admin_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        
        private function totalIndividuals(){
            global $db;

            $query = "SELECT user_id FROM members";
            $result = $db->query($query);
            $num_individuals = $db->num_rows($result);

            return $num_individuals;
        }

        private function totalCompanies(){
            global $db;

            $query = "SELECT company_id FROM companies";
            $result = $db->query($query);
            $num_companies = $db->num_rows($result);

            return $num_companies;
        }

        private function totalUsers(){
            global $db;

            $query = "SELECT * FROM login";
            $result = $db->query($query);
            $num_users = $db->num_rows($result) - 1;

            return $num_users;
        }

        private function totalPrivateChats(){
            global $db;

            $query = "SELECT chat_id FROM chats_private";
            $result = $db->query($query);
            $num_chats = $db->num_rows($result);

            return $num_chats;
        }

        private function totalPublicChats(){
            global $db;

            $query = "SELECT chat_id FROM chats_public";
            $result = $db->query($query);
            $num_chats = $db->num_rows($result);

            return $num_chats;
        }

        private function numQuotePosts(){
            global $db;

            $query = "SELECT post_id FROM post_quotes";
            $result = $db->query($query);
            $num_quote_posts = $db->num_rows($result);

            return $num_quote_posts;
        }

        private function numThoughtPosts(){
            global $db;

            $query = "SELECT post_id FROM post_thoughts";
            $result = $db->query($query);
            $num_thought_posts = $db->num_rows($result);

            return $num_thought_posts;
        }

        private function numImagePosts(){
            global $db;

            $query = "SELECT post_id FROM post_images";
            $result = $db->query($query);
            $num_image_posts = $db->num_rows($result);

            return $num_image_posts;
        }

        private function numVideoPosts(){
            global $db;

            $query = "SELECT post_id FROM post_videos";
            $result = $db->query($query);
            $num_video_posts = $db->num_rows($result);

            return $num_video_posts;
        }

        private function numLinkPosts(){
            global $db;

            $query = "SELECT post_id FROM post_links";
            $result = $db->query($query);
            $num_link_posts = $db->num_rows($result);

            return $num_link_posts;
        }

        private function numNormalPosts(){
            global $db;

            $query = "SELECT post_id FROM post_normal";
            $result = $db->query($query);
            $num_normal_posts = $db->num_rows($result);

            return $num_normal_posts;
        }

        private function numTopicPosts(){
            global $db;

            $query = "SELECT post_id FROM post_topic";
            $result = $db->query($query);
            $num_topic_posts = $db->num_rows($result);

            return $num_topic_posts;
        }

        private function totalNumPosts(){
            $num_quote_posts = $this->numQuotePosts();
            $num_thought_posts = $this->numThoughtPosts();
            $num_image_posts = $this->numImagePosts();
            $num_video_posts = $this->numVideoPosts();
            $num_link_posts = $this->numLinkPosts();
            $num_normal_posts = $this->numNormalPosts();
            $num_topic_posts = $this->numTopicPosts();

            $total_num_posts = $num_quote_posts + 
                               $num_thought_posts +
                               $num_image_posts +
                               $num_video_posts +
                               $num_link_posts +
                               $num_normal_posts +
                               $num_topic_posts;

            return $total_num_posts;
        }
        
        private function totalTags(){
            global $db;

            $query = "SELECT tag_id FROM tags";
            $result = $db->query($query);
            $num_tags = $db->num_rows($result);

            return $num_tags;
        }

        private function totalMessages(){
            global $db;

            $query = "SELECT message_id FROM messages";
            $result = $db->query($query);
            $num_messages = $db->num_rows($result);

            return $num_messages;
        }

        private function totalViews(){

            $num_timeline_views = $this->numTimelineViews();
            $num_chat_views = $this->numChatsViews();
            $num_profile_views = $this->numProfileViews();
            $num_message_views = $this->numMessagesViews();
            $num_notifications_views = $this->numNotificationsViews();

            $total_views = $num_timeline_views +  
                           $num_chat_views +
                           $num_profile_views +
                           $num_message_views +
                           $num_notifications_views;
            return $total_views;
        }

        private function totalLogins(){
            global $db;

            $query = "SELECT login_id FROM stat_logins";
            $result = $db->query($query);
            $num_logins = $db->num_rows($result);

            return $num_logins;
        }

        private function numTimelineViews(){
            global $db;

            $query = "SELECT timeline_views FROM stat_views WHERE stat_id = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            $num_timeline_views = $results[0]->timeline_views; 
            return $num_timeline_views;
        }

        private function numChatsViews(){
            global $db;

            $query = "SELECT chats_views FROM stat_views WHERE stat_id = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            
            $num_chat_views = $results[0]->chats_views;
            return $num_chat_views;
        }

        private function numProfileViews(){
            global $db;

            $query = "SELECT profile_views FROM stat_views WHERE stat_id = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            $num_profile_views = $results[0]->profile_views;
            return $num_profile_views;
        }

        private function numMessagesViews(){
            global $db;

            $query = "SELECT messages_views FROM stat_views WHERE stat_id = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            $num_message_views = $results[0]->messages_views;
            return $num_message_views;
        }

        private function numNotificationsViews(){
            global $db;

            $query = "SELECT notifications_views FROM stat_views WHERE stat_id = 1";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            $num_notifications_views = $results[0]->notifications_views;
            return $num_notifications_views;
        }

        private function getCurrentStats($stat){
            global $db;

            $query = "SELECT $stat FROM stat_views WHERE stat_id = 1";
            $result = $db->query($query);
            
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        public function updateProfileViews(){
            global $db;

            $stat = 'profile_views';
            $profile_views = $this->getCurrentStats($stat);
            $num_profile_views = $profile_views->profile_views + 1;

            $query = "UPDATE stat_views SET profile_views = $num_profile_views";
            $db->query($query);
        }

        public function updateTimelineViews(){
            global $db;

            $stat = 'timeline_views';
            $timeline_views = $this->getCurrentStats($stat);
            $num_timeline_views = $timeline_views->timeline_views + 1;

            $query = "UPDATE stat_views SET timeline_views = $num_timeline_views";
            $db->query($query);
        }

        public function updateChatsViews(){
            global $db;

            $stat = 'chats_views';
            $chat_views = $this->getCurrentStats($stat);
            $num_chat_views = $chat_views->chats_views + 1;

            $query = "UPDATE stat_views SET chats_views = $num_chat_views WHERE stat_id = 1";
            $db->query($query);
        }

        public function updateMessagesViews(){
            global $db;

            $stat = 'messages_views';
            $messages_views = $this->getCurrentStats($stat);
            $num_message_views = $messages_views->messages_views + 1;

            $query = "UPDATE stat_views SET messages_views = $num_message_views WHERE stat_id = 1";
            $db->query($query);
        }

        public function updateNotificationsViews(){
            global $db;

            $stat = 'notifications_views';
            $notifications_views = $this->getCurrentStats($stat);
            $num_notifications_views = $notifications_views->notifications_views + 1;

            $query = "UPDATE stat_views SET notifications_views = $num_notifications_views WHERE stat_id = 1";
            $db->query($query);
        }

        public function getTotalIndividuals(){
            $num_individuals = $this->totalIndividuals();
            return $num_individuals;
        }

        public function getTotalCompanies(){
            $num_companies = $this->totalCompanies();
            return $num_companies;
        }

        public function getTotalUsers(){
            $num_users = $this->totalUsers();
            return $num_users;
        }

        public function getTotalChats(){
            $num_private_chats = $this->totalPrivateChats();
            $num_public_chats = $this->totalPublicChats();

            $num_chats = $num_private_chats + $num_public_chats;

            return $num_chats;
        }

        public function getTotalNumPosts(){
            $total_num_posts = $this->totalNumPosts();
            return $total_num_posts;
        }

        public function getTotalMessages(){
            $num_messages = $this->totalMessages();
            return $num_messages;
        }

        public function getTotalTags(){
            $num_tags = $this->totalTags();
            return $num_tags;
        }

        public function getTotalViews(){
            $num_views = $this->totalViews();
            return $num_views;
        }

        public function getTotalLogins(){
            $num_logins = $this->totalLogins();
            return $num_logins;
        }

        public function getAdminFirstName(){
            global $user_identity;

            $admin_id = $user_identity->getLoggedUserId();
            $admin_info = $this->loadAdminInfo($admin_id);
            
            return $admin_info->first_name;
        }

        public function getAdminLastName(){
            global $user_identity;

            $admin_id = $user_identity->getLoggedUserId();
            $admin_info = $this->loadAdminInfo($admin_id);
            
            return $admin_info->last_name;
        }

        public function getAdminRole(){
            global $user_identity;

            $admin_id = $user_identity->getLoggedUserId();
            $admin_info = $this->loadAdminInfo($admin_id);
            
            return $admin_info->role;
        }

        public function getAdminUsername(){
            global $user_identity;

            $admin_id = $user_identity->getLoggedUserId();
            $admin_info = $this->loadAdminInfo($admin_id);
            
            return $admin_info->username;
        }

        public function getAdminAvatar(){
            global $user_identity;

            $admin_id = $user_identity->getLoggedUserId();
            $admin_info = $this->loadAdminInfo($admin_id);
            
            return $admin_info->avatar;
        }
    }

?>
