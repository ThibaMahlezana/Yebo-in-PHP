<?php
    session_start();
    include'db_connection.php';

    $reciver = $_POST['reciever'];
    $content = $_POST['content'];
    $sender = $_SESSION['SESS_MEMBER_ID'];
    $time = time();
    $source = "aypage";
    $date = date('Y-m-d',time());


    // validation

    if($reciver==""){
        header('Location: ../messages.php');
    }
    if($content==""){
        header('Location: ../messages.php');
    }

    $query ="INSERT INTO messages (message_to, message_text, message_from, message_source, message_time, message_date) 
    VALUES ('$reciver','$content','$sender','$source','$time','$date')";

    $sent = @mysql_query($query);

    if(!$sent){
        die ('Error : ' .mysql_error());
    }

    echo 'message sent';

?>
