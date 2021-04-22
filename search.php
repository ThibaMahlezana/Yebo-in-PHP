<?php
    // header functions
    include 'include/function_header.php';

    //page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-search19";
    $page_titlebar_header = "search links";
    $page_titlebar_desc = " search everything here";

    //search placeholder items
    search_placeholder();
    $search_plac = "everything";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | search links ...</title>
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
                        <!---- search bar ----->
                        <div class="search-grid">
                            <div class="search-bar">
                                <p> search <strong> people, companies and general links...</strong></p>
                                <div class="search-bar-content"><input type="text" placeholder="search ..." /></div>
                                <div class="search-bar-icon">
                                    <a href="#">
                                        <i class="icon-search"></i>
                                    </a>
                            
                                </div>
                                <div class="clear"></div>
                            </div>
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
