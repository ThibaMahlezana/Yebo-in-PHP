<?php
    if(!empty($_POST)){

        $error = array();

        $type = $_SESSION['SESS_TYPE'];

        if($type == 1){

            // INDIVIDUAL VARIABLES
            $first_name = $_POST['firstName'];
            $last_name = $_POST['lastName'];
            $bio = $_POST['bio'];

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

            else{
                // DECLARING ID VARIABLE FOR AN INDIVIDUAL
                $user_Id = $_SESSION['SESS_MEMBER_ID'];

                $registerPerson = new registration;
                $registerPerson->registerPerson($user_Id, $first_name, $last_name, $bio);
            } 

        }

        if($type == 2){

            // COMPANY VARIABLES
            $name = $_POST['name'];
            $companyBio = $_POST['companyBio'];

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

            else{
                // DECLARING ID VARIABLE FOR AN INDIVIDUAL
                $company_Id = $_SESSION['SESS_COMPANY_ID'];

                $registerCompany = new registration();
                $registerCompany->registerCompany($company_Id, $name, $companyBio);
            } 

        }
    }

?>
