<?php
    include 'class_database.php';
    include 'module_messages.php';

    $db = new database;
    $messages = new messages;

    if(!empty($_POST)){
        $searchword = $_POST['searchword'];
    
        $search_results = $messages->searchMessageRecipient($searchword);

        if(!empty($search_results)){
            
            foreach($search_results as $value){
                if($value->type == 1){
                    $first_name = $value->first_name;
                    $last_name = $value->last_name;
                    $username = $value->username;
                    $user_id = $value->user_id;

                    $re_first_name = '<b>'.$searchword.'</b>';
                    $re_last_name = '<b>'.$searchword.'</b>';

                    $final_fname = str_ireplace($searchword, $re_first_name, $first_name);
                    $final_lname = str_ireplace($searchword, $re_last_name, $last_name);

                    echo '
                        <div class="display_box">
                            <input type="hidden" id="display_username" value="'.$username.'"/>
                            <span>'.$final_fname.'</span>
                            <span>'.$final_lname.'</span>
                            <span><strong>@'.$username.'</strong></span>
                        </div>
                    ';
                }

                if($value->type == 2){
                    $name = $value->name;
                    $username = $value->username;
                    $company_id = $value->company_id;

                    $re_name = '<b>'.$searchword.'</b>';

                    $final_name = str_ireplace($searchword, $re_name, $name);

                    echo '
                        <div class="display_box">
                            <input type="hidden" id="display_username" value="'.$username.'"/>
                            <span>'.$final_name.'</span>
                            <span></span>
                            <span><strong>@'.$username.'</strong></span>
                        </div>
                    ';
                }
            }
        }
        if(empty($search_results)){
                echo '
                    <div class="display_box">
                        <span><strong>user does not exsist</strong></span>
                    </div>
                ';
        }
    }
?>