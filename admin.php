<?php
    include 'include/function_header.php';
    include 'include/function_announce.php';

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | admin ...</title>

        <!-- stylesheets -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/basic.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/admin.css" />

        <style>
            body{
                padding-top: 0;
            }
        </style>

    </head>
    <body>
        <div class="admin-nav-bar">
            <p>@<?php echo $admin->getAdminUsername(); ?> - <?php echo $admin->getAdminRole(); ?></p>
            <p><a href=""><span>12</span><i class="flaticon-envelope4"></i></a>
                <a href=""><span>12</span><i class="flaticon-bull1"></i></a>

            </p>

            <p><a href="signed-out.php"><i class="flaticon-sign4"></i> sign out</a></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="admin-user-bar">
                        <div class="admin-user-avatar"><img alt="avatar" src="<?php echo $admin->getAdminAvatar(); ?>"/></div>
                        <div class="admin-user-content">
                            <p>@<?php echo $admin->getAdminUsername(); ?></p>
                            <p><?php echo $admin->getAdminRole(); ?></p>
                        </div>
                        <div class="clear"></div>
                        <p><?php echo $admin->getAdminFirstName(); ?> <?php echo $admin->getAdminLastName(); ?></p>
                    </div>
                </div>
                <div class="span6">
                    <div class="admin-overall-stats">
                        <p><i class="flaticon-file27"></i> quick stats</p>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-group41"></i></p>
                            <p id="total_users"><?php echo $admin->getTotalUsers(); ?></p>
                            <p>total users</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-speech59"></i></p>
                            <p id="total_chats"><?php echo $admin->getTotalChats(); ?></p>
                            <p>total chats</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-file27"></i></p>
                            <p id="total_posts"><?php echo $admin->getTotalNumPosts(); ?></p>
                            <p>total posts</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-eye50"></i></p>
                            <p id="total_views"><?php echo $admin->getTotalViews(); ?></p>
                            <p>total views</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-envelope4"></i></p>
                            <p id="total_messages"><?php echo $admin->getTotalMessages(); ?></p>
                            <p>total messages</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-tag32"></i></p>
                            <p id="total_tags"><?php echo $admin->getTotalTags(); ?></p>
                            <p>total tags</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-user77"></i></p>
                            <p id="total_individuals"><?php echo $admin->getTotalIndividuals(); ?></p>
                            <p>total individuals</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-building8"></i></p>
                            <p id="total_companies"><?php echo $admin->getTotalCompanies(); ?></p>
                            <p>total companies</p>
                        </div>
                        <div class="admin-quick-stats-view">
                            <p><i class="flaticon-sign3"></i></p>
                            <p id="total_logins"><?php echo $admin->getTotalLogins(); ?></p>
                            <p>total logins</p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <?php
                        if(!empty($validation_message)){
                            if($alert_type == 'warning'){
                                foreach($validation_message as $alert_message){
                                    echo '
                                        <div class="alert alert-error admin-alert">
                                            <i class="flaticon-warning18"></i> '.$alert_message.'
                                        </div>
                                    ';
                                }
                            }

                            if($alert_type == 'information'){
                                foreach($validation_message as $alert_message){
                                    echo '
                                        <div class="alert alert-success admin-alert">
                                            <i class="flaticon-check30"></i> '.$alert_message.'
                                        </div>
                                    ';
                                }
                            }
                        }
                    ?>
                    <div class="admin-announcement-bar">
                        <p><i class="flaticon-bull1"></i> Announce</p>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            <label class="control radio">
                              <input name="all_accounts" type="radio">
                              <span class="radio-label"> All Accounts</span>
                            </label>
                            <label class="control radio">
                              <input name="individual_accounts" type="radio">
                              <span class="radio-label"> Individual Accounts</span>
                            </label>
                            <label class="control radio">
                              <input name="company_accounts" type="radio">
                              <span class="radio-label"> Company Accounts</span>
                            </label>
                            <label class="control radio">
                              <input name="trial_accounts" type="radio">
                              <span class="radio-label"> Trial Accounts</span>
                            </label>

                            <input name="subject" placeholder="subject" type="text"/>
                            <textarea name="content" placeholder="announcement..." rows="2"></textarea>
                            <button type="submit" class="btn"> send</button>
                        </form>
                    </div>

                    <script type="text/javascript" src="js/bootstrap.js"></script>
                    <script type="text/javascript" src="js/jquery.js"></script>
                    <script type="text/javascript" src="js/module_admin.js"></script>

                    <!---- FOOTER ------>
                    <?php include 'views/footer-mini.php'; ?>
                </div>
            </div>
 	    </div>
    </body>
</html>

