<?php

?>

<div class="modal hide fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="follow-profiles-modal">
        <!--- MODAL WINDOW HEADER --->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"> x </button>
            <p><strong> Following</strong> (<?php echo $f_number_following; ?>) <input style="background: #F0E8E0" type="text" placeholder="search"></p>
        </div><!--- / MODAL WINDOW HEADER --->

        <!--- MODAL WINDOW BODY --->
        <div class="modal-body" style="background: #F0E8E0">
            <h4 class="follow-profiles-modal-item"><img class="img-rounded" width="30" src="images/user3.jpg"/> thiba mahlezana <i class="flaticon-user77 pull-tight"></i></h4>
            <h4 class="follow-profiles-modal-item"><img class="img-rounded" width="30" src="images/user4.jpg"/> ayttiq technologies <i class="flaticon-building8 pull-tight"></i></h4>
            <?php
            $query = mysql_query("SELECT * FROM follows WHERE following_id='$f_loggedUserId' AND following_type='$f_type'");
            while($results = mysql_fetch_assoc($query)){

                $followed_id = $results['followed_id'];
                $followed_type = $results['followed_type'];
                $passedUser = $followed_id;

                if($followed_type == 1){
                    $userQry = mysql_query("SELECT * FROM members WHERE user_id = '$followed_id'");
                    $userInfo = mysql_fetch_assoc($userQry);
                    $name = $userInfo['username'];
                    $avatar = $userInfo['avatar'];
                    $userType = 'flaticon-user77';
                    $fname = $userInfo['first_name'];
                    $lastName = $userInfo['last_name'];
                    $name = ''.$fname.' '.$lastName.'';
                }
                if($followed_type == 2){
                    $userQry = mysql_query("SELECT * FROM companies WHERE company_id = '$followed_id'");
                    $userInfo = mysql_fetch_assoc($userQry);
                    $name = $userInfo['name'];
                    $avatar = $userInfo['logo'];
                    $userType = 'flaticon-building8';
                }
                //$passedUser = $followed_id;
                //$passedUser = $_GET['user_id'];
                //$f_passedUserId = $infomation->getPassedUserId($passedUser);
                echo'
                    <h4 class="follow-profiles-modal-item"><img class="img-rounded" width="30" src="'.$avatar.'"/> '.$name.' <i class="'.$userType.' pull-tight"></i></h4>
                ';
            }
            ?>
        </div><!--- /MODAL WINDOW BODY --->

        <!--- MODAL WINDOW FOOTER --->
        <div class="modal-footer">
        </div><!--- /MODAL WINDOW FOOTER --->
    </div>
</div>
