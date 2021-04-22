<?php
    // header functions
 //   include 'include/function_header.php';

  //  $f_userid = $_GET['user_id'];

 //   $insertId = new user;
///    $insertId->doUserId($f_userid);
//    $f_userid = $insertId->userid; 

//    $viewInfo = new user;
//    $f_manusername = $viewInfo->getAccountInformation();

    if(empty($_GET)){
        $f_userid = $f_loggedUserId;
    }

    //$query = mysql_query("SELECT * FROM members WHERE user_id ='$user'");
    //$results = mysql_fetch_assoc($query);

    //$f_manusername = $results['username'];
    //$bio = $results['bio'];

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> <?php echo $f_manusername; ?></title>
        <!-- stylesheets & JavaScripts -->
        <?php include 'views/header.php'?>
    </head>
    <body>
        <!--- cover --->
        <div class="account-cover">
            <div class="account-links">
                <i class="flaticon-facebook25"></i>
                <i class="flaticon-twitter16"></i>
                <i class="flaticon-google26"></i>
            </div>
            <div class="account-links">
                <i class="flaticon-instagram3"></i>
                <i class="flaticon-instagram3"></i>
            </div>
            <div class="account-links">
                <i class="flaticon-linkedin9"></i>
                <i class="flaticon-pinterest13"></i>
                <i class="flaticon-tumblr11"></i>
            </div>
            <div class="clear"></div>
        </div>
        <div class="account-avatar"><img width="120" class="img-rounded" src="avatars/tiba-profile-pic.jpg" /></div>
       <!--- <div class="account-cover-profs">
            <div class="account-cover-profiles">
                <i class="flaticon-facebook25"></i>
                <i class="flaticon-twitter16"></i>
                <i class="flaticon-google26"></i>
            </div>
            <div class="account-cover-contacts">
                <i class="flaticon-telephone66"></i>
                <i class="flaticon-envelope4"></i>
            </div>
            <div class="account-cover-mobile">
                <i class="flaticon-instagram3"></i>
                <i class="flaticon-instagram3"></i>
            </div>
            <div class="account-cover-extras">
                <i class="flaticon-linkedin9"></i>
                <i class="flaticon-tumblr10"></i>
                <i class="flaticon-youtube13"></i>
            </div>
            <div class="clear"></div>
        </div> -->
        <div class="account-stats">
            <div class="account-stats1">
                <h4> timeline</h4>    150 000
            </div>
            <div class="account-stats1">
                <h4> links</h4>    150 000
            </div>
            <div class="account-stats2">
                <h4> followers</h4>   150 000
            </div>
            <div class="account-stats2">
                <h4> following</h4>   150 000
            </div>
            <div class="account-stats3">
                <h4> users</h4>   150 000
            </div>
            <div class="account-stats3">
                <h4> companies</h4>   150 000
            </div>
        </div>
        <div class="clear"></div>

        <div class="main">
            <div class="wrap">
                <div class="row">
                    <div class="span3">
                        <div class="account-details">
                            <h3><strong><?php echo $f_manusername; ?></strong></h3>
                            <p><?php echo $bio; ?></p>
                            <p>founder at <strong> @Ayttiq Technologies</strong>, creator of<strong> #aypage</strong></p>
                            <p><i class="flaticon-map25"></i> Johannesburg,ZA</p>
                            <p><i class="flaticon-link15"></i><a href="http://about.me/thiba_mahlezana"> about.me/thiba_mahlezana</a></p>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="accounts">
                            <h4>socia profiles</h4>
                            <div class="divider"></div>
                            <h4><i class="flaticon-facebook25"></i><strong>thiba.mahlezana</strong> facebook</h4>
                            <h4><i class="flaticon-twitter16"></i><strong>@thiba_mahlezana</strong> twitter</h4>
                            <h4><i class="flaticon-google26"></i><strong>+thiba.mahlezana</strong> google +</h4>
                        </div>

                        <div class="accounts">
                            <h4>contacts</h4>
                            <div class="divider"></div>
                            <h4><i class="flaticon-telephone66"></i><strong>+27 773 458 845</strong> phone</h4>
                            <h4><i class="flaticon-envelope4"></i><strong>tiba@ayttiq.com</strong> email</h4>
                        </div>

                        <div class="accounts">
                            <h4>mobile chat</h4>
                            <div class="divider"></div>
                            <h4><i class="flaticon-facebook25"></i><strong> +27 773 458 845</strong> WhatsApp </h4>
                            <h4><i class="flaticon-facebook25"></i><strong>+27 773 458 845</strong> WeChat</h4>
                        </div>

                        <div class="accounts">
                            <h4>mobile chat</h4>
                            <div class="divider"></div>
                            <h4><i class="flaticon-facebook25"></i><strong> +27 773 458 845</strong> WhatsApp </h4>
                            <h4><i class="flaticon-facebook25"></i><strong>+27 773 458 845</strong> WeChat</h4>
                            <h4><i class="flaticon-facebook25"></i><strong>+27 773 458 845</strong> WeChat</h4>
                            <h4><i class="flaticon-facebook25"></i><strong>+27 773 458 845</strong> WeChat</h4>
                            <h4><i class="flaticon-facebook25"></i><strong>+27 773 458 845</strong> WeChat</h4>
                        </div>
                    </div>

                    <div class="span4">
                        <?php
                            //Check whether the session variables SESS_COMPANY_ID and MEMBER_ID are present or not

                            if((!isset($_SESSION['SESS_COMPANY_ID']) || (trim($_SESSION['SESS_COMPANY_ID']) == '')) &&
                             (!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')))
                            {
                            
                        ?>
                        <!---- active links ----->
                        <div class="active-link-sec-header">
                            <h4>active links</h4>
                        </div>
                        <?php include'views/active-links-sec.php'?>
                        <!---- recommended links ----->
                        <div class="active-link-sec-header">
                            <h4>links you might like to follow</h4>
                        </div>
                        <?php include'views/recomm-links-sec.php'?>
                        <div class="active-link-extra">
                            <a href="#"> more ...</a>
                        </div>
                        <?php                            } else {?>
                           <form action="include/function_login.php">
                                <div class="sign-grid">
                                    <p><i class="flaticon-user77"></i> username ...</p>
                                    <input name="username" type="text" placeholder="username" required>
                                    <p><i class="flaticon-lock24"></i> password</p>
                                    <input name="password" type="password" placeholder="password ..." required>

                                    <button type="submit" class="btn">sign in</button>
                                    <p><a href="password-recovery.php"> forgot password?</a></p>
                                </div>
                             </form>
                        <?php include "views/form_signup.php"?>
                        <?php                            }?>
                    </div>

                </div>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
