<?php
    // header functions
    include 'include/function_header.php';
    include 'include/function_profile-header.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-user77";
    $page_titlebar_header = "Profile";
    $page_titlebar_desc = " view and edit your profile details here";

    //search placeholder items
    search_placeholder();
    $search_plac = "profile";

    // UPDATE VIEWS TABLE
    $admin->updateProfileViews();
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | profile ...</title>

        <!-- stylesheets -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/profile.css" />

    </head>
    <body>
        <!--- main navbar --->
        <?php include'views/navbar.php'?>

        <div class="container">

            <!--- row --->
            <div class="row">
                <!--- navigation section --->
                <div class="span3">
                    <!--- current userbar --->
                    <?php include 'views/userbar.php'?>

                    <!--- profile status  --->
                    <div class="account-status">
                        <p>Account Status</p>
                        <p><strong>Joined</strong> : <?php echo date('d M Y', $user_information->getSignupDate()); ?></p>
                        <p><strong>Subscription </strong></p>
                        <p>Trial 
                            <?php echo date('d M Y', $user_information->getSignupDate()); ?> -
                            <?php echo date('d M Y', $user_information->getExpireDate()); ?>
                        </p>
                        <p><strong><?php echo $user_information->getDaysLeft();?> </strong> days left</p>
                    </div>

                </div>

                <!--- content sestion --->
                <div class="span6">
                    <!---- title bar ----->
                    <?php include 'views/titlebar.php'; ?>

                    <!---- profile status ----->
                    <div class="profile-status-box ">
                        <p id="profile-following-btn"><a><?php echo $user_information->getNumberFollowing(); ?></a><br/> Following</p>
                        <p id="profile-followers-btn"><a><?php echo $user_information->getNumberFollowers(); ?></a><br/> Followers</p>
                        <p><a><?php echo $user_information->getTotalNumPosts(); ?></a><br/> Posts</p>
                    </div>


                    <div id="profile-following-view" class="profile-following-view-box">
                        <div class="profile-following-header">Following 
                            <a id="following-profile-view-remove" class="pull-right">close</a>
                            <span><input type="text" placeholder="search..."/></span>
                        </div>
                        <?php $user_information->displayUserFollowing(); ?>
                    </div>

                    <div id="profile-followers-view" class="profile-following-view-box">
                        <div class="profile-following-header">Followers 
                            <a id="followers-profile-view-remove" class="pull-right">close</a>
                            <span><input type="text" placeholder="search..."/></span>
                        </div>
                        <?php $user_information->displayUserFollowers(); ?>
                    </div>

                    <?php if($validation_message != '') {?>
                    <div class="alert alert-error">
                        <button class="close" data-dismiss="alert">×</button>
                        <?php echo $validation_message; ?></div>
                    <?php }?>



                    <div class="profile-verify-bar">
                        <p><strong>Asanda</strong> , your account is not verified.</p>
                        <p>Please be aware that if not verified within in 45 hours it will be removed.</p>
                        <p><span class="btn" id="request-code-btn">request code</span> 
                            <span class="btn" id="input-code-btn">Input code</span>
                        </p>
                    </div>


                    <div class="profile-verify-save-bar">
                        <p>Please provide us with an Email or Phone to verify your account.</p>
                        <p>We will send an Email or an SMS with a code.</p>
                        <p><input type="text"/> <span class="btn">send</span></p>
                    </div>

                    <div class="profile-verify-send-bar">
                        <p>Please input a five digit code that was sent to you by Email or Phone</p>
                        <p><input type="text"/> <span class="btn">verify</span></p>
                    </div>

                    <?php
                        if(!empty($edit_info_alert_message)){
                            if($edit_info_alert_type == 'warning'){
                                foreach($edit_info_alert_message as $edit_val_message){
                                    echo '
                                        <div class="alert alert-error profile-information-bar-edit-alert">
                                            <i class="flaticon-check30"></i>
                                            <button class="close" data-dismiss="alert">×</button>
                                            '.$edit_val_message.'
                                        </div>
                                    ';
                                }
                            }

                            if($edit_info_alert_type == 'information'){
                                foreach($edit_info_alert_message as $edit_val_message){
                                    echo '
                                        <div class="alert alert-success profile-information-bar-edit-alert">
                                            <i class="flaticon-check30"></i>
                                            <button class="close" data-dismiss="alert">×</button>
                                            '.$edit_val_message.'
                                        </div>
                                    ';
                                }
                            }

                        }
                    ?>

                    <?php if($user_identity->getLoggedUserType() == 1){ ?>
                    <div class="profile-information-bar">
                        <p><i class="flaticon-information34"></i> Profile Information 
                            <button id="profile_edit_btn" type="submit" class="pull-right btn"><i class="flaticon-font2"></i> edit</button>
                        </p>
                        <div class="profile-information_header">
                            <div class="profile-information-header-photo">
                                <img alt="photo" src="<?php echo $user_information->getPhoto(); ?>"/>
                                <input type="file"/>
                            </div>
                        </div>
                        <div class="clear"></div>

                        <p>@<?php echo $user_information->getUsername(); ?></p>
                        <p><strong> First Name</strong> : <?php echo $user_information->getName(); ?> 
                        <p><strong> Last Name</strong> : <?php echo $user_information->getLastName(); ?></p>
                        <p><i class="flaticon-information34"></i> <?php echo $user_information->getBio(); ?></p>
                        <?php 
                            if(!empty($user_information->getEmail())){
                                echo'
                                    <p><i class="flaticon-envelope4"></i> '.$user_information->getEmail().'</p>
                                ';
                            }
                        ?>
                        <?php if(!empty($user_information->getPhone())){
                                   echo'
                                       <p><i class="flaticon-telephone66"></i> '.$user_information->getPhone().'</p>
                                   '; 
                               }
                        ?>
                        
                    </div>
                    <?php }?>

                    <?php if($user_identity->getLoggedUserType() == 2){ ?>
                    <div class="profile-information-bar">
                        <p><i class="flaticon-information34"></i> Profile Information 
                            <button id="profile_edit_btn" type="submit" class="pull-right btn"><i class="flaticon-font2"></i> edit</button>
                        </p>
                        <div class="profile-information_header">
                            <div class="profile-information-header-photo">
                                <img alt="photo" src="<?php echo $user_information->getPhoto(); ?>"/>
                                <input type="file"/>
                            </div>
                        </div>
                        <div class="clear"></div>

                        <p>@<?php echo $user_information->getUsername(); ?></p>
                        <p><strong> Name</strong> : <?php echo $user_information->getName(); ?> 
                        <p><i class="flaticon-information34"></i> <?php echo $user_information->getBio(); ?></p>
                        <?php 
                            if(!empty($user_information->getEmail())){
                                echo'
                                    <p><i class="flaticon-envelope4"></i> '.$user_information->getEmail().'</p>
                                ';
                            }
                        ?>
                        <?php if(!empty($user_information->getPhone())){
                                   echo'
                                       <p><i class="flaticon-telephone66"></i> '.$user_information->getPhone().'</p>
                                   '; 
                               }
                        ?>
                        
                    </div>
                    <?php }?>


                    <?php if($user_identity->getLoggedUserType() == 1){ ?>
                    <div id="profile-info-edit-form" class="profile-information-bar-edit">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="form_type" value="edit-information"/>
                            <p><i class="flaticon-information34"></i> Edit Profile Information
                                <button type="submit" class="pull-right btn"><i class="flaticon-save8"></i> save</button>
                            </p>

                            <p><strong> First Name</strong> : <input name="firstName" type="text" value="<?php echo $user_information->getName(); ?> "/></p>
                            <p><strong> Last Name</strong> : <input name="lastName" type="text" value="<?php echo $user_information->getLastName(); ?>"/></p>
                            <p><i class="flaticon-information34"></i>
                                <strong>Bio</strong>
                                <textarea name="bio"><?php echo $user_information->getBio(); ?>
                                </textarea>
                            </p>
                            <?php 
                                if(!empty($user_information->getEmail())){
                                    echo'
                                        <p><i class="flaticon-envelope4"></i><strong>Email</strong>
                                            <input type="text" value="'.$user_information->getEmail().'"/>
                                        </p>
                                    ';
                                }
                            ?>
                            <?php if(!empty($user_information->getPhone())){
                                       echo'
                                           <p><i class="flaticon-telephone66"></i><strong>Phone</strong>
                                               <input type="text" value="'.$user_information->getPhone().'"/>
                                           </p>
                                       '; 
                                   }
                            ?>
                        </form>
                    </div>
                    <?php }?>

                    <?php if($user_identity->getLoggedUserType() == 2){ ?>
                    <div id="profile-info-edit-form" class="profile-information-bar-edit-company">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="form_type" value="edit-information"/>
                            <p><i class="flaticon-information34"></i> Profile Information 
                                <button type="submit" class="pull-right btn"><i class="flaticon-save8"></i> save</button>
                            </p>

                            <p><strong> First Name</strong> : <input name="name" type="text" value="<?php echo $user_information->getName(); ?> "/></p>
                            <p><i class="flaticon-information34"></i>
                                <strong>Bio</strong>
                                <textarea name="companyBio"><?php echo $user_information->getBio(); ?></textarea>
                            </p>
                            <?php 
                                if(!empty($user_information->getEmail())){
                                    echo'
                                        <p><i class="flaticon-envelope4"></i><strong>Email</strong>
                                            <input type="text" value="'.$user_information->getEmail().'"/>
                                        </p>
                                    ';
                                }
                            ?>
                            <?php if(!empty($user_information->getPhone())){
                                        echo'
                                            <p><i class="flaticon-telephone66"></i><strong>Phone</strong>
                                                <input type="text" value="'.$user_information->getPhone().'"/>
                                            </p>
                                        '; 
                                    }
                            ?>
                        </form>
                    </div>
                    <?php }?>


                        <!--- ACCOUNT VERIFICATION SECTION --->
                    <?php if($f_verification_status == 0){ ?>
                    <div class="profile-verification-bar">
                        <p><strong>Account not verified</strong></p>


                        <?php if($f_verifying_method == 'Email') {?>
                        <p>An Email with a code will be sent to <strong><?php echo $f_email; ?></strong> <a href="#EditContactModal" data-toggle="modal">edit</a></p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <input class="btn" type="submit" name="submit" value="Send Code"/>
                        </form>
                            
                        <?php }?>

                        <?php if($f_verifying_method == 'Phone') {?>
                        <p>An SMS with a code will be sent to <strong><?php echo $f_phone; ?></strong> <a href="#EditContactModal" data-toggle="modal">edit</a></p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <input class="btn" type="submit" name="submit" value="Send Code"></input>
                        </form>
                        <?php }?>

                        <?php if($f_verifying_method == 'None') {?>
                        <p>Please Edit your Account and Provide at least an Email/Phone</p>
                        <?php }?>

                        <!--- EDIT EMAIL / PHONE MODAL WINDOW --->
                        <div class="modal hide fade" id="EditContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <?php if($f_verifying_method == 'Email') {?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> x </button>
                                Edit  Email Address
                            </div>
                            <div class="modal-body">
                                <p>Update your Email Address here, so you can verify your account</p>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                    <input type="text" value="<?php echo $f_email; ?>" name="email" />
                                    <button type="submit" class="btn">update</button>
                                </form>
                            </div>
                            <?php }?>

                            <?php if($f_verifying_method == 'Phone') {?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> x </button>
                                Edit Phone Number
                            </div>
                            <div class="modal-body">
                                <p>Update your Phone Number here, so you can verify your account</p>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                    <input type="text" value="<?php echo $f_phone; ?>" name="phone" />
                                    <button type="submit" class="btn">update</button>
                                </form>
                            </div>
                            <?php }?>

                            <div class="modal-footer">
                            </div>
                        </div>

                        <p>Then input;</p>
                        <label>the five digits code sent to you by an SMS/Email, <a href="#">resend</a></label>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <input type="text" name="code"/>
                            <input class="btn" type="submit" name="verify_button" value="verify"></input>
                        </form>
                        <p>Please note if your account is not verified within 48 hours, it will be deleted</p>
                    </div>
                    <?php }?>
                </div>
                <div class="span4">
                    <?php include'views/active-chats.php'; ?>

                    <!------- footer ------->
                    <?php include 'views/footer-mini.php'; ?>
                </div>

            </div>
        </div>

        <!--- JAVA SCRIPTS FILES ---->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/module-user.js"></script>

    </body>
</html>
