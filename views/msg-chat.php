<?php

?>

<div id="MessageChat" class="modal hide fade modalMessageChat" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        your messages with <strong><?php echo $rowOne['user_first_name'];?></strong><a class="modalMsgChat" href="aychat/index.php"><i class="flaticon-speech59"></i>ayChat</a>
    </div>
    <div class="modal-body">
        <div class="msg-oldMessages">view old messages</div>  
        <?php
            $queryUser= mysql_query("SELECT * FROM messages WHERE message_to = '$user_id' AND message_from='$user' ORDER BY message_time");

            while($currentUser = mysql_fetch_array($queryUser)){?>
        <div class="msg-feed">
            <div class="msg-feed-path-one">
                <div class="msg-feed-name"><strong>Asanda</strong></div>
                <div class="msg-feed-avatar">
                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                </div>
            </div>
            <div class="msg-feed-path-two">
                <div class="msg-feed-time"><strong> just now</strong></div>
                <div class="msg-feed-body">
                    hello messages hello messages hello messages hello messages hello messages hello messages 
                    hello messages hello messages hello messages hello messages hello messages hello messages
                    hello messages hello messages hello messages hello messages hello messages hello messages
                </div>
            </div>
        </div>
        <div class="clear"></div>
            <?php            }?>

        <?php 
            $queryRecp= mysql_query("SELECT * FROM messages WHERE message_from='$user' ORDER BY message_time");
            while($currentUser = mysql_fetch_array($queryRecp)){?>
        <div class="msg-feed">
            <div class="msg-feed-path-oneME">
                <div class="msg-feed-name"><strong>You</strong></div>
                <div class="msg-feed-avatar">
                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                </div>
            </div>
            <div class="msg-feed-path-twoME">
                <div class="msg-feed-timeMe"><strong> just now</strong></div>
                <div class="msg-feed-bodyMe">
                    hello messages hello messages hello messages hello messages hello messages hello messages 
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php            }?>
        <!---
        <div class="msg-feed">
            <div class="msg-feed-path-one">
                <div class="msg-feed-name"><strong>Asanda</strong></div>
                <div class="msg-feed-avatar">
                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                </div>
            </div>
            <div class="msg-feed-path-two">
                <div class="msg-feed-time"><strong> just now</strong></div>
                <div class="msg-feed-body">
                    hello messages hello messages hello messages hello messages hello messages hello messages 
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="msg-feed">
            <div class="msg-feed-path-oneME">
                <div class="msg-feed-name"><strong>You</strong></div>
                <div class="msg-feed-avatar">
                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                </div>
            </div>
            <div class="msg-feed-path-twoME">
                <div class="msg-feed-timeMe"><strong> just now</strong></div>
                <div class="msg-feed-bodyMe">
                    hello messages hello messages hello messages hello messages hello messages hello messages 
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="msg-feed">
            <div class="msg-feed-path-oneME">
                <div class="msg-feed-name"><strong>You</strong></div>
                <div class="msg-feed-avatar">
                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                </div>
            </div>
            <div class="msg-feed-path-twoME">
                <div class="msg-feed-timeMe"><strong> just now</strong></div>
                <div class="msg-feed-bodyMe">
                    hello messages hello messages hello messages hello messages hello messages hello messages 
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="msg-feed">
            <div class="msg-feed-path-one">
                <div class="msg-feed-name"><strong>Asanda</strong></div>
                <div class="msg-feed-avatar">
                    <img alt="avatar" class="img-rounded" src="../images/asa-profile-pic.jpg" />
                </div>
            </div>
            <div class="msg-feed-path-two">
                <div class="msg-feed-time"><strong> just now</strong></div>
                <div class="msg-feed-body">
                    hello messages hello messages hello messages hello messages hello messages hello messages 
                </div>
            </div>
        </div> --->
    </div>
    <div class="modal-footer">
        <textarea class="input xlarge" id="textarea" rows="2" placeholder="reply ..."></textarea>
        <button class="btn"><i class="flaticon-share14"></i> reply</button>
    </div>
</div>
