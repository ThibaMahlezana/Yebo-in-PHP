<?php
    // header functions
    include 'include/function_header.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-bell13";
    $page_titlebar_header = "notifications";
    $page_titlebar_desc = " you have <strong> 8 </strong> new notifications";

    //search placeholder items
    search_placeholder();
    $search_plac = "notifications";

    // UPDATE VIEWS TABLE
    $admin->updateNotificationsViews();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | notifications ...</title>
        <!-- stylesheets & JavaScripts -->
        <?php include 'views/header.php'?>
    </head>
    <body>
        <div class="main">
            <div class="wrap">
                <!--- main navbar --->
                <?php include'views/navbar.php'?>

                <!--- row --->
                <div class="row">
                    <!--- navigation section --->
                    <div class="span3">
                        <!--- current userbar --->
                        <?php include 'views/userbar.php'?>

                        <!--- menu bar  --->
                        <?php include 'views/menubar.php'?>
                    </div>

                    <!--- content sestion --->
                    <div class="span6">
                        <!---- title bar ----->
                        <?php include 'views/titlebar.php'?>
                        <div class="page-title">here is a list ...</div>
                        <!-- notification feed 1-->
                        <div class="soc-feed">
                            <div class="soc-feed-path-one">
                                <div class="soc-feed-name"><strong>Asanda</strong></div>
                                <div class="soc-feed-avatar">
                                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                                </div>
                                <div class="soc-feed-verf">
                                    <i class="icon-bell"></i>
                                </div>
                            </div>
                            <div class="soc-feed-path-two">
                                <div class="soc-feed-time"><strong> just now</strong></div>
                                <div class="soc-feed-body">
                                    asanda followed you
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>              

                    </div>

                    <!--- active and recommended links --->
                    <div class="span4">
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
                    </div>

                </div>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
