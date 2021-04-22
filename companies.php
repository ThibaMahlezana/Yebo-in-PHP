<?php
    // header functions
    include 'include/function_header.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-building8";
    $page_titlebar_header = "companies";
    $page_titlebar_desc = " you have <strong> 105 </strong> company links ";

    //search placeholder items
    search_placeholder();
    $search_plac = "companies";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | companies ...</title>
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

                        <!---- company 1 ----->
                        <div class="full-comp-link">
                            <div class="full-comp-link-pone">
                                <div class="full-comp-link-avatar">
                                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                                </div>
                                <div class="full-comp-link-verf">
                                    <i class="icon-checkmark"></i>
                                </div>
                            </div>
                            <div class="full-comp-link-ptwo">
                                <div class="full-comp-link-name">
                                    <h4>ayttiq technologies</h4>
                                </div>
                                <div class="full-comp-link-desc">
                                    <p>private company</p>
                                    <p><i class="icon-location"></i> Johannesburg,ZA</p>
                                    <p><i class="icon-link"></i> ayttiq.com</p>
                                </div>
                            </div>
                            <div class="full-comp-link-pthree">
                                <div class="full-comp-link-type">
                                    <i class="icon-user-2"></i>
                                </div>
                                <div class="full-comp-link-stats">
                                    <p>20.5K</p>
                                    <p>followers</p> 
                                </div>
                                <div class="full-comp-link-follow">
                                    <i class="icon-plus"></i> follow
                                </div>
                                <div class="full-comp-link-more">
                                    <i class="icon-arrow-down-5"></i> more ...
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="full-comp-link-divider"></div>
                            <div class="full-comp-link-pfour">
                                <div class="full-comp-profs-soc">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-twitter"></i>
                                    <i class="icon-google-plus"></i>
                                </div>
                                <div class="full-comp-profs-cont">
                                    <i class="icon-phone"></i>
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="full-comp-profs-mid">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="full-comp-profs-extra">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-youtube"></i>
                                    <i class="icon-tumblr"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                <div class="companies-page-more"> view more companies</div>
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
