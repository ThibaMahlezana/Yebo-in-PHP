<?php
    include 'include/class_registration.php';
    include 'include/auth.php';
    include 'include/function_register_full-validation.php';
    
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> register as an individual </title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />

        <style>
            body{
                padding-top: 0;
            }
	        img#uploadPreview{
		        border: 0;
		        border-radius: 3px;
		        -webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		        box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		        margin-bottom: 30px;
		        overflow: hidden;
	        }
	        input[type="submit"]{
		        border-radius: 10px;
		        background-color: #61B3DE;
		        border: 0;
		        color: white;
		        font-weight: bold;
		        font-style: italic;
		        padding: 6px 15px 5px;
		        cursor: pointer;
	        }
            
        </style>

    </head>
    <body>
        <div class="full-signup-indiv-header-grid">
            <p class="full-signup-indiv-header">Complete Registration <i class="flaticon-smile"></i></p>
            <p class="full-signup-indiv-topic"> Complete your registration here</p>
        </div>
        <div class="container">
            <!------- Alert Bar Area ------->
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
            <!------ Signup Container ------->
            <div class="full-signup-indiv-container">
                <!------- Signup Grid ------->
                <div class="full-signup-indiv-grid">
                    <p class="full-signup-indiv-grid-h">Profile Details</p>

                    <!--- upload avatar form --->
                    <div class="upload_profile_photo_section">
                        <!------- avatar view ------->
                        <div class="profile_photo_area" title="change avatar">
                            <img data-holder-rendered="true" alt="avatar" data-src="avatars/default-logo.jpg" src="avatars/default-avatar.jpg"/> 
                        </div>
                        <!------- profile photo button ------->
                        <div class="profile_photo_upload_area">
                            <label>Upload your Profile Picture :</label>
                            <button data-toggle="modal" data-target="#avatar-modal" role="button">change image</button>
                        </div>
                        <div class="clear"></div>

                    </div>

                    <!------- Signun Form ------->
                    <form id="register-individual" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <!------- Personal Details ------->
                        <p><strong> First Name : </strong><input name="firstName" type="text" required/></p>
                        <p><strong> Last Name : </strong><input name="lastName" type="text" required/></p>
                        <p><strong> Bio : </strong> <textarea name="bio" class="input xlarge" id="textarea" rows="2" placeholder="description ..." required></textarea></p>
                        
                        <p><button type="submit"> procceed <i class="flaticon-chevron18"></i></button></p>
                    </form> <!------- / Signup Form ------->

                </div> <!------- / Signup Grid ------->

                <!------- Loader Element ------->   
                <div class="sk-spinner">
                    <div class="sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>

            </div> <!------ / Signup Container ------->
            <div class="clear"></div>
        </div>

        <!---- JavaScript Files ---->
	    <script src="js/jquery-2.2.3.min.js"></script>
	    <script src="js/module_access.js"></script>

        <!----- footer ----->
        <?php include'views/footer.php'?>


    </body>
</html>
