<?php
    // STARTING SESSIONS
    session_start();

    // INCLUDED FILES
    require_once('config.php');
    include ("class_database.php");

    // DATABASE OBJECT
    $db = new database;

    // DECLARING TYPE VARIABLE TO IDENTIFY TYPE OF USER (AN INDIVIDUAL/ COMPANY)
    $type = $_SESSION['SESS_TYPE'];

    // AN INDIVIDUAL AVATAR UPLOAD
    if($type == 1){
        $identity = $_SESSION['SESS_MEMBER_ID'];

        if(is_array($_FILES)) {
            if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                $sourcePath = $_FILES['userImage']['tmp_name'];
                $targetPath = "../avatars/".$_FILES['userImage']['name'];
                $avatarURL = "avatars/".$_FILES['userImage']['name'];

                if(move_uploaded_file($sourcePath,$targetPath)) { ?>
                    <img alt="avatar" class="upload-img" src="<?php echo $avatarURL; ?>" /> <?php
                }
                else{   ?>
                    <img alt="avatar" class="upload-img" src="<?php echo 'failed'; ?>" /> <?php
                }
            }
        }
   }

    // A COMPANY LOGO UPLOAD
    if($type == 2){
        $identity = $_SESSION['SESS_COMPANY_ID'];

        if(is_array($_FILES)) {
            if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                $sourcePath = $_FILES['userImage']['tmp_name'];
                $targetPath = "../logos/".$_FILES['userImage']['name'];
                $avatarURL = "logos/".$_FILES['userImage']['name'];

                if(move_uploaded_file($sourcePath,$targetPath)) { ?>
                    <img alt="logo" class="upload-img" src="<?php echo $avatarURL; ?>" /> <?php
                }
                else{ ?>
                    <img alt="avatar" class="upload-img" src="<?php echo 'failed'; ?>" /> <?php
                }
            }
        }
    }

?>
