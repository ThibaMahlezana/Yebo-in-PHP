<?php
    /* REGISTRATION CLASS */

    session_start();

    require_once 'class_database.php';
    include 'module_access.php';
   
    $db = new database;

    class registration extends moduleAccess{
        
        private $first_name;
        private $last_name;
        private $bio;

        private $name;
        private $logo;
        private $company_bio;
        
        /* ******************************************************************************************************************************
                    REGISTERING AN INDIVIDUAL
        ********************************************************************************************************************************/

        private function userVerificationCode($user_Id, $type){
            global $db;

            for($i = 0; $i < 5; $i++){
                $a .= mt_rand(0,9);
            }

            $code = $a;
            $status = 0;

            $query = "INSERT INTO verification(verification_status, verification_code, user_id, user_type)
                             VALUES('$status', '$code', '$user_Id', '$type')";
            $db->query($query);
        }

        private function addToChatsOnlineStatus($user_Id){
            $time = time();
            $user_type = '1';
            $this->saveToChatsOnlineStatus($user_Id, $user_type, $time);
        }

        private function saveToChatsOnlineStatus($user_Id, $user_type, $time){
            global $db;
            $query = "INSERT INTO chats_online_status(user_id, user_type, last_time)
                      VALUES ('$user_Id','$user_type','$time')";
            $db->query($query);
        }

        public function basicUserRegistration($username, $password, $type, $signup_date, $level){

            $this->insertUser($username, $type, $signup_date, $level);

            $user_Id = $this->fetchUserId($username);

            $this->userVerificationCode($user_Id, $type);

            $save_user_details = $this->saveUserLoginDetails($username, $password, $user_Id, $type);
            $save_messages_privacy = $this->registerUserMessagesPrivacySettings($user_Id, $type);
            $save_chats_online_status = $this->addToChatsOnlineStatus($user_Id);

            if(!empty($save_user_details) && !empty($save_messages_privacy)){
                session_regenerate_id;

                $_SESSION['SESS_MEMBER_ID'] = $user_Id;
                $_SESSION['SESS_TYPE'] = $type;

                session_write_close();
                header("location: signup-individual.php");
                exit();
            }

            else {
		        die("Query failed");
	        }

        }

        private function registerUserMessagesPrivacySettings($user_Id, $type){
            global $db;

            $allow_messages = '1';
            $allow_messages_following = '1';
            $allow_messages_followers = '1';
            $allow_messages_everyone = '0';

            $query = "INSERT INTO privacy_messages(user_id, 
                                                   user_type, 
                                                   allow_messages, 
                                                   allow_messages_following, 
                                                   allow_messages_followers,
                                                   allow_messages_everyone)
                      VALUES ($user_Id,
                              $type,
                              $allow_messages,
                              $allow_messages_following,
                              $allow_messages_followers,
                              $allow_messages_everyone)";
            $results = $db->query($query);

            return $results;
        }

        private function insertUser($username, $type, $signup_date, $level){
            global $db;

            $avatar = 'avatars/default-avatar.jpg';

            $query = "INSERT INTO members(username, type, signup_date, level, avatar) 
                        VALUES('$username', '$type', '$signup_date', '$level', '$avatar')";
            
            $db->query($query);
        }

        private function fetchUserId($username){

            $results = $this->getUserIdObject($username);

            $user_Id = $results->user_id;

            return $user_Id;
        }

        private function saveUserLoginDetails($username, $password, $user_Id, $type){
            global $db;

            $query = "INSERT INTO login(username, password, user_id, user_type) 
                          VALUES('$username', '$password', '$user_Id', '$type')";

            $results = $db->query($query);

            return $results;

        }

        private function getUserIdObject($username){
            global $db;

            $query = "SELECT user_id FROM members WHERE username = '$username'";

            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        public function registerPerson($user_Id, $first_name, $last_name, $bio){
            global $db;

            $query = "UPDATE members 
                      SET first_name = '$first_name', 
                          last_name = '$last_name', 
                          bio = '$bio' 
                      WHERE user_id = '$user_Id'";

            $results = $db->query($query);

            if($results){
                header("location: thank-you.php");
                exit();
            }
        }

        public function editPersonDetails($user_Id, $first_name, $last_name, $bio){
            global $db;

            $query = "UPDATE members 
                      SET first_name = '$first_name', 
                          last_name = '$last_name', 
                          bio = '$bio' 
                      WHERE user_id = '$user_Id'";

            $results = $db->query($query);

            if($results){
                $edit_success = TRUE;
            }

            return $edit_success;
        }
        

        /* ******************************************************************************************************************************
                    REGISTERING A COMPANY
        ********************************************************************************************************************************/

        private function companyVerificationCode($company_Id, $type){
            global $db;

            for($i = 0; $i < 5; $i++){
                $a .= mt_rand(0,9);
            }

            $code = $a;
            $status = 0;

            $query = "INSERT INTO verification(verification_status, verification_code, user_id, user_type)
                             VALUES('$status', '$code', '$company_Id', '$type')";
            $db->query($query);
        }

        private function addToChatsOnlineStatusCompany($company_Id){
            $time = time();
            $user_type = '2';
            $this->saveToChatsOnlineStatus($user_Id, $user_type, $time);
        }

        public function basicCompanyRegistration($username, $password, $type, $signup_date, $level){

            $this->insertCompany($username, $type, $signup_date, $level);

            $company_Id = $this->fetchCompanyId($username);

            $this->companyVerificationCode($company_Id, $type);

            $save_user_details = $this->saveCompanyLoginDetails($username, $password, $company_Id, $type);
            $save_messages_privacy = $this->registerCompanyMessagesPrivacySettings($company_Id, $type);
            $save_chats_online_status = $this->addToChatsOnlineStatusCompany($company_Id);

            if(!empty($save_user_details) && !empty($save_messages_privacy)){
                session_regenerate_id;

                $_SESSION['SESS_COMPANY_ID'] = $company_Id;
                $_SESSION['SESS_TYPE'] = $type;

                session_write_close();
                header("location: signup-company.php");
                exit();
            }

            else {
		        die("Query failed");
	        }
        }

        private function registerCompanyMessagesPrivacySettings($company_Id, $type){
            global $db;

            $allow_messages = '1';
            $allow_messages_following = '1';
            $allow_messages_followers = '1';
            $allow_messages_everyone = '0';

            $query = "INSERT INTO privacy_messages(user_id, 
                                                   user_type, 
                                                   allow_messages, 
                                                   allow_messages_following, 
                                                   allow_messages_followers,
                                                   allow_messages_everyone)
                      VALUES ($company_Id,
                              $type,
                              $allow_messages,
                              $allow_messages_following,
                              $allow_messages_followers,
                              $allow_messages_everyone)";
            $results = $db->query($query);

            return $results;
        }

        private function insertCompany($username, $type, $signup_date, $level){
            global $db;

            $logo = 'logos/default-logo.jpg';

            $query = "INSERT INTO companies(username, type, signup_date, level, logo) 
                        VALUES('$username', '$type', '$signup_date', '$level', '$logo')";
            
            $db->query($query);
        }

        private function fetchCompanyId($username){

            $results = $this->getCompanyIdObject($username);

            $company_Id = $results->company_id;

            return $company_Id;
        }

        private function saveCompanyLoginDetails($username, $password, $company_Id, $type){
            global $db;

            $query = "INSERT INTO login(username, password, user_id, user_type) 
                          VALUES('$username', '$password', '$company_Id', '$type')";

            $results = $db->query($query);

            return $results;
        }

        private function getCompanyIdObject($username){
            global $db;

            $query = "SELECT company_id FROM companies WHERE username = '$username'";

            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        public function registerCompany($company_Id, $name, $companyBio){
            global $db;

            $query = "UPDATE companies 
                      SET name = '$name', 
                          bio = '$companyBio'
                      WHERE company_id = '$company_Id'";

            $results = $db->query($query);

            if($results){
                header("location: thank-you.php");
                exit();
            }
        }

        public function editCompanyDetails($company_Id, $name, $companyBio){
            global $db;

            $query = "UPDATE companies 
                      SET name = '$name', 
                          bio = '$companyBio' 
                      WHERE company_id = '$company_Id'";

            $results = $db->query($query);

            if($results){
                $edit_success = TRUE;
            }

            return $edit_success;
        }
        
    }
?>