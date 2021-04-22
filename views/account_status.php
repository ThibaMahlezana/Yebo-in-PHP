<?php
?>
<div class="account_status_grid">
    <h3>account status</h3>
    <p><strong>aypage ID :</strong> <?php echo $f_username; ?> <i style="color: #f00;" class="flaticon-remove11"></i></p>
    <p><strong> version</strong> : aypage V.1.0</p>
    <p><strong>Joined</strong> : <?php echo date('Y M d',$f_signup_date); ?></p>
    <p><strong>subscription</strong></p>
    <p><?php echo date('M d', $f_signup_date); ?> - <?php echo date('M d', $f_expire_date); ?></p>
    <h4><strong><?php echo $f_days_left; ?> </strong> days left</h4>
    <div class="divider"></div>

    <p>we dont't sell ads ever.</p>
</div>