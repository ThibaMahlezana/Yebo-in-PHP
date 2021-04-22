/*************************************************************************************************************
                                    MODULE ADMIN JAVASCRIPT
*************************************************************************************************************/

jQuery(document).ready(function () {

    var $total_users = $("#total_users");
    var $total_chats = $("#total_chats");
    var $total_posts = $("#total_posts");
    var $total_views = $("#total_views");
    var $total_messages = $("#total_messages");
    var $total_tags = $("#total_tags");
    var $total_individuals = $("#total_individuals");
    var $total_companies = $("#total_companies");
    var $total_logins = $("#total_logins");

    function updateTotalUsers() {
        $($total_users).load("include/function_update_stats.php", { stat_type: "users" });
    }

    function updateTotalChats() {
        $($total_chats).load("include/function_update_stats.php", { stat_type: "chats" });
    }

    function updateTotalPosts() {
        $($total_posts).load("include/function_update_stats.php", { stat_type: "posts" });
    }

    function updateTotalViews() {
        $($total_views).load("include/function_update_stats.php", { stat_type: "views" });
    }

    function updateTotalMessages() {
        $($total_messages).load("include/function_update_stats.php", { stat_type: "messages" });
    }

    function updateTotalTags() {
        $($total_tags).load("include/function_update_stats.php", { stat_type: "tags" });
    }

    function updateTotalIndividuals() {
        $($total_individuals).load("include/function_update_stats.php", { stat_type: "individuals" });
    }

    function updateTotalCompanies() {
        $($total_companies).load("include/function_update_stats.php", { stat_type: "companies" });
    }

    function updateTotalLogins() {
        $($total_logins).load("include/function_update_stats.php", { stat_type: "logins" });
    }

    setInterval(function () { updateTotalUsers(); }, 1000);
    setInterval(function () { updateTotalChats(); }, 1000);
    setInterval(function () { updateTotalPosts(); }, 1000);
    setInterval(function () { updateTotalViews(); }, 1000);
    setInterval(function () { updateTotalMessages(); }, 1000);
    setInterval(function () { updateTotalTags(); }, 1000);
    setInterval(function () { updateTotalIndividuals(); }, 1000);
    setInterval(function () { updateTotalCompanies(); }, 1000);
    setInterval(function () { updateTotalLogins(); }, 1000);

});