<?php
    include 'class_database.php';
    include 'module_admin.php';

    $db = new database;
    $stat_info = new moduleAdmin;

    if(!empty($_POST)){

        $stat_type = $_POST['stat_type'];

        if($stat_type == 'users'){
            echo $stat_info->getTotalUsers();
        }

        if($stat_type == 'chats'){
            echo $stat_info->getTotalChats();
        }

        if($stat_type == 'posts'){
            echo $stat_info->getTotalNumPosts();
        }

        if($stat_type == 'views'){
            echo $stat_info->getTotalViews();   
        }

        if($stat_type == 'messages'){
            echo $stat_info->getTotalMessages();
        }

        if($stat_type == 'tags'){
            echo $stat_info->getTotalTags();
        }

        if($stat_type == 'individuals'){
            echo $stat_info->getTotalIndividuals();
        }

        if($stat_type == 'companies'){
            echo $stat_info->getTotalCompanies();
        }

        if($stat_type == 'logins'){
            echo $stat_info->getTotalLogins();
        }


    }
    

?>
