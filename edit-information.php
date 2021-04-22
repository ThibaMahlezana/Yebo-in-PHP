<?php
    include 'include/function_header.php';
    include 'include/function_edit-details.php';
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
        <div class="edit-information-header-grid">
            <p class="edit-information-header"> You are now registered !!  <i class="flaticon-smile"></i></h2>
            <p class="edit-information-topic">Thank you for joining aypage, confirm your details;</h4>
        </div>
        <div class="container">
            <!------- alert bar ------->
            <?php
                if(!empty($error)){
                    foreach($error as $alert_message){
                        echo '
                            <div class="alert alert-danger edit-information-alert-bar">
                                <i class="flaticon-warning18"></i> 
                                '.$alert_message.'
                            </div>
                        ';
                    }
                } 
            ?>

            <!--- confirm sign up details section --->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <!---- edit person's details ---->
                    <?php if($user_identity->getLoggedUserType() == 1){ ?>

                    <div class="edit-information-grid">
                        <p class="edit-information-grid-header">Profile Information </h4></p>               
                        <div class="divider"></div>
                        <img class="edit-information-profile-photo" alt="avatar" src="<?php echo $user_information->getPhoto(); ?>"/><strong>avatar</strong>
                        <p><strong>First Name  </strong><input name="firstName" type="text" value="<?php echo $user_information->getName(); ?>"/> </p>
                        <p><strong>Last Name  </strong><input name="lastName" type="text" value="<?php echo $user_information->getLastName(); ?>"></p>
                        <p><strong>Bio  </strong> <textarea name="bio" class="input xlarge" id="textarea" rows="2" maxlength="125"><?php echo $user_information->getBio(); ?></textarea></p>
                    </div> <!---- / edit person's details ---->
                    <?php }?>

                    <!---- edit company's details ---->
                    <?php if($user_identity->getLoggedUserType() == 2){ ?>

                    <div class="edit-information-company-grid">
                        <p>Profile Information </p>               
                        <div class="divider"></div>
                        <img class="edit-information-profile-photo" alt="avatar" src="<?php echo $user_information->getPhoto(); ?>"/><strong> Logo</strong>
                        <p><strong>Name of the Company </strong> <input name="name" type="text" value="<?php echo $user_information->getName(); ?>"/></p>
                        <p><strong>Description  </strong> <textarea name="companyBio" class="input xlarge" id="textarea" rows="2" maxlength="125"> <?php echo $user_information->getBio(); ?></textarea></p>
                    </div> <!---- / edit company's details ---->
                    <?php }?>
                <div class="welcome-thanku">
                    <p><a><button type="submit" class="btn"> procceed<i class="flaticon-chevron18"></i></button></a></p>
                </div>
            </form>
            <div class="clear"></div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
