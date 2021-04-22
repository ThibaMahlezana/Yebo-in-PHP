<?php
    
    require '/class_database.php';
    require '/class_email.php';
    require '/../lib/mymobileapi_http/class.sms.php';

    $db = new database;
    $sms_message = new MyMobileAPI();

    class recoverPassword{
        
        private $user_exists;

        private function checkUsername($username){
            global $db;

            $query = "SELECT username
                      FROM login 
                      WHERE username = '$username'";
            $result = $db->query($query);

            if($db->num_rows($result) > 0){
                $this->user_exists = 1;
            }
            else{
                $this->user_exists = 0;
            }
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

        private function changePassword($username){
            global $db;

            $password = $this->generatePassword();
            $en_password = sha1($password);

            $query = "UPDATE login
                      SET password = '$en_password'
                      WHERE username = '$username'";
            $db->query($query);
        }

        private function getUserBasicInfo($username){
            global $db;

            $query = "SELECT type, id
                      FROM login
                      WHERE username = '$username'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        private function getUserObject($username){
            global $db;

            $user_info = $this->getUserBasicInfo($username);
            $type = $user_info->type;
            $identity = $user_info->id;

            if($type == 1){
                $query = "SELECT email, phone, first_name
                          FROM members
                          WHERE user_id = '$identity'";
                $result = $db->query($query);
                while($obj = $result->fetch_object()){
                    $results[] = $obj;
                }

                return $results[0];
            }

            if($type == 2){
                $query = "SELECT email, phone, name
                          FROM companies
                          WHERE company_id = '$identity'";
                $result = $db->query($query);
                while($obj = $result->fetch_object()){
                    $results[] = $obj;
                }

                return $results[0];
            }
        }

        public function verifyingMethod($username){

            $user_object = $this->getUserObject($username);
            $email = $user_object->email;
            $phone = $user_object->phone;

            if($email != ''){
                $verifying_method = 'Email';
            }

            elseif($phone != ''){
                $verifying_method = 'Phone';
            }

            else{
                $verifying_method = 'None';
            }

            return $verifying_method;
        }

        public function recoverPassword($username){
            global $sms_message;
            global $email_info;

            $this->checkUsername($username);

            if($this->user_exists == 1){

                $password = $this->generatePassword($username);
                $this->changePassword($username);
                $verifying_method = $this->verifyingMethod($username);
                $user_info = $this->getUserObject($username);
                
                $mail = $user_info->email;
                $phone = $user_info->phone;
                $name = $user_info->name.$user_info->first_name;


                if($verifying_method == 'Email'){

                    $recipient_address = $email;
                    $recipient_name = $name;
                    $subject = "aypage password recovery";
                    $body = "HELLO :) " .$name." \nhere is your new Password : ".$password;
                    $alt_body = "HELLO :) " .$name." \nhere is your new Password : ".$password;

                    $status_message = $email_info->sendEmail($recipient_address, $recipient_name, $subject, $body, $alt_body);
                    return $status_message;
                }

                if($verifying_method == 'Phone'){
                    $message = "HELLO :) " .$name." here is your new Password : ".$password;
                    $status_message = $sms_message->sendSms($phone, $message);
                    return $status_message;
                }
            }
            elseif($this->user_exists == 0){
                $status_message = 'username does not exist';
                return $status_message;
            }
        }

        public function getUsernameStatus($username){
            $this->checkUsername($username);
            return $this->user_exists;
        }

    }
    
?>
