 <?php
// START OF SESSIONS
   session_start();

//  ERROR REPORTING
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

//  DATABASE INITIATION
require_once "include/class_database.php";

// AUTHENTIFICATION FILE
require_once('include/auth.php');

//  MODULE, CLASS & FUNCTON FILES
include "include/functions_general.php";
include "include/module_user.php";
include 'include/class_user.php';
include "include/module_accounts.php";
//include "include/class_acc-social.php";
// include "include/class_acc-additional.php";
// include "include/class_acc-cloud.php";
// include "include/class_acc-email.php";
//include "include/class_stats.php";
include "include/module_links.php";
include "include/module_tags.php";
include "include/module_chats.php";
include "include/module_timeline.php";
include "include/module_messages.php";
include "module_notifications.php";
include "module_admin.php";
// include "class_facebook.php";
include "class_follows.php";
// include "class_gmail.php";
// include "class_google.php";
// include "class_google-drive.php";
// include "class_google-plus.php";
// include "class_google-search.php";
// include "class_google-books.php";
// include "class_linkedin.php";
// include "class_links.php";
// include "class_messages.php";
// include "class_onedrive.php";
// include "class_pinterest.php";
// include "class_qrcode.php";
// include "class_relationship.php";
// include "class_search.php";
// include "class_suggestions.php";
// include "class_timeline.php";
// include "class_tumblr.php";
// include "class_twitter.php";
// include "class_ymail.php";
// include "class_youtube.php";
// include "class_browser.php";
include "class_time.php";




// DATABASE OBJECT
    $db = new database;

// GETTING USER'S IDENTITY
    $user_identity = new moduleUser;

// GETTING USER'S INFORMATION
    $user_information = new user;

// GETTING POSTS INFORMATION
    $posts = new moduleTimeline;

// GETTING ADMIN FUNCTIONALITIES
    $admin = new moduleAdmin;

// GETTING MESSAGES INFORMATION
    $messages = new messages;

// GETTING NOTIFICATIONS INFORMATION
    $notifications = new notifications;

// GETTING TIME INFORMATION
    $time = new time;

// GETTING CHATS INFORMATION
    $chats = new chats;    


// ENSURE NO SQL INJECTIONS THROUGH POST OR GET ARRAYS
    $_POST = security($_POST);
    $_GET = security($_GET);

// GETTING LOGGED USER ID
    $loggedUser = new moduleUser;
    $f_loggedUserId = $loggedUser->getLoggedUserId();

// GETTING USER RELATIONSHIPS
//    $follows = new user;
//    $f_number_followers = $follows->getNumberFollowers();
//    $f_number_following = $follows->getNumberFollowing();
//    $f_number_links_following = $follows->getNumberLinksFollowing();
//    $f_user_followers = $follows->getUserFollowers();
//    $f_user_following = $follows->getUserFollowing();

    //$detailedFollows = new follows;

//  OBJECTS
// getting user's information
//    $infomation = new user;
//    $f_type = $infomation->getType();
//    $f_username = $infomation->getUsername();
//    $f_name = $infomation->getName();
//    $f_lastName = $infomation->getLastName();
//    $f_photo = $infomation->getPhoto();
//    $f_bio = $infomation->getBio();
//    $f_location = $infomation->getLocation();
//    $f_url = $infomation->getUrl();
//    $f_phone = $infomation->getPhone();
//    $f_email = $infomation->getEmail();
//    $f_signup_date = $infomation->getSignupDate();
//    $f_days_left = $infomation->getDaysLeft();
//    $f_expire_date = $infomation->getExpireDate();

// getting user's facebook profile details
//    $facebook = new socialAccounts;
//    $f_faceConnection = $facebook->getFaceConnection();
//    $f_faceUrl = $facebook->getFaceUrl();
//    $f_faceUsername = $facebook->getFaceUsername();
//    $f_faceFriends = $facebook->getFaceFriends();
//    $f_faceFollowers = $facebook->getFaceFollowers();

// getting user's twitter's profile details
//    $twitter = new socialAccounts;
//    $f_twitConnection = $twitter->getTwitConnection();
//    $f_twitUrl = $twitter->getTwitUrl();
//    $f_twitUsername = $twitter->getTwitUsername();
//    $f_twitFollowers = $twitter->getTwitFollowers();
//    $f_twitFollows = $twitter->getTwitFollows();

// getting user's google+'s profile details
//    $gplus = new socialAccounts;
//    $f_gplusConnection = $gplus->getGplusConnection();
//    $f_gplusUrl = $gplus->getGplusUrl();
//    $f_gplusUsername = $gplus->getGplusUsername();
//    $f_gplusFollowers = $gplus->getGplusFollowers();
//    $f_gplusViews = $gplus->getGplusViews();

//  OVERALL STATISTICS
//    $totStats = new stats;
//    $f_totSignups = $totStats->getTotSignups();
//    $f_totChats = $totStats->getTotChats();
//    $f_totTags = $totStats->getTotTags();
//    $f_totLinks = $totStats->getTotLinks();
//    $f_totViews = $totStats->getTotViews();
//    $f_totMessages = $totStats->getTotMessages();
//    $f_totIndividuals = $totStats->getTotIndividuals();
//    $f_totCompanies = $totStats->getTotCompanies();

// CURRENT DAY STATISTICS
//    $dayStats = new stats;
//    $f_signupsToday = $dayStats->getSignupsToday();
//    $f_chatsToday = $dayStats->getChatsToday();
//    $f_tagsToday = $dayStats->getTagsToday();
//    $f_linksToday = $dayStats->getLinksToday();
//    $f_viewsToday = $dayStats->getViewsToday();

// CURRENT WEEK STATISTICS
//    $weekStats = new stats;
//    $f_signupsWeek = $weekStats->getSignupsWeek();
//    $f_chatsWeek = $weekStats->getChatsWeek();
//    $f_tagsWeek = $weekStats->getTagsWeek();
//    $f_linksWeek = $weekStats->getLinksWeek();
//    $f_viewsWeek = $weekStats->getViewsWeek();

// GETTING PHOTOS
    $photos = new user;

// GETTING VERIFICATION
    $verification = new user;
    $f_verification_status = $verification->getVerificationStatus();
    $f_verifying_method = $verification->getVerifyingMethod();
     
// CURRENT MONTH STATISTICS

// GETTING LINKS
//    $linkFeeds = new moduleLinks;

// GETTING CHATS
//    $chatFeeds = new moduleChats;

// GETTING TAGS
    $tags = new moduleTags;

// GETTING TIMELINE FEEDS
    $timelineFeeds = new moduleTimeline;

 // UPDATE VIEWS TABLE
 //$viewsQuery = mysql_query("SELECT * FROM views WHERE view_id=1");
 //$viewsResults = mysql_fetch_assoc($viewsQuery);
 //$totViews .= $viewsResults['total_views']+1;
 //mysql_query("UPDATE views SET total_views='$totViews' WHERE view_id=1");

 // MESSAGES 
    

//  CREATE URL CLASS
//  CHECK FOR PAGE OWNER
//  CREATE USER OBJECT AND ATTEMPTS TO LOG IN
//  USER IS LOGGED IN
//  USER IS NOT LOGGED IN

?>
