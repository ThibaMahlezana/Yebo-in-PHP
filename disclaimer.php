<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> disclaimer ...</title>

        <!-- Stylesheet Files -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/disclaimer.css" />

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
                    <div class="disclaimer-header">
                        <i class="flaticon-text61"></i> 
                        Disclaimer
                    </div>
                    <div class="disclaimer-header">
                        <a href="terms.php">
                            <i class="flaticon-file27"></i> 
                            Terms & Conditions
                        </a>
                    </div>
                    <div class="disclaimer-header">
                        <a href="privacy.php">
                            <i class="flaticon-file27"></i> 
                            Privacy Policy
                        </a>
                    </div>
                    <div class="disclaimer-header">
                        <a href="ads.php">
                            <i class="flaticon-file27"></i> 
                            Ads
                        </a>
                    </div>
                </div>

                <div class="span6">
                    <div class="disclaimer-header">
                        <i class="flaticon-text61"></i> 
                        Disclaimer
                    </div>
                    <div class="disclaimer-content">
                        <p><strong> Ayttiq Technologies (Pty) Ltd </strong>provides the www.aypage.com website as a service to the public and website owners.</p>
                        <p><strong> Ayttiq Technologies (Pty) Ltd </strong>is not responsible for, and expressly disclaims all liabilities for, 
                            damages of any kind arising out of use, reference to, or reliance on any information contained within the site. 
                            While the information or content contained within the site is periodically updated and checked for reliance and relevance, 
                            no guarantee is given that the information and content provided in this website is correct, relevant, complete, and up-to-date.</p>

                        <p>Although<strong> aypage </strong>service include links providing direct access to other internet resources, including websites, 
                            <strong> Ayttiq Technologies (Pty) Ltd </strong>is not responsible for the accuracy or content of information contained in these sites.</p>

                        <p>Links from<strong> aypage </strong>to third party sites or services do not constitute an endorsement by<strong> Ayttiq Technologies (Pty) Ltd </strong>of the parties or their products and services. 
                            The appearance on the website of advertisements and product or service information does not constitute endorsement by<strong> Ayttiq Technologies (Pty) Ltd</strong>, 
                            and<strong> Ayttiq Technologies (Pty) Ltd </strong>has not investigated the claims made by an advertiser. Product information is based solely on material received from suppliers.</p>
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
