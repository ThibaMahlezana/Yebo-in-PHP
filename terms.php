<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> terms and conditions ...</title>

        <!-- Stylesheet Files -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/terms.css" />

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
                    <div class="terms-header">
                        <i class="flaticon-text61"></i> 
                        Terms & Conditions
                    </div>
                    <div class="terms-header">
                        <a href="privacy.php"> 
                            <i class="flaticon-file27"></i> 
                            privacy policy
                        </a>
                    </div>
                    <div class="terms-header">
                        <a href="disclaimer.php">
                            <i class="flaticon-file27"></i> 
                            Disclaimer
                        </a>
                    </div>
                    <div class="terms-header">
                        <a href="ads.php">
                            <i class="flaticon-file27"></i> 
                            Ads
                        </a>
                    </div>
                </div>
                <div class="span6">
                    <div class="terms-header">
                        <i class="flaticon-text61"></i> 
                        Terms & Conditions
                    </div>
                    <div class="terms-content">
                        <p><strong> Last updated<strong> 17 April 2015</strong></strong></p>
                        <p>Please read these Terms and Conditions carefully before using<strong> aypage</strong> website operated by<strong> Ayttiq Technologies (Pty) Ltd</strong>.</p>
                        <p>Your access to and use of service is conditioned on your acceptance of and compliance with these Terms. 
                            These Terms apply to all visitors, users and others who access or use the service.</p>
                        <p>By accessing or using the service you agree to be bound by these Terms. 
                            If you disagree with any part of the terms then you may not access the service.</p>

                        <p><strong> Termination</strong></p>
                        <p>We may terminate or suspend access to our service immediately, 
                            without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
                        <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, 
                            without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability. </p>

                        <p><strong> Links to Other Web Sites or Services</strong></p>
                        <p><strong> Aypage </strong>contain links to third party web sites or services that are not owned or controlled by<strong> Ayttiq Technologies (Pty) Ltd</strong>.  
                            We have no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. 
                            You further acknowledge and agree that<strong> Ayttiq Technologies (Pty) Ltd</strong> shall not be responsible or liable, directly or indirectly, 
                            for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, 
                            goods or services available on or through any such web sites or services.</p>
                        <p>We strongly advise you to read the terms and conditions and privacy policies of any third party websites or services that you visit. </p>
                        
                        <p><strong> Governing Law</strong></p>
                        <p>These Terms shall be governed and construed in accordance with the laws of South Africa, without regard to its conflict of law provisions.</p>
                        <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. 
                            If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. 
                            These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>

                        <p><strong> Changes</strong></p>
                        <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. 
                            If a revision is material we will try to provide at least 15 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion. 
                            By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>

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
