<?php
    // INCLUDED FILES
    include 'include/class_registration.php';
    include 'include/function_register_validation.php';
    
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> Register an Account </title>

        <!---- STYLESHEETS ---->
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
        <div class="basic-signup-header">
            <p class="basic-signup-header-topic">Register Account<i class="flaticon-smile"></i></p>
            <p>Lets get started, its so simply register your account here; </p>
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

            <div class="basic-signup-form">
                <form id="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <!-- email or phone input -->
                    <p><i class="flaticon-user77"></i> username</p>
                    <input name="username" type="text" placeholder="username" required/>

                    <!-- password input -->
                    <p><i class="flaticon-lock24"></i> password</p>
                    <input name="password" type="password" placeholder="******" required/>

                    <!-- repeat password input -->
                    <p><i class="flaticon-lock24"></i>repeat password</p>
                    <input name="rpassword" type="password" placeholder="******" required/>

                    <div class="basic-signup-options">
                        <input name="type" id="optionsRadios1" value="individual" type="radio" required> individual 
                        <input name="type" id="optionsRadios2" value="company" type="radio" required> company
                        <i class="flaticon-question22 pull-right"></i>
                    </div>

                    <p>I accept and agree to<a href="terms.php"> terms & conditions</a>, <a href="terms-of-use.php"> terms of use</a> and <a href="privacy.php"> privacy</a></p>
                    <button class="btn" type="submit">sign up</button>
                </form>
                <p>Already have aypage? <a href="signin.php"> sign in</a></p>
            </div>
            <div class="clear"></div>
            <div class="sk-spinner">
                <div class="sk-spinner-three-bounce">
                    <div class="sk-bounce1"></div>
                    <div class="sk-bounce2"></div>
                    <div class="sk-bounce3"></div>
                </div>
            </div>

        </div>

        <!------ javascript ------>
        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/module_access.js"></script>

        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
