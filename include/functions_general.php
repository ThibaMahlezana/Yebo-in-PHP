<?php
    /*   these are general functions
        FUNCTIONS:
        - page_title_bar();
        - search_placeholder();
        - calcAge();
    */
    function page_title_bar(){
        global $page_titlebar_icon;
        global $page_titlebar_header;
        global $page_titlebar_desc;
    }

    function search_placeholder(){
        global $search_plac;
    }

    function security($value) {
	    if(is_array($value)) {
	      $value = array_map('security', $value);
	    } else {
	      if(!get_magic_quotes_gpc()) {
	        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
	      } else {
	        $value = htmlspecialchars(stripslashes($value), ENT_QUOTES, 'UTF-8');
	      }
	      $value = str_replace("\\", "\\\\", $value);
	    }
	    return $value;
    } 

?>