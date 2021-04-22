<?php
    // INCLUDED FILES
    require_once 'class_database.php';
    require 'class_registration.php';
    
    // DATABASE OBJECT
    $db = new database;

    // REGISTRATION OBJECT
    $registerUser = new registration;
    
    // POST VARIABLES FROM THE FORM
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $type = $_POST['type'];

    // STANDARD VARIABLES
    $signup_date = time();
    $level = 1;
    $verification = 0;
    $timezone = "MD+2";
    
    // PHP VALIDATION
    // CHECKING OF USERNAME, PASSWORD AND REPEAT PASSWORD ARE NOT EMPTY
    if(!empty($username) && !empty($password) && !empty($rpassword) && !empty($type)){

        if((strlen($username) >= 2) && (strlen($password) >= 6) && (strlen($rpassword) >= 6)){

            if($password == $rpassword){

                // IF SOMEONE WHO IS REGISTERING IS AN INDIVIDUAL
                if($type == 'individual'){

                    // CHECKING FOR USERNAME DUPLICATES IN MEMBERS TABLE
                    $query = "SELECT username FROM members WHERE BINARY username = '$username'";
                    $results = $db->query($query);

                    // IF QUERY WAS SUCCESSFUL
                    if($results){

                        // IF A USERNAME ALREADY EXITS
                        if($db->num_rows($results) > 0){

                            // REDIRECTING THE USER TO SIGNUP PAGE
                            header("location: ../signup.php");
                            exit();
                        }

                        // IF USERNAME DOES NOT EXISTS, THEN REGISTER THAT USER
                        else{
                            // REGISTERING AN INDIVIDUAL  
                            // UPDATING $type VARIABLE 
                            $type = 1;
                            $en_password = sha1($password);
                            // REGISTRATION CLASS OBJECT
                            $registerUser->basicUserRegistration($username, $en_password, $type, $signup_date, $level, $verification, $timezone);
                        }
                    }
                } 

                // IF SOMEONE WHO IS REGISTERING, REGISTERS ON BEHALVE OF A COMPANY
                if($type ==  'company'){

                    // CHECKING FOR USERNAME DUPLICATES IN MEMBERS TABLE
                    $query = "SELECT username FROM companies WHERE BINARY username = '$username'";
                    $results = $db->query($query);

                    // IF QUERY WAS SUCCESSFUL
                    if($results){

                        // IF A USERNAME ALREADY EXITS
                        if($db->num_rows($results) > 0){

                            // REDIRECTING THE USER TO SIGNUP PAGE
                            header("location: ../signup.php");
                            exit();
                        }

                        // IF USERNAME DOES NOT EXISTS, THEN REGISTER THAT USER
                        else{
                            // REGISTERING A COMPANY
                            // UPDATING $type VARIABLE
                            $type = 2;
                            $en_password = sha1($password);
                            // REGISTRATION OBJECT
                            $registerUser->basicCompanyRegistration($username, $en_password, $type, $signup_date, $level, $verification, $timezone);
                        }
                    }
                }
            }
            else{
                // REDIRECTING THE USER TO SIGNUP PAGE
                header("location: ../signup.php");
                exit();
            }        
        }
        else{
            // REDIRECTING THE USER TO SIGNUP PAGE
            header("location: ../signup.php");
            exit();
        }        
    } 

    // IF ANY OF THE FIELDS IS EMPTY 
    else {
        // REDIRECT USER TO SIGN UP PAGE
        header("location: ../signup.php");
        exit();
    }
    
?>