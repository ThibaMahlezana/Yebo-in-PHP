<?php
    include 'include/class_registration.php';
    include 'include/auth.php';
    include 'include/function_register_full-validation.php';
    
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> register as a company </title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />
        <link rel="stylesheet" type="text/css" href="styles/imgareaselect.css">

        <style>
            body{
                padding-top: 0;
            }
        </style>

    </head>
    <body>
        <div class="full-signup-indiv-header-grid">
            <p class="full-signup-indiv-header">Complete Registration <i class="flaticon-smile"></i></p>
            <p class="full-signup-indiv-topic"> Complete your registration here</p>
        </div>
        <div class="container">
            <!------- Alert Bar Area ------>
            <?php 
                if(!empty($error)){
                    foreach($error as $errors){
                        echo '
                            <div class="alert signup-alert alert-danger">
                                <i class="flaticon-warning18"></i> '.$errors.'
                            </div>
                        ';
                    }
                }
            ?>

            <div class="full-signup-indiv-container">
                <!--- Personal Details --->
                <div class="full-signup-indiv-grid">
                    <p class="full-signup-indiv-grid-h">Profile Details</p>

                    <!--- upload avatar form --->
                    <div class="upload_profile_photo_section">
                        <div class="profile_photo_area">
                            <img id="avatar-edit-img" data-holder-rendered="true" alt="avatar" data-src="logos/default-logo.jpg" src="logos/default-logo.jpg"/> 
                        </div>
                        <div class="profile_photo_upload_area">
                            <label>Upload your Profile Picture :</label>
                            <button id="change-pic">change image</button>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <form id="register-company" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <p><strong> Name :</strong><input  style="margin-left: 70px" name="name" type="text" required/></p>
                        <p><strong> Bio : </strong> <textarea name="companyBio" class="input xlarge" id="textarea" rows="2" placeholder="description ..." required></textarea></p>                            
                        <p><button type="submit"> procceed <i class="flaticon-chevron18"></i></button></p>
                    </form>
                </div> 
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

        <!---- JavaScript Files ---->
	    <script src="js/jquery-2.2.3.min.js"></script>
	    <script src="js/module_access.js"></script>

        <!----- footer ----->
        <?php include'views/footer.php'?>

    </body>
</html>
