<?php
    include 'include/function_val-testAccount.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Welcome to aypage!</title>

        <!-- Stylesheet Files -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/home.css" />

        <style>
            body{
                padding-top: 0;
            }
        </style>
    </head>
    <body>
        <!------- Alert bar ------->
        <div class="alert">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <i class="flaticon-warning18"></i> <strong> Caution! </strong> We are still making this better for you, stay tuned.
        </div>

        <!------ Navbar ------->
        <div class="home-navbar">
            <img alt="aypage icon" src="img/aypage_icon.png"/> <span><strong>aypage</strong></span>
            <span>Welcome to aypage</span>
            <!------- Log in form container ------->
            <div class="pull-right">
                <?php include "views/form_login.php"?>
            </div>
        </div>       
         
        <div class="header-wrap">
                    
            <!------- Request For Test details ------->
            <div class="container home-test-sec">
                <div class="row">
                    <div class="span8">
                        <p class="home-test-sec-header">Want to test aypage?</p>
                        <p class="home-test-sec-desc">Let us invite you. So do you want to use aypage as a company or as an individual?</p>
                        <div class="test-type-box">
                            <div id="test_individual_btn"><i class="flaticon-user77"></i><p>individual</p></div>
                            <div id="test_company_btn"><i class="flaticon-building8"></i><p>company</p></div>
                        </div>
                        <div class="clear"></div>
                        <!------- alert bar ------->
                        <?php if(!empty($validation_message)){
                                    foreach($validation_message as $val){
                                        echo '
                                            <div class="alert alert-danger">
                                                <a class="close" data-dismiss="alert" href="#">×</a>
                                                <i class="flaticon-warning18"></i> <strong>Warning! </strong>
                                                '.$val.'
                                            </div>
                                        
                                        ';
                                    } 
                            }                                       
                        ?>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <p id="test_individual_input" class="test-account-form">
                                <input type="hidden" name="type" value="individual"/>
                                <input name="email_phone" type="text" placeholder="Enter Email / Phone..."/>
                                <span><i class="flaticon-user77"></i>test as Individual</span>
                            </p>
                            <p id="test_company_input" class="test-account-form">
                                <input type="hidden" name="type" value="company"/>
                                <input name="email_phone" type="text" placeholder="Enter Email / Phone..."/>
                                <span><i class="flaticon-building8"></i>test as Company</span>
                            </p>
                            <p><button class="btn" type="submit">invite me!</button></p>
                        </form>
                    </div>
                    <div class="span4">
                        <?php include "views/form_signup.php"?>
                    </div>
                </div>
            </div>

            <!------- Additional Description ------->
            <div class="container">
                <p class="ad-text">100% Free of Ads</p>
                <p class="ad-text-desc">soon be available on <strong> Google Play Store</strong> and <strong>Apple App Store</strong></p>
            </div>
        </div>

        <!------- Footer ------->
        <footer>
            <div class="footer-area"> 
                <a class="pull-left" href="help.php"> help </a>
                <a class="pull-left" href="terms.php"> terms and conditions </a>
                <a class="pull-left" href="privacy.php"> privacy policy </a>
                <a class="pull-left" href="disclaimer.php"> disclaimer </a>
                aypage is a product of<a href="http://www.ayttiq.com"> ayttiq technologies</a>
                <?php echo '&copy;'. date('Y', time()); ?> . All rights reserved 
            </div>
        </footer>
        <!---- JavaScript Files ---->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/home.js"></script>
    </body>
</html>
