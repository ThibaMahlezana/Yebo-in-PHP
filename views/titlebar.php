<?php 

 ?>
<!---- title bar ----->
<div class="title-bar" data-step="3" data-position="bottom" data-intro="This is where you will see where you are or which page you are in currently.">
    <div class="title-bar-icon">
        <i class="<?php echo $page_titlebar_icon ?>"></i>
    </div>
    <div class="title-bar-heading">
        <p><?php echo $page_titlebar_header ?></p>
    </div>
    <div class="title-bar-desc">
       <strong> <?php echo $user_information->getName(); ?>, </strong> <?php echo $page_titlebar_desc ?>
    </div>
    <div class="clear"></div>
</div> 
