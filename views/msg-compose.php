<?php

?>

<div id="MessageCompose" class="modal fade modalMessageCompose" tabindex="-1" role="dialog">
    <form method="post" action="../include/function_send-msg.php">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <i class="flaticon-font2"></i> Compose new message
    </div>
    <div class="modal-body" style="background: #F0E8E0">
        <div class="msg-com-pone">
            <p> to :</p>
        </div>
        <div class="msg-com-ptwo">
            <input name="reciever" type="search">
        </div>
        <div class="clear"></div>
        <div class="msg-com-pone">
           <p> Message :</p> 
        </div>
        <div class="msg-com-ptwo">
            <textarea name="content" class="input xlarge" id="textarea" rows="4" placeholder="reply ..."></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn"><i class="flaticon-reply8"></i> send</button>
    </div>
    </form>
</div>
