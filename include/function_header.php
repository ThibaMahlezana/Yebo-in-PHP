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
include "include/module_links.php";
include "include/module_tags.php";
include "include/module_chats.php";
include "include/module_timeline.php";
include "include/module_messages.php";
include "module_notifications.php";
include "module_admin.php";
// include "class_facebook.php";
include "class_follows.php";
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


?>
