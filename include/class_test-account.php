<?php
    include 'class_database.php';
    require '/class_email.php';
    require '/../lib/mymobileapi_http/class.sms.php';

    $db = new database;
    $sms_message = new MyMobileAPI();

    class testAccount{
        //VARIABLES
        private $username;
        private $password;

        // METHODS
        private function generateUsername(){
            $characters = 'Test_User';
            for($i = 0; $i < 5; $i++){
                $code .= mt_rand(0,9);
            }
            $username = $characters.$code;
            return $username;
        }
        private function generatePassword(){
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $character_length = strlen($characters);
            $random_string = '';

            for($i = 0; $i < 3; $i++){
                $random_string .= $characters[mt_rand(0, $character_length -1)];
            }

            $lower_rand_string = substr(strtolower($random_string), -1);
            $final_string = substr($random_string, -2).$lower_rand_string;

            for($i = 0; $i < 5; $i++){
                $code .= mt_rand(0,9);
            }

            $new_password = $final_string.$code;
            return $new_password;
        }
        private function getUserInfomation($username){
            global $db;
            // GETTING USER'S INFORMATION (ID)
            $query = "SELECT user_id FROM members WHERE username = '$username'";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function getCompanyInfomation($username){
            global $db;
            // GETTING USER'S INFORMATION (ID)
            $query = "SELECT company_id FROM companies WHERE username = '$username'";
            $result = $db->query($query);

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }
        private function createBasicTestAccount($user_id, $username, $password, $user_type){
            global $db;

            // INSERTING TEST USER DATA TO LOGIN TABLE
            $basic_reg_query = "INSERT INTO login(username,
                                                  password,
                                                  id,
                                                  type)
                                        VALUES('$username',
                                               '$password',
                                               '$user_id',
                                               '$user_type')";
            $db->query($basic_reg_query);
        }
        private function isEmailorPhone($email_phone){
            if(!filter_var($accepted_email_phone, FILTER_VALIDATE_INT) === FALSE){
                $test_method = 'Phone';
            }
            else{
                $test_method = 'Email';
            }
            return $test_method;
        }
        private function sendTestAccontDetails(){
            
        }
        private function createTestAccount($type, $email_phone){
            global $db;

            if($type == 'Individual'){

                $username = $this->generateUsername();
                $password = $this->generatePassword();

                $test_method = $this->isEmailorPhone($email_phone);
                if($test_method == 'Phone'){
                    $email = '';
                    $phone = $email_phone;
                }
                elseif($test_method == 'Email'){
                    $email = $email_phone;
                    $phone = '';
                }

                $first_name = 'Name';
                $last_name = 'Surname';
                $bio = 'Hello there, I am just a test user';
                $avatar = 'avatars/default-pic.jpg';
                $location = 'My city';
                $website = 'www.mysite.com/';
                $signup_date = time();
                $verification = 0;
                $level = 3;
                $user_type = 1;
                $timezone = '';

                $query = "INSERT INTO members(username,
                                              first_name, 
                                              last_name, 
                                              bio, 
                                              avatar, 
                                              location, 
                                              email, 
                                              phone, 
                                              url, 
                                              signup_date, 
                                              verification, 
                                              level, 
                                              type,
                                              timezone)
                                 VALUES('$username',
                                        '$first_name', 
                                        '$last_name', 
                                        '$bio', 
                                        '$avatar',
                                        '$location',
                                        '$email',
                                        '$phone',
                                        '$website',
                                        '$signup_date',
                                        '$verification',
                                        '$level',
                                        '$user_type',
                                        '$timezone'
                                        )";
                $db->query($query);
                $results = $this->getUserInfomation($username);
                $user_id = $results->user_id;
                $this->createBasicTestAccount($user_id, $username, $password, $user_type);
            }

            if($type == 'Company'){
                
                $username = $this->generateUsername();
                $password = $this->generatePassword();

                $test_method = $this->isEmailorPhone($email_phone);
                if($test_method == 'Phone'){
                    $email = '';
                    $phone = $email_phone;
                }
                elseif($test_method == 'Email'){
                    $email = $email_phone;
                    $phone = '';
                }

                $name = 'Our company';
                $bio = 'Hello there, I am just a test user';
                $logo = 'avatars/default-pic.jpg';
                $location = 'Our Headquaters';
                $email = '';
                $phone = '';
                $website = 'www.ourwebsite.com/';
                $signup_date = time();
                $verification = 0;
                $level = 3;
                $user_type = 1;
                $timezone = '';

                $query = "INSERT INTO companies(username,
                                              name, 
                                              bio, 
                                              logo, 
                                              location, 
                                              email, 
                                              phone, 
                                              website, 
                                              signup_date, 
                                              verification, 
                                              level, 
                                              type,
                                              timezone)
                                 VALUES('$username',
                                        '$name', 
                                        '$bio', 
                                        '$logo',
                                        '$location',
                                        '$email',
                                        '$phone',
                                        '$website',
                                        '$signup_date',
                                        '$verification',
                                        '$level',
                                        '$user_type',
                                        '$timezone'
                                        )";
                $db->query($query);
                $results = $this->getCompanyInfomation($username);
                $company_id = $results->company_id;
                $this->createBasicTestAccount($company_id, $username, $password, $user_type);
            }
        }
        public function registerTestAccount($type, $email_phone){
            $this->createTestAccount($type, $email_phone);
        }
    }
?>