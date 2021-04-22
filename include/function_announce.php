<?php
    
    if(!empty($_POST)){

        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $all_accounts = $_POST['all_accounts'];
        $individual_accounts = $_POST['individual_accounts'];
        $company_accounts = $_POST['company_accounts'];
        $trial_accounts = $_POST['trial_accounts'];
        
        if(empty($subject)){
            $validation_message[] = 'subject cannot be empty.';
            $alert_type = 'warning';
        }

        elseif(strlen($subject) < 3) {
            $validation_message[] = 'subject is too short.';
            $alert_type = 'warning';
        }

        if(empty($content)){
            $validation_message[] = 'content cannot be empty.';
            $alert_type = 'warning';
        }

        elseif(strlen($content) < 10){
            $validation_message[] = 'content is too short.';
            $alert_type = 'warning';
        }

        if(empty($all_accounts) &&
           empty($individual_accounts) && 
           empty($company_accounts) &&
           empty($trial_accounts)){
               $validation_message[] = 'please select one the options.';
               $alert_type = 'warning';
           }

        if((!empty($subject)) &&
            (strlen($subject) > 3) &&
            (!empty($content)) &&
            (strlen($content) > 10)){

                if((!empty($all_accounts)) || 
                   (!empty($individual_accounts)) ||
                   (!empty($company_accounts)) ||
                   (!empty($trial_accounts))){

                       if(!empty($all_accounts)){
                           $admin->announceAllAccounts($subject, $content);

                            $validation_message[] = 'an announcement to all users was sent successfuly.';
                            $alert_type = 'information';

                       }

                       if(!empty($individual_accounts)){
                           $admin->announceIndivividualAccounts($subject, $content);

                            $validation_message[] = 'an announcement to individual users was sent successfuly.';
                            $alert_type = 'information';

                       }

                       if(!empty($company_accounts)){
                           $admin->announceCompanyAccounts($subject, $content);

                            $validation_message[] = 'an announcement to company users was sent successfuly.';
                            $alert_type = 'information';

                       }

                       if(!empty($trial_accounts)){
                           $admin->announceTrialAccounts($subject, $content);

                            $validation_message[] = 'an announcement to trial users was sent successfuly.';
                            $alert_type = 'information';

                       }
                }
            }
        else{
            $validation_message[] = 'an unknow error has occured.';
            $alert_type = 'warning';
        }

    }

?>
