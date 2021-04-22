<?php
    // INCLUDED LOG IN CLASS FILE
    include 'class_login.php';

    // POST VARIABLE FROM THE LOGIN FORM
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    // CHECK IF USERNAME AND PASSWORD IS EMPTY OR NOT THEN IF EMPTY DIRECT TO SIGN IN PAGE
    if($username != '' || $password != ''){

        // CHECK IF USERNAME OR PASSWORD IS IN AN ACCEPTABLE LENGHT
        if(!strlen($username) < 3 || !strlen($password) < 7){
            // LOG IN CLASS OBJECT
            $login = new login;

            // LOG IN OBJECT
            $login->normalLogin($username, $password);
        }

        // IF USERNAME OR PASSWORD IS NOT IN AN ACCEPTABLE LENGHT
        else{
            // DIRECT USER TO LOG IN PAGE
            header("location: ../signin.php");
            exit();
        }
    }
    else{
        header("location: ../signin.php");
        exit();
    }
?>
