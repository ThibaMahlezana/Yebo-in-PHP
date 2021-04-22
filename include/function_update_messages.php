<?php
    session_start();
    include 'class_database.php';
    include "module_user.php";
    include 'module_messages.php';
    include "class_time.php";

    $messages = new messages;
    $db = new database;
    $user_identity = new moduleUser;
    $time = new time;

    if(!empty($_POST)){

        $update_type = $_POST['update_type'];
        $recipient_username = $_POST['username'];

        if($update_type == 'conversation_box'){
            $recipient_username = substr($recipient_username, 1);
            $messages->displayMessageConversationClicked($recipient_username);
        }
    }
?>
