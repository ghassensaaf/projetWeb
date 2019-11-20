<?php
if(null===session_id())
{
    include "inc/headerCon.php";
}
else
{
    include "inc/header.php";
}

?>

<main>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form class="signin" action="auth.php" method="post">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="luser" class="label">Username</label>
                            <input id="luser" name="luser" type="text" class="input" placeholder="username/e-mail">
                        </div>
                        <div class="group">
                            <label for="lpass" class="label">Password</label>
                            <input id="lpass" name="lpass" type="password" class="input" data-type="password" placeholder="password">
                        </div>
                        <div class="group">
                            <input id="show-hide-pw" type="checkbox" class="check" onclick="ShowHidePass()">
                            <label for="show-hide-pw"><span class="icon"></span> Show password</label>
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a class="login-link" href="login.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <form class="signup" action="new_user.php" method="post">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" name="uname" type="text" class="input" placeholder="username">
                        </div>
                        <div class="group">
                            <label for="name" class="label">Full Name</label>
                            <input id="name" name="name" type="text" class="input" placeholder="nom prenom">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" name="pwd" type="password" class="input" data-type="password" placeholder="password">
                        </div>
                        <div class="group">
                            <label for="pass2" class="label">Repeat Password</label>
                            <input id="pass2" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="mail" class="label">Email Address</label>
                            <input id="mail" name="email" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="phone" class="label">Phone Number</label>
                            <input id="phone" name="phone" type="text" class="input">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1"><a class="login-link" href="#" >Already Member?</a></label>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>



</main>

<?php
include "inc/footer.php";
?>