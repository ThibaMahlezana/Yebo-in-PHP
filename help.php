<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | help ...</title>

        <!-- Stylesheet Files -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/help.css" />

        <style>
            body{
                padding-top: 0;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="help-header"> 
                        <i class="flaticon-question22"></i>
                        Help Center
                    </div>
                </div>

                <div class="span6">
                    <div class="help-header">
                        have any question? Let us help you.
                        <i class="flaticon-smile"></i>
                    </div>
                    <div class="help-menu-content">
                        <p>Contact us</p>
                        <p><strong>Aypage </strong> is a product of <strong> Ayttiq Technologies (Pty) Ltd </strong>, 
                            therefore if you have any issue or anything you would like us to know you can contact us directly.
                        </p>
                        <p><strong>Website</strong> : <a href="http://www.ayttiq.com"> ayttiq.com</a></p>
                        <p><strong>Email</strong> : support@aypage.com</p>
                    </div>
                    <div class="help-menu-content">
                        <p>Follow us</p>
                        <p>Follow or like our profile in one of these social platforms, and see what is going on with <strong>aypage</strong></p>
                        <p><i class="flaticon-facebook25"></i><strong> Facebook</strong> : <a href=""> ayttiq</a></p>
                        <p><i class="flaticon-instagram3"></i><strong> Instagram</strong> : <a href=""> @aypage_app</a></p>
                        <p><i class="flaticon-twitter16"></i><strong> Twitter</strong> : <a href=""> @ayttiq</a></p>
                    </div>
                </div>

                <div class="span4">
                    <?php
                        if(!empty($_SESSION)){

                            if(!empty($_SESSION['SESS_MEMBER_ID'])){
                                if(isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) !== '')){
	                                include'views/active-chats.php';
                                }
                            }

                            if(!empty($_SESSION['SESS_COMPANY_ID'])){
                                if(isset($_SESSION['SESS_COMPANY_ID']) || (trim($_SESSION['SESS_COMPANY_ID']) !== '')){
	                                include'views/active-chats.php';
                                }                                    
                            }

                            if(!empty($_SESSION['SESS_ADMIN_ID'])){
                                if(isset($_SESSION['SESS_ADMIN_ID']) || (trim($_SESSION['SESS_ADMIN_ID']) !== '')){
	                                include'views/active-chats.php';
                                }
                            }

                        }                                                     
                    ?>
                    <!------- footer ------->
                    <?php include 'views/footer-mini.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
