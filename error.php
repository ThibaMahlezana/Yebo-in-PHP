<?php

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title> ERROR!!</title>

        <!---- STYLESHEETS ---->
        <link rel="stylesheet" type="text/css" href="styles/metro-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="styles/global.css" />
        <link rel="stylesheet" type="text/css" href="styles/flaticon.css" />
        <link rel="stylesheet" type="text/css" href="styles/access.css" />

    </head>
    <body>
        <div class="container">
            <div class="error-page-header-grid">
                <p class="error-page-header"><i class="flaticon-warning18"></i> Sorry there is an error!</p>
                <p class="error-page-topic">An unknown error has occured, please try again in few minutes later.</p>
                <p><a href="index.php"><button class="btn"><i class="flaticon-chevron20"></i> home</button></a></p>
            </div>
        </div>
        <!----- footer ----->
        <?php include'views/footer.php'?>    
    </body>
</html>
