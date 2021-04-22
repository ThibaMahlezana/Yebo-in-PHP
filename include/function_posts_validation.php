<?php
    
    if(!empty($_POST)){
        $post_type = $_POST['post_type'];

        // validating quote post
        if($post_type == 'quote'){
            $quote_content = $_POST['quote_content'];
            $quote_source = $_POST['quote_source'];

            if(empty($quote_content)){
                $validation_message[] = 'content of the quote cannot be empty!';
                $validation_status = 'warning';
            }
            elseif(strlen($quote_content) < 10){
                $validation_message[] = 'content of the quote is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($quote_content) > 125){
                $validation_message[] = 'content of the quote is too long.';
                $validation_status = 'warning';
            }
            if(empty($quote_source)){
                $validation_message[] = 'a source of the quote cannot be empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($quote_source) < 2){
                $validation_message[] = 'a source of the quote is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($quote_source) > 45){
                $validation_message[] = 'a source of the quote is too long.';
                $validation_status = 'warning';
            }

            if(!empty($quote_content) &&
                strlen($quote_content) > 10 &&
                strlen($quote_content) < 125 &&
                !empty($quote_source) &&
                strlen($quote_source) > 2 &&
                strlen($quote_source) < 45){
                    $validation_message[] = 'quote has been successfully created.';
                    $validation_status = 'information';
                    $posts->createQuotePost($quote_content, $quote_source);
                }
        }

        // validating thought post
        if($post_type == 'thought'){
            $thought_content = $_POST['thought_content'];
            $thought_privacy = $_POST['post_privacy'];

            if(empty($thought_content)){
                $validation_message[] = 'a content of the thought cannot be empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($thought_content) < 5){
                $validation_message[] = 'content of the thought is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($thought_content) > 45){
                $validation_message[] = 'content of the thought is too long.';
                $validation_status = 'warning';
            }

            if(empty($thought_privacy)){
                $validation_message[] = 'select a privacy option.';
                $validation_status = 'warning';
            }

            if(!empty($thought_content) &&
                strlen($thought_content) > 5 &&
                strlen($quote_content) < 45 &&
                !empty($thought_privacy) ){
                    $validation_message[] = 'thought has been successfully created.';
                    $validation_status = 'information';
                    $posts->createThoughtPost($thought_content, $thought_privacy);
                }
        }

        //validating an image post
        if($post_type == 'image'){
            $image_file = $_FILES['image_file']['tmp_name'];
            $image_size = $_FILES['image_file']['size'];
            $image_caption = $_POST['image_caption'];
            $image_privacy = $_POST['post_privacy'];

            if(empty($image_file)){
                $validation_message[] = 'please upload an image.';
                $validation_status = 'warning';
            }
            elseif($image_size < 20000){
                $validation_message[] = 'image size is too small.';
                $validation_status = 'warning';
            }
            elseif($image_size > 500000){
                $validation_message[] = 'image size is too large';
                $validation_status = 'warning';
            }

            if(empty($image_caption)){
                $validation_message[] = 'image caption cannot be empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($image_caption) < 2){
                $validation_message[] = 'image caption is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($image_caption) > 45){
                $validation_message[] = 'image caption is too long.';
                $validation_status = 'warning';
            }
            if(empty($image_privacy)){
                $validation_message[] = 'please select one of the privacy options.';
                $validation_status = 'warning';
            }

            if(!empty($image_file) &&
               $image_size > 20000 &&
               $image_size < 500000 &&
               !empty($image_caption) &&
               strlen($image_caption) > 2 &&
               strlen($image_caption) <45 &&
               !empty($image_privacy)){
                   $validation_message[] = 'an image has been posted successfully.';
                   $validation_status = 'information';
               }
        }

        // validating a video post
        if($post_type == 'video'){
            $video_file = $_FILES['video_file']['tmp_name'];
            $video_size = $_FILES['video_file']['size'];
            $video_caption = $_POST['video_caption'];
            $video_privacy = $_POST['post_privacy'];

            if(empty($video_file)){
                $validation_message[] = 'please upload a video.';
                $validation_status = 'warning';
            }
            elseif($video_size < 100000){
                $validation_message[] = 'video size is too small.';
                $validation_status = 'warning';
            }
            elseif($video_size > 1000000){
                $validation_message[] = 'video size is too large';
                $validation_status = 'warning';
            }

            if(empty($video_caption)){
                $validation_message[] = 'video caption is empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($video_caption) < 2){
                $validation_message[] = 'video caption is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($video_caption) > 45){
                $validation_message[] = 'video caption is too long.';
                $validation_status = 'warning';
            }

            if(empty($video_privacy)){
                $validation_message[] = 'please select one of the privacy options.';
                $validation_status = 'warning';
            }

            if(!empty($video_file) &&
               $video_size > 100000 &&
               $video_size < 1000000 &&
               !empty($video_caption) &&
               strlen($video_caption) > 2 &&
               strlen($video_caption) < 45 &&
               !empty($video_privacy)){
                   $validation_message[] = 'video has been posted successfully.';
                   $validation_status = 'information';
               }
        }

        // validating link post
        if($post_type == 'link'){
            $link_url = $_POST['link_url'];
            $link_caption = $_POST['link_caption'];
            $link_privacy = $_POST['post_privacy'];

            if(strlen($link_url) < 8){
                $validation_message[] = 'insert a URL.';
                $validation_status = 'warning';
            }
            elseif(strlen($link_url) < 12){
                $validation_message[] = 'URL is too short.';
                $validation_status = 'warning';
            }

            if(empty($link_caption)){
                $validation_message[] = 'a description of the link is empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($link_caption) > 125){
                $validation_message[] = 'a description of the link is too long.';
                $validation_status = 'warning';
            }
            if(empty($link_privacy)){
                $validation_message[] = 'select a privacy option.';
                $validation_status = 'warning';
            }

            if(strlen($link_url) > 8 &&
               strlen($link_url) > 12 && 
               !empty($link_caption) &&
               strlen($link_caption) < 125 &&
               !empty($link_privacy)){
                   $validation_message[] = 'a link has been posted successfully.';
                   $validation_status = 'information';
                   $posts->createLinkPost($link_url, $link_caption, $link_privacy);
               }
        }

        // validating topic post
        if($post_type == 'topic'){
            $topic_content = $_POST['topic_content'];
            $topic_privacy = $_POST['post_privacy'];

            if(empty($topic_content)){
                $validation_message[] = 'a content of the topic cannot be empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($topic_content) < 10){
                $validation_message[] = 'content of the topic is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($topic_content) > 125){
                $validation_message[] = 'content of the topic is too long.';
                $validation_status = 'warning';
            }
            if(empty($topic_privacy)){
                $validation_message[] = 'select on of the privacy options';
                $validation_status = 'warning';
            }

            if(!empty($topic_content) &&
               strlen($topic_content) > 10 &&
               strlen($topic_content) < 125 &&
               !empty($topic_privacy)){
                   $validation_message[] = 'topic has been successfully posted.';
                   $validation_status = 'information';
                   $posts->createTopicPost($topic_content, $topic_privacy);
               }
        }

        // validating custom post
        if($post_type == 'custom'){
            $custom_subject = $_POST['custom_subject'];
            $custom_content = $_POST['custom_content'];
            $custom_privacy = $_POST['custom_privacy'];

            if(empty($custom_subject)){
                $validation_message[] = 'a subject cannot be empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($custom_subject) < 2){
                $validation_message[] = 'subject is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($custom_subject) > 45){
                $validation_message[] = 'subject is too long.';
                $validation_status = 'warning';
            }
            
            if(empty($custom_content)){
                $validation_message[] = 'a content of this post cannot be empty.';
                $validation_status = 'warning';
            }
            elseif(strlen($custom_content) < 10){
                $validation_message[] = 'a content of this post is too short.';
                $validation_status = 'warning';
            }
            elseif(strlen($custom_content) > 125){
                $validation_message[] = 'a content of this post is too long.';
                $validation_status = 'warning';
            }
            if(empty($custom_privacy)){
                $validation_message[] = 'select one of the privacy options.';
                $validation_status = 'warning';
            }

            if(!empty($custom_subject) && 
               strlen($custom_subject) > 2 &&
               strlen($custom_subject) < 45 &&
               !empty($custom_content) &&
               strlen($custom_content) > 10 &&
               strlen($custom_content) < 125 &&
               !empty($custom_privacy)){
                   $validation_message[] = 'a post has been created successfuly.';
                   $validation_status = 'information';
                   $posts->createNormalPost($custom_subject, $custom_content, $custom_privacy);
               }
        }
    }    

?>
