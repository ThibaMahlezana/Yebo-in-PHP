<?php 
?>

<div class="current_user_box" data-step="1" data-intro="This is your basic profile information and a link to your full profile page.">
    <div class="current_user_photo">
        <img alt="avatar" src="<?php echo $user_information->getPhoto(); ?>"/>
    </div>
    <div class="current_user_body">
        <p class="current_user_username"><a href="profile.php"><strong>@<?php echo $user_information->getUsername(); ?></strong></a></p> 
        <p class="current_user_description"><?php echo $user_information->getBio(); ?></p>
    </div>
    <div class="clear"></div>
        <?php 
        if($user_identity->getLoggedUserType() == 1){
        ?>
        <div class="current_user_type">
            <a href="profile.php"><i class="flaticon-user77"></i></a>
        </div>
        <?php        }?> 
    
        <?php 
        if($user_identity->getLoggedUserType() == 2){
        ?>
        <div class="current_user_type">
            <a href="profile.php"><i class="flaticon-building8"></i></a>
        </div>      
        <?php        }?>

    <div class="clear"></div>
    <p class="current_user_name"><?php echo $user_information->getName(); ?> <?php echo $user_information->getLastName(); ?></p> 
</div>