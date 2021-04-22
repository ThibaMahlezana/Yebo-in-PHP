<?php
/*   USER CLASS   */
    require '/class_email.php';
    include '/../lib/mymobileapi_http/class.sms.php';

    $SmsMessage = new MyMobileAPI();
  
    class user extends moduleUser{
        // VARIABLES

        private $username;
        private $name;
        private $lastName;
        private $photo;
        private $bio;
        private $phone;
        private $email;

        private $signup_date;

        private $num_of_photos;
        private $daysLeft;
        private $expireDate;
        private $verification_status;
        private $verifying_method;

       // METHODS
/*********************************************************************************************************************************
        retrieving user and compan's information, private methods
**********************************************************************************************************************************/
        private function getLogoOject(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();

            $query = "SELECT logo 
                      FROM companies 
                      WHERE company_id = $user_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        private function getAvatarOject(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();

            $query = "SELECT avatar 
                      FROM members 
                      WHERE user_id = $user_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        private function getUserObject(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();

            $query = "SELECT username, 
                             first_name, 
                             last_name, 
                             avatar, 
                             bio, 
                             phone, 
                             email, 
                             signup_date
                      FROM members
                      WHERE user_id = '$user_id'";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        private function getCompanyObject(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();

            $query = "SELECT username, 
                      name, 
                      bio, 
                      phone, 
                      email, 
                      signup_date
                      FROM companies
                      WHERE company_id = $user_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }

            return $results[0];
        }

        private function accountInfo(){
            global $db;
            global $user_identity;

            $user_type = $user_identity->getLoggedUserType();

            // retrieving person's information
            if($user_type == 1){

                $avatar = $this->getAvatarOject();
                $this->photo = $avatar->avatar;

                $info = $this->getUserObject();
                $this->username = $info->username;
                $this->name = $info->first_name;
                $this->lastName = $info->last_name;
                $this->bio = $info->bio;
                $this->location = $info->location;
                $this->url = $info->url;
                $this->phone = $info->phone;
                $this->email = $info->email;
                $this->signup_date = $info->signup_date;
            }

            // retrieving company's information
            if($user_type == 2){

                $logo = $this->getLogoOject();
                $this->photo = $logo->logo;

                $info = $this->getCompanyObject();
                $this->username = $info->username;
                $this->name = $info->name;
                $this->bio = $info->bio;
                $this->phone = $info->phone;
                $this->email = $info->email;
                $this->signup_date = $info->signup_date;
            }

        }



/*********************************************************************************************************************************
        retrieving user and compan's relation information, private methods
**********************************************************************************************************************************/
        private function userFollowers(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM follows 
                      WHERE followed_id = $user_id 
                      AND followed_type = $user_type ";
            $result = $db->query($query);
            return $result;
        }

        private function userFollowing(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM follows 
                      WHERE following_id = $user_id 
                      AND following_type = $user_type ";
            $result = $db->query($query);
            return $result;
        }

        private function numberFollowers(){
            global $db;
            
            $results = $this->userFollowers();
            $num_followers = $db->num_rows($results);
            return $num_followers;            
        }

        private function numberFollowing(){
            global $db;
            
            $results = $this->userFollowing();
            $num_following = $db->num_rows($results);
            return $num_following;            
        }

        private function userFollowingPeople(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM follows 
                      WHERE following_id = $user_id
                      AND following_type = $user_type
                      AND followed_type = 1";
            $result = $db->query($query);
            return $result;
        }

        private function numFollowingPeople(){
            global $db;

            $user_following_people = $this->userFollowingPeople();
            $num_following_people = $db->num_rows($user_following_people);
            return $num_following_people;
        }

        private function userFollowersPeople(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM follows
                      WHERE followed_id = $user_id 
                      AND followed_type = $user_type
                      AND following_type = 1";
            $result = $db->query($query);
            return $result;
        }

        private function numFollowersPeople(){
            global $db;

            $user_followers_people = $this->userFollowersPeople();
            $num_followers_people = $db->num_rows($user_followers_people);
            return $num_followers_people;
        }

        private function userFollowingCompanies(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM follows 
                      WHERE following_id = $user_id
                      AND following_type = $user_type
                      AND followed_type = 2";
            $result = $db->query($query);
            return $result;

        }

        private function numFollowingCompanies(){
            global $db;

            $user_following_companies = $this->userFollowingCompanies();
            $num_following_companies = $db->num_rows($user_following_companies);
            return $num_following_companies;
        }

        private function userFollowersCompanies(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM follows
                      WHERE followed_id = $user_id 
                      AND followed_type = $user_type
                      AND following_type = 2";
            $result = $db->query($query);
            return $result;
        }

        private function numFollowersCompanies(){
            global $db;

            $user_followers_companies = $this->userFollowersCompanies();
            $num_followers_companies = $db->num_rows($user_followers_companies);
            return $num_followers_companies;
        }


/*********************************************************************************************************************************
        retrieving posts information, private methods
**********************************************************************************************************************************/
        private function numQuotePosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_quotes
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);
            $num_quote_posts = $db->num_rows($result);

            return $num_quote_posts;
        }

        private function numThoughtPosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_thoughts
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);
            $num_thought_posts = $db->num_rows($result);

            return $num_thought_posts;
        }

        private function numImagePosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_images
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);
            $num_image_posts = $db->num_rows($result);

            return $num_image_posts;
        }

        private function numVideoPosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_videos
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);
            $num_video_posts = $db->num_rows($result);

            return $num_video_posts;
        }

        private function numLinkPosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_links
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);
            $num_link_posts = $db->num_rows($result);

            return $num_link_posts;
        }

        private function numNormalPosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_normal
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);
            $num_normal_posts = $db->num_rows($result);

            return $num_normal_posts;
        }

        private function numTopicPosts(){
            global $db;
            global $user_identity;

            $user_id = $user_identity->getLoggedUserId();
            $user_type = $user_identity->getLoggedUserType();

            $query = "SELECT * 
                      FROM post_topic
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
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


/*********************************************************************************************************************************
        user's subscription, private methods
**********************************************************************************************************************************/

        private function subscriptionPeriod(){
            $this->accountInfo();

            $joined_date = $this->signup_date;
            $expiry_date = strtotime('+60 days', $joined_date);

            $num_day = abs($expiry_date - time());
            $num_days_left = intval($num_day/86400);

            $this->expireDate = $expiry_date;
            $this->daysLeft = $num_days_left;

            
        }

        private function verificationStatus(){
            $verification_info = $this->getVerificationObject();
            $verification_status = $verification_info->verification_status;

            return $verification_status;
        }

        private function verification(){
            $verify  = $this->verificationStatus();
            $this->verification_status = $verify->verification_status;
        }

        private function verifyingMethod(){
            $this->accountInfo();

            if($this->email != ''){
                $this->verifying_method = 'Email';
            }
            elseif($this->phone != ''){
                $this->verifying_method = 'Phone';
            }
            else{
                $this->verifying_method = 'None';
            }
        }

        private function getVerificationObject(){
            global $db;

            $user_id = $this->getLoggedUserId();
            $user_type = $this->getLoggedUserType();

            $query = "SELECT *
                      FROM verification
                      WHERE user_id = $user_id
                      AND user_type = $user_type";
            $result = $db->query($query);

            //while($obj = $result->fetch_object()){
            //    $results[] = $obj;
            //}

            return $result;
        }

        public function sendVerificationCode(){
            global $email_info;
            global $SmsMessage;

            $this->verifyingMethod();
            $this->accountInfo();

            $verifying_code = $this->getVerificationObject();
            
            if($this->verifying_method = 'Email'){
                
                $recipient_address = $this->email;
                $recipient_name = $this->name;
                $subject = 'Verify your aypage Account';
                $body = "Hello " .$this->name. "\nThank you for joining aypage. \nHere is your verification code : " .$verifying_code->verification_code;
                $alt_body = "Hello " .$this->name. "\nThank you for joining aypage. \nHere is your verification code : " .$verifying_code->verification_code;

                $error_message = $email_info->sendEmail($recipient_address, $recipient_name, $subject, $body, $alt_body);
                return $error_message;

            }

            if($this->verifying_method = 'Phone'){
                $phone_num = $this->phone;
                $message = "Hello " .$this->name. "Thank you for joining aypage. Here is your verification code : " .$verifying_code->verification_code;

                $error_message = $SmsMessage->sendSms($phone_num, $message);
                return $error_message;
            }
        }

        public function verifyAccount($code){
            global $db;

            $this->getLoggedUserId();
            $identity = $this->loggedUserId;

            $type = $_SESSION['SESS_TYPE'];

            $verif_code = $this->getVerificationObject();
            $verif_message = '';

            if($verif_code->verification_code == $code){
                $verif_message = 1;

                $query = "UPDATE verification
                          SET verification_status = 1
                          WHERE user = '$identity'
                          AND user_type = '$type'";
                $db->query($query);
            }
            else{
                $verif_message = 0;
            }

            return $verif_message;
        }

        private function editEmail($email){
            global $db;

            $this->getLoggedUserId();
            $identity = $this->loggedUserId;

            $type = $_SESSION['SESS_TYPE'];

            if($type == 1){
                $query = "UPDATE members
                          SET email = '$email'
                          WHERE user_id = '$identity'";
                $db->query($query);
            }

            if($type == 2){
                $query = "UPDATE companies
                          SET email = '$email'
                          WHERE company_id = '$identity'";
                $db->query($query);
            }
        }

        private function editPhone($phone){
            global $db;

            $this->getLoggedUserId();
            $identity = $this->loggedUserId;

            $type = $_SESSION['SESS_TYPE'];

            if($type == 1){
                $query = "UPDATE members
                          SET phone = '$phone'
                          WHERE user_id = '$identity'";
                $db->query($query);
            }

            if($type == 2){
                $query = "UPDATE companies
                          SET phone = '$phone'
                          WHERE company_id = '$identity'";
                $db->query($query);
            }
        }

/*********************************************************************************************************************************
        user followers and followings
**********************************************************************************************************************************/
        private function loadUserInfo($user_id){
            global $db;

            $query = "SELECT *
                      FROM members
                      WHERE user_id = $user_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }

        private function loadCompanyInfo($company_id){
            global $db;

            $query = "SELECT *
                      FROM companies
                      WHERE company_id = $company_id";
            $result = $db->query($query);
            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            return $results[0];
        }

        private function userFollowersObject(){

            $followers_results = $this->userFollowers();
            while($obj = $followers_results->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        private function userFollowingObject(){

            $following_results = $this->userFollowing();

            while($obj = $following_results->fetch_object()){
                $results[] = $obj;
            }
            return $results;
        }

        public function displayUserFollowers(){
            $user_followers_array = $this->userFollowersObject();
            
            foreach($user_followers_array as $followers_array){
                $following_id = $followers_array->following_id;
                $following_type = $followers_array->following_type;

                if($following_type == 1){

                    $user_info = $this->loadUserInfo($following_id);

                    echo '
                        <p><img alt="profile-photo" src="'.$user_info->avatar.'"/> 
                            <span>'.$user_info->first_name.' '.$user_info->last_name.'</span> @'.$user_info->username.' 
                            <i class="flaticon-user77"></i>
                            <a class="pull-right"><i class="flaticon-speech59"></i> 2100</a>
                        </p>
                    ';
                }

                if($following_type == 2){

                    $company_info = $this->loadCompanyInfo($following_id);

                    echo '
                        <p><img alt="profile-photo" src="'.$company_info->logo.'"/> 
                            <span>'.$company_info->name.'</span> @'.$company_info->username.' 
                            <i class="flaticon-building8"></i>
                            <a class="pull-right"><i class="flaticon-speech59"></i> 2100</a>
                        </p>
                    ';
                }

            }
        }

        public function displayUserFollowing(){
            $user_following_array = $this->userFollowingObject();

            foreach($user_following_array as $following_array){
                $followed_id = $following_array->followed_id;
                $followed_type = $following_array->followed_type;

                if($followed_type == 1){
                    $user_info = $this->loadUserInfo($followed_id);
                    echo '
                        <p><img alt="profile-photo" src="'.$user_info->avatar.'"/> 
                            <span>'.$user_info->first_name.' '.$user_info->last_name.'</span> @'.$user_info->username.' 
                            <i class="flaticon-user77"></i>
                            <a class="pull-right"><i class="flaticon-speech59"></i> 2100</a>
                        </p>
                    ';
                }

                if($followed_type == 2){
                    $company_info = $this->loadCompanyInfo($followed_id);
                    echo '
                        <p><img alt="profile-photo" src="'.$company_info->logo.'"/> 
                            <span>'.$company_info->name.'</span> @'.$company_info->username.'
                            <i class="flaticon-building8"></i>
                            <a class="pull-right"><i class="flaticon-speech59"></i> 2100</a>
                        </p>
                    ';
                }

            }
        }


/*********************************************************************************************************************************
        public methods
**********************************************************************************************************************************/

        public function getTotalNumPosts(){
            $total_num_posts = $this->totalNumPosts();
            return $total_num_posts;
        }

        public function getUserFollowers(){
            $this->userFollowers();
            return $this->user_followers;
        }

        public function getNumberFollowers(){
            $num_followers = $this->numberFollowers();
            return $num_followers;
        }

        public function getNumFollowersPeople(){
            $num_followers_people = $this->numFollowersPeople();
            return $num_followers_people;
        }

        public function getUserFollowing(){
            $num_following = $this->numberFollowing();
            return $num_following;
        }

        public function getNumFollowingPeople(){
            $num_following_people = $this->numFollowingPeople();
            return $num_following_people;
        }

        public function getNumFollowersCompanies(){
            $num_followers_companies = $this->numFollowersCompanies();
            return $num_followers_companies;
        }

        public function getNumberFollowing(){
            $num_following = $this->numberFollowing();
            return $num_following;
        }

        public function getPassedUserId(){
            $this->accountInfo($f_loggedUserId);
        }

        public function getUsername(){
           $this->accountInfo();
            return $this->username;
        }

        public function getLastName(){
           $this->accountInfo();
            return $this->lastName;
        }

        public function getName(){
           $this->accountInfo();
            return $this->name;
        }

        public function getPhoto(){
           $this->accountInfo();
            return $this->photo;
        }

        public function getBio(){
           $this->accountInfo();
            return $this->bio;
        }

        public function getPhone(){
           $this->accountInfo();
            return $this->phone;
        }

        public function getEmail(){
           $this->accountInfo();
            return $this->email;
        }

        public function getSignupDate(){
           $this->accountInfo();
           return $this->signup_date;
        }

        public function getDaysLeft(){
            $this->subscriptionPeriod();
            return $this->daysLeft;
        }

        public function getExpireDate(){
            $this->subscriptionPeriod();
            return $this->expireDate;
        }

        public function getVerificationStatus(){
            $this->verificationStatus();
        }

        public function getVerifyingMethod(){
            $this->verifyingMethod();
            return $this->verifying_method;
        }

        public function verifEditEmail($email){
            $this->editEmail($email);
        }

        public function verifEditPhone($phone){
            $this->editPhone($phone);
        }
    }
?>