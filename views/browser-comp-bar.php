<?php
    include 'lib/Browser.php-master/lib/Browser.php';
    $br = new Browser;
?>

<div class="browser-compitability-bar">
    <p class="browser-comp-bar-header">Supported browsers</p>
    <a class="browser-item">
        <img alt="safari" src="img/Safari-icon.png"/> Safari
    </a>
    <a class="browser-item">
        <img alt="chrome" src="img/Chrome-icon.png"/> Chrome
    </a>
    <p>You are using :<strong> <?php echo $br->getBrowser().' '.$br->getVersion(); ?></strong></p>
</div>