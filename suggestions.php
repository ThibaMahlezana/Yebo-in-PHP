<?php
    // header functions
    include 'include/function_header.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "icon-link-2";
    $page_titlebar_header = "suggested links";
    $page_titlebar_desc = " check out links you might like to follow";

    //search placeholder items
    search_placeholder();
    $search_plac = "suggestions";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | suggested links ...</title>
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
                    <!---- recommended link 1 ----->
                        <div class="full-indiv-link">
                            <div class="full-indiv-link-pone">
                                <div class="full-indiv-link-avatar">
                                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                                </div>
                                <div class="full-indiv-link-verf">
                                    <i class="icon-checkmark"></i>
                                </div>
                            </div>
                            <div class="full-indiv-link-ptwo">
                                <div class="full-indiv-link-name">
                                    <h4>asanda mahlezana</h4>
                                </div>
                                <div class="full-indiv-link-desc">
                                    <p>18 year old, Female</p>
                                    <p><i class="icon-location"></i> Durban,ZA</p>
                                    <p><i class="icon-briefcase"></i> unemployed</p>
                                    <p><i class="icon-link"></i> asanda.com</p>
                                </div>
                            </div>
                            <div class="full-indiv-link-pthree">
                                <div class="full-indiv-link-type">
                                    <i class="icon-user-2"></i>
                                </div>
                                <div class="full-indiv-link-stats">
                                    <p>20.5K</p>
                                    <p>followers</p> 
                                </div>
                                <div class="full-indiv-link-follow">
                                    <i class="icon-plus"></i> follow
                                </div>
                                <div class="full-indiv-link-more">
                                    <i class="icon-arrow-down-5"></i> more ...
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="full-indiv-link-divider"></div>
                            <div class="full-indiv-link-pfour">
                                <div class="full-indiv-profs-soc">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-twitter"></i>
                                    <i class="icon-google-plus"></i>
                                </div>
                                <div class="full-indiv-profs-cont">
                                    <i class="icon-phone"></i>
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="full-indiv-profs-mid">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="full-indiv-profs-extra">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-youtube"></i>
                                    <i class="icon-tumblr"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---- recommended link 2 ----->
                        <div class="full-indiv-link">
                            <div class="full-indiv-link-pone">
                                <div class="full-indiv-link-avatar">
                                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                                </div>
                                <div class="full-indiv-link-verf">
                                    <i class="icon-checkmark"></i>
                                </div>
                            </div>
                            <div class="full-indiv-link-ptwo">
                                <div class="full-indiv-link-name">
                                    <h4>asanda mahlezana</h4>
                                </div>
                                <div class="full-indiv-link-desc">
                                    <p>18 year old, Female</p>
                                    <p><i class="icon-location"></i> Durban,ZA</p>
                                    <p><i class="icon-briefcase"></i> unemployed</p>
                                    <p><i class="icon-link"></i> asanda.com</p>
                                </div>
                            </div>
                            <div class="full-indiv-link-pthree">
                                <div class="full-indiv-link-type">
                                    <i class="icon-user-2"></i>
                                </div>
                                <div class="full-indiv-link-stats">
                                    <p>20.5K</p>
                                    <p>followers</p> 
                                </div>
                                <div class="full-indiv-link-follow">
                                    <i class="icon-plus"></i> follow
                                </div>
                                <div class="full-indiv-link-more">
                                    <i class="icon-arrow-down-5"></i> more ...
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="full-indiv-link-divider"></div>
                            <div class="full-indiv-link-pfour">
                                <div class="full-indiv-profs-soc">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-twitter"></i>
                                    <i class="icon-google-plus"></i>
                                </div>
                                <div class="full-indiv-profs-cont">
                                    <i class="icon-phone"></i>
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="full-indiv-profs-mid">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="full-indiv-profs-extra">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-youtube"></i>
                                    <i class="icon-tumblr"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---- recommended link 3 ----->
                        <div class="full-indiv-link">
                            <div class="full-indiv-link-pone">
                                <div class="full-indiv-link-avatar">
                                    <img alt="avatar" class="img-rounded" src="images/asa-profile-pic.jpg" />
                                </div>
                                <div class="full-indiv-link-verf">
                                    <i class="icon-checkmark"></i>
                                </div>
                            </div>
                            <div class="full-indiv-link-ptwo">
                                <div class="full-indiv-link-name">
                                    <h4>asanda mahlezana</h4>
                                </div>
                                <div class="full-indiv-link-desc">
                                    <p>18 year old, Female</p>
                                    <p><i class="icon-location"></i> Durban,ZA</p>
                                    <p><i class="icon-briefcase"></i> unemployed</p>
                                    <p><i class="icon-link"></i> asanda.com</p>
                                </div>
                            </div>
                            <div class="full-indiv-link-pthree">
                                <div class="full-indiv-link-type">
                                    <i class="icon-user-2"></i>
                                </div>
                                <div class="full-indiv-link-stats">
                                    <p>20.5K</p>
                                    <p>followers</p> 
                                </div>
                                <div class="full-indiv-link-follow">
                                    <i class="icon-plus"></i> follow
                                </div>
                                <div class="full-indiv-link-more">
                                    <i class="icon-arrow-down-5"></i> more ...
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="full-indiv-link-divider"></div>
                            <div class="full-indiv-link-pfour">
                                <div class="full-indiv-profs-soc">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-twitter"></i>
                                    <i class="icon-google-plus"></i>
                                </div>
                                <div class="full-indiv-profs-cont">
                                    <i class="icon-phone"></i>
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="full-indiv-profs-mid">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="full-indiv-profs-extra">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-youtube"></i>
                                    <i class="icon-tumblr"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---- recommended link 4 ----->
                        <div class="full-indiv-link">
                            <div class="full-indiv-link-pone">
                                <div class="full-indiv-link-avatar">
                                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                                </div>
                                <div class="full-indiv-link-verf">
                                    <i class="icon-checkmark"></i>
                                </div>
                            </div>
                            <div class="full-indiv-link-ptwo">
                                <div class="full-indiv-link-name">
                                    <h4>asanda mahlezana</h4>
                                </div>
                                <div class="full-indiv-link-desc">
                                    <p>18 year old, Female</p>
                                    <p><i class="icon-location"></i> Durban,ZA</p>
                                    <p><i class="icon-briefcase"></i> unemployed</p>
                                    <p><i class="icon-link"></i> asanda.com</p>
                                </div>
                            </div>
                            <div class="full-indiv-link-pthree">
                                <div class="full-indiv-link-type">
                                    <i class="icon-user-2"></i>
                                </div>
                                <div class="full-indiv-link-stats">
                                    <p>20.5K</p>
                                    <p>followers</p> 
                                </div>
                                <div class="full-indiv-link-follow">
                                    <i class="icon-plus"></i> follow
                                </div>
                                <div class="full-indiv-link-more">
                                    <i class="icon-arrow-down-5"></i> more ...
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="full-indiv-link-divider"></div>
                            <div class="full-indiv-link-pfour">
                                <div class="full-indiv-profs-soc">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-twitter"></i>
                                    <i class="icon-google-plus"></i>
                                </div>
                                <div class="full-indiv-profs-cont">
                                    <i class="icon-phone"></i>
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="full-indiv-profs-mid">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="full-indiv-profs-extra">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-youtube"></i>
                                    <i class="icon-tumblr"></i>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---- recommended link 5 ----->
                        <div class="full-indiv-link">
                            <div class="full-indiv-link-pone">
                                <div class="full-indiv-link-avatar">
                                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                                </div>
                                <div class="full-indiv-link-verf">
                                    <i class="icon-checkmark"></i>
                                </div>
                            </div>
                            <div class="full-indiv-link-ptwo">
                                <div class="full-indiv-link-name">
                                    <h4>asanda mahlezana</h4>
                                </div>
                                <div class="full-indiv-link-desc">
                                    <p>18 year old, Female</p>
                                    <p><i class="icon-location"></i> Durban,ZA</p>
                                    <p><i class="icon-briefcase"></i> unemployed</p>
                                    <p><i class="icon-link"></i> asanda.com</p>
                                </div>
                            </div>
                            <div class="full-indiv-link-pthree">
                                <div class="full-indiv-link-type">
                                    <i class="icon-user-2"></i>
                                </div>
                                <div class="full-indiv-link-stats">
                                    <p>20.5K</p>
                                    <p>followers</p> 
                                </div>
                                <div class="full-indiv-link-follow">
                                    <i class="icon-plus"></i> follow
                                </div>
                                <div class="full-indiv-link-more">
                                    <i class="icon-arrow-down-5"></i> more ...
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="full-indiv-link-divider"></div>
                            <div class="full-indiv-link-pfour">
                                <div class="full-indiv-profs-soc">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-twitter"></i>
                                    <i class="icon-google-plus"></i>
                                </div>
                                <div class="full-indiv-profs-cont">
                                    <i class="icon-phone"></i>
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="full-indiv-profs-mid">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="full-indiv-profs-extra">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-youtube"></i>
                                    <i class="icon-tumblr"></i>
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
