<?php
    include 'include/function_header.php';
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> successfully signed up ...</title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />

        <style>
            body{
                padding-top: 0;
            }
        </style>

    </head>
    <body>
        <div class="thank-you-page-header-grid">
            <p class="thank-you-page-header"> You are now registered !!  <i class="flaticon-smile"></i></p>
            <p class="thank-you-page-topic">Thank you for joining aypage, confirm your details;</p>
        </div>
        <div class="container">
            <!--- confirm sign up details section --->
            <!---- confirm person details ---->
            <?php if($user_identity->getLoggedUserType() == 1){ ?>

            <div class="thank-you-page-grid">
                <div class="thank-you-grid-username">@<?php echo $user_information->getUsername(); ?></p></div>
                <div class="thank-you-grid-avatar">
                    <img alt="avatar" src="<?php echo $user_information->getPhoto(); ?>"/>
                    <div class="thank-you-grid-type">
                        <i class="flaticon-user77"></i>
                    </div>
                </div>
                <p class="thank-you-grid-name"><?php echo $user_information->getName(); ?> <?php echo $user_information->getLastName(); ?></p>
                <div class="thank-you-grid-body">
                    <p><?php echo $user_information->getBio(); ?></p>
                    <!------- If Phone is not empty display it ------->
                    <?php if(!empty($user_information->getPhone())){?>
                        <p><i class="flaticon-telephone66"></i><?php echo $user_information->getPhone(); ?></p>
                    <?php }?>
                    <!------- If Email is not empty display it ------->
                    <?php if(!empty($user_information->getEmail())){ ?>
                        <p><i class="flaticon-envelope4"></i><?php echo $user_information->getEmail(); ?></p>
                    <?php }?>
                </div>
                <div class="thank-you-grid-footer">
                    <a href="edit-information.php"><i class="flaticon-font2"></i> Edit</a>
                </div>
            </div> <!---- / confirm person details ---->
            <?php }?>

            <!---- confirm company details ---->
            <?php if($user_identity->getLoggedUserType() == 2){ ?>

            <div class="thank-you-page-grid">
                <div class="thank-you-grid-username">@<?php echo $user_information->getUsername(); ?></p></div>
                <div class="thank-you-grid-avatar">
                    <img alt="logo" src="<?php echo $user_information->getPhoto(); ?>"/>
                    <div class="thank-you-grid-type">
                        <i class="flaticon-building8"></i>
                    </div>
                </div>
                <p class="thank-you-grid-name"><?php echo $user_information->getName(); ?></p>
                <div class="thank-you-grid-body">
                    <p><?php echo $user_information->getBio(); ?></p>
                    <!------- If Phone is not empty display it ------->
                    <?php if(!empty($user_information->getPhone())){?>
                        <p><i class="flaticon-telephone66"></i><?php echo $user_information->getPhone(); ?></p>
                    <?php }?>
                    <!------- If Email is not empty display it ------->
                    <?php if(!empty($user_information->getEmail())){?>
                        <p><i class="flaticon-envelope4"></i><?php echo $user_information->getEmail(); ?></p>
                    <?php }?>
                </div>
                <div class="thank-you-grid-footer">
                    <a href="edit-information.php"><i class="flaticon-font2"></i> Edit</a>
                </div>
            </div>
            <?php }?>
            <div class="welcome-thanku">
                <p><a href="timeline.php"><button class="btn"> procceed<i class="flaticon-chevron18"></i></button></a></p>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
