<?php
    // header functions
    include 'include/function_header.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-picture13";
    $page_titlebar_header = "Photos";
    $page_titlebar_desc = "see your photos here";

    //search placeholder items
    search_placeholder();
    $search_plac = "profile";

    // UPDATE VIEWS TABLE
    $profileViews .= $viewsResults['profile_views']+1;
    mysql_query("UPDATE views SET profile_views='$profileViews' WHERE view_id=1");

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | photos </title>
        <!-- stylesheets & JavaScripts -->
        <?php include 'views/header.php'?>

        <link rel="stylesheet" type="text/css" href="styles/photos.css" />
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
                        <h3><?php echo $photos->getNumOfPhotos(); ?></h3>
                        <?php $photos->displayPhotos(); ?>


                        <div class="active-link-extra">
                            <a href="#">add more mail accounts</a>
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
