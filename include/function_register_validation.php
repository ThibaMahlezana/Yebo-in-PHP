<?php
    // DATABASE OBJECT
    $db = new database;

    // REGISTRATION OBJECT
    $registerUser = new registration;

    if(!empty($_POST)){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        $type = $_POST['type'];

        // STANDARD VARIABLES
        $signup_date = time();
        $level = 1;
        $verification = 0;
        $timezone = "MD+2";

        $error = array();

        if(empty($username)){
            $error[] = 'username field is empty!';
        }
        elseif(strlen($username) < 2){
            $error[] = 'username too short';
        }

        if(empty($password)){
            $error[] = 'password field is empty';
        }
        elseif(strlen($password) < 6){
            $error[] = 'password too short (min 6 characters)';
        }

        if(empty($rpassword)){
            $error[] = 'repeat password field is empty';
        }
        elseif(strlen($rpassword) < 6){
            $error[] = 'repeat password too short (min 6 characters)';
        }

        if($password !== $rpassword){
            $error[] = 'password do not match';
        }

        if(empty($type)){
            $error[] = 'you did not select any option';
        }

        else{
            if((!empty($username)) 
                && (!strlen($username) < 2) 
                && (!empty($password)) 
                && (!strlen($rpassword) < 6) 
                && (!empty($rpassword)) 
                && (!strlen($rpassword) < 6) 
                && ($password == $rpassword) 
                && (!empty($type))){
                        $is_username_exist = searchUsername($username);
                        $username_exist_status = $is_username_exist->num_rows;

                        if($username_exist_status == 1){
                            $error[] = 'sorry, username already exists try a different one';
                        }

                        if($username_exist_status == 0){
                            if($type == 'individual'){
                                $user_info = searchUsernameFromMembers($username);
                                $user_info_status = $user_info->num_rows;

                                if($user_info_status == 1){
                                    $error[] = 'sorry, username already exists try a different one';
                                }
                                if($user_info_status == 0){
                                    $type = 1;
                                    $en_password = sha1($password);
                                    $registerUser->basicUserRegistration($username, $en_password, $type, $signup_date, $level);
                                }
                            }

                            if($type == 'company'){
                                $company_info = searchUsernameFromCompanies($username);
                                $company_info_status = $company_info->num_rows;
                                
                                if($company_info_status == 1){
                                    $error[] = 'sorry, username already exists try a different one';
                                }
                                if($company_info_status == 0){
                                    $type = 2;
                                    $en_password = sha1($password);
                                    $registerUser->basicCompanyRegistration($username, $en_password, $type, $signup_date, $level);
                                }
                            }
                        }
                }
        }
    }

    function searchUsername($username){
        global $db;

        $query = "SELECT username FROM login WHERE BINARY username = '$username'";
        $results = $db->query($query);

        return $results;
    }

    function searchUsernameFromMembers($username){
        global $db;

        $query = "SELECT username FROM members WHERE BINARY username = '$username'";
        $results = $db->query($query);

        return $results;
    }

    function searchUsernameFromCompanies($username){
        global $db;

        $query = "SELECT username FROM companies WHERE username = '$username'";
        $results = $db->query($query);

        return $results;
    }

?>

 