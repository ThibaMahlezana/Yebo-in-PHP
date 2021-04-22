<?php
/* USER MODULE  */

    class moduleUser{

        // METHODS
        private function loggedUserId(){
            $user_type = $_SESSION['SESS_TYPE'];

            // IF LOGGED USER IS ADMIN
            if($user_type == 0){
                $user_id = $_SESSION['SESS_ADMIN_ID'];
            }

            // IF LOGGED USER IS INDIVIDUAL
            if($user_type == 1){
                $user_id = $_SESSION['SESS_MEMBER_ID'];
            }

            // IF LOGGED USER IS COMPANY
            if($user_type == 2){
                $user_id = $_SESSION['SESS_COMPANY_ID'];
            }

            return $user_id;
        }

        public function getLoggedUserId(){
            $user_id = $this->loggedUserId();
            return $user_id;
        }

        public function getLoggedUserType(){
            $user_type = $_SESSION['SESS_TYPE'];
            return $user_type;
        }

    }
?>
