<?php
    include 'include/function_header.php';
    include 'include/function_messages_validation.php';

    // page titlebar
    page_title_bar();
    $page_titlebar_icon = "flaticon-envelope4";
    $page_titlebar_header = "Messages";
    $page_titlebar_desc = " you have <strong>".$messages->getNumberOfNewMessages()."</strong> new messages";

    //search placeholder items
    search_placeholder();
    $search_plac = "messages";

    // UPDATE VIEWS TABLE
    $admin->updateMessagesViews();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | messages ...</title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/messages.css" />

    </head>
    <body>
        <!--- main navbar --->
        <?php include'views/navbar.php'; ?>
        
        <div class="container">
            <div class="row">
                <div class="span3">
                    <!--- current userbar --->
                    <?php include 'views/userbar.php'?>

                    <!--- menu bar  --->
                    <div class="recent_messages_section" data-step="2" data-position="right" data-intro="This is a list of messages sent to you.">
                        <div class="recent_messages_section_header">
                            <p><strong>Recent Messages</strong></p>
                            <p><strong><?php echo $messages->getNumberOfAllMessages(); ?></strong> Messages</p>
                            <div class="clear"></div>
                        </div>
                        <?php $messages->displayRecentMessages(); ?>
                    </div>
                </div>

                <div class="span6">
                    <!---- title bar ----->
                    <?php include 'views/titlebar.php'?>
                    <!------- Alert Bar ------->

                    <?php 
                        if(!empty($validation_message)){
                            if($validation_message_type == 'warning'){
                                foreach($validation_message as $alert_message){
                                    echo '
                                        <div class="alert alert-danger compose_message_box_alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="flaticon-warning18"></i> '.$alert_message.'
                                        </div>
                                    ';
                                }
                            }

                            elseif($validation_message_type = 'information'){
                                foreach($validation_message as $alert_message){
                                    echo '
                                        <div class="alert alert-success compose_message_box_alert">
                                            <i class="flaticon-check30"></i>'.$alert_message.'
                                        </div>
                                    ';
                                }
                            }
                            
                        }
                    ?>

                    <!------- Compose Message Form ------->
                    <div class="compose_message_box" data-step="4" data-position="bottom" data-intro="This is where you compose new message.">
                        <p id="compose_message_btn" class="compose_message_box_header"><i class="flaticon-pencil30"></i> Compose new Message</p>
                        <form id="compose_message_view" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input name="message_validation_type" value="compose_message" type="hidden"/>
                            <input name="message_from" value="<?php echo $user_identity->getLoggedUserId(); ?>" type="hidden"/>
                            <input name="message_from_type" value="<?php echo $user_identity->getLoggedUserType(); ?>" type="hidden"/>
                            <p id="search-box" class="compose_message_box_recipient">Forward to <input name="message_to" type="text" placeholder="Start typing..." /></p>
                            <div id="display"></div>
                            <div class="compose_message_box_content">
                                <textarea id="message_content" maxlength="125" cols="3" name="message_text" placeholder="Message..."></textarea>
                            </div>
                            <div class="compose_message_box_footer">
                                <div class="compose_message_box_footer_links">
                                    <a href="#"><i class="flaticon-smile"></i></a>
                                    <a href="#"><i class="flaticon-link15"></i></a>
                                </div>
                                <a id="message_words_counter" class="compose_message_box_footer_counter"><strong>125 </strong></a>
                                <button type="submit">send <i class="flaticon-share14"></i></button>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>

                    
                    <?php
                            $display_status = $messages->displayStatus();
                            if($display_status == 0){
                                echo '
                                    <div class="message_chat_box-validation">
                                        Sorry, currently there are no mesages for you.
                                    </div>
                                ';
                            }
                            elseif($display_status == 1){
                                ?>
                                    <div class="message_chat_box-grid" data-step="5" data-position="left" data-intro="This is where you will be able to see a conversation of messages between you and a recipient.">
                                        <div class="load-more-messages-btn"><a>Load More</a></div>
                                        <form id="conversation_message_form" method="post">
                                            <input type="hidden" name="message_validation_type" value="reply_message"/>
                                            <input type="hidden" id="logged_username" value="<?php echo $user_information->getUsername(); ?>"/>
                                            <input type="hidden" id="user_photo" value="<?php echo $user_information->getPhoto(); ?>"/>

                                            <div class="message_chat_area">
                                                <?php echo $messages->displayMessageConversation()?>
                                            </div>
                                            <div class="message_chat_reply_area">
                                                <textarea id="message_text" rows="2" maxlength="125" rows="2" placeholder="Message..."></textarea>
                                                <span id="message_words_counter-reply">125</span>
                                                <button type="button" class="btn" id="message_conversation_reply_btn"><i class="flaticon-reply8"></i> reply</button>
                                            </div>
                                        </form>
                                        <div class="clear"></div>
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
        <!------- JavaScript Files -------->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
        <script type="text/javascript" src="js/module_messages.js"></script>
        <script type="text/javascript" src="js/intro.js"></script>
    </body>
</html>