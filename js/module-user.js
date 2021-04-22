/*************************************************************************************************************
                                    MODULE USER JAVASCRIPT
*************************************************************************************************************/
jQuery(document).ready(function () {

    var request_code_btn = $('#request-code-btn');
    var input_code_btn = $('#input-code-btn');
    var request_code_form = $('.profile-verify-save-bar');
    var input_code_form = $('.profile-verify-send-bar');
    var verification_bar = $('.profile-verify-bar');

    var profile_info_view = $('.profile-information-bar');
    var profile_info_edit_form = $('#profile-info-edit-form');
    var profile_info_edit_btn = $('#profile_edit_btn');

    var following_view_btn = $('#profile-following-btn');
    var followers_view_btn = $('#profile-followers-btn');
    var following_view_box = $('#profile-following-view');
    var followers_view_box = $('#profile-followers-view');
    var following_view_remove_btn = $('#following-profile-view-remove');
    var followers_view_remove_btn = $('#followers-profile-view-remove');

    $(request_code_btn).click(function () {
        $(request_code_form).fadeIn();
        $(verification_bar).hide();

    });

    $(input_code_btn).click(function () {
        $(input_code_form).fadeIn();
        $(verification_bar).hide();
    });

    $(profile_info_edit_btn).click(function () {
        $(profile_info_view).hide();
        $(profile_info_edit_form).fadeIn();
    });

    $(following_view_btn).click(function () {
        $(followers_view_box).hide();
        $(following_view_box).fadeIn();
    });

    $(followers_view_btn).click(function () {
        $(following_view_box).hide();
        $(followers_view_box).fadeIn();
    });

    $(following_view_remove_btn).click(function () {
        $(following_view_box).hide();
    });

    $(followers_view_remove_btn).click(function () {
        $(followers_view_box).hide();
    });

});

