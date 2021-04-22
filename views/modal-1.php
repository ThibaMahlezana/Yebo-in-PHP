<?php

?>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        full profile view
    </div>
    <div class="modal-body">
        <div class="full-indiv-link">
            <img class="full-indiv-link-avatar img-rounded" src="<?php echo $f_photo; ?>"/>
            <div class="full-indiv-link-desc">
                <h3 class="full-indiv-link-descHeader"><?php echo $f_name; ?> <?php echo $f_lastName; ?></h3>
                <p style="margin-left: 8px;"><?php echo $f_username; ?></p>
                <p><?php echo $f_bio; ?></p>
                <p><i class="flaticon-map25"></i><?php echo $f_location; ?></p>
                <p><a href="<?php echo $f_url; ?>"> <i class="flaticon-link15"></i><?php echo $f_url; ?> </a></p>
            </div>
            <i class="full-indiv-link-user flaticon-user77"></i>
            <div class="clear"></div>
            <div class="divider"></div>

            <div class="full-indiv-profs-soc">
                <h5><strong> social prifiles</strong></h5>
                <div class="full-indiv-profs-socIcon">
                    <i class="flaticon-facebook25"></i>
                </div>
                <div class="full-indiv-profs-socName">
                    <strong> thiba mahlezana </strong>| facebook
                    <p> 250 friends, 250 followers </p>
                </div>
                <div class="clear"></div>

                <div class="full-indiv-profs-socIcon">
                    <i class="flaticon-twitter16"></i>
                </div>
                <div class="full-indiv-profs-socName">
                    <strong> @thiba_mahlezana </strong>| twitter
                    <p> 250 following, 250 followers </p>
                </div>
                <div class="clear"></div>
                <div class="full-indiv-profs-socIcon">
                    <i class="flaticon-google26"></i>
                </div>
                <div class="full-indiv-profs-socName">
                    <strong> +thiba-mahlezana</strong> google +
                    <p> 200 followers </p>
                </div>
                <div class="clear"></div>
            </div>

            <div class="divider"></div>

            <div class="full-indiv-profs-cont">
                <h5><strong> contacts</strong></h5>
                <div class="full-indiv-profs-contIcon">
                    <i class="flaticon-telephone66"></i>
                </div>
                <div class="full-indiv-profs-contName">
                    <p><strong><?php echo $f_phone; ?> </strong> | mobile phone</p>
                </div>
                <div class="clear"></div>
                <div class="full-indiv-profs-contIcon">
                    <i class="flaticon-envelope4"></i>
                </div>
                <div class="full-indiv-profs-contName">
                    <p><strong><?php echo $f_email; ?></strong> | primary email</p>
                </div>
                <div class="clear"></div>
            </div>

            <div class="divider"></div>

            <div class="full-indiv-profs-mid">
                <h5>mobile chat</h5>
                <p>WhatsApp</p>
                <p>WeChat</p>
            </div>

            <div class="divider"></div>

            <div class="full-indiv-profs-extra">
                <h5>more profiles</h5>
                <p><i class="flaticon-linkedin9"></i> linkedIn</p>
                <p><i class="flaticon-youtube13"></i> youtube</p>
                <p><i class="flaticon-pinterest13"></i> pinterest</p>
            </div>

            <div class="divider"></div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn"><i class="flaticon-plus25"></i> follow</button>
        <button class="btn"><a href="../account.php">full profile</a></button>
    </div>
</div>
