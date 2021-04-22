<?php
    // DATABASE OBJECT
    $db = new database;

    $is_user_known = FALSE;

    // CHECKS IF THERE ARE POST VARIABLES
    if(!empty($_POST)){

        // POST VARIABLES FROM THE FORM
        $username = $_POST['username'];
        $password = $_POST['password'];

        // VALIDATION ERROR MESSAGES
        $error = array();

        // CHECKS IF USERNAME IS AVAILABLE IF NOT IT WRITES ERROR MESSAGE
        if($username == ''){
            $error[] = 'username field empty!';
        }

        // CHECKS IF USERNAME'S LENGTH IS 3 AND MORE CHARACTERS IF NOT IT WRITES ERROR MESSAGE
        elseif(strlen($username) < 2){
            $error[] = 'username too short!';
        }

        // CHECKS IF PASSWORD IS AVAILABLE IF NOT IT WRITES ERROR MESSAGE
        if($password == ''){
            $error[] = 'password field empty!';
        }

        // CHECKS IF PASSWORD'S LENGTH IS 6 AND MORE CHARACTERS IF NOT IT WRITES ERROR MESSAGE
        elseif(strlen($password) < 6){
            $error[] = 'password too short!';
        }

        // THEN IF NOTHING IS WRONG WITH THE FORM VARIABLES
        else{
            // CHECKS IF THE PROVIDED USERNAME DOES EXISTS OR NOT
            $query = "SELECT username FROM login WHERE BINARY username = '$username'";
            $results = $db->query($query);

            // IF THE USERNAME PROVIDED DOES NOT EXIST AND WRITE ERROR MESSSAGE
            if($db->num_rows($results) < 1){
               $error[] = 'username does not exist';
            }

            // IF THEN A PROVIDED USERNAME EXISTS 
            if($db->num_rows($results) == 1){
                // A BOOLEAN VARIABLE TO DISPLAY A LOGIN FORM ALREADY POPULATED WITH USER'S INFORMATION
                $is_user_known = TRUE;

                // QUERY FOR A USER'S ID AND TYPE FROM LOGIN TABLE
                $log_query = "SELECT user_id, user_type 
                              FROM login 
                              WHERE username = '$username'";
                // RUNNING THE QUERY
                $log_result = $db->query($log_query);

                // FETCHING USER'S INFORMATION
                $log_results = $db->fetch_array($log_result);

                // PULLING THE USER'S INFORMATION
                $user_id = $log_results["user_id"];
                $user_type = $log_results["user_type"];

                // IF A USER IS AN INDIVIDUAL QUERY FOR INFORMATION IN MEMBERS TABLE
                if($user_type == 1){
                    
                    $user_query = "SELECT first_name, last_name, avatar 
                                   FROM members 
                                   WHERE user_id = '$user_id'";

                    $user_result = $db->query($user_query);
                    $user_info = $user_result->fetch_assoc();

                    $user_firstname = $user_info["first_name"];
                    $user_last_name = $user_info["last_name"];

                    $log_name = $user_firstname.' '.$user_last_name;
                    $log_photo = $user_info["avatar"];
                }

                // IF A USER IS A COMPANY QUERY FOR INFORMATION IN THE COMPANY'S TABLE
                if($user_type == 2){

                    $comp_query = "SELECT name, logo 
                                   FROM companies
                                   WHERE company_id = '$user_id'";
                    $company_result = $db->query($comp_query);
                    $company_info = $company_result->fetch_assoc();

                    $log_name = $company_info["name"];
                    $log_photo = $company_info["logo"];
                }

                // IF A USER IS AN ADMIN QUERY FOR INFORMATION IN ADMIN TABLE
                if($user_type == 0){
                    $admin_query = "SELECT first_name, last_name, username, avatar
                                    FROM admin 
                                    WHERE admin_id = '$user_id'";
                    $admin_result = $db->query($admin_query);
                    $admin_info = $admin_result->fetch_assoc();

                    $log_name = $admin_info["username"];
                    $log_photo = $admin_info["avatar"];
                }

                // ENCRYPTING PASSWORD VARIABLE
                $en_password = sha1($password);

                // CHECKS IF THE USERNAME AND PASSWORD PROVIDED MATCHES WITH ONES IN THE LOGIN TABLE
                $auth_query = "SELECT username 
                               FROM login 
                               WHERE username = '$username'
                               AND password = '$en_password'";
                // RUNNING THE QUERY
                $auth_results = $db->query($auth_query);

                // IF THE PASSWORD AND USERNAME DOES NOT MATCH AND WRITES ERROR MESSAGE
                if($db->num_rows($auth_results) < 1){

                    $error[] = 'password incorrect';
                }

                // IF THE USERNAME AND PASSWORD MATCHES THEN FORWARD THE USER TO LOGIN CLASS
                else{
                    // LOG IN CLASS OBJECT
                    $login = new login;
                    // AUTHENTICATING METHOD IN LOGIN CLASS
                    $login->normalLogin($username, $en_password);
                }
            }

        }

    }
?>
