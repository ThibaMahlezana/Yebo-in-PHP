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

    // UPDATE VIEWS TABLE
    $admin->updateTimelineViews();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | timeline ...</title>

        <!-- stylesheets -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/timeline.css" />

    </head>
    <body>
        <!--- main navbar --->
        <?php include'views/navbar.php'; ?>

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
                    <?php include 'views/titlebar.php'; ?>

                    <!---- Create post form ----->
                    <div class="create-post-box">
                        <a id="create_topic" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-comments16"></i></div>
                            <div class="create-post-name">Topic</div>
                        </a>
                        <a id="create_custom" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-font2"></i></div>
                            <div class="create-post-name">Custom</div>
                        </a>
                        <a id="create_image" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-picture13"></i></div>
                            <div class="create-post-name">Image</div>
                        </a>
                        <a id="create_video" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-video91"></i></div>
                            <div class="create-post-name">Video</div>
                        </a>
                        <a id="create_link" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-link15"></i></div>
                            <div class="create-post-name">Link</div>
                        </a>
                        <a id="create_thought" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-light45"></i></div>
                            <div class="create-post-name">Thought</div>
                        </a>
                        <a id="create_quote" href="#" class="create-post-item">
                            <div class="create-post-icon"><i class="flaticon-quote2"></i></div>
                            <div class="create-post-name">Quote</div>
                        </a>
                    </div>
                    
                    <!------- Validation Bar ------->
                    <?php if(!empty($validation_message)){
                        if($validation_status == 'warning'){
                            foreach($validation_message as $alert_message){
                                echo '
                                    <div class="alert alert-danger post-validation-message">
                                        <i class="flaticon-warning18"></i>sorry, '.$alert_message.'
                                    </div>
                                ';
                            }    
                        }

                        elseif($validation_status == 'information'){
                            foreach($validation_message as $alert_message){
                                echo '
                                    <div class="alert alert-success post-validation-message">
                                        <i class="flaticon-check30"></i> '.$alert_message.'
                                    </div>
                                ';
                            }    
                        }

                     } ?>

                    <!----- Topic post form ----->
                    <div class="topic-post-form-box">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="topic-post-form-header">
                                <a><i class="flaticon-comments16"></i> Chat Topic</a>
                            </div>
                            <div class="topic-post-form-content">
                                <input name="post_type" value="topic" type="hidden"/>
                                <textarea name="topic_content" cols="2" placeholder="write a chat topic..."></textarea>
                            </div>
                            <div class="topic-post-form-submit">
                                <p><input class="radio-button" name="post_privacy" id="optionsRadios1" value="1" type="radio" required> public </p>
                                <p><input class="radio-button" name="post_privacy" id="optionRadios2" value="2" type="radio" required> private </p>
                                <button class="btn" type="submit"> post</button>
                            </div>
                        </form>
                        <div class="clear"></div>
                    </div>

                    <!------- Custom post form ------->
                    <div class="custom-post-form-box">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="custom-post-form-header">
                                <a><i class="flaticon-font2"></i> Custom Post</a>
                            </div>
                            <div class="custom-post-form-content">
                                <input name="post_type" value="custom" type="hidden"/>
                                <input name="custom_subject" type="text" placeholder="subject..."/>
                                <textarea name="custom_content" rows="2" placeholder="content..."></textarea>
                            </div>
                            <div class="custom-post-form-submit">
                                <p><input class="radio-button" name="custom_privacy" id="optionsRadios1" value="1" type="radio" required> public </p>
                                <p><input class="radio-button" name="custom_privacy" id="optionRadios2" value="2" type="radio" required> private </p>
                                <button type="submit" class="btn"> post</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>

                    <!------- Image post form ------->
                    <div class="image-post-form-box">
                        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="image-post-form-header">
                                <a><i class="flaticon-picture13"></i> Image</a>
                            </div>
                            <div class="image-post-form-content">
                                <input name="post_type" value="image" type="hidden"/>
                                <p class="image-post-form-content-view"> preview</p>
                                <p><input name="image_caption" type="text" placeholder="write your caption..."/></p>
                                <p><input name="image_file" type="file" /></p>
                            </div>
                            <div class="image-post-form-submit">
                                <p><input class="radio-button" name="post_privacy" id="optionsRadios1" value="public" type="radio" required> public </p>
                                <p><input class="radio-button" name="post_privacy" id="optionRadios2" value="private" type="radio" required> private </p>
                                <button type="submit" class="btn"> post</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>

                    <!------- Video post form ------->
                    <div class="video-post-form-box">
                        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="video-post-form-header">
                                <a><i class="flaticon-video91"></i> Video</a>
                            </div>
                            <div class="video-post-form-content">
                                <input name="post_type" value="video" type="hidden"/>
                                <p class="video-post-form-content-view"> preview</p>
                                <p><input name="video_caption" type="text" placeholder="write your caption..."/></p>
                                <p><input name="video_file" type="file" /></p>
                            </div>
                            <div class="video-post-form-submit">
                                <p><input class="radio-button" name="post_privacy" id="optionsRadios1" value="public" type="radio"> public </p>
                                <p><input class="radio-button" name="post_privacy" id="optionRadios2" value="private" type="radio"> private </p>
                                <button type="submit" class="btn"> post</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                        <div class="clear"></div>
                    </div>

                    <!------- Link post form ------->
                    <div class="link-post-form-box">
                        <div class="link-post-form-header">
                            <a><i class="flaticon-link15"></i> Link</a>
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="link-post-form-content">
                                <input name="post_type" value="link" type="hidden"/>
                                <input name="link_url" type="text" value="http://"/>
                                <input name="link_caption" type="text" placeholder="caption..."/>
                            </div>
                            <div class="link-post-form-submit">
                                <p><input class="radio-button" name="post_privacy" id="optionsRadios1" value="1" type="radio" > public </p>
                                <p><input class="radio-button" name="post_privacy" id="optionRadios2" value="2" type="radio" > private </p>
                                <button class="btn" type="submit"> post</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>

                    <!------- Thought post form ------->
                    <div class="thought-post-form-box">
                        <div class="thought-post-form-header">
                            <a><i class="flaticon-light45"></i> Thought</a>
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="thought-post-form-content">
                                <input name="post_type" value="thought" type="hidden"/>
                                <input name="thought_content" type="text" placeholder="write your thought...">
                            </div>
                            <div class="thought-post-form-submit">
                                <p><input class="radio-button" name="post_privacy" id="optionsRadios1" value="1" type="radio" required> public </p>
                                <p><input class="radio-button" name="post_privacy" id="optionRadios2" value="2" type="radio" required> private </p>
                                <button class="btn" type="submit"> post</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>

                    <!------- Quote post form ------->
                    <div class="quote-post-form-box">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="quote-post-form-header">
                                <a><i class="flaticon-quote2"></i> Quote</a>
                            </div>
                            <div class="quote-post-form-content">
                                <input name="post_type" value="quote" type="hidden"/>
                                <input name="post_privacy" value="1" type="hidden"/>
                                <input name="quote_content" type="text" placeholder="write your quote..."/>
                                <input name="quote_source" type="text" placeholder="write the source..."/>
                            </div>
                            <div class="quote-post-form-submit">
                                <button class="btn" type="submit"> post</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>


                    <?php 
                         if(!empty($posts->displayTimelinePostFeeds())){
                             echo $posts->displayTimelinePostFeeds();
                         }
                         if(empty($posts->displayTimelinePostFeeds())){
                             echo '
                                <div class="no-post-warning">
                                    Sorry, currently there are no posts for you. 
                                    Follow other people or companies to see thier posts.
                                    <i class="flaticon-smile"></i>
                                </div>
                             ';
                         }
                         
                     ?>

                    <!------- Topic post -------
                    <div class="topic-post-box">
                        <div class="topic-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="topic-post-user">
                            <img alt="avatr" src="avatars/default-pic.jpg"/>
                        </div>
                        <div class="topic-post-content">
                            I am the <strong>#CEO</strong> <strong>@ayttiq</strong> technologies, a company of #aypage.
                            <i class="pull-right flaticon-earth17"></i>
                            <div class="divider"></div>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                        <div class="clear"></div>
                    </div> <!------- / Topic post ------->

                    <!------- Custom post -------
                    <div class="custom-post-box">
                        <div class="custom-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="custom-post-user">
                            <img alt="avatr" src="avatars/default-pic.jpg"/>
                        </div>
                        <div class="custom-post-content">
                            <i class="pull-right flaticon-lock24"></i>
                            <p>Free ebooks for ever.</p>
                            <p>download Free #ebooks free forever @web.</p>
                            <div class="divider"></div>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                        <div class="clear"></div>
                    </div> <!------- / Custom post ------->

                    <!------- Image post -------
                    <div class="image-post-box">
                        <div class="image-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="image-post-user">
                            <img alt="avatr" src="avatars/default-pic.jpg"/>
                        </div>
                        <div class="image-post-content">
                            <p><img alt="image" src="images/bitch.jpg"/></p>
                            <p>here we write a <strong>#caption</strong> for an <strong>@video_post</strong></p>
                            <div class="divider"></div>
                            <i class="pull-right flaticon-lock24"></i>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                    </div> ->
                    <div class="clear"></div><!------- / Image post ------

                    <!------- Video post -------
                    <div class="video-post-box">
                        <div class="video-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="video-post-user">
                            <img alt="avatr" src="avatars/asa-profile-pic.jpg"/>
                        </div>
                        <div class="video-post-content">
                            <video controls>
                                <source src="videos/VID-20121116-WA0001.mp4"/>
                            </video>
                            <p>here we write a <strong>#caption</strong> for an <strong>@video_post</strong></p>
                            <div class="divider"></div>
                            <i class="pull-right flaticon-lock24"></i>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div> <!------- / Video post ------->

                    <!------- Link post -------
                    <div class="link-post-box">
                        <div class="link-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="link-post-user">
                            <img alt="avatr" src="avatars/default-pic.jpg"/>
                        </div>
                        <div class="link-post-content">
                            <i class="pull-right flaticon-lock24"></i>
                            <p><a href=" http://www.ayttiq.com/aypage/discover-more-about.">  http://www.ayttiq.com/aypage/discover-more-about.</a></p>
                            <p>download Free <strong> #ebooks</strong> free forever <strong> @web</strong>.</p>
                            <div class="divider"></div>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                        <div class="clear"></div>
                    </div> <!------- / Link post ------->


                    <!------- Quote post -------
                    <div class="quote-post-box">
                        <div class="quote-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="quote-post-user">
                            <img alt="avatr" src="avatars/default-pic.jpg"/>
                        </div>
                        <div class="quote-post-content">
                            <i class="pull-right flaticon-lock24"></i>
                            <p><strong> "</strong>Your playing small does not serve the world, who are you not to be great, you have unlimited potential to successed <strong>"</strong>.</p>
                            <p>Nelson Mandela</p>
                            <div class="divider"></div>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                        <div class="clear"></div>
                    </div> <!------- / Quote post ------->

                    <!------- Thought post -------
                    <div class="thought-post-box">
                        <div class="thought-post-username"><a>@Asavela_mdindi</a></div>
                        <div class="thought-post-user">
                            <img alt="avatr" src="avatars/default-pic.jpg"/>
                        </div>
                        <div></div>
                        <div></div>
                        <div class="thought-post-content">
                            <p>This is a thought Bubble, forks unser</p>
                            <i class="pull-right flaticon-lock24"></i>
                            <div class="divider"></div>
                            <a href="#"><i class="flaticon-comment32"></i> 20 000</a>
                            <a href="#"><i class="flaticon-user77"></i> 807</a>
                        </div>
                        <div class="clear"></div>
                    </div> <!------- / Thought post ------->
                </div>

                <div class="span4">
                    <?php include'views/active-chats.php'; ?>

                    <!------- footer ------->
                    <?php include 'views/footer-mini.php'; ?>
                </div>

            </div>
        </div>
        
        <!----- JavaScripts ----->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/basic.js"></script>
        <script type="text/javascript" src="js/timeline-posts.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
