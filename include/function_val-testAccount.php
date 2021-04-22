<?php
   
    include 'include/class_test-account.php';

    $test_account = new testAccount;

    if(!empty($_POST)){

        $validation_message = array();
        $email_phone = $_POST['email_phone'];
        $type = $_POST['type'];
        $validation_message = '';
        $test_method = '';
               
        if(empty($email_phone)){
            $validation_message[] = 'Please Key in Email or Phone';
        }
        if(empty($type)){
            $validation_message[] = 'Please select one of the options';
        }
        else{
            if(strlen($email_phone) < 2 && !empty($email_phone)){
                $validation_message[] = 'That is invalid';
            }
            else{
                if(substr($email_phone, 0, 1) == '+'){
                    $accepted_email_phone = substr($email_phone, 1);
                }
                if(substr($email_phone, 0, 1) != '+'){
                    $accepted_email_phone = $email_phone;
                }
                if(!filter_var($accepted_email_phone, FILTER_VALIDATE_INT) === FALSE){
                    $test_method = 'Phone';
                    if(strlen($accepted_email_phone) < 10){
                        $validation_message[] = 'That is an invalid Phone Number';
                    }
                    else{
                        // CREATE  TEST ACCOUNT
                        //$validation_message[] = 'That is a valid phone number';
                    }
                }
                else{
                    $test_method = 'Email';
                    if (!filter_var($accepted_email_phone, FILTER_VALIDATE_EMAIL) === false){
                        $validation_message[] = 'That is a valid email';
                    }
                    else{
                        // CREATE TEST ACCOUT
                        //$validation_message[] = 'That is not a valid email';
                    }
                }
            }
        }
    }
?>

