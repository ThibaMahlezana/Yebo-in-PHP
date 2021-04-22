<?php
    
    /* $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $character_length = strlen($characters);
    $random_string = '';

    for($i = 0; $i < 3; $i++){
        $random_string .= $characters[mt_rand(0, $character_length - 1)];
    }
    $lower_rand_string = substr(strtolower($random_string), -1);
    $final_string = substr($random_string, -2).$lower_rand_string;

    echo $final_string.'<br/>';
    echo $random_string;
    echo '<br/>';
    echo $lower_rand_string .'<br/>';

    for($i = 0; $i < 5; $i++){
        $a .= mt_rand(0,9);
    }
    echo $a;
    echo '<br/>';
    echo 'final password: '.$final_string.$a;

    require '/lib/mymobileapi_http/class.sms.php';

    //Execute script
    $sms = new MyMobileAPI();
    $num = '';
    $message = 'Test Message';

    $message = $sms->sendSms($num, $message); //Send SMS
    if($message == 0){
        echo 'message not sent';
    }
    else{
        echo 'Message sent';
    }

    $sms->checkcredits(); //Check your credit balance */

    /*require 'lib/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.mail.ayttiq.com';
    $mail->SMTPAuth = TRUE;
    $mail->Username = 'info@ayttiq.com';
    $mail->Password = 'Ayttiq-aypage12';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;

    $mail->From = 'info@ayttiq.com';
    $mail->FromName = 'aypage';
    $mail->addAddress('thibasds.ma@gmaildfd.com', 'Thiba');
    $mail->isHTML(TRUE);

    $mail->Subject = 'Verify Account - aypage';
    $mail->Body = 'Hi Thiba \n verify your account';
    $mail->AltBody = 'Please verify your account';

    if(!$mail->send()){
        echo 'Message could not be sent';
        echo 'Mailer Error : '.$mail->ErrorInfo;
    }
    else{
        echo 'Message was sent';
    }*/



    /*
    $time = time();
    $timeFormat = date('Y-m-d H:m:s a', $time);
    echo $timeFormat;
    echo '<br/>';
    $nextMonth = strtotime("+1 month");
    echo $nextMonth;
    echo '<br/>';
    $nextMonthFormat = date('m-d', $nextMonth);
    echo $nextMonthFormat;

    function calculate_time_difference($timestamp1, $timestamp2, $time_unit) {
        // Determines difference between two timestamps
        if ($timestamp1 && $timestamp2) {
            $time_lapse = $timestamp2 - $timestamp1;
            $seconds_in_unit = array(
                'second' => 1,
                'minute' => 60,
                'hour' => 3600,
                'day' => 86400,
                'week' => 604800,
            );
        if ($seconds_in_unit[$time_unit]) {
                return floor($time_lapse/$seconds_in_unit[$time_unit]);
            }
        }
        return 'No Times';
    }

    // Get the current time and seven days from now as an example.
    $timestamp_1 = time();
    $timestamp_2 = strtotime('+7 days');
    $units = array("second", "minute", "hour", "day", "week");
    foreach ($units as $u) {
        $nunits = calculate_time_difference($timestamp_1, $timestamp_2, $u);
        echo $nunits . " $u(s) have passed between " ."<br/>". date("m-d-Y", $timestamp_1)
        ."<br/>". ' and ' . date("m-d-Y", $timestamp_2);
        print "\n";
    }

    $name = 'THIBA1235';
    $surname = substr($name ,1);
    echo '<h3>'.$surname.'</h3>';

    $x = 'thiba';
    $y = 'thiba';
    if(strlen($x) >= 4 && strlen($y) <= 4){
        $results = 'True';
    }
    else{
        $results = 'False';
    }

    */

  //include 'include/function_time.php';
  /*
  $curenttime=1463229036;
  $time_ago =$curenttime;
  echo '<pre>';
  //echo timeAgo($time_ago);
  echo '</pre>';

    class sortMdArray{
        public $sort_order = 'asc';
        public $sort_key = 'name';

        function sortByKey($array){
            usort($array, array(__CLASS__, 'sortByKeyCallback'));
        }

        function sortByKeyCallback($a, $b){
            $return = $b[$this->sort_key] - $a[$this->sort_key];
            return $return;
        }
    }



    $array = array(
                    array('name' => 'lorem',
                          'time' => 1463228804),

                    array('name' => 'Just a name',
                          'time' => 1463228951),

                    array('name' => 'any name',
                          'time' => 1463229036)
             );

     print_r($array);

    //$sort_key = new sortMdArray;
    //$sort_key->sortByKey($array);

    $position = array();
    foreach($array as $key){
        $position[] = $key['time'];
    }

    array_multisort($position, SORT_DESC, $array);

    echo '<pre>';
    print_r($array);
    echo '</pre>';

    */
    /**
    $en_string = crypt('thiba');
    echo $en_string;

    $array = array(
                    array('name' => 'lorem',
                          'time' => 1463228804),

                    array('name' => 'Just a name',
                          'time' => 1463228951),

                    array('name' => 'any name',
                          'time' => 1463229036)
             );
    $pos = 5;
    $new_array = array_slice($array, 0, $pos);
    print_r($new_array);

    **/


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | test page ...</title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/test.css" />
        <?php include 'views/header.php';?>

        <style>
            body {
                padding-top: 0;
            }
            .chat-box{
                height: 200px;
                width: 500px;
                background: #fff;
                overflow: scroll;
            }
        </style>

    </head>
    <body>

        <div class="container">
                <h1>ayttiq technologies</h1>
                <h3>我 哎 你，王l。</h3>
                <p><?php echo strtotime('2016-04-20'); ?></p>

                <p><?php echo date('d M Y',strtotime('2016-04-20')); ?></p>

                <input class="flaticon-align14" value="flaticon-align14" type="text"/>

                <p><?php
                     
                     $start_date = time();
                     $end_date = strtotime('+60 days', $start_date);
                     $diff = abs($end_date - $start_date);
                     $days = $diff/86400;

                     echo intval($days);

                     $exp = strtotime('+60 days');

                     echo date('d M Y',$exp);
                  
                     $string = 'thiba mashlezana is a genius';
                     $enc_string = mcrypt_encrypt($string);
                     $de_string = mcrypt_decrypt($enc_string);
                     echo $enc_string;
                ?></p>

                <p><?php echo time();  ?></p>

                <p><?php echo time(); ?></p>

                <div class="displayAjax"></div>
                <input class="btn" id="testAJAX" type="submit" value="test ajax"/>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="chat-box">
                        <div id="displayChat"></div>
                    </div>
                    <input id="chat-text" name="chat-text" type="text"/>
                    <input class="btn" type="submit" name="submit"></input>
                </form>

                <div id="loadingIndicator" class="sk-spinner sk-spinner-three-bounce" style="visibility: hidden">
                    <div class="sk-bounce1"></div>
                    <div class="sk-bounce2"></div>
                    <div class="sk-bounce3"></div>
                </div>

                <a href="#myModal" role="button" data-toggle="modal">Launch demo modal</a>
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> Ayttiq</div>

        </div>

        <!------ JavaSripts ------->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/test.js"></script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
         
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
