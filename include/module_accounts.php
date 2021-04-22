<?php
/*  MODULE ACCOUNTS  */

    class moduleAccounts{
        
        protected $type;
        protected $id;

        // determines if its a user or a company
        protected function getID(){
            $this->type  = $_SESSION['SESS_TYPE'];

            if($this->type == 1){
                $this->id = $_SESSION['SESS_MEMBER_ID'];
            }
            if($this->type == 2){
                $this->id = $_SESSION['SESS_COMPANY_ID'];
            }
        }

    }
?>
