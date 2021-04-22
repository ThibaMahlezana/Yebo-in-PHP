<?php
    // header functions
    include 'include/function_header.php';
    include 'include/function_posts_validation.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-comment32";
    $page_titlebar_header = "Timeline";
    $page_titlebar_desc = " view live stream of feeds";

    //search placeholder items
    search_placeholder();
    $search_plac = "timeline feeds";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | posts ...</title>

        <!-- stylesheets -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/default-style.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/timeline.css" />
        <link rel="stylesheet" type="text/css" href="styles/links.css" />

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

                    <!--- menu bar  --->
                    <?php include 'views/menubar.php'?>

                    <?php include 'views/browser-comp-bar.php'?>

                </div>

                <!--- content sestion --->
                <div class="span6">

                    <!---- title bar ----->
                    <?php include 'views/titlebar.php'?>

                    <?php echo $posts->displayPostFeeds(); ?>

                </div>

                <!--- active and recommended links --->
                <div class="span4">
                    <?php include'views/active-chats.php'; ?>

                    <!------- footer ------->
                    <?php include 'views/footer-mini.php'; ?>
                </div>

            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
