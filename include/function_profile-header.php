<?php
    if(!empty($_POST)){
        // INCLUDING CLASS REGISTRATION FILE
        require_once 'include/class_registration.php';

        $form_type = $_POST['form_type'];

        // VERIFYING A USER'S ACCOUNT
        if($form_type == 'account_verification'){
            $submitButton = $_POST['submit'];
            $verify_button = $_POST['verify_button'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $verification_code = $_POST['code'];

            global $verification;

            if($submitButton != ''){
               $error_message = $verification->sendVerificationCode();

               if($f_verifying_method == 'Email'){
                    if($error_message != 'Message was sent'){
                        $validation_message = 'A code could not be sent, Please check your Email Address if it is correct.';
                    }
                    else{
                        $validation_message = 'An Email with a code was sent to you';
                    } 
               }

               if($f_verifying_method == 'Phone'){
                   if($error_message == 0){
                       $validation_message = 'A code could not be sent, Please check your Phone Number if it is correct.';
                   }
                   else{
                       $validation_message = 'An SMS with a code was sent to you';
                   }
               }
            }

            if($phone != '' || $email != ''){
                if($email != ''){
                    $verification->verifEditEmail($email);
                }
                elseif($phone != ''){
                    $verification->verifEditPhone($phone);
                }
            }

            if($verify_button != ''){
                $error_message = $verification->verifyAccount($verification_code);
                if($verification_code == ''){
                    $validation_message = 'Please provide verification code';
                }
                elseif($error_message == 1){
                    $validation_message = 'Your account has been verified';
                }
                else{
                    $validation_message = 'Your account could not be verified, you provided a wrong code';
                }
            }
        }

        // UPDATING USER'S INFORMATION
        if($form_type == 'edit-information'){
            $user_type = $user_identity->getLoggedUserType();

            // VALIDATING USER'S INFORMATION
            if($user_type == 1){
                // DECLARING ID VARIABLE FOR AN INDIVIDUAL
                $user_Id = $user_identity->getLoggedUserId();

                // INDIVIDUAL VARIABLES
                $first_name = $_POST['firstName'];
                $last_name = $_POST['lastName'];
                //$avatar = $_POST['avatar'];
                $bio = $_POST['bio'];

                // VALIDATING 

                if($first_name == ''){
                    $edit_info_alert_message[] = 'first name field is empty!';
                    $edit_info_alert_type = 'warning';
                }

                elseif(strlen($first_name) < 4){
                    $edit_info_alert_message[] = 'first name too short!';
                    $edit_info_alert_type = 'warning';
                }

                if($last_name == ''){
                    $edit_info_alert_message[] = 'last name field is empty!';
                    $edit_info_alert_type = 'warning';
                }
                elseif(strlen($last_name) < 4){
                    $edit_info_alert_message[] = 'last name too short';
                    $edit_info_alert_type = 'warning';
                }

                if($bio == ''){
                    $edit_info_alert_message[] = 'bio field is empty!';
                    $edit_info_alert_type = 'warning';
                }
                elseif(strlen($bio) < 1){
                    $edit_info_alert_message[] = 'bio is too short';
                    $edit_info_alert_type = 'warning';
                }

                if(($first_name !== '') &&
                   (strlen($first_name) > 4) &&
                   ($last_name !== '') &&
                   (strlen($last_name) > 4) &&
                   ($bio !== '') &&
                   (strlen($bio) > 1))
                {
                    /// UPDATING AN INDIVIDUAL'S INFORMATION
                    $editPerson = new registration();
                    $edit_success = $editPerson->editPersonDetails($user_Id, $first_name, $last_name, $bio);

                    if($edit_success == TRUE){
                        $edit_info_alert_message[] = 'Your profile information was updated successfuly.';
                        $edit_info_alert_type = 'information';
                    }
                } 
            }

            // VALIDATING COMPANY'S INFORMATION
            if($user_type == 2){
                // DECLARING ID VARIABLE FOR A COMPANY
                $company_Id = $user_identity->getLoggedUserId();

                // COMPANY VARIABLES
                $name = $_POST['name'];
                //$logo = $_POST['logo'];
                $companyBio = $_POST['companyBio'];

                // VALIDATING
                if($name == ''){
                    $edit_info_alert_message[] = 'name field is empty!';
                    $edit_info_alert_type = 'warning';
                }

                elseif(strlen($name) < 4){
                    $edit_info_alert_message[] = 'name too short!';
                    $edit_info_alert_type = 'warning';
                }

                if($companyBio == ''){
                    $edit_info_alert_message[] = 'bio field is empty!';
                    $edit_info_alert_type = 'warning';
                }
                elseif(strlen($companyBio) < 1){
                    $edit_info_alert_message[] = 'bio is too short';
                    $edit_info_alert_type = 'warning';
                }

                if(($name !== '') &&
                   (strlen($name) > 4) &&
                   ($companyBio !== '') &&
                   (strlen($companyBio) > 1))
                {
                    // UPDATING COMPANY'S INFORMATION
                    $editPerson = new registration();
                    $edit_success = $editPerson->editCompanyDetails($company_Id, $name, $companyBio);

                    if($edit_success == TRUE){
                        $edit_info_alert_message[] = 'Your profile information was updated successfuly.';
                        $edit_info_alert_type = 'information';
                    }
                } 
            }

        }
    }
?>
