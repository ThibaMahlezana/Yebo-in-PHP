<?php
?>
<!------- SIGN IN FORM ------->
<div class="signin-area">
    <form action="../include/function_login.php" class="form-inline" method="post">
        <input name="username" type="text" placeholder="username" required/>
        <input name="password" type="password" placeholder="password" required autocomplete="off"/>
        <!------- RECOVER PASSWORD TOOLTIP ------->
        <a data-title="lost your password?" href="password-recovery.php"><i class="flaticon-question22"></i></a>
        <button class="btn" type="submit">Sign in</button>
    </form>
</div>