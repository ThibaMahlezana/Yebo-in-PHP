<?php
    /* LOG IN CLASS */

    // STARTING SESSIONS
    session_start();

    // INCLUDED FILES
    require_once 'class_database.php';
    include 'module_access.php';
    include '/../lib/Browser.php-master/lib/Browser.php';
    include '/../lib/Mobile-Detect-master/Mobile_Detect.php';


    // OBJECTS
    $db = new database;
    $br = new Browser;
    $dev = new Mobile_Detect;

    // LOGIN CLASS
    class login extends moduleAccess{
        // VARIABLES
        private $user_id;
        private $user_type;
        private $log_time;
        private $log_location;
        private $log_browser;
        private $log_platform;
        private $log_ip;
        private $log_device;

        // METHODS

        // A FUNCTION TO LOGIN USER VIA USERNAME AND PASSWORD
        function normalLogin($username, $password){
            // DATABASE VARIABLE
            global $db; 
            
            // BASIC AUTHENTIFICATION
            $results = $this->basicAuth($username, $password);

            // WHEN THE QUERY IS RUNNING SUCCESSFUL
            if(!empty($results)){

                // ASIGNING VARIABLES
                $user_id = $results->user_id;
                $user_type = $results->user_type;

                // UPADTING LOGIN ATTEMPTS TABLE
                $this->loginAttempt($user_id, $user_type);

                // GENERATING SESSION ID
                session_regenerate_id();

                // LOGGING IN AN ADMIN
                if($results->user_type == 0){
                    $this->isAdmin($results);
                }

                //LOGGING IN A USER
                if($results->user_type == 1){
                    $this->isUser($results);
                }

                // LOGGING IN A COMPANY
                if($results->user_type == 2){
                    $this->isCompany($results);
                }
            }

            // WHEN THE QUERY WAS UNSUCCESSFUL
            else {
                header("location: ../signin.php");
                exit();
            }
        }

        //  A METHOD TO DO BASIC AUTHENTIFICATION IN LOGIN TABLE
        private function basicAuth($username, $password){

            // DATABASE VARIABLE
            global $db; 

            // SELECTING AND VERIFYING USER LOGIN DETAILS IN LOGIN TABLE
            $query = "SELECT username, password, user_id, user_type 
                      FROM login 
                      WHERE BINARY username = '$username' 
                      AND password = '$password' ";

            // RUNNING THE QUERY AND PULLING RESULTS
            $result = $db->query($query) or die("Couldn't execute query");

            while($obj = $result->fetch_object()){
                $results[] = $obj;
            }
            // RETURNING RESULTS
            return $results[0];
        }

        // A METHOS TO LOG IN AN ADMIN
        private function isAdmin($results){
             global $db;                                   
            // CREATING SESSIONS
		    $_SESSION['SESS_ADMIN_ID'] = $results->user_id;
            $_SESSION['SESS_TYPE'] = $results->user_type;
		    session_write_close();

            // REDIRECTING TO ADMIN PAGE
            if(!empty($_SESSION['SESS_ADMIN_ID'])){
			    header("location: admin.php");
			    exit();
            }

            // WHEN FAILED TO LOG IN
            else{
              echo "FAILED TO LOG IN";
            }
        }

        // A METHOD TO LOG IN AN INDIVIDUAL
        private function isUser($results){
            global $db;
            // CREATING SESSIONS
			$_SESSION['SESS_MEMBER_ID'] = $results->user_id;
            $_SESSION['SESS_TYPE'] = $results->user_type;
			session_write_close();

            // REDIRECTING TO TIMELINE PAGE
            if(!empty($_SESSION['SESS_MEMBER_ID']) && !empty($_SESSION['SESS_TYPE'])){
			    header("location: timeline.php");
			    exit();
            }

            // WHEN FAILED TO LOG IN
            else{
              echo "FAILED TO LOG IN";
            }
        }

        // A METHOD TO LOG IN A COMPANY
        private function isCompany($results){
            global $db;
            // CREATING SESSIONS
            $_SESSION['SESS_COMPANY_ID'] = $results->user_id;
            $_SESSION['SESS_TYPE'] = $results->user_type;
            session_write_close();

            // REDIRECTING TO TIMELINE PAGE
            if(!empty($_SESSION['SESS_COMPANY_ID'])){
			    header("location: timeline.php");
			    exit();
            }

            // WHEN FAILED TO LOG IN
            else{
              echo "FAILED TO LOG IN";
            }
        }

        //  A METHOD TO UPDATE LOG IN ATTEMPS
        public function loginAttempt($user_id, $user_type){
            // DATABASE VARIABLE
            global $db;
            // BROWSER OBJECT
            global $br;
            // MOBILE DETECT OBJECT
            global $dev;

            $this->log_time = time();
            $this->log_location = "Johannesburg";
            $this->log_device = ($dev->isMobile() ? ($dev->isTablet() ? 'tablet' : 'phone') : 'computer');
            $this->log_browser = $br->getBrowser();
            $this->log_platform = $br->getPlatform();
            $this->log_ip = "UNKNOWN";

            $time = $this->log_time;
            $location = $this->log_location;
            $device = $this->log_device;
            $browser = $this->log_browser;
            $platform = $this->log_platform;
            $ip = $this->log_ip;

            $query = "INSERT INTO stat_logins(user_id,
                                              user_type, 
                                              time, 
                                              location, 
                                              device, 
                                              browser, 
                                              platform, 
                                              ip)
                             VALUES('$user_id',
                                     '$user_type', 
                                     '$time', 
                                     '$location', 
                                     '$device', 
                                     '$browser', 
                                     '$platform', 
                                     '$ip')";
            $db->query($query);
        }

    }

?>
