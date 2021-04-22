<?php
    // header functions
    include 'include/function_header.php';

    //page titlebar
    page_title_bar();
    $page_titlebar_icon = "icon-cog";
    $page_titlebar_header = "settings";
    $page_titlebar_desc = " update your general, privacy and account settings here";

    //search placeholder items
    search_placeholder();
    $search_plac = "settings";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | settings ...</title>
        <!-- stylesheets & JavaScripts -->
        <?php include 'views/header.php'?>
    </head>
    <body>
        <div class="main">
            <div class="wrap">
                <!--- main navbar --->
                <?php include'views/navbar.php'?>

                <!--- row --->
                <div class="row">
                    <!--- navigation section --->
                    <div class="span3">
                        <!--- current userbar --->
                        <?php include 'views/userbar.php'?>

                        <!--- menu bar  --->
                        <?php include 'views/menubar.php'?>
                    </div>

                    <!--- content sestion --->
                    <div class="span6">
                        <!---- title bar ----->
                        <?php include 'views/titlebar.php'?>
                        <div class="page-title">here is a list ...</div>
                        <!--- general settings --->
                        <div class="sett-general-grid">
                            <h4 class="sett-header"> General</h4>
                            <div class="divider"></div>
                            <div class="sett-gen-username">
                                <div class="sett-gen-username-one">
                                    <i class="icon-user-2"></i><strong> username</strong> : thiba_mahlezana
                                </div>
                                <div class="sett-gen-username-two">
                                    <button type="button"><i class="icon-pencil"></i> change</button>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="sett-gen-username">
                                <div class="sett-gen-username-one">
                                    <i class="icon-locked"></i><strong> password</strong> : ********
                                </div>
                                <div class="sett-gen-username-two">
                                    <button type="button"><i class="icon-pencil"></i> change</button>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="divider"></div>
                            <p>please select a language you prefer, default language is English US</p> 
                            <div class="control-group">
                                <div class="control-label"><strong>Select language</strong></div>
                                <div class="controls">
                                    <select id="select01">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--- privacy settings --->
                        <div class="sett-privacy-grid">
                            <h4 class="sett-header"> Privacy</h4>
                            <div class="divider"></div>
                            <p>Please tell us which links you want other people to see and not to see. 
                                Please note by default all links are visible
                            </p>
                            <div class="sett-link-grid">
                                <div class="sett-link-desc">
                                    <div class="sett-link-desc-avatar">
                                        <img alt="avatar" class="img-rounded" src="images/asa-profile-pic.jpg" />
                                    </div>
                                    <div class="sett-link-desc-body">
                                        Asanda Mahlezana
                                        <p><i class="icon-location"></i> Durban,ZA</p>
                                        <p><i class="icon-briefcase"></i> Weter At JetMart</p>
                                        <p><i class="icon-link"></i> asanda.co.za/</p>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="sett-divider"></div>
                                <!-- social profiles ---->
                                <h4 style="margin-left:30%;">social profiles</h4>
                                <div class="sett-link-social">
                                    <div class="sett-link-soc-item">
                                        <div class="sett-link-soc-item-avatar">
                                            <i class="icon-facebook"></i>
                                        </div>
                                        <div class="sett-link-soc-item-name">
                                            <strong> Thiba Mahlezana</strong> | facebook
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="sett-link-social">
                                    <div class="sett-link-soc-item">
                                        <div class="sett-link-soc-item-avatar">
                                            <i class="icon-twitter"></i>
                                        </div>
                                        <div class="sett-link-soc-item-name">
                                            <strong> thiba_mahlezana</strong> | twitter
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="sett-link-social">
                                    <div class="sett-link-soc-item">
                                        <div class="sett-link-soc-item-avatar">
                                            <i class="icon-google-plus"></i>
                                        </div>
                                        <div class="sett-link-soc-item-name">
                                            <strong> +thiba_mahlezana</strong> | google plus
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="sett-divider"></div>
                                <h4 style="margin-left:30%;">contacts</h4>
                            </div>
                        </div>
                        <!--- profile links settings --->
                        <div class="sett-profiles-grid">
                            <h4 class="sett-header">Profiles and Subscribed Sites</h4>
                            <div class="divider"></div>
                            <p>Please tell us weather aypage has to remember access details to your profiles and 
                                subscribed sites
                            </p>
                            <div class="sett-prof-item">
                                <div class="sett-prof-avatar">
                                    <i class="icon-google-drive"></i>
                                </div>
                                <div class="sett-prof-des"><strong> Google Drive</strong> drive.google.com/</div>
                                <div class="sett-prof-btn">
                                    <button type="button">remember</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="sett-prof-item">
                                <div class="sett-prof-avatar">
                                    <i class="icon-google-drive"></i>
                                </div>
                                <div class="sett-prof-des"><strong> Google Drive</strong> drive.google.com/</div>
                                <div class="sett-prof-btn">
                                    <button type="button">remember</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="sett-prof-item">
                                <div class="sett-prof-avatar">
                                    <i class="icon-google-drive"></i>
                                </div>
                                <div class="sett-prof-des"><strong> Google Drive</strong> drive.google.com/</div>
                                <div class="sett-prof-btn">
                                    <button type="button">remember</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="sett-prof-item">
                                <div class="sett-prof-avatar">
                                    <i class="icon-google-drive"></i>
                                </div>
                                <div class="sett-prof-des"><strong> Google Drive</strong> drive.google.com/</div>
                                <div class="sett-prof-btn">
                                    <button type="button">remember</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="sett-prof-item">
                                <div class="sett-prof-avatar">
                                    <i class="icon-google-drive"></i>
                                </div>
                                <div class="sett-prof-des"><strong> Google Drive</strong> drive.google.com/</div>
                                <div class="sett-prof-btn">
                                    <button type="button">remember</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="sett-more"><a href="#"> more ...</a></div>
                        </div>
                        <!--- account settings --->
                        <div class="sett-account-grid">
                            <h4 class="sett-header">Account</h4>
                            <div class="divider"></div>
                            <p>Hide Account</p>
                            <p>Deactivate Account</p>
                        </div>
                    </div>

                    <!--- active and recommended links --->
                    <div class="span4">
                        <!---- active links ----->
                        <div class="active-link-sec-header">
                            <h4>active links</h4>
                        </div>
                        <?php include'views/active-links-sec.php'?>

                        <!---- recommended links ----->
                        <div class="active-link-sec-header">
                            <h4>links you might like to follow</h4>
                        </div>
                        <?php include'views/recomm-links-sec.php'?>
                        <div class="active-link-extra">
                            <a href="#"> more ...</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
