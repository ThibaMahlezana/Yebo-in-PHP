<?php
    include 'include/function_signout.php';
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> aypage | signed out ...</title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />

    </head>
    <body>
        <div class="container">
            <div class="signedout-page-header-grid">
                <p class="signedout-page-header"> You have signed out !! <i class="flaticon-frown"></i></p>
                <p class="signedout-page-desc">You have successfully singed out from aypage, hope we will see you again.</p>
                <p><a href="signin.php"><button class="btn"> sign in</button></a></p>
                <p><a href="index.php"><button class="btn"><i class="flaticon-chevron20"></i> home</button></a></p>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
