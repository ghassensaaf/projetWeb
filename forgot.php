<?php
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    header("location:index.php");
}
else
{
    include "inc/header.php";
}
?>

    <main>
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forgot Password</label>
                <input class="sign-up"><label for="tab-2" class="tab"></label>
                <div class="login-form">
                    <form class="signin" onsubmit="" action="admin/forms.php" method="post">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="login" class="label">email</label>
                                <input id="login" name="em" type="text" class="input" placeholder="e-mail"  required>
                                <label class="text-warning label" for="login" id="login-error"></label>
                            </div>
                            <div style="width: 50%; margin-left: 25%;" class="group text-center">
                                <input type="submit" class="button" value="Recover Password">
                            </div>
                            <input type="hidden" name="form" value="forgotPwd">
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a class="login-link" href="login.php">Back To Login</a>
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