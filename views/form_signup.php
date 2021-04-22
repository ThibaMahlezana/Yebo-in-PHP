<?php
    
?>

<!-- BASIC SIGN UP FORM -->
<div class="signup-area">
    <p style="margin-top: 8px"> sign up</p>
    <form action="include/function_register.php" class="signup-form1" method="post">
        <!-- email or phone input -->
        <p><i class="flaticon-user77"></i> username</p>
        <input name="username" type="text" placeholder="username" required/>

        <!-- password input -->
        <p><i class="flaticon-lock24"></i> password</p>
        <input name="password" type="password" placeholder="******" required/>

        <!-- repeat password input -->
        <p><i class="flaticon-lock24"></i>repeat password</p>
        <input name="rpassword" type="password" placeholder="******" required/>

        <!--- sign up alert area --->
        <div class="signup-options">
            <input class="radio-button" name="type" id="optionsRadios1" value="individual" type="radio" required> individual 
            <input class="radio-button" name="type" id="optionRadios2" value="company" type="radio" required> company
            <a class="pull-right" href="#" data-toggle="popover" title="What ever" data-content="What ever it is. Ryt?"><i class="flaticon-question22"></i></a>
        </div>

        <p>I accept and agree to<a href="terms.php"> terms & conditions</a> and <a href="privacy.php"> privacy</a></p>
        <button class="btn" type="submit">sign up</button>
    </form>
</div>
