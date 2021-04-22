jQuery(document).ready(function () {

    var $test_company_btn = $('#test_company_btn');
    var $test_individual_btn = $('div#test_individual_btn');

    var $test_company_input = $('#test_company_input');
    var $test_individual_input = $('#test_individual_input');

    $($test_individual_btn).click(function () {
        $test_individual_input.fadeIn();
        $test_company_input.hide();
    });

    $($test_company_btn).click(function () {
        $test_company_input.fadeIn();
        $test_individual_input.hide();
    });

});