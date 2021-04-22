<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | ads ...</title>

        <!-- Stylesheet Files -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/ads.css" />

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
                    <div class="ads-header"> 
                        Ads
                    </div>
                </div>

                <div class="span6">
                    <div class="ads-header">
                        Please note the following.
                        <i class="flaticon-smile"></i>
                    </div>
                    <div class="ads-content">
                        <p><strong>Aypage </strong> does not sell ads in any way or form. We do not promote anything. This service is 100% free of ads.
                            If you feel you saw an ad or anything of that nature, let us know.
                        </p>
                        <p><strong>Website</strong> : <a href="http://www.ayttiq.com"> ayttiq.com</a></p>
                        <p><strong>Email</strong> : support@aypage.com</p>
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
