
/****************************************************************************************************************
                                        MODULE ACCESS JAVASCRIPT
*****************************************************************************************************************/
jQuery(document).ready(function () {

    var $signin_form = $('#signin-form');
    var $signup_form = $('#signup-form');
    var $register_individual_form = $('#register-individual');
    var $register_company_form = $('#register-company');

    var $spinner = $('.sk-spinner');

    var $signin_form_view = $('.normal-signin-form');
    var $signup_form_view = $('.basic-signup-form');
    var $register_individual_view = $('.full-signup-indiv-grid');
    var $register_company_view = $('.full-signup-indiv-grid');

    $($signin_form).submit(function (event) {
        $($spinner).fadeIn();
        $($signin_form_view).css('opacity', '0.5');
    });

    $($signup_form).submit(function (event) {
        $($spinner).fadeIn();
        $($signup_form_view).css('opacity', '0.5');
    });

    $($register_individual_form).submit(function (event) {
        $($spinner).fadeIn();
        $($register_individual_view).css('opacity', '0.5');
    });

    $($register_company_form).submit(function (event) {
        $($spinner).fadeIn();
        $($register_company_view).css('opacity', '0.5');
    });

});