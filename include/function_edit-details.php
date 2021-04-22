<?php
    // START SESSIONS
    session_start();

    if(!empty($_POST)){
        // ICLUDED REGISTRATION CLASS FILE
        include 'class_registration.php';

        // DECLARING TYPE VARIABLE TO DETERMINE WEITHER ITS COMPANY OR PERSON
        $type = $_SESSION['SESS_TYPE'];

        // EDITING AN INDIVIDUAL INFORMATION
        if($type == 1){
            // DECLARING ID VARIABLE FOR AN INDIVIDUAL
            $user_Id = $_SESSION['SESS_MEMBER_ID'];

            // INDIVIDUAL VARIABLES
            $first_name = $_POST['firstName'];
            $last_name = $_POST['lastName'];
            //$avatar = $_POST['avatar'];
            $bio = $_POST['bio'];

            // VALIDATING 

            if($first_name == ''){
                $error[] = 'first name field is empty!';
            }

            elseif(strlen($first_name) < 4){
                $error[] = 'first name too short!';
            }

            if($last_name == ''){
                $error[] = 'last name field is empty!';
            }
            elseif(strlen($last_name) < 4){
                $error[] = 'last name too short';
            }

            if($bio == ''){
                $error[] = 'bio field is empty!';
            }
            elseif(strlen($bio) < 1){
                $error[] = 'bio is too short';
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
                    header("location: thank-you.php");
                    exit();
                }
            } 

        }

        // editing details for a company
        if($type == 2){
            // DECLARING ID VARIABLE FOR A COMPANY
            $company_Id = $_SESSION['SESS_COMPANY_ID'];

            // COMPANY VARIABLES
            $name = $_POST['name'];
            //$logo = $_POST['logo'];
            $companyBio = $_POST['companyBio'];

            // VALIDATING
            if($name == ''){
                $error[] = 'name field is empty!';
            }

            elseif(strlen($name) < 4){
                $error[] = 'name too short!';
            }

            if($companyBio == ''){
                $error[] = 'bio field is empty!';
            }
            elseif(strlen($companyBio) < 1){
                $error[] = 'bio is too short';
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
                    header("location: thank-you.php");
                    exit();
                }
            } 
         }
    }

?>
