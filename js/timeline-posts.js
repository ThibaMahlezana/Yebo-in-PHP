
jQuery(document).ready(function () {

    // post forms
    var $topic_post_form = $('.topic-post-form-box');
    var $custom_post_form = $('.custom-post-form-box');
    var $image_post_form = $('.image-post-form-box');
    var $video_post_form = $('.video-post-form-box');
    var $link_post_form = $('.link-post-form-box');
    var $thought_post_form = $('.thought-post-form-box');
    var $quote_post_form = $('.quote-post-form-box');

    // post buttons
    var $topic_btn = $('#create_topic');
    var $custom_btn = $('#create_custom');
    var $image_btn = $('#create_image');
    var $video_btn = $('#create_video');
    var $link_btn = $('#create_link');
    var $thought_btn = $('#create_thought');
    var $quote_btn = $('#create_quote');

    // when a create topic post is clicked
    $($topic_btn).click(function () {
        $($topic_post_form).fadeIn();
        $($custom_post_form).hide();
        $($image_post_form).hide();
        $($video_post_form).hide();
        $($link_post_form).hide();
        $($thought_post_form).hide();
        $($quote_post_form).hide();
    });

    // when a create custom post is clicked
    $($custom_btn).click(function () {
        $($custom_post_form).fadeIn();
        $($topic_post_form).hide();
        $($image_post_form).hide();
        $($video_post_form).hide();
        $($link_post_form).hide();
        $($thought_post_form).hide();
        $($quote_post_form).hide();
    });

    // when a create image post is clicked
    $($image_btn).click(function () {
        $($image_post_form).fadeIn();
        $($topic_post_form).hide();
        $($custom_post_form).hide();
        $($video_post_form).hide();
        $($link_post_form).hide();
        $($thought_post_form).hide();
        $($quote_post_form).hide();
    });

    // when a create video post is clicked
    $($video_btn).click(function () {
        $($video_post_form).fadeIn();
        $($topic_post_form).hide();
        $($custom_post_form).hide();
        $($image_post_form).hide();
        $($link_post_form).hide();
        $($thought_post_form).hide();
        $($quote_post_form).hide();
    });

    // when a create link post is clicked
    $($link_btn).click(function () {
        $($link_post_form).fadeIn();
        $($topic_post_form).hide();
        $($custom_post_form).hide();
        $($image_post_form).hide();
        $($video_post_form).hide();
        $($thought_post_form).hide();
        $($quote_post_form).hide();
    });

    // when a create thought post is clicked
    $($thought_btn).click(function () {
        $($thought_post_form).fadeIn();
        $($topic_post_form).hide();
        $($custom_post_form).hide();
        $($image_post_form).hide();
        $($video_post_form).hide();
        $($link_post_form).hide();
        $($quote_post_form).hide();
    });

    // when a create quote post is clicked
    $($quote_btn).click(function () {
        $($quote_post_form).fadeIn();
        $($topic_post_form).hide();
        $($custom_post_form).hide();
        $($image_post_form).hide();
        $($video_post_form).hide();
        $($link_post_form).hide();
        $($thought_post_form).hide();
    });


});