<?php
    // header functions
    include 'include/function_header.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-speech59";
    $page_titlebar_header = "Chats";
    $page_titlebar_desc = " views trending chats";

    //search placeholder items
    search_placeholder();
    $search_plac = "chats";

    // UPDATE VIEWS TABLE
    $admin->updateChatsViews();
    
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | chat ...</title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/chats.css" />

    </head>
    <body>
        <?php include'views/navbar.php'?>

        <div class="container">
            <div class="row">
                <div class="span3">
                    <!------------ chat user --------->
                    <?php include 'views/userbar.php'?>

                    <!--------- active users box --------->
                    <div id="online-users-box"><?php $chats->displayActiveUsers(); ?></div>

                    <!--------- recent chats box --------->
                    <div class="recent-chats-box">
                        <div class="recent-chats-header">
                            <div class="recent-chats-topic">Recent Chats</div>
                            <div class="clear"></div>
                        </div>
                        <div class="recent-chats-messages">
                            <?php echo $chats->displayRecentChats();?>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <?php include 'views/titlebar.php'?>

                    <div id="chat-box">
                        <?php if(empty($_GET['post_id']) && empty($_GET['post_type'])){ 
                                if($chats->firstRecentChatDisplayStatus() == '1'){
                                    $chats->displayFirstRecentChatsConversation();
                                }
                                else {
                                    echo '<div>Currently there are no chats available for you.</div>';
                                }
                            }
                            if(!empty($_GET['post_id']) && !empty($_GET['post_type'])){
                                $post_type = $_GET['post_type'];
                                $post_id = $_GET['post_id'];
                                 
                                if($post_type == '1'){
                                    $posts->displayQuotePostTopic($post_id, $post_type);
                                }
                                if($post_type == '2'){
                                    $posts->displayThoughtPostTopic($post_id, $post_type);
                                }
                                if($post_type == '3'){
                                    $posts->displayImagePostTopic($post_id, $post_type);
                                }
                                if($post_type == '4'){
                                    $posts->displayVideoPostTopic($post_id, $post_type);
                                }
                                if($post_type == '5'){
                                    $posts->displayLinkPostTopic($post_id, $post_type);
                                }
                                if($post_type == '6'){
                                    $posts->displayNormalPostTopic($post_id, $post_type);
                                }
                                if($post_type == '7'){
                                    $posts->displayTopicPostTopic($post_id, $post_type);
                                }

                                $posts->displayTimelineFeedsChats($post_id, $post_type);
                            }
                        ?>                            
                    </div>
                </div>

                <div class="span4">
                    <!------ active and popular chats ------>
                    <?php include'views/active-chats.php'; ?>

                    <!------- footer ------->
                    <?php include 'views/footer-mini.php'; ?>
                </div>

            </div>
        </div>

        <!----- JavaScripts ----->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/basic.js"></script>
        <script type="text/javascript" src="js/module_chats.js"></script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>

    </body>
</html>
