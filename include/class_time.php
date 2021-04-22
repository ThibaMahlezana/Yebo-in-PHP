<?php
    
    class time{
        function timeAgo($time_ago){

            $cur_time 	= time();
            $time_elapsed 	= $cur_time - $time_ago;
            $seconds 	= $time_elapsed ;
            $minutes 	= round($time_elapsed / 60 );
            $hours 		= round($time_elapsed / 3600);
            $days 		= round($time_elapsed / 86400 );
            $weeks 		= round($time_elapsed / 604800);
            $months 	= round($time_elapsed / 2600640 );
            $years 		= round($time_elapsed / 31207680 );
            // Seconds
            if($seconds <= 60){
	            $seconds = "$seconds sec";
                return $seconds;
            }
            //Minutes
            else if($minutes <=60){
	            if($minutes==1){
		            $minutes = "1 min";
	            }
	            else{
		            $minutes = "$minutes min";
	            }
                return $minutes;
            }
            //Hours
            else if($hours <=24){
	            if($hours==1){
		            $hours = "1 hr";
	            }else{
		            $hours = "$hours hrs";
	            }
                return $hours;
            }
            //Days
            else if($days <= 7){
	            if($days==1){
		            $days = "y";
	            }else{
		            $days = "$days d";
	            }
                return $days;
            }
            //Weeks
            else if($weeks <= 4.3){
	            if($weeks==1){
		            $weeks = "1 w";
	            }else{
		            $weeks = "$weeks w";
	            }
                return $weeks;
            }
            //Months
            else if($months <=12){
	            if($months==1){
		            $months = "1 m";
	            }else{
		            $months = "$months m";
	            }
                return $months;
            }
            //Years
            else{
	            if($years==1){
		            $years = "1 y";
	            }else{
		            $years = "$years y";
	            }
                return $years;
            }
        }
    }

?>

