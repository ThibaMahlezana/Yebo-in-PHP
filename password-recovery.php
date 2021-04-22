<?php
    
    require '/include/class_recover_password.php';

    if(!empty($_POST)){

        $recover = new recoverPassword;

        $username = $_POST['username'];

        if($username != ''){
            if(strlen($username) > 1){
                $val_status = $recover->getUsernameStatus($username);
                $verifying_method = $recover->verifyingMethod($username);

                if($val_status == 1){
                    $recover_password = $recover->recoverPassword($username);
                    if($verifying_method == 'Email'){
                        if($recover_password != 'Message was sent'){
                            $val_message = 'An Email with your Password was not sent.';
                        }
                        else{
                            $val_message = 'An Email with your Password has been sent to you.';
                        }
                    }

                    if($verifying_method == 'Phone'){
                        if($recover_password == 0){
                            $val_message = 'An SMS with your password was not sent.';
                        }
                        else{
                            $val_message = 'An SMS with your password was sent';
                        }
                    }
                }

                elseif($val_status == 0){
                    $val_message = 'Username does not exist';
                }
            }
            else{
                $val_message = 'username too short';
            }
        }
        else{
            $val_message = 'username field is empty';
        }
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> Recover Password</title>
        <!-- stylesheets & JavaScripts -->
        <?php include 'views/header.php'?>
    </head>
    <body>
        <div class="password-recover-header">
            <p class="password-recover-topic">Forgot your password? <i class="flaticon-frown"></i></p>
            <p>We will help you get your password, please key in your username.</p>
        </div>
        <div class="container">
            <div class="password-recover-grid">
                <?php if($val_message != ''){?>
                <div class="alert alert-danger">
                    <i class="flaticon-warning18"></i> <?php echo $val_message; ?>
                </div>
                <?php }?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="password-recover-body">
                        <p><i class="flaticon-user77"></i> username </p>
                        <div class="clear"></div>
                        <input type="text" name="username" placeholder="username"/>
                        <input type="submit" class="btn" value="recover" name="submit"></input><br/>
                    </div>
                </form>
                <div class="password-recover-home-link">
                    <button class="btn"><a href="index.php"><i class="flaticon-chevron20"></i> home</a></button>
                </div>
            </div>
        </div>

        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
