<?php

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | test page ...</title>
        <!-- stylesheets & JavaScripts -->
        <?php include 'views/header.php'?>
    </head>
    <body>
        <div class="signup-header">
            <h3>Sign up <i class="flaticon-smile"></i></h3>
            <h4> complete your registration here</h4>
        </div>
        <div class="main">
            <div class="wrap">
                <div class="row">
                    <div class="span4"></div>
                    <div class="span5">
                        <!--- upload logo form --->
                        <div class="signup-container">
                            <form id="uploadForm" action="include/upload.php" method="post">
                                <h4>logo</h4>
                                <div class="signup-faqs"><i class="flaticon-question22"></i></div>
                                <div class="divider"></div>
                                <div id="targetLayer">No Image</div>
                                <div id="uploadFormLayer">
                                    <label>Upload your image :</label>
                                    <input name="userImage" type="file" class="inputFile" />
                                    <input type="submit" id="btnSubmit" value="Submit" class="btn" />
                                 </div>
                                <input name="user_id" type="hidden" value="<?php echo $_SESSION['SESS_USER_ID'];?>"/>
                                <div class="clear"></div>
                            </form>
                        </div>
                            <!--- basic information --->
                            <form>
                                <div class="signup-container">
                                    <h4>basic information</h4>
                                    <div class="signup-faqs"><i class="flaticon-question22"></i></div>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                    <div class="clear"></div>
                                        <p><input name="companyName" type="text" placeholder="Name" /></p>
                                        <p><input name="companyWebsite" type="url" placeholder="website" /></p>
                                        <p><input name="companyLocation" type="text" placeholder="location" /></p>
                                        <p><input name="yearStarted" type="date" placeholder="date of established"/></p>
                                        <textarea name="companyBio" class="input xlarge" id="textarea" rows="2" placeholder="bio ..."></textarea>
                                </div>
                                
                                <div class="signup-container">
                                    <h4>contact details</h4>
                                    <div class="signup-faqs"><i class="flaticon-question22"></i></div>
                                    <div class="clear"></div>
                                    <div class="divider"></div>
                                     telephone
                                    <p><i class="flaticon-telephone66"></i><input name="telephone" type="tel" placeholder="eg. +27 115 274 325" /></p>
                                     email
                                    <p><i class="flaticon-envelope4"></i><input name="companyEmail" type="email" placeholder="eg. mail@example.com" /></p>
                                </div>

                                <button type="submit" value="submit" class="btn"> procceed <i class="flaticon-chevron18"></i></button>
                                 <div class="sk-spinner sk-spinner-three-bounce">
                                   <div class="sk-bounce1"></div>
                                   <div class="sk-bounce2"></div>
                                   <div class="sk-bounce3"></div>
                                 </div>
                            </form>
                    </div>
                    <div class="span4"></div>
                </div>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
