<?php
    /*  MODULE TAGS  */

    class moduleTags{
        // VARIABLES
        private $tag_chats_ids;
        private $chat_info;
        private $tag_info;
        private $chatter_info;
        private $num_chats;

        // METHODS
        // A METHOD THAT SELECTS AND CARRIES CHATS BASED ON PASSED TAG ID
        private function loadTagChats($f_tagId){
            $query = mysql_query("SELECT chat_id
                                  FROM chats
                                  WHERE chat_about_id = $f_tagId 
                                  AND chat_about_type = 2");

            while($results = mysql_fetch_assoc($query)){
                $this->tag_chats_ids[] = $results['chat_id'];
            }
        }

        // A METHOD THAT LOADS CHAT'S INFROMATION
        private function loadChatInfo($chat_id){
            $query = mysql_query("SELECT * 
                                  FROM chats
                                  WHERE chat_id = $chat_id ");
            $results = mysql_fetch_assoc($query);
            $this->chat_info = $results;
        }

        // A METHOD THAT SELECTS AND CARRIES TAG'S INFOMATION
        private function loadTagInfo($f_tagId){
            $query = mysql_query("SELECT * 
                                  FROM tags
                                  WHERE tag_id = $f_tagId ");
            $results = mysql_fetch_assoc($query);
            $this->tag_info = $results;
        }

        // A MTHOD THAT SELECTS AND CARRIES USER'S INFORMATION WHO CREATED THE CHAT
        private function loadChatterInfo($chatter_id, $chatter_type){
            if($chatter_type == 1){
                $query = mysql_query("SELECT * 
                                      FROM members 
                                      WHERE user_id = $chatter_id");
                $results = mysql_fetch_assoc($query);
                $this->chatter_info = $results;
            }

            if($chatter_type == 2){}
        }

        // A METHOD THAT COUNTS NUMBER OF CHATS
        private function getNumberOfChats($f_tagId){
            $query = mysql_query("SELECT chat_id
                                  FROM chats
                                  WHERE chat_about_id = $f_tagId 
                                  AND chat_about_type = 2");
            $this->num_chats = mysql_num_rows($query);
        }

        function displayTagTopic($f_tagId){
            $this->loadTagInfo($f_tagId);
            $this->getNumberOfChats($f_tagId);
            echo '
                <div class="chat-topic">
                    <i class="flaticon-earth17 pull-right"></i>
                    <div class="chat-topic-text"> <i class="flaticon-tag32"></i>'.$this->tag_info['tag_text'].'</div>
                    <p class="chat-topic-stats">
                        <i class="flaticon-speech59"></i> '.$this->num_chats.' 
                        <i class="flaticon-user77"></i>  12 215
                    </p>
                    <div class="chat-topic-controls">
                        <i class="flaticon-share14"></i> share
                        <i class="flaticon-star60"></i> favor
                        <i class="flaticon-bull1"></i> report
                    </div>
                    <div class="clear"></div>
                </div> 
            ';
        }

        // A METHOD THAT DISPLAYS CHATS BASED ON A PASSED TAG ID
        function displayTagChats($f_tagId){
            $this->loadTagChats($f_tagId);

            foreach($this->tag_chats_ids as $value){
                // LOADING CHAT INFO
                $chat_id = $value;
                $this->loadChatInfo($chat_id);

                $chatter_id = $this->chat_info['chatter_id'];
                $chatter_type = $this->chat_info['chatter_type'];
                $this->loadChatterInfo($chatter_id, $chatter_type);

                // LOADING CHATTER INFO
                $avatar = $this->chatter_info['avatar'];
                $logo = $this->chatter_info['logo'];
                $pic = "$avatar $logo";

                $name1 = $this->chatter_info['name'];
                $name2 = $this->chatter_info['first_name'];
                $full_name = "$name1 $name2";

                $time = date('m-d H:i' , $this->chat_info['chat_time']);

                // DISPLAYING CHATS
                echo '
                    <div class="chat-body">
                        <div class="chat-body-one">
                            <div class="chat-body-avatar">
                                <img class="img-rounded" width="35" src="'.$pic.'"/>
                            </div>
                        </div>
                        <div class="chat-body-two">
                            <div class="chat-body-main">
                                <div class="chat-body-main-text">
                                    <div class="chat-body-main-name pull-left"> '.$full_name.' </div>
                                    <div class="chat-body-main-time pull-right">'.$time.'</div>
                                    '.$this->chat_info['chat_text'].'
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                ';
            }
        }
    }
?>
