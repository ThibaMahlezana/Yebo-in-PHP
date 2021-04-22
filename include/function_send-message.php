<?php
    
    include 'class_messages.php';

    $freciever = $_POST['reciever'];
    $fmessageContent = $_POST['content'];
    
    $message = new messages();
    $message->createMessage($freciever, $fmessageContent);
    $message->$reciever = $freciever;
    $message->$messageContent = $fmessageContent;

?>
