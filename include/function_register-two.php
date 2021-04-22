<?php
    // STARTING SESSIONS
    session_start();

    // INCLUDED REGISTRATION CLASS
    include 'class_registration.php';

    // DECLARING TYPE VARIABLE TO DETERMINE WEITHER ITS AN INDIVIDUAL OR COMPANY WHO IS REGISTERING
    $type = $_SESSION['SESS_TYPE'];

    // INDIVIDUAL VARIABLES
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $avatar = $_POST['avatar'];
    $bio = $_POST['bio'];
    $location = $_POST['location'];
    $url = $_POST['url'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // COMPANY VARIABLES
    $name = $_POST['name'];
    $logo = $_POST['logo'];
    $companyBio = $_POST['companyBio'];
    $companyLocation = $_POST['companyLocation'];
    $website = $_POST['website'];
    $companyPhone = $_POST['companyPhone'];
    $companyEmail = $_POST['companyEmail'];

    // INDIVICUAL REGISTRATION
    if($type == 1){

        // DECLARING ID VARIABLE FOR AN INDIVIDUAL
        $user_Id = $_SESSION['SESS_MEMBER_ID'];

        $avatar_query = "SELECT avatar 
                            FROM members
                            WHERE user_id = '$user_Id'";
        $avatar_results = $db->query($avatar_query);
        if($db->num_rows($avatar_results) < 1){
            $avatar = 'avatars/user-default-pic.jpg';
        }

        $registerPerson = new registration();
        $registerPerson->registerPerson($user_Id, $first_name, $last_name, $bio, $location, $url, $phone, $email, $avatar);
    }

    // COMPANY REGISTRATION
    if($type == 2){

        // DECLARING ID VARIABLE FOR A COMPANY
        $company_Id = $_SESSION['SESS_COMPANY_ID'];

        $registerCompany = new registration();
        $registerCompany->registerCompany($company_Id, $name, $companyBio, $companyLocation, $website, $companyPhone, $companyEmail);
    }
?>
