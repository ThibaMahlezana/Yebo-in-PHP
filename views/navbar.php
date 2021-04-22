<?php 
    
?>
        <div class="navbar-box">
            <div class="navbar-sec-1">
                <a href="timeline.php"><i class="flaticon-list30"></i> Timeline</a>
                <a href="chat.php"><i class="flaticon-speech59"></i> Chats</a>
            </div>
            <div class="navbar-sec-2">
                <input type="text" placeholder="search..."/>
                <div class="notifications-badge dropdown">
                    <a type="button" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if($notifications->getNumNotifications() >= 1){
                                if($notifications->getNumNotifications() <= 9){
                                    echo '<span>0'.$notifications->getNumNotifications().'</span>';
                                }

                                else {
                                    echo '<span>'.$notifications->getNumNotifications().'</span>';
                                }
                            }
                         ?>
                        <i class="flaticon-bell13"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">
                                <span class="notifications-dropdown-content">@Asanda, @ayttiq and @bra_d followed you</span>
                                <span class="notifications-dropdown-time pull-right">1d</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">Thiba, Your Account is still not activated</span>
                                <span class="notifications-dropdown-time pull-right">2d</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">Thiba check your privacy settings</span>
                                <span class="notifications-dropdown-time pull-right">2d</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">Aypage is introducing new features next week</span>
                                <span class="notifications-dropdown-time pull-right">1w</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">@Asanda shared a post with you</span>
                                <span class="notifications-dropdown-time pull-right">2w</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">Aypage is introducing new features next week</span>
                                <span class="notifications-dropdown-time pull-right">1w</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">@Asanda shared a post with you</span>
                                <span class="notifications-dropdown-time pull-right">2w</span>
                            </a>
                        </li>
                        <li><a href="#">
                                <span class="notifications-dropdown-content">@Asanda shared a post with you</span>
                                <span class="notifications-dropdown-time pull-right">2w</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="notifications.php">More...</a></li>
                    </ul>
                </div>
                <div class="messages-badge dropdown">
                    <a type="button" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if($messages->getNumberOfNewMessages() >= 1){
                                if($messages->getNumberOfNewMessages() <= 9){
                                    echo '
                                        <span>0'.$messages->getNumberOfNewMessages().'</span>
                                    ';
                                }
                                else {
                                    echo '
                                        <span>'.$messages->getNumberOfNewMessages().'</span>
                                    ';          
                                }
                              }
                        ?>
                        <i class="flaticon-envelope4"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        <?php $messages->displayMessageNotifications(); ?>

                        <li><a><div class="messages-dropdown-avatar"><img alt="avatar" src="avatars/tiba-profile-pic.jpg"/></div> 
                               <div class="messages-dropdown-username">@username<span class="pull-right">1d</span></div>
                               <div class="messages-dropdown-content">This is an example of a message sent to a user.</div>
                               <div class="clear"></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="messages.php">More...</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-sec-3">
                <a href="settings.php"><i class="flaticon-cog2"></i> settings</a>
                <a href="help.php"><i class="flaticon-question22"></i> help</a>
                <a href="signed-out.php"><i class="flaticon-sign4"></i> sign out</a>
                <div class="pull-right">
                    <a class="intro-tool pull-right" href="javascript:void(0);" onclick="javascript:introJs().start();">
                        <i class="flaticon-information34"></i>
                    </a>
                </div>
            </div>
        </div>
