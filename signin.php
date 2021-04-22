<?php
    include 'include/class_login.php';
    include 'include/function_signin-validation.php';
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> sign in </title>

        <!---- STYLESHEETS ---->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />

    </head>
    <body>
        <div class="normal-signin-form-header">
            <p class="normal-signin-form-topic">Sign in to your Account<i class="flaticon-smile"></i></p>
            <p> Provide your log in details and sign in to aypage here; </p>
        </div>
        <div class="container">
                <?php 
                    if(!empty($error)){
                        foreach($error as $errors){
                            echo '
                                <div class="alert alert-danger">
                                    <i class="flaticon-warning18"></i> '.$errors.'
                                </div>
                            ';
                        }
                    }
                ?>
                <?php
                if(!$is_user_known){?>
                <div class="normal-signin-form">
                    <form id="signin-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <p><i class="flaticon-user77"></i> username</p>
                        <input name="username" type="text" placeholder="username" id="your-name" required>
                        <p><i class="flaticon-lock24"></i> password</p>
                        <input name="password" type="password" placeholder="********" id="password" required>

                        <button type="submit" class="btn">sign in</button>
                        <p><a href="password-recovery.php"> forgot password?</a></p>
                        <p>new to aypage? <a href="signup.php">sign up</a></p>
                    </form>
                </div>
                <?php   }?>

                <?php if($is_user_known) {?>
                <div class="normal-signin-form">
                        <form id="signin-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                            <div class="user-known-signin-grid">
                                <img alt="profile image" class="user-known-signin-avatar" src="<?php echo $log_photo;?>"/>
                                <p class="user-known-signin-name"><?php echo $log_name; ?> </p>
                            </div>

                            <p><i class="flaticon-lock24"></i> password</p>
                            <input type="hidden" name="username" value="<?php echo $username; ?>"/>
                            <input name="password" type="password" placeholder="password ..." required>

                            <button type="submit" class="btn">sign in</button>
                            <p><a href="signin.php"> Not <?php echo $log_name; ?>?</a></p>
                            <p><a href="password-recovery.php"> forgot password?</a></p>
                        </form>
                </div>
                <?php }?>
        </div>

        <div class="sk-spinner">
            <div class="sk-spinner-three-bounce">
                <div class="sk-bounce1"></div>
                <div class="sk-bounce2"></div>
                <div class="sk-bounce3"></div>
            </div>
        </div>

	    <script src="js/jquery-2.2.3.min.js"></script>
	    <script src="js/module_access.js"></script>

        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
