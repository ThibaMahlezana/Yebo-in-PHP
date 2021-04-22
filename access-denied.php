<?php

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> ACCESS DENIED!! </title>

        <!-- stylesheets & JavaScripts -->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />

    </head>
    <body>
        <div class="container">
            <div class="access-denied-header-grid">
                <p class="access-denied-header">Access to this page denied!<i class="flaticon-meh"></i></p>
                <p class="access-dinied-topic">Sorry you do not have access to this page because you are not singned in or registered with aypage.</p>
                <p><a href="signin.php"><button class="btn"> sign in</button></a></p>
                <p><a href="signup.php"><button class="btn"> sign up</button></a></p>
                <p><a href="index.php"><button class="btn"><i class="flaticon-chevron20"></i> home</button></a></p>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>
    </body>
</html>
