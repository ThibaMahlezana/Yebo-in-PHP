<?php
    
    class notifications{

        private function getNotifications(){
            global $user_identity;
            global $db;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT subject, content
                      FROM notifications 
                      WHERE user_id = $user_id
                      AND user_type = $user_type
                      ORDER BY notification_time
                      DESC";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results;
        }

        private function numNotifications(){
            $notifications_array = $this->getNotifications();
            $number_of_notifications = count($notifications_array);
            return $number_of_notifications;
        }

        public function getNumNotifications(){
            $number_of_notifications = $this->numNotifications();
            return $number_of_notifications;
        }

    }

?>