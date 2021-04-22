<?php
    /*  MODULE TIMELINE  */

    class moduleTimeline{
        
        // methods
        private function saveQuotePost($user_id, $user_type, $post_time, $quote_content, $quote_source, $privacy_status, $post_type){
            global $db;

            $query = "INSERT INTO post_quotes(user_id,
                                              user_type,
                                              post_time,
                                              quote_content,
                                              quote_source,
                                              privacy_status,
                                              post_type)
                              VALUES('$user_id',
                                      '$user_type',
                                      '$post_time',
                                      '$quote_content',
                                      '$quote_source',
                                      '$privacy_status',
                                      '$post_type')";
            $db->query($query);
        }
        private function saveThoughtPost($user_id, $user_type, $post_time, $thought_content, $thought_privacy, $post_type){
            global $db;

            $query = "INSERT INTO post_thoughts(user_id,
                                               user_type,
                                               post_time,
                                               thought_content,
                                               privacy_status,
                                               post_type)
                             VALUES('$user_id',
                                    '$user_type',
                                    '$post_time',
                                    '$thought_content',
                                    '$thought_privacy',
                                    '$post_type')";
            $db->query($query);
        }
        //private function saveImagePost(){}
        //private function saveVideoPost(){}
        private function saveLinkPost($user_id, $user_type, $post_time, $link_url, $link_caption, $link_privacy, $post_type){
            global $db;

            $query = "INSERT INTO post_links(user_id,
                                             user_type,
                                             post_time,
                                             link_url,
                                             link_caption,
                                             privacy_status,
                                             post_type)
                              VALUES('$user_id',
                                     '$user_type',
                                     '$post_time',
                                     '$link_url',
                                     '$link_caption',
                                     '$link_privacy',
                                     '$post_type')";
             $db->query($query);
        }
        private function saveNormalPost($user_id, $user_type, $post_time, $custom_subject, $custom_content, $custom_privacy, $post_type){
            global $db;

            $query = "INSERT INTO post_normal(user_id,
                                             user_type,
                                             post_time,
                                             post_header,
                                             post_description,
                                             privacy_status,
                                             post_type)
                           VALUES('$user_id',
                                  '$user_type',
                                  '$post_time',
                                  '$custom_subject',
                                  '$custom_content',
                                  '$custom_privacy',
                                  '$post_type')";
              $db->query($query);
        }
        private function saveTopicPost($user_id, $user_type, $post_time, $topic_content, $topic_privacy, $post_type){
            global $db;

            $query = "INSERT INTO post_topic(user_id,
                                             user_type,
                                             post_time,
                                             topic_content,
                                             privacy_status,
                                             post_type)
                             VALUES('$user_id',
                                    '$user_type',
                                    '$post_time',
                                    '$topic_content',
                                    '$topic_privacy',
                                    '$post_type')";
            $db->query($query);
        }


        public function createQuotePost($quote_content, $quote_source){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();
            $privacy_status = 1;
            $post_time = time();
            $post_type = 1;

            $this->saveQuotePost($user_id, $user_type, $post_time, $quote_content, $quote_source, $privacy_status, $post_type);
        }
        public function createThoughtPost($thought_content, $thought_privacy){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();
            $post_time = time();
            $post_type = 2;

            $this->saveThoughtPost($user_id, $user_type, $post_time, $thought_content, $thought_privacy, $post_type);
        }
        //public function createImagePost(){}
        //public function createVideoPost(){}
        public function createLinkPost($link_url, $link_caption, $link_privacy){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();
            $post_time = time();
            $post_type = 5;

            $this->saveLinkPost($user_id, $user_type, $post_time, $link_url, $link_caption, $link_privacy, $post_type);
        }
        public function createNormalPost($custom_subject, $custom_content, $custom_privacy){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();
            $post_time = time();
            $post_type = 6;

            $this->saveNormalPost($user_id, $user_type, $post_time, $custom_subject, $custom_content, $custom_privacy, $post_type);
        }
        public function createTopicPost($topic_content, $topic_privacy){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();
            $post_time = time();
            $post_type = 7;

            $this->saveTopicPost($user_id, $user_type, $post_time, $topic_content, $topic_privacy, $post_type);
        }        
        

        private function loadQuotePostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type 
                      FROM post_quotes
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        private function loadThoughtPostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type 
                      FROM post_thoughts
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        private function loadImagePostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type
                      FROM post_images
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        private function loadVideoPostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type 
                      FROM post_videos
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        private function loadLinkPostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type 
                      FROM post_links
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        private function loadNormalPostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type 
                      FROM post_normal
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        private function loadTopicPostId($user_id, $user_type){
            global $db;

            $query = "SELECT post_time, post_id, post_type 
                      FROM post_topic
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }
        
         
        private function feedByLoggedForQuotePost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $quote_info = $this->loadQuotePostId($user_id, $user_type);
            return $quote_info;
        }
        private function feedByLoggedForThoughtPost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $thought_info = $this->loadThoughtPostId($user_id, $user_type);
            return $thought_info;
        }
        private function feedByLoggedForImagePost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $image_info = $this->loadImagePostId($user_id, $user_type);
            return $image_info;
        }
        private function feedByLoggedForVideoPost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $video_info = $this->loadVideoPostId($user_id, $user_type);
            return $video_info;
        }
        private function feedByLoggedForLinkPost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $link_info = $this->loadLinkPostId($user_id, $user_type);
            return $link_info;
        }
        private function feedByLoggedForNormalPost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $normal_info = $this->loadNormalPostId($user_id, $user_type);
            return $normal_info;
        }
        private function feedByLoggedForTopicPost(){
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $topic_info = $this->loadTopicPostId($user_id, $user_type);
            return $topic_info;
        }

        private function loadUserInfo($user_id){
            global $db;

            $query = "SELECT * FROM members WHERE user_id = $user_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadCompanyInfo($user_id){
            global $db;

            $query = "SELECT * FROM companies WHERE company_id = $user_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        private function loadQuotePostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_quotes WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadThoughtPostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_thoughts WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadImagePostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_images WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadVideoPostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_videos WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadLinkPostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_links WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadNormalPostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_normal WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function loadTopicPostInfo($post_id){
            global $db;

            $query = "SELECT * FROM post_topic WHERE post_id = $post_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[0] = $obj;
            }

            return $results[0];
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
            $results = $db->fetch_array($result);
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
            $chat_contributors = array_unique($chat_messages);
            $num_chat_contributors = count($chat_contributors);

            return $num_chat_contributors;
        }

        private function feedsByLoggedUser(){

            $quote_ids_array = $this->feedByLoggedForQuotePost();
            $thought_ids_array = $this->feedByLoggedForThoughtPost();
            $image_ids_array = $this->feedByLoggedForImagePost();
            $video_ids_array = $this->feedByLoggedForVideoPost();
            $link_ids_array = $this->feedByLoggedForLinkPost();
            $normal_ids_array = $this->feedByLoggedForNormalPost();
            $topic_ids_array = $this->feedByLoggedForTopicPost();

            $all_feeds_ids = json_decode(json_encode($all_feeds_ids), TRUE);

            $all_feeds_ids = array_merge($quote_ids_array, 
                                         $thought_ids_array,
                                         $image_ids_array,
                                         $video_ids_array,
                                         $link_ids_array,
                                         $normal_ids_array,
                                         $topic_ids_array
                                         ); 
            foreach($all_feeds_ids as $value){
                $sorted_all_feeds_ids[] = $value->post_time;
            }
            array_multisort($sorted_all_feeds_ids, SORT_DESC, $all_feeds_ids);
                        
            return $all_feeds_ids;
        } 
        
        public function displayPostFeeds(){
            
            $all_feeds_ids = $this->feedsByLoggedUser();

            foreach($all_feeds_ids as $key => $value){
                $post_type = $value->post_type;
                $post_id = $value->post_id;

                if($post_type == 1){
                    $this->displayQuotePost($post_id);
                }

                if($post_type == 2){
                    $this->displayThoughtPost($post_id);
                }

                if($post_type == 3){
                    $this->displayImagePost($post_id);
                }

                if($post_type == 4){
                    $this->displayVideoPost($post_id);
                }

                if($post_type == 5){
                    $this->displayLinkPost($post_id);
                }

                if($post_type == 6){
                    $this->displayNormalPost($post_id);
                }

                if($post_type == 7){
                    $this->displayTopicPost($post_id);
                }
            }

        }

        private function displayQuotePost($post_id){
            
            $quote_info = $this->loadQuotePostInfo($post_id);

            $quote_content = $quote_info->quote_content;
            $quote_source = $quote_info->quote_source;
            $quote_privacy = $quote_info->privacy_status;
            $post_type = $quote_info->post_type;

            $user_id = $quote_info->user_id;
            $user_type = $quote_info->user_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            echo '
                <!------- Quote post ------->
                <div class="quote-post-box">
                    <div class="quote-post-username"><a>@'.$username.'</a></div>
                    <div class="quote-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div class="quote-post-content">
                        <i class="pull-right flaticon-lock24"></i>
                        <p><strong> "</strong>'.$quote_content.' <strong>"</strong>.</p>
                        <p>'.$quote_source.'</p>
                        <div class="divider"></div>
                        <a href="chat.php?post_id='.$post_id.'&post_type=1"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                    <div class="clear"></div>
                </div>
            ';
        }
        private function displayThoughtPost($post_id){
            $thought_info = $this->loadThoughtPostInfo($post_id);

            $thought_content = $thought_info->thought_content;
            $thought_privacy = $thought_info->privacy_status;

            $user_id = $thought_info->user_id;
            $user_type = $thought_info->user_type;
            $post_type = $thought_info->post_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            if($thought_privacy == 1){
                $privacy_status = 'flaticon-earth17';
            }
            if($thought_privacy == 2){
                $privacy_status = 'flaticon-lock24';
            }

            echo '
                <!------- Thought post ------->
                <div class="thought-post-box">
                    <div class="thought-post-username"><a>@'.$username.'</a></div>
                    <div class="thought-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="thought-post-content">
                        <p>'.$thought_content.'</p>
                        <i class="pull-right '.$privacy_status.'"></i>
                        <div class="divider"></div>
                        <a href="chat.php?post_id='.$post_id.'&post_type=2"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                    <div class="clear"></div>
                </div>
            ';

        }
        private function displayImagePost($post_id){
            $image_info = $this->loadImagePostInfo($post_id);

            $image_file = $image_info->image_path;
            $image_caption = $image_info->image_caption;
            $image_privacy = $image_info->privacy_status;

            $user_id = $image_info->user_id;
            $user_type = $image_info->user_type;
            $post_type = $image_info->post_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            if($image_privacy == 1){
                $privacy_status = 'flaticon-earth17';
            }
            if($image_privacy == 2){
                $privacy_status = 'flaticon-lock24';
            }

            echo '
                <!------- Image post ------->
                <div class="image-post-box">
                    <div class="image-post-username"><a>@'.$username.'</a></div>
                    <div class="image-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div class="image-post-content">
                        <p><img alt="image" src="'.$image_file.'"/></p>
                        <p>'.$image_caption.'</p>
                        <div class="divider"></div>
                        <i class="pull-right '.$privacy_status.'"></i>
                        <a href="chat.php?post_id='.$post_id.'&post_type=3"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayVideoPost($post_id){
            $video_info = $this->loadVideoPostInfo($post_id);

            $video_file = $video_info->video_path;
            $video_caption = $video_info->video_caption;
            $video_privacy = $video_info->privacy_status;

            $user_id = $video_info->user_id;
            $user_type = $video_info->user_type;
            $post_type = $video_info->post_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            if($video_privacy == 1){
                $privacy_status = 'flaticon-earth17';
            }
            if($video_privacy == 2){
                $privacy_status = 'flaticon-lock24';
            }

            echo '
                <!------- Video post ------->
                <div class="video-post-box">
                    <div class="video-post-username"><a>@'.$username.'</a></div>
                    <div class="video-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div class="video-post-content">
                        <video controls>
                            <source src="'.$video_file.'"/>
                        </video>
                        <p>'.$video_caption.'</p>
                        <div class="divider"></div>
                        <i class="pull-right '.$privacy_status.'"></i>
                        <a href="chat.php?post_id='.$post_id.'&post_type=4"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            ';
        }
        private function displayLinkPost($post_id){
            $link_info = $this->loadLinkPostInfo($post_id);

            $link_url = $link_info->link_url;
            $link_caption = $link_info->link_caption;
            $link_privacy = $link_info->privacy_status;

            $user_id = $link_info->user_id;
            $user_type = $link_info->user_type;
            $post_type = $link_info->post_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            if($link_privacy == 1){
                $privacy_status = 'flaticon-earth17';
            }
            if($link_privacy == 2){
                $privacy_status = 'flaticon-lock24';
            }

            echo '
                <!------- Link post ------->
                <div class="link-post-box">
                    <div class="link-post-username"><a>@'.$username.'</a></div>
                    <div class="link-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div class="link-post-content">
                        <i class="pull-right '.$privacy_status.'"></i>
                        <p><a href="'.$link_url.'">'.$link_url.'</a></p>
                        <p>'.$link_caption.'</p>
                        <div class="divider"></div>
                        <a href="chat.php?post_id='.$post_id.'&post_type=5"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                    <div class="clear"></div>
                </div>
            ';
        }
        private function displayNormalPost($post_id){
            $normal_info = $this->loadNormalPostInfo($post_id);

            $normal_subject = $normal_info->post_header;
            $normal_content = $normal_info->post_description;
            $normal_privacy = $normal_info->privacy_status;

            $user_id = $normal_info->user_id;
            $user_type = $normal_info->user_type;
            $post_type = $normal_info->post_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            if($normal_privacy == 1){
                $privacy_status = 'flaticon-earth17';
            }
            if($normal_privacy == 2){
                $privacy_status = 'flaticon-lock24';
            }

            echo '
                <!------- Custom post ------->
                <div class="custom-post-box">
                    <div class="custom-post-username"><a>@'.$username.'</a></div>
                    <div class="custom-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div class="custom-post-content">
                        <i class="pull-right '.$privacy_status.'"></i>
                        <p>'.$normal_subject.'.</p>
                        <p>'.$normal_content.'</p>
                        <div class="divider"></div>
                        <a href="chat.php?post_id='.$post_id.'&post_type=6"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                    <div class="clear"></div>
                </div>
            ';
        }
        private function displayTopicPost($post_id){
            $topic_info = $this->loadTopicPostInfo($post_id);

            $topic_content = $topic_info->topic_content;
            $topic_privacy = $topic_info->privacy_status;

            $user_id = $topic_info->user_id;
            $user_type = $topic_info->user_type;
            $post_type = $topic_info->post_type;

            if($user_type == 1){
                $user_info = $this->loadUserInfo($user_id);
            }
            if($user_type == 2){
                $user_info = $this->loadCompanyInfo($user_id);
            }

            $username = $user_info->username;
            $avatar = $user_info->avatar;
            $logo = $user_info->logo;
            $photo = $avatar.$logo;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            if($topic_privacy == 1){
                $privacy_status = 'flaticon-earth17';
            }
            if($topic_privacy == 2){
                $privacy_status = 'flaticon-lock24';
            }

            echo '
                <!------- Topic post ------->
                <div class="topic-post-box">
                    <div class="topic-post-username"><a>@'.$username.'</a></div>
                    <div class="topic-post-user">
                        <img alt="avatr" src="'.$photo.'"/>
                    </div>
                    <div class="topic-post-content">
                        '.$topic_content.'
                        <i class="pull-right '.$privacy_status.'"></i>
                        <div class="divider"></div>
                        <a href="chat.php?post_id='.$post_id.'&post_type=7"><i class="flaticon-comment32"></i>'.$num_chat_messages.'</a>
                        <a href="#"><i class="flaticon-user77"></i>'.$num_chat_contributors.'</a>
                    </div>
                    <div class="clear"></div>
                </div>
            ';
        }
        

        private function loggedUserFollowing(){
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

        private function feedByFollowingForQuotePost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $quote_info = $this->loadQuotePostId($followed_id, $followed_type);
            }

            return $quote_info;
        }
        private function feedByFollowingForThoughtPost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $thought_info = $this->loadThoughtPostId($followed_id, $followed_type);
            }

            return $thought_info;
        }
        private function feedByFollowingForImagePost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $image_info = $this->loadImagePostId($followed_id, $followed_type);
            }

            return $image_info;
        }
        private function feedByFollowingForVideoPost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $video_info = $this->loadVideoPostId($followed_id, $followed_type);
            }

            return $video_info;
        }
        private function feedByFollowingForLinkPost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $link_info = $this->loadLinkPostId($followed_id, $followed_type);
            }

            return $link_info;
        }
        private function feedByFollowingForNormalPost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $normal_info = $this->loadNormalPostId($followed_id, $followed_type);
            }

            return $normal_info;
        }
        private function feedByFollowingForTopicPost(){
            $followed_ids_array = $this->loggedUserFollowing();

            foreach($followed_ids_array as $key => $value){
                $followed_id = $value->followed_id;
                $followed_type = $value->followed_type;

                $topic_info = $this->loadTopicPostId($followed_id, $followed_type);
            }

            return $topic_info;
        }

        private function feedsByFollowing(){
            $quote_ids_array = $this->feedByFollowingForQuotePost();
            $quote_ids_array_logged = $this->feedByLoggedForQuotePost();

            $thought_ids_array = $this->feedByFollowingForThoughtPost();
            $thought_ids_array_logged = $this->feedByLoggedForThoughtPost();

            $image_ids_array = $this->feedByFollowingForImagePost();
            $image_ids_array_logged = $this->feedByLoggedForImagePost();

            $video_ids_array = $this->feedByFollowingForVideoPost();
            $video_ids_array_logged = $this->feedByLoggedForVideoPost();

            $link_ids_array = $this->feedByFollowingForLinkPost();
            $link_ids_array_logged = $this->feedByLoggedForLinkPost();

            $normal_ids_array = $this->feedByFollowingForNormalPost();
            $normal_ids_array_logged = $this->feedByLoggedForNormalPost();

            $topic_ids_array = $this->feedByFollowingForTopicPost();
            $topic_ids_array_logged = $this->feedByLoggedForTopicPost();

            //$all_feeds_ids = json_decode(json_encode($all_feeds_ids), TRUE);

            $all_feeds_ids = (object)array_merge((array)$quote_ids_array,
                                                 (array)$quote_ids_array_logged,  
                                                 (array)$thought_ids_array,
                                                 (array)$thought_ids_array_logged,
                                                 (array)$image_ids_array,
                                                 (array)$image_ids_array_logged,
                                                 (array)$video_ids_array,
                                                 (array)$video_ids_array_logged,
                                                 (array)$link_ids_array,
                                                 (array)$link_ids_array_logged,
                                                 (array)$normal_ids_array,
                                                 (array)$normal_ids_array_logged,
                                                 (array)$topic_ids_array,
                                                 (array)$topic_ids_array_logged
                                                 ); 
            foreach($all_feeds_ids as $value){
                $sorted_all_feeds_ids[] = $value->post_time;
            }
            array_multisort($sorted_all_feeds_ids, SORT_DESC, $all_feeds_ids);

            return $all_feeds_ids;        
            
        }

        public function displayTimelinePostFeeds(){
            
            $all_feeds_ids = $this->feedsByFollowing();

            foreach($all_feeds_ids as $key => $value){
                $post_type = $value->post_type;
                $post_id = $value->post_id;

                if($post_type == 1){
                    $this->displayQuotePost($post_id);
                }

                if($post_type == 2){
                    $this->displayThoughtPost($post_id);
                }

                if($post_type == 3){
                    $this->displayImagePost($post_id);
                }

                if($post_type == 4){
                    $this->displayVideoPost($post_id);
                }

                if($post_type == 5){
                    $this->displayLinkPost($post_id);
                }

                if($post_type == 6){
                    $this->displayNormalPost($post_id);
                }

                if($post_type == 7){
                    $this->displayTopicPost($post_id);
                } 
            }

        }

        public function displayQuotePostTopic($post_id, $post_type){
            $quote_info = $this->loadQuotePostInfo($post_id);

            $quote_content = $quote_info->quote_content;
            $quote_source = $quote_info->quote_source;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            echo '
                <div class="chat-box-title">
                    <div class="quote-chat-title">
                        <a><i class="flaticon-quote2"></i></a>
                        <a>"'.$quote_content.'"</a> <a>'.$quote_source.'</a>
                        <a><i class="flaticon-group41"></i> '.$num_chat_contributors.' <i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                        <div class="clear"></div>
                    </div>
                </div>           
            ';
        }
        public function displayThoughtPostTopic($post_id, $post_type){
            $thought_info = $this->loadThoughtPostInfo($post_id);

            $thought_content = $thought_info->thought_content;
            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);
            
            echo '
                <div class="thought-chat-title">
                    <a><i class="flaticon-light45"></i></a>
                    <a>'.$thought_content.'</a>
                    <a><i class="flaticon-group41"></i> '.$num_chat_contributors.' <i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                    <div class="clear"></div>
                </div>            
            ';
        }
        public function displayImagePostTopic($post_id, $post_type){
            $image_info = $this->loadImagePostInfo($post_id);

            $image_caption = $image_info->image_caption;
            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            echo '
                <div class="image-chat-title">
                    <a><i class="flaticon-picture13"></i></a>
                    <a>'.$image_caption.'</a>
                    <a><i class="flaticon-group41"></i> '.$num_chat_contributors.' <i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                    <div class="clear"></div>
                </div>            
            ';
        }
        public function displayVideoPostTopic($post_id, $post_type){
            $video_info = $this->loadVideoPostInfo($post_id);

            $video_caption = $video_info->video_caption;
            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);
            
            echo '
                <div class="video-chat-title">
                    <a><i class="flaticon-video91"></i></a>
                    <a>'.$video_caption.'</a>
                    <a><i class="flaticon-group41"></i> '.$num_chat_contributors.'<i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                    <div class="clear"></div>
                </div>            
            ';
        }
        public function displayLinkPostTopic($post_id, $post_type){
            $link_info = $this->loadLinkPostInfo($post_id);

            $link_url = $link_info->link_url;
            $link_caption = $link_info->link_caption;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            echo '
                <div class="link-chat-title">
                    <a><i class="flaticon-link15"></i></a>
                    <a>'.$link_caption.'</a><a href="'.$link_url.'">'.$link_url.'</a>
                    <a><i class="flaticon-group41"></i> '.$num_chat_contributors.'<i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                    <div class="clear"></div>
                </div>                                        
            ';
        }
        public function displayNormalPostTopic($post_id, $post_type){
            $normal_info = $this->loadNormalPostInfo($post_id);

            $normal_subject = $normal_info->post_header;
            $normal_content = $normal_info->post_description;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);
            
            echo '
                <div class="custom-chat-title">
                    <a><i class="flaticon-font2"></i></a>
                    <a>'.$normal_subject.'</a><a>'.$normal_content.'</a>
                    <a><i class="flaticon-group41"></i> '.$num_chat_contributors.' <i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                </div>            
            ';
        }
        public function displayTopicPostTopic($post_id, $post_type){
            $topic_info = $this->loadTopicPostInfo($post_id);

            $topic_content = $topic_info->topic_content;

            $num_chat_messages = $this->numChatMessages($post_id, $post_type);
            $num_chat_contributors = $this->numChatContributors($post_id, $post_type);

            echo '
                <div class="topic-chat-title">
                    <a><i class="flaticon-comments16"></i></a>
                    <a>'.$topic_content.'</a>
                    <a><i class="flaticon-group41"></i> '.$num_chat_contributors.'<i class="flaticon-speech59"></i> '.$num_chat_messages.'</a>
                    <div class="clear"></div>
                </div>
            ';
        }

        private function timelineFeedsChatsInfo($chat_id){
            global $db;

            $query = "SELECT *
                      FROM chats_public
                      WHERE chat_id = $chat_id";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }

        private function loadTimelineFeedsChats($post_id, $post_type){
            global $db;

            $query = "SELECT chat_id, post_id, post_type 
                      FROM chats_public
                      WHERE post_id = $post_id
                      AND post_type = $post_type";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        public function displayTimelineFeedsChats($post_id, $post_type){
            $timeline_feeds_chats = $this->loadTimelineFeedsChats($post_id, $post_type);
                        
            if(!empty($timeline_feeds_chats)){
                foreach($timeline_feeds_chats as $feeds_chats){
                    $chat_id = $feeds_chats->chat_id;

                    $post_id = $feeds_chats->post_id;
                    $post_type = $feeds_chats->post_type;

                    if($post_type == '1'){$post_info = $this->loadQuotePostInfo($post_id);}
                    if($post_type == '2'){$post_info = $this->loadThoughtPostInfo($post_id);}
                    if($post_type == '3'){$post_info = $this->loadImagePostInfo($post_id);}
                    if($post_type == '4'){$post_info = $this->loadVideoPostInfo($post_id);}
                    if($post_type == '5'){$post_info = $this->loadLinkPostInfo($post_info);}
                    if($post_type == '6'){$post_info = $this->loadNormalPostInfo($post_id);}
                    if($post_type == '7'){$post_info = $this->loadTopicPostId($post_id);}

                    $moderator_id = $post_info->user_id;
                    $moderator_type = $post_info->user_type;

                    $timeline_feeds_chats_info = $this->timelineFeedsChatsInfo($chat_id);
                    $user_id = $timeline_feeds_chats_info->user_id;
                    $user_type = $timeline_feeds_chats_info->user_type;

                    if($user_type == 1){
                        $user_info = $this->loadUserInfo($user_id);
                    }
                    if($user_type == 2){
                        $user_info = $this->loadCompanyInfo($user_id);
                    }
                    
                    if(($user_id == $moderator_id) && ($user_type == $moderator_type)){
                        echo '
                            <div class="chat-box-message">
                                <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->avatar.$user_info->logo.'"/></div>
                                <div class="chat-box-message-body">
                                    <span>@'.$user_info->username.'</span>
                                    <span>'.$timeline_feeds_chats_info->chat_text.'</span>
                                    <span>5 Min Ago</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        ';
                    }
                    else{
                        echo '
                            <div class="chat-box-message-reply">
                                <div class="chat-box-message-avatar"><img width="50" alt="avatar" src="'.$user_info->avatar.$user_info->logo.'"/></div>
                                <div class="chat-box-message-body">
                                    <div>@'.$user_info->username.'</div>
                                    <span>5 Min Ago</span>
                                    <span>'.$timeline_feeds_chats_info->chat_text.'</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        ';
                    }
                }
            }
            if(empty($timeline_feeds_chats)){
                echo 'currently there are no chats for this post, be the first one to have an opinion about it.';
            }
        }        
    
    }
?>
