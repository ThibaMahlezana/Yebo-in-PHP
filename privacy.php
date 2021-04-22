<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> privacy policy ...</title>

        <!-- Stylesheet Files -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/privacy.css" />

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
                    <div class="privacy-header">
                        <i class="flaticon-text61"></i> 
                        Privacy Policy
                    </div>
                    <div class="privacy-header">
                        <a href="terms.php">
                            <i class="flaticon-file27"></i> 
                            Terms & Conditions
                        </a>
                    </div>
                    <div class="privacy-header">
                        <a href="disclaimer.php">
                            <i class="flaticon-file27"></i> 
                            Disclaimer
                        </a>
                    </div>
                    <div class="privacy-header">
                        <a href="ads.php">
                            <i class="flaticon-file27"></i> 
                            Ads
                        </a>
                    </div>
                </div>

                <div class="span6">
                    <div class="privacy-header">
                        <i class="flaticon-text61"></i> 
                        Privacy Policy
                    </div>
                    <div class="privacy-content">
                        <p>This Privacy Policy was last modified on <strong>17 April 2015</strong></p>
                        <p><strong> Ayttiq Technologies (Pty) Ltd</strong> operates<strong> aypage</strong>. This page informs you of our policies regarding the collection, 
                            use and disclosure of Personal Information we receive from users of the Site or service.</p>
                        <p>We use your Personal Information only for identification and social experience within the service. 
                            By using<strong> aypage</strong>, you agree to the collection and use of information in accordance with this policy.</p>

                        <p><strong> Information Collection and Use</strong></p>
                        <p>While using<strong> aypage</strong>, we will kindly request that you provide us with certain personally identifiable information that can be used to identify you. 
                            Personally identifiable information may include, but is not limited to your first name, last name, bio (description of yourself) and contact information </p>

                        <p><strong> Log Data</strong></p>
                        <p>Like many site services, we collect information that your browser sends whenever you visit our Site. 
                            This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser type, 
                            browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages and other statistics.</p>
                        
                        <p><strong> Cookies </strong></p>
                        <p>Cookies are files with small amount of data, which may include an anonymous unique identifier. 
                            Cookies are sent to your browser from a web site and stored on your computer's hard drive.</p>
                        <p>Like many sites, we use "cookies" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. 
                            However, if you do not accept cookies, you may not be able to use some portions of our Site.</p>

                        <p><strong>Security</strong></p>
                        <p>The security of your Personal Information is extremely important to us, but remember that no method of transmission over the Internet, 
                            or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, 
                            we cannot guarantee its absolute security.</p>

                        <p><strong>Changes to Privacy Policy</strong></p>
                        <p><strong> Ayttiq Technologies (Pty) Ltd </strong>may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on the Site. 
                            You are advised to review this Privacy Policy periodically for any changes.</p>


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
        </div>
    </body>
</html>
