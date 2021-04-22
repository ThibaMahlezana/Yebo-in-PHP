 <?php
    
    //Check whether the session variables SESS_COMPANY_ID and MEMBER_ID are present or not

    if((!isset($_SESSION['SESS_COMPANY_ID']) || (trim($_SESSION['SESS_COMPANY_ID']) == '')) &&
     (!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) &&
     (!isset($_SESSION['SESS_ADMIN_ID']) || (trim($_SESSION['SESS_ADMIN_ID']) == '')))
    {
	    header("location: access-denied.php");
	    exit();
    }
?>
